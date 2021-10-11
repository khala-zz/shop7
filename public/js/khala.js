 
$(function () {
    //khala

   
   /*$('.ion-ios-arrow-down,.toggle-btn').on('click', function (e) {
       //de khong tu dong dong menu lai
       $(this).parent().parent().parent().css("display","");
       
        e.preventDefault();
    });
   //danh cho nhieu con hon cho layout cua-hang
    $('.ion-ios-arrow-down,.toggle-btn').on('click', function (e) {
       $(this).parent().parent().parent().parent().parent().css("display","");
       //add class de xu ly khang cach hien thi menu con
       $(".ion-ios-arrow-down-khala").parent().css('padding-left','25px');
        e.preventDefault();
    }); */

    //change price click size
    $('.change-price').on('click', function (e) {
        //gan size den input field hidden size khi click vao size(L,M..)
        
        let value_size = $(this).data('value');
       

        //get duong dan cho attr data-url
        let urlRequest = $(this).data('url');
        

        if(value_size == 'Size'){
          
            let html = this.value + ' đ<input type="hidden" id = "product_price" name="product_price" value="' + this.value + '">';
            
              $('.new-price').html(html);
            
        }
        else{
          
           $.ajax({
                  type: 'GET',
                  url: urlRequest,
                  success: function(data){
                    let html = data + ' đ<input type="hidden" id = "product_price" name="product_price" value="' + data + '">';
                    if(data.code = 200){
                      $('.new-price').html(html);
                        //append input type hidden to size to get value size add to cart
                        let inputHidden = '<input type="hidden"  name="product_size" id="product_size" value="' + value_size + '" >';
                        $('.change-price').append(inputHidden);
                      }
                      $("#product_size").val(value_size);
                    },
                    error: function() {
                      /* Act on the event */
                      alert('có lỗi xảy ra,vui lòng thử lại sau hoặc báo admin');
                    }
                 });  
        }

       

     });

    //change color
    $('.change-color').on('click', function (e) {
         
         //gan color den input field hidden size khi click vao size(L,M..)
         let value_color = $(this).data('value');

        
         $(this).addClass('color-active');
         
         let inputHiddenColor = '<input type="hidden"  name="product_color" id="product_color" value="' + value_color + '" >';
         $('.change-color').append(inputHiddenColor);

    });

     //xy ly ajax cho add to cart o cac trang list product
    $('.btn-add-cart').on('click' ,function(e){
        e.preventDefault();
        //get cac gia tri 
        let values = $(this).attr('value');
        let arrValues = values.split("khala");
        let url = $(this).attr('url');
       
        //goi ajax
       
        $.ajax({
                type: 'get',
                url: url,
                data: {
                    product_id: arrValues[0],
                    product_code: arrValues[1],
                    product_name: arrValues[2],
                    product_price: arrValues[3],
                    product_quantity: 1
                },
                beforeSend: function() {  
                 
                    $('.ss-loading').show();
                    
                },
                success: function(data){
                    $('.ss-loading').hide();
                    alert('Thêm vào giỏ hàng thành công');
                    location.reload();

                },
                error: function() {
                    /* Act on the event */
                    alert('có lỗi xảy ra,vui lòng thử lại sau hoặc báo admin');
                }
            });
             
        
    });


    //modal
   $('.khala-quickview').on('click', function (e) {
           e.preventDefault();
         var values = $(this).attr('value');
         alert(values);
         $.ajax({
                type: 'POST',
                url: 'popup-product',
                data: {
                    product_id: values
                    
                },
                beforeSend: function() {  
                 
                    $('.ss-loading').show();
                    
                },
                success: function(data){
                    //get du lieu json tu server
                    //let myObj = JSON.parse(data);
                    $('.ss-loading').hide();

            
                    /*let html = '<div class="modal-dialog" role="document">';
                    html += '<div class="modal-content">';
                    html += '<div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button></div>';
                    html += '<div class="modal-body">';
                    html += '<div class="row">';*/
                    let html = '';
                    //cot trai
                    //html += '<div class="col-md-5 col-sm-12 col-xs-12">';
                    //html += '<div class="tab-content quickview-big-img">';
                    //show image lon
                    let bigImg = '';
                    $.each(data.imageGallery, function(i, item){
                      
                        bigImg += '<div id="pro-'+ (i + 1) +'" class="tab-pane fade show '  + ((i == 0) ? 'active' : ' ') + '">';
                        bigImg += '<img src="http://localhost/shop6/public/uploads/' + data.product.id + '/large/'+ item.image +'" alt="" />';
                        bigImg += '</div>';
                    });

                    $('#big-img').html(bigImg);    
                    
                    //html += '</div>';
                    let smallImg = '<div class="owl-stage-outer">';
                    smallImg += '<div class="owl-stage" style="transform: translate3d(-118px, 0px, 0px); transition: all 1s ease 0s; width: 474px;">';
                    
                    //html += '<div class="quickview-wrap mt-15">';
                    //html += '<div class="quickview-slide-active owl-carousel nav owl-nav-style owl-nav-style-2 " role="tablist">';
                    //show image nho
                    
                    
                    $.each(data.imageGallery, function(i, item){
                        smallImg += '<div class="owl-item active" style="width: 103.333px; margin-right: 15px;">';
                        smallImg += '<a '+((i == 0) ? 'class="active"' : ' ')+' data-toggle="tab" href="#pro-'+ (i + 1) +'"><img src="http://localhost/shop3/public/uploads/' + data.product.id + '/small/'+ item.image +'" alt="" /></a>';
                        smallImg += '</div>';   
                    });
                    smallImg += '</div></div>';
                    $('#small-img').html(smallImg);
                    //html += '</div>';
                    //html += '</div>';
                    //html += '</div>';
                    //cot phai
                    //html += '<form name = "addToCart" method = "post" action = "add-cart" id="myform">';
                    //html += '@csrf';
                    //cac input field dể add đến cart
                    html += '<input type="hidden" name="product_id" value="'+ data.product.id+'">';
                    html += '<input type="hidden" name="product_name" value="'+data.product.title+'">';
                    html += '<input type="hidden" name="product_code" value="'+data.product.product_code+'">';
                    // end input field -->                
                    //html += '<div class="col-md-7 col-sm-12 col-xs-12"><div class="product-details-content quickview-content">';
                    html += '<div class="product-details-content quickview-content">';
                    html += '<h2>' + data.product.title + '</h2>';   
                    html += '<p class="reference">Danh mục:<span>'+ data.category.title + '</span></p>';       
                    //hien thi rating
                    html += '<div class="pro-details-rating-wrap">';
                    html += '<div class="rating-product">';
                    let avg_rating = 0;
                    if(data.product.pro_total_rating){
                        // tru 1 vi de mac dinh cac cot do la 1 de khong che up len heroku khi de mac dinh la 0
                        let total_number = data.product.pro_total_number - 1;
                        let total_rating = data.product.pro_total_rating - 1 ;
                        
                        if(total_number != 0 && total_rating != 0){
                            avg_rating = Math.round(total_number/total_rating,2);
                        }
                        
                    }
                    html += '<span class="rating-stars selected">';
                    
                    for(let i = 1; i <= 5; i++){
                     html += '<a class="star-'+ i +' '+ ((i <= avg_rating) ? 'active':'') +' ">'+i+'</a>';
                    }
                                               
                    html += '</span>';
                    html += '</div>';
                     // end hien thi rating
                     //hien thi danh gia
                    html += '<span class="read-review"><a class="reviews" href="#">Đánh giá ('+data.reviews+')</a></span>'
                    html += '</div>';
                    //hien thi gia
                    
                    html += '<div class="pricing-meta"><ul>';

                    if(data.product.discount != 0){
                        let price_discount = data.product.price * (100 - data.product.discount)/100;
                        html += '<li class="old-price">' +data.product.price+ ' đ</li>';
                        html += '<li class="current-price new-price">'+ price_discount + ' đ</li>';
                        //type hidden dung cho add to cart
                        html += '<li class="discount-price">-'+data.product.discount+'%<input type="hidden" id = "product_price" name="product_price" value="'+ price_discount + '"></li>';                        

                    }
                    else
                    {
                        //type hidden dung cho add to cart
                        html += '<li class="old-price not-cut">'+data.product.price+' đ<input type="hidden" id = "product_price" name="product_price" value="'+data.product.price+'"></li>';
                    }

                    
                    
                    html += '</ul></div>';
                    //end hien thi gia
                    //mo ta
                   
                    let descShort = data.product.description.substring(0, 170);
                    html += '<p>'+ descShort  +'</p>';
                    //add to cart
                    html += '<div >';
                    html += '<div class="cart-plus-minus">';
                    html += '<input class="cart-plus-minus-box" type="number" name="product_quantity" value=1 />';
                    html += '</div>';
                    html += '<div class="pro-details-cart btn-hover"><br />';
                    //html += '<a href="#" id = "submit-popup"> + Thêm vào giỏ hàng</a>';
                    html += '<input type="submit" class ="cart-btn-2" value="Thêm vào giỏ hàng">';
                    html += '</div>';
                    html += '</div>';
                    html += '</div>';
                    //html += '</form>';
                    //html += '</div>';

                    //bao body
                    /*
                    html += '</div>';
                    html += '</div>';
                    html += '</div>';
                    html += '</div>';
                    html += '</div>';
                    */
                 
                    
                    $('#cot-phai').html(html);

                },
                error: function() {
                    /* Act on the event */
                    alert('có lỗi xảy ra,vui lòng thử lại sau hoặc báo admin');
                }
            });
     });

    //xu ly cho rating
    let listStart = $(".rating-stars .start-a");

    listStart.mouseover(function(event) {
        let $this = $(this);
        //lay value hien tai de so sach trong vong each
        let number = $this.attr('data-key');
        //gan value cho the hidden number_rating
        $('.number_rating').val(number);
        //xy ly phan active
        listStart.removeClass('active');
        $.each(listStart, function(key,value){
            if( key + 1 <= number){
                $(this).addClass('active');
            }
        });
        //hien thi select tot,tam duoc khi hover lên ngôi sao
        $('#rating').val($this.attr('data-key')).show();

    });

    $('#submit_review').on('click' ,function(e){
        e.preventDefault();
        //get cac gia tri message,number,url
        let content = $('#reply-message').val();
        let number = $('.number_rating').val();
        let url = $(this).attr('href');
        //goi ajax
        if(content && number){
            $.ajax({
                    type: 'POST',
                    url: url,
                    data: {
                        number: number,
                        content: content
                    },
                    success: function(data){
                        if(data.code == '1'){
                            alert('Gửi Đánh giá thành công');
                            location.reload();
                        }

                    },
                    error: function() {
                        /* Act on the event */
                        alert('có lỗi xảy ra,vui lòng thử lại sau hoặc báo admin');
                    }
                });
            }  
        
    });

    /*danh cho phan check dia chi khac trang checkout*/
    $('.checkout-toggle').on('click', function() {
        $('.open-toggle').slideToggle(1000);
    });

    $('.toggle-menu .caret').click(function() {
            
            $(this).closest('.toggle-content').find('.sub-menu').slideToggle("fast");
            return false;              
        }); 
   /*danh cho menu Mobile*/

    $('.navigation_mobile_2 .arrow_2').click(function() {
        if ($(this).attr('class') == 'arrow_2 class_test') {
            $('.navigation_mobile_2 .arrow_2').removeClass('class_test');
            $('.navigation_mobile_2').removeClass('active');
            $('.navigation_mobile_2').find('.menu-mobile-container_2').hide("slow");
        } else {
            $('.navigation_mobile_2 .arrow_2').addClass('class_test');
            $('.navigation_mobile_2').addClass('active');
            $('.navigation_mobile_2').find('.menu-mobile-container_2').show("slow");
        }
    });


    $('.navigation_mobile_1 .arrow_1').click(function() {
        if ($(this).attr('class') == 'arrow_1 class_test') {
            $('.navigation_mobile_1 .arrow_1').removeClass('class_test');
            $('.navigation_mobile_1').removeClass('active');
            $('.navigation_mobile_1').find('.menu-mobile-container_1').hide("slow");
        } else {
            $('.navigation_mobile_1 .arrow_1').addClass('class_test');
            $('.navigation_mobile_1').addClass('active');
            $('.navigation_mobile_1').find('.menu-mobile-container_1').show("slow");
        }
    });

    /*lam cho trang account*/
   // tab nav link
            $(document.body).on('click', '.tab .nav-link', function (e) {
                var $this = $(this);
                e.preventDefault();

                if (!$this.hasClass("active")) {
                    var $panel = $($this.attr('href'));
                    $panel.parent().find('.active').removeClass('in active');
                    $panel.addClass('active in');

                    $this.parent().parent().find('.active').removeClass('active');
                    $this.addClass('active');
                }
            })

            // link to tab
            $(document.body).on('click', '.link-to-tab', function (e) {
                var selector = $(e.currentTarget).attr('href'),
                    $tab = $(selector),
                    $nav = $tab.parent().siblings('.nav');
                e.preventDefault();

                $tab.siblings().removeClass('active in');
                $tab.addClass('active in');
                $nav.find('.nav-link').removeClass('active');
                $nav.find('[href="' + selector + '"]').addClass('active');

                $('html').animate({
                    scrollTop: $tab.offset().top - 150
                });
            });
            /*show cac san pham trong order cua trang account*/
            $(".account-order-toggle-khala").click(function(){
               
                let index = $(this).data('index');
                $(".collapse-"+ index).collapse('toggle');
            });
    
                       
});

