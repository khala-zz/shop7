<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductFeature;
use App\Models\ProductGallery;
use App\Models\Brand;
use App\Models\Category;
use App\Models\CategoryFeature;
// su dung request rieng de check validate
use App\Http\Requests\ProductRequest;
use App\Http\Requests\EditProductRequest;
use Illuminate\Support\Facades\Auth;
//su dung de quy
use App\Components\Recusive;
// su dung trait
use App\Traits\Helpers;
use App\Traits\DeleteModelTrait;

class AdminProductController extends Controller
{
    use Helpers,DeleteModelTrait;
    private $product;
    private $brand;
    private $category;

    public function __construct(Product $product, Brand $brand, Category $category)
    {
        //dung middleware de phan quyen truy cap
        $this->middleware('admin:index-list_product|create_product|show-view_product|edit-edit_product|destroy-delete_product', ['except' => ['store', 'update']]);
        
        $this -> product = $product;
        $this -> brand = $brand;
        $this -> category = $category;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = $this -> product -> with('category', 'user', 'gallery', 'brand');

        $this->filterAndResponse($request, $query);

        $query->orderBy('id', 'DESC');

        $products = $query->paginate(15);
        // dung cho filter danh muc
        if(isset($request -> category_id)){
            
            $htmlOption = $this -> getCategory($request -> category_id);
        }
        else
        {
            $htmlOption = $this -> getCategory($parentId = '');
        }

        return view('admin.pages.product.index', compact('products','htmlOption'));
    }

    /**
     * filter and response
     *
     * @param $request
     * @param $query
     */
    private function filterAndResponse($request, $query)
    {
        if($request->has('id')) {
            $query->where('id', $request->id);
        }

        if($request->has('title') && $request -> title != "") {
            $query->where('title', 'like', "%$request->title%");
        }

        if($request->has('product_code')) {
            $query->where('product_code', $request->product_code);
        }

        if($request->has('from_price') && $request -> from_price != "") {
            $query->where('price', '>=', $request->from_price);
        }

        if($request->has('to_price') && $request -> to_price != "") {
            $query->where('price', '<=', $request->to_price);
        }

        if($request->has('amount')) {
            $query->where('amount', $request->amount);
        }

        if($request->has('category_id') && $request->category_id != '' ) {
            $query->where('category_id', $request->category_id);
        }

        if($request->has('brand_id')) {
            $query->where('brand_id', $request->brand_id);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $htmlOption = $this -> getCategory($parentId = '');
        $brands = $this -> brand -> all();
        
        return view('admin.pages.product.create',compact('htmlOption','brands'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        
        try {
            //validate data
            $validated = $request->validated();

            $product = new Product;
            foreach($request->except('features', 'multi-image','_token') as $key => $value) {
                if($key == 'discount_start_date' || $key == 'discount_end_date') {
                    if($value != ''){
                        $product->{$key} = !empty($value) && !is_null($value)?date("Y-m-d", strtotime($value)) : null;
                    }
                } else if($key == 'discount') {
                    $product->{$key} = $value?intval($value) : 0;
                } else if($key == 'brand_id') {
                    $product->{$key} = is_null($value) || empty($value) ? NULL : intval($value);
                } else {
                    $product->{$key} = $value;
                }
            }
            if ($request->hasFile('image')) {

                checkDirectory("products-daidien");

                $product->image = uploadFile($request, 'image', public_path('uploads/products-daidien'),$request -> input('title'));
            }
            $product->created_by = auth()->user()->id;

            $product->save();

            // save features if any
            $this->insertFeatures($request, $product);

            // upload images
            $this->uploadImages($request, $product);

            return redirect('khalaadmin/products')->with('flash_message', 'Thêm mới sản phẩm <b>'.$product -> title.' </b>thành công !');
        } catch (\Exception $e) {
            $product->delete();

            return response()->json(['success' => 0, 'message' => $e->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::with('features', 'gallery', 'brand', 'category')->findOrFail($id);

        return view('admin.pages.product.show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //get product
        $product = $this -> product -> findOrFail($id);
        
        //check features thong qua category relation co with features
        $check_features = $product -> category() -> get();
      
        //get image gallery
        $image_gallery = $product -> gallery() -> get();
        //get brand
        $brands = $this -> brand -> all();
        // get category
        $htmlOption = $this -> getCategory($product -> category_id);
        return view('admin.pages.product.edit',compact('product','htmlOption','brands','image_gallery','check_features'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditProductRequest $request, $id)
    {
       
        try {
            $product = $this -> product -> findOrFail($id);

            //validate data
            $validated = $request->validated();

            foreach($request->except('features','multi-image','_token', '_method') as $key => $value) {
                if($key == 'discount_start_date' || $key == 'discount_end_date') {
                    $product->{$key} = !empty($value) && !is_null($value)?date("Y-m-d", strtotime($value)) : null;
                } else if($key == 'discount') {
                    $product->{$key} = $value?intval($value) : 0;
                } else if($key == 'brand_id') {
                    $product->{$key} = is_null($value) || empty($value) ? NULL : intval($value);
                } else {
                    $product->{$key} = $value;
                }
            }
            if ($request->hasFile('image')) {

                checkDirectory("products-daidien");

                $product->image = uploadFile($request, 'image', public_path('uploads/products-daidien'),$request -> input('title'));
            }

            $product->save();

            if($product->features()->count() > 0) {
                $product->features()->delete();
            }

            $this->insertFeatures($request, $product);

            // upload images
            $this->uploadImages($request, $product);

            return redirect('khalaadmin/products')->with('flash_message', 'Sửa sản phẩm <b>'.$product -> title.' </b>thành công !');

        } catch (\Exception $e) {
            return response()->json(['success' => 0, 'message' => $e->getMessage()], 500);
        }
    }
    //xóa image gallery
    public function deleteImageGallery(Request $request){
        try {
            $gallery = ProductGallery::findOrFail($request -> id_image);
            

            if(!empty($gallery->image)) {
                foreach ($gallery->image_url as $dir => $url) {

                    $this->deleteFile(base_path('public').'/uploads/' . $gallery->product_id . '/' . $dir . '/' . $gallery->image);
                }

                $this->deleteFile(base_path('public').'/uploads/' . $gallery->product_id . '/' . $gallery->image);
            }

            $gallery->delete();

            echo 'Xóa hình ảnh thành công';
        } catch (\Exception $e) {
            return response()->json(['success' => 0, 'message' => $e->getMessage()], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $product = $this -> product -> with('gallery')->findOrFail($id);

            // check if this product have orders attached to it then reject delete
            /*if($product->orderDetails->count() > 0) {
            //    throw new \Exception("Can't delete the product as there already orders attached to it");
            //}*/
            $this->deleteFile(base_path('public').'/uploads/products-daidien/' . $product->image);
            foreach ($product->gallery as $gallery) {
                if(!empty($gallery->image)) {
                    foreach ($gallery->image_url as $dir => $url) {
                        $this->deleteFile(base_path('public').'/uploads/' . $gallery->product_id . '/' . $dir . '/' . $gallery->image);
                    }

                    $this->deleteFile(base_path('public').'/uploads/' . $gallery->product_id . '/' . $gallery->image);
                }
            }

            $product->delete();

            return redirect('khalaadmin/products')->with('flash_message', 'Xóa sản phẩm thành công !');
        } catch (\Exception $e) {
            return response()->json(['success' => 0, 'message' => $e->getMessage()], 500);
        }
    }
     //xoa ajax
    public function delete($id)
    {
        try {
            $product = $this -> product -> with('gallery')->findOrFail($id);

            // check if this product have orders attached to it then reject delete
            /*if($product->orderDetails->count() > 0) {
                throw new \Exception("Can't delete the product as there already orders attached to it");
            }*/
            $this->deleteFile(base_path('public').'/uploads/products-daidien/' . $product->image);
            foreach ($product->gallery as $gallery) {
                if(!empty($gallery->image)) {
                    foreach ($gallery->image_url as $dir => $url) {
                        $this->deleteFile(base_path('public').'/uploads/' . $gallery->product_id . '/' . $dir . '/' . $gallery->image);
                    }

                    $this->deleteFile(base_path('public').'/uploads/' . $gallery->product_id . '/' . $gallery->image);
                }
            }

            return $this -> deleteModelTrait($id,$this -> product);
        } catch (\Exception $e) {
            return response()->json(['success' => 0, 'message' => $e->getMessage()], 500);
        }
        
    }
    //get toan bo danh muc
    public function getCategory($parentId){
        $data = $this -> category -> all();
        $recusive = new Recusive($data);
        $htmlOption = $recusive -> categoryRecusive($parentId);
        return $htmlOption;
    }
    //get features from change category
    public function getFeatures(Request $request){
        
        $id_category = $request -> id_category;
        $category = $this -> category -> findOrFail($id_category);
        if($category -> featured == 1){
            $category_features = $category -> features() -> get();
           $myJSON = json_encode($category_features);
           echo $myJSON;
            
        }
        else{
             return response()->json(['success' => 0], 500);
        }


        
    }

    protected function insertFeatures($request, $product) {
        
        if($request->has('features')) {
            foreach ($request->input('features') as $id => $feature_value) {
                 //ma mau  fefbfb de hack va nhan dang chua chon ma mau khi them moi san pham
                if(!empty($feature_value) && $feature_value <> '#FBFEFE' && $feature_value <> '#fbfefe') {
                    $productFeature = new ProductFeature();
                    $productFeature->field_id = $id;
                    $productFeature->field_value = $feature_value;

                    $product->features()->save($productFeature);
                    
                }
            }
        }
    }

    /**
     * upload images
     *
     * @param $request
     * @param $product
     */
    protected function uploadImages($request, $product)
    {
        $this->createProductUploadDirs($product->id, $this->imagesSizes);

        $uploaded_files = $this->uploadFiles($request, 'multi-image', base_path('public').'/uploads/' . $product->id);

        foreach ($uploaded_files as $uploaded_file) {

            $productGallery = new ProductGallery();
            
            $productGallery->image = $uploaded_file;

            $product->gallery()->save($productGallery);

            // start resize images
            /*foreach ($this->imagesSizes as $dirName => $imagesSize) {
                $this->resizeImage(base_path('public').'/uploads/' . $product->id . '/' . $uploaded_file, base_path('public').'/uploads/' . $product->id . '/' . $dirName . '/' . $uploaded_file, $imagesSize['width'], $imagesSize['height']);
            }*/
        }
    }
}
