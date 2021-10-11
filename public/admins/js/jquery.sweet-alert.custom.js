!function($) {
    
    "use strict";

    var SweetAlert = function() {};

    //examples 
    SweetAlert.prototype.init = function() {
        
    
    //Warning Message
    $('.sa-warning').click(function(){
        //khala
        event.preventDefault();
        //get duong dan cho attr data-url
        let urlRequest = $(this).data('url');
        let that = $(this);
        
        if(urlRequest.includes("delete-brand")){
            var text_display = "Bạn sẽ chọn lại nhãn hiệu cho sản phẩm nếu sản phẩm có nhãn hiệu bạn xóa";
        }
        else if(urlRequest.includes("delete-category")){
            var text_display = "Bạn sẽ chọn lại danh mục cho sản phẩm nếu sản phẩm có danh mục bạn xóa và các danh mục con cũng bị xóa hết";
        }
        else{
            var text_display = "Bạn sẽ mất thông tin này trên hệ thống";
        }
        //end khala
        swal({   
            title: "Bạn chắc chắn muốn xóa?",   
            text: text_display,   
            type: "warning",   
            showCancelButton: true,   
            confirmButtonColor: "#DD6B55",   
            confirmButtonText: "Xóa thông tin!!!",   
            closeOnConfirm: false 
        }, function(){ 
            //goi ajax
            $.ajax({
                type: 'GET',
                url: urlRequest,
                success: function(data){

                    if(data.code = 200){
                        that.parent().parent().remove();
                        swal("Đã xóa!", "Thông tin đã được xóa trên hệ thống.", "success");
                    }

                },
                error: function() {
                    /* Act on the event */
                    alert('có lỗi xảy ra,vui lòng thử lại sau hoặc báo admin');
                }
            });  
            
        });
    });

    //Parameter
    $('#sa-params').click(function(){
        swal({   
            title: "Are you sure?",   
            text: "You will not be able to recover this imaginary file!",   
            type: "warning",   
            showCancelButton: true,   
            confirmButtonColor: "#DD6B55",   
            confirmButtonText: "Yes, delete it!",   
            cancelButtonText: "No, cancel plx!",   
            closeOnConfirm: false,   
            closeOnCancel: false 
        }, function(isConfirm){   
            if (isConfirm) {     
                swal("Deleted!", "Your imaginary file has been deleted.", "success");   
            } else {     
                swal("Cancelled", "Your imaginary file is safe :)", "error");   
            } 
        });
    });

    //Custom Image
    $('#sa-image').click(function(){
        swal({   
            title: "Govinda!",   
            text: "Recently joined twitter",   
            imageUrl: "../assets/images/users/1.jpg" 
        });
    });

    //Auto Close Timer
    $('#sa-close').click(function(){
         swal({   
            title: "Auto close alert!",   
            text: "I will close in 2 seconds.",   
            timer: 2000,   
            showConfirmButton: false 
        });
    });


    },
    //init
    $.SweetAlert = new SweetAlert, $.SweetAlert.Constructor = SweetAlert
}(window.jQuery),

//initializing 
function($) {
    "use strict";
    $.SweetAlert.init()
}(window.jQuery);

