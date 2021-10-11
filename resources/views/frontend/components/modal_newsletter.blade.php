<div id="newsletter-popup" class="modal fade in" style="display: block; padding-right: 15px;" tabindex="-1" role="dialog" aria-hidden="false">
		<div class="nl-wraper-popup bounceInDown animated">
			<div class="nl-wraper-popup-inner"> 
				<div class="popup-image">
					<img src="{{asset('images/home1_newletter.jpg')}}" alt="Newsletter">
				</div>
				<form action="{{route('newsletter.store')}}" method="post" >
					@csrf
					<h4>Đăng kí trang của chúng tôi</h4>
					Hãy là người đầu tiên đăng kí để nhận nhiều ưu đãi của chúng tôi   
					     
					<div class="group_input">
						<input class="form-control" type="email" name="email" placeholder="Nhập Email...">
						<button class="btn" type="submit">Đăng kí</button>
					</div>       
				</form>
				<div class="nl-popup-close">
					<span onclick="$('#newsletter-popup').modal('hide')" data-toggle="tooltip" data-placement="top" title="" data-original-title="Close"><i class="fa fa-times"></i></span>
				</div>
			</div>
		</div>
	</div>