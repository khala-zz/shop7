<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use App\Models\CatNews;
use App\Models\Tag;

class NewsController extends Controller
{
    private $news;
	private $cat_news;
	private $tag;
	
	public function __construct(News $news,CatNews $cat_news, Tag $tag){
		$this -> news = $news;
		$this -> cat_news = $cat_news;
		$this -> tag = $tag;
		
	}

    public function detail($slug, $id)
	{
    	//get news detail
		$news = $this -> news ->  where('id',$id) -> first();
		
    	//get cat news
		$cat_news = $this -> cat_news -> all();

         //get news right
        $news_right = $this -> news  -> where('is_active',1) -> take(4) -> latest() -> get();

		// related news
		$news_related = $this -> news -> select('id','image_name','title','created_at','user_id','description') -> where('id','<>',$id) -> where('cat_news_id',$news -> cat_news_id)  -> get();

		//tag cloud
		$tags = $this -> tag -> all();

		return view('frontend.news.detail',compact('news','cat_news','news_related','tags','news_right'));
	}

	public function listCat($slug,$id)
    {
    	
    	//tag cloud
		$tags = $this -> tag -> all();
    	
    	//get tat ca cat_news
    	$cat_news = $this -> cat_news -> select('id','title','parent_id')  -> where('is_active',1) -> get();
    	
    	//get news 
        $news = $this -> news  -> where('is_active',1) ->where('cat_news_id',$id) -> paginate(15);

         //get news right
        $news_right = $this -> news  -> where('is_active',1) -> take(4) -> latest() -> get();
   
    	return view('frontend.news.list',compact('news','cat_news','tags','news_right'));
    }

    //list news
    public function listNews()
    {
        
        
        //tag cloud
        $tags = $this -> tag -> all();
        
        //get tat ca cat_news
        $cat_news = $this -> cat_news -> select('id','title','parent_id')  -> where('is_active',1) -> get();
        
        //get news 
        $news = $this -> news  -> where('is_active',1) -> paginate(10);

         //get news right
        $news_right = $this -> news  -> where('is_active',1) -> take(4) -> latest() -> get();
   
        return view('frontend.news.list',compact('news','cat_news','tags','news_right'));
    }
    //list news tag
    public function listNewsTag($slug,$id)
    {
    	
    	//tag cloud
		$tags = $this -> tag -> all();
    	
    	//get tat ca cat_news
    	$cat_news = $this -> cat_news -> select('id','title','parent_id')  -> where('is_active',1) -> get();
    	//get 1 tag
    	$tag = Tag::find($id);

        //get tat ca tin tuc thuoc 1 tag
        $news_tag =  $tag->news()->paginate(10);

         //get news right
        $news_right = $this -> news  -> where('is_active',1) -> take(4) -> latest() -> get();

    	return view('frontend.news.tag',compact('news_tag','cat_news','tags','news_right'));
    }

     

    
}
