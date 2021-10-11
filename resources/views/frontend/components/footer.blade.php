<footer class="footer">
        <div id="shopify-section-theme-footer-top" class="shopify-section">
            <section class="footer_service_block">
                <div class="footer_service_wrapper">
                    <div class="container">
                        <div class="row">
                            <div class="footer_service_inner">
                                <div class="footer_service_content">
                                    @forelse(getSettings() as $setting)
                                    <div class="col-5 service_item">
                                        <span class="footer-title">
                                            {{$setting -> setting_key}}
                                        </span>
                                        <div class="service_caption">
                                            {{$setting -> setting_value}}
                                        </div>
                                    </div>
                                    @empty
                                        <p>Đang cập nhật thông tin!!!</p>
                                    @endforelse
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="footer_newsoc_block">
                <div class="footer_newsoc_wrapper">
                    <div class="container">
                        <div class="row">
                            <div class="_line"></div>
                            <div class="footer_newsoc_inner">
                                <div class="footer_newsoc_content">
                                    <div class="footer_newsletter_content">
                                        <span class="footer-title">
                                            Đăng kí email để nhận các khuyến mãi mới nhất của chúng tôi.
                                        </span>
                                        <div class="newsletter_content">
                                            <form method="post" action="{{route('newsletter.store')}}">
                                                @csrf
                                                <input type="email" class="form-control" value="" name="email" id="mail" placeholder="Nhập Email...">
                                                <button type="submit" class="btn_newsletter_send btn" name="subscribe" id="subscribe">Đăng kí</button>
                                            </form>
                                            <span class="newsletter_caption">
                                                Thông tin email của bạn sẽ được giữ bí mật.
                                            </span>

                                        </div>
                                    </div>
                                    <div class="footer_social_content">
                                        <span class="footer-title">
                                            Liên kết với chúng tôi
                                        </span>
                                        <div class="social_content">
                                            <a href="index.html" title="Sarahmarket 1 on Facebook" class="icon-social facebook"><i class="fa fa-facebook"></i></a>
                                            <a href="index.html" title="Sarahmarket 1 on Twitter" class="icon-social twitter"><i class="fa fa-twitter"></i></a>
                                            <a href="index.html" title="Sarahmarket 1 on Pinterest" class="icon-social pinterest"><i class="fa fa-pinterest"></i></a>
                                            <a href="index.html" title="Sarahmarket 1 on Instagram" class="icon-social instagram"><i class="fa fa-instagram"></i></a>
                                            <a href="index.html" title="Sarahmarket 1 on Youtube" class="icon-social youtube"><i class="fa fa-youtube"></i></a>
                                            <a href="index.html" title="Sarahmarket 1 on Vimeo" class="icon-social vimeo"><i class="fa fa-vimeo"></i></a>


                                        </div>
                                    </div>
                                    {{-- <div class="footer_shop_content">
                                        <span class="footer-title">
                                            Shop On-The-Go
                                        </span>
                                        <div class="shop_content">
                                            <a href="index.html">Download the app</a> and get the world of SarahMarket at your fingertips.
                                        </div>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <div id="shopify-section-theme-footer-bottom" class="shopify-section">
            <section class="footer_linklist_block">
                <div class="footer_linklist_wrapper">
                    <div class="container">
                        <div class="row">
                            <div class="_line"></div>
                            <div class="footer_linklist_inner">
                                <div class="footer_linklist_content">
                                    <div class="col-sm-3 linklist_item">
                                        <span class="footer-title">
                                            Về chúng tôi
                                        </span>
                                        <div class="linklist_content">
                                            <ul class="linklist_menu">
                                                @forelse(getLinks(1) as $link)
                                                    <li>
                                                        <a href="{{ url($link -> link) }}">{{$link -> title}}</a>
                                                    </li>
                                                @empty
                                                    <p>Đang cập nhật thông tin!!!</p>
                                                @endforelse
                                                
                                                
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-sm-3 linklist_item">
                                        <span class="footer-title">
                                            Thông tin
                                        </span>
                                        <div class="linklist_content">
                                            <ul class="linklist_menu">
                                                @forelse(getLinks(2) as $link)
                                                    <li>
                                                        <a href="{{ url($link -> link) }}">{{$link -> title}}</a>
                                                    </li>
                                                @empty
                                                    <p>Đang cập nhật thông tin!!!</p>
                                                @endforelse
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-sm-3 linklist_item">
                                        <span class="footer-title">
                                            Thành viên
                                        </span>
                                        <div class="linklist_content">
                                            <ul class="linklist_menu">
                                                <!-- link dang nhap,dang ki -->
                                                @if(empty(Auth::check()))
                                                  
                                                    <li ><a href="{{ url('/front-login') }}">Đăng nhập</a></li>
                                                    <li ><a href="{{ url('/front-register') }}">Đăng kí</a></li>

                                                @else
                                                    <li ><a href="{{ url('/my-account') }}">Tài khoản</a></li>
                                                      
                                                    <li ><a href="{{ url('/front-logout') }}">Đăng xuất</a></li>
                                                @endif
                                               
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-sm-3 linklist_item">
                                        <span class="footer-title">
                                           Chính sách
                                        </span>
                                        <div class="linklist_content">
                                            <ul class="linklist_menu">
                                                @forelse(getLinks(4) as $link)
                                                    <li>
                                                        <a href="{{ url($link -> link) }}">{{$link -> title}}</a>
                                                    </li>
                                                @empty
                                                    <p>Đang cập nhật thông tin!!!</p>
                                                @endforelse
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="copy-right">
                <div class="copy-right-wrapper">
                    <div class="container">
                        <div class="row">
                            <div class="_line"></div>
                            <div class="copy-right-inner">
                                <div class="copy-right-group">
                                    
                                    <div class="footer_copyright">Copyright © 2021 <a href="index.html" title="">Khala</a>. All Rights Reserved</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </footer>