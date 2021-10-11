
$(function () {
	//hien thi datepicker cho cac field giam gia
    $("#discount_start_date, #discount_end_date").datepicker(); 

    //get cac thuoc tinh product khi change category
    $("#changeCategory").change(function () {
        
        let idCategory=$(this).val();
       
        if(idCategory!=""){
           
            $.ajax({

                type:'get',
                url:'http://localhost/shop6/public/khalaadmin/get-product-features',
                data:{id_category:idCategory},
                success:function(resp){
                   
                   let myObj = JSON.parse(resp);

                   let html="";
                    for (let [i,item] of myObj.entries()) {
                        let index = i + 1;
                        if(item.field_type == 1){
                            let text = '<label  class="control-label">'+ item.field_title + '</label><input type="text" name="features['+item.id+']" class="form-control">';
                            html+=text;
                            
                        }
                        else{
                            let color = '<label  class="control-label">'+ item.field_title + '</label><input type="color" value="#FBFEFE" name="features['+item.id+']" class="form-control">';
                            html+=color;
                        }
                        }
                        $('#frame-feature').html(html);
                   
                },error:function () {
                    alert("Danh mục chưa có đặc tính");
                    $('#frame-feature').html('');
                }
            });
        }
    });

    



     // Multiple images preview in browser
    var imagesPreview = function(input, placeToInsertImagePreview) {

        if (input.files) {
            var filesAmount = input.files.length;

            for (i = 0; i < filesAmount; i++) {
                var reader = new FileReader();
                //let div = '<div class="col-lg-3 photo-wrapper" >';
                reader.onload = function(event) {
                	//let imgage = $($.parseHTML('<img class="photo_preview">')).attr('src', event.target.result);
                    $($.parseHTML('<img class="photo_preview photo-wrapper">')).attr('src', event.target.result).appendTo(placeToInsertImagePreview);
                }


                reader.readAsDataURL(input.files[i]);
            }
        }

    };

    $('#gallery-photo-add').on('change', function() {
        imagesPreview(this, 'div.gallery');
    });

    //xoa image trong danh sanch image khi sua product
    $(document).on("click", ".remove-feature-product" , function(e) {
    	e.preventDefault();
    	var confirmDel = confirm('xác nhận xóa ?');
         if (confirmDel == false) {
             return false;
         }
    	let id = $(this).data('value');
    	$.ajax({
                type:'get',
                url:'http://localhost/shop6/public/khalaadmin/delete-image-product-gallery',
                data:{id_image:id},
                success:function(resp){
                    
                   alert(resp);
                    
                },error:function () {
                    alert("Xóa hình ảnh không thanh công,vui lòng thử lại");
                }
            });
    	$(".delete-ele-" + id).remove();
    });

});


