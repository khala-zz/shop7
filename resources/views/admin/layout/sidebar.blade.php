<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                @if(\Auth::user()->image != null)
                <img src="{{ url('uploads/users/' . \Auth::user()->image) }}" class="img-circle" alt="User Image">
                @else
                <img src="{{ url('theme/dist/img/image_placeholder.png') }}" class="img-circle" alt="User Image">
                @endif
            </div>
            <div class="pull-left info">
                <p>{{ \Auth::user()->name }}</p>
            </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            <li class="{{ Request::segment(2) == ""?"active":"" }}">
                <a href="{{ url('/khalaadmin') }}">
                    <i class="fa fa-dashboard"></i> <span>Quản lý</span>
                </a>
            </li>
            <!-- link danh muc san pham -->
            @if(user_can('list_category') || user_can('create_category'))
            <li class="treeview {{ Request::segment(2) == 'categories'? 'active':'' }}">
                <a href="#">
                    <i class="fa fa-address-card"></i> <span>Danh mục sản phẩm</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    @if(user_can('list_category'))
                    <li class="{{ Request::segment(2) == "categories" && Request::segment(3) == ""?"active":"" }}">
                        <a href="{{ url('/khalaadmin/categories') }}"><i class="fa fa-list"></i> Danh sách</a>
                    </li>
                    @endif
                    @if(user_can('create_category'))
                    <li class="{{ Request::segment(2) == "categories" && Request::segment(3) == "create"?"active":"" }}">
                        <a href="{{ url('/khalaadmin/categories/create') }}"><i class="fa fa-leaf"></i> Thêm</a>
                    </li>
                    @endif
                    
                </ul>
            </li>
            @endif

            <!-- link product -->
            @if(user_can('list_product') || user_can('create_product'))
            <li class="treeview {{ Request::segment(2) == 'products'? 'active':'' }}">
                <a href="#">
                    <i class="fa fa-address-card"></i> <span>Sản phẩm</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    @if(user_can('list_product'))
                    <li class="{{ Request::segment(2) == "products" && Request::segment(3) == ""?"active":"" }}">
                        <a href="{{ url('/khalaadmin/products') }}"><i class="fa fa-list"></i> Danh sách</a>
                    </li>
                    @endif
                    @if(user_can('create_product'))
                    <li class="{{ Request::segment(2) == "products" && Request::segment(3) == "create"?"active":"" }}">
                        <a href="{{ url('/khalaadmin/products/create') }}"><i class="fa fa-leaf"></i> Thêm</a>
                    </li>
                    @endif
                    
                </ul>
            </li>
            @endif

            <!-- link danh muc tin tuc -->
            @if(user_can('list_cat_news') || user_can('create_cat_news'))
            <li class="treeview {{ Request::segment(2) == 'cat_news'? 'active':'' }}">
                <a href="#">
                    <i class="fa fa-address-card"></i> <span>Danh mục tin tức</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    @if(user_can('list_cat_news'))
                    <li class="{{ Request::segment(2) == "cat_news" && Request::segment(3) == ""?"active":"" }}">
                        <a href="{{ url('/khalaadmin/cat_news') }}"><i class="fa fa-list"></i> Danh sách</a>
                    </li>
                    @endif
                    @if(user_can('create_cat_news'))
                    <li class="{{ Request::segment(2) == "cat_news" && Request::segment(3) == "create"?"active":"" }}">
                        <a href="{{ url('/khalaadmin/cat_news/create') }}"><i class="fa fa-leaf"></i> Thêm </a>
                    </li>
                    @endif
                    
                </ul>
            </li>
            @endif

            <!-- link tin tức -->
            @if(user_can('list_news') || user_can('create_news'))
            <li class="treeview {{ Request::segment(2) == 'news'? 'active':'' }}">
                <a href="#">
                    <i class="fa fa-address-card"></i> <span>Tin tức</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    @if(user_can('list_news'))
                    <li class="{{ Request::segment(2) == "news" && Request::segment(3) == ""?"active":"" }}">
                        <a href="{{ url('/khalaadmin/news') }}"><i class="fa fa-list"></i> Danh sách</a>
                    </li>
                    @endif
                    @if(user_can('create_news'))
                    <li class="{{ Request::segment(2) == "news" && Request::segment(3) == "create"?"active":"" }}">
                        <a href="{{ url('/khalaadmin/news/create') }}"><i class="fa fa-leaf"></i> Thêm</a>
                    </li>
                    @endif
                    
                </ul>
            </li>
            @endif

            <!-- link cac nhan hieu -->
            @if(user_can('list_brand') || user_can('create_brand'))
            <li class="treeview {{ Request::segment(2) == 'brands'? 'active':'' }}">
                <a href="#">
                    <i class="fa fa-address-card"></i> <span>Nhãn hiệu</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    @if(user_can('create_brand'))
                    <li class="{{ Request::segment(2) == "brands" && Request::segment(3) == ""?"active":"" }}">
                        <a href="{{ url('/khalaadmin/brands') }}"><i class="fa fa-list"></i> Danh sách</a>
                    </li>
                    @endif
                    @if(user_can('create_brand'))
                    <li class="{{ Request::segment(2) == "brands" && Request::segment(3) == "create"?"active":"" }}">
                        <a href="{{ url('/khalaadmin/brands/create') }}"><i class="fa fa-leaf"></i> Thêm</a>
                    </li>
                    @endif
                    
                </ul>
            </li>
            @endif

            <!-- link cac tag -->
            @if(user_can('list_tag') || user_can('create_tag'))
            <li class="treeview {{ Request::segment(2) == 'tags'? 'active':'' }}">
                <a href="#">
                    <i class="fa fa-address-card"></i> <span>Tags</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    @if(user_can('create_tag'))
                    <li class="{{ Request::segment(2) == "tags" && Request::segment(3) == ""?"active":"" }}">
                        <a href="{{ url('/khalaadmin/tags') }}"><i class="fa fa-list"></i> Danh sách</a>
                    </li>
                    @endif
                    @if(user_can('create_tag'))
                    <li class="{{ Request::segment(2) == "tags" && Request::segment(3) == "create"?"active":"" }}">
                        <a href="{{ url('/khalaadmin/tags/create') }}"><i class="fa fa-leaf"></i> Thêm</a>
                    </li>
                    @endif
                    
                </ul>
            </li>
            @endif
           
            <!-- link slider -->
            @if(user_can('list_slider') || user_can('create_slider'))
            <li class="treeview {{ Request::segment(2) == 'sliders'? 'active':'' }}">
                <a href="#">
                    <i class="fa fa-address-card"></i> <span>Slider</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    @if(user_can('list_slider'))
                    <li class="{{ Request::segment(2) == "sliders" && Request::segment(3) == ""?"active":"" }}">
                        <a href="{{ url('/khalaadmin/sliders') }}"><i class="fa fa-list"></i> Danh sách</a>
                    </li>
                    @endif
                    @if(user_can('create_slider'))
                    <li class="{{ Request::segment(2) == "sliders" && Request::segment(3) == "create"?"active":"" }}">
                        <a href="{{ url('/khalaadmin/sliders/create') }}"><i class="fa fa-leaf"></i> Thêm</a>
                    </li>
                    @endif
                    
                </ul>
            </li>
            @endif

            <!-- link banner -->
            @if(user_can('list_banner') || user_can('create_banner'))
                <li class="treeview {{ Request::segment(2) == 'banners'? 'active':'' }}">
                    <a href="#">
                        <i class="fa fa-address-card"></i> <span>Banner</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        @if(user_can('list_banner'))
                        <li class="{{ Request::segment(2) == "banners" && Request::segment(3) == ""?"active":"" }}">
                            <a href="{{ url('/khalaadmin/banners') }}"><i class="fa fa-list"></i> Danh sách</a>
                        </li>
                        @endif
                        @if(user_can('create_banner'))
                        <li class="{{ Request::segment(2) == "banners" && Request::segment(3) == "create"?"active":"" }}">
                            <a href="{{ url('/khalaadmin/banners/create') }}"><i class="fa fa-leaf"></i> Thêm </a>
                        </li>
                        @endif
                        
                    </ul>
                </li>
            @endif

            <!-- link link -->
            @if(user_can('list_link') || user_can('create_link'))
                <li class="treeview {{ Request::segment(2) == 'links'? 'active':'' }}">
                    <a href="#">
                        <i class="fa fa-address-card"></i> <span>Link</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        @if(user_can('list_link'))
                        <li class="{{ Request::segment(2) == "links" && Request::segment(3) == ""?"active":"" }}">
                            <a href="{{ url('/khalaadmin/links') }}"><i class="fa fa-list"></i> Danh sách</a>
                        </li>
                        @endif
                        @if(user_can('create_link'))
                        <li class="{{ Request::segment(2) == "links" && Request::segment(3) == "create"?"active":"" }}">
                            <a href="{{ url('/khalaadmin/links/create') }}"><i class="fa fa-leaf"></i> Thêm </a>
                        </li>
                        @endif
                        
                    </ul>
                </li>
            @endif

             <!-- link review -->
            @if(user_can('list_review'))
            
                <li class="{{ Request::segment(2) == "reviews" ?"active":"" }}">
                    <a href="{{ url('/khalaadmin/reviews') }}"><i class="fa fa-list"></i> Đánh giá</a>
                            
                </li>

            @endif

            <!-- link coupon -->
            @if(user_can('list_coupon') || user_can('create_coupon'))
                <li class="treeview {{ Request::segment(2) == 'coupons'? 'active':'' }}">
                    <a href="#">
                        <i class="fa fa-address-card"></i> <span>Mã giảm giá</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        @if(user_can('list_coupon'))
                        <li class="{{ Request::segment(2) == "coupons" && Request::segment(3) == ""?"active":"" }}">
                            <a href="{{ url('/khalaadmin/coupons') }}"><i class="fa fa-list"></i> Danh sách</a>
                        </li>
                        @endif
                        @if(user_can('create_coupon'))
                        <li class="{{ Request::segment(2) == "coupons" && Request::segment(3) == "create"?"active":"" }}">
                            <a href="{{ url('/khalaadmin/coupons/create') }}"><i class="fa fa-leaf"></i> Thêm</a>
                        </li>
                        @endif
                        
                    </ul>
                </li>
            @endif

            <!-- link order -->
            @if(user_can('list_order'))
            
                <li class="{{ Request::segment(2) == "orders" ?"active":"" }}">
                    <a href="{{ url('/khalaadmin/orders') }}"><i class="fa fa-list"></i> Đơn hàng
                            <span class="label label-success">{{ count(getUnreadOrder()) }}</span></a>
                </li>

            @endif

            <!-- link setting -->
            @if(user_can('list_setting') || user_can('create_setting'))
                <li class="treeview {{ Request::segment(2) == 'settings'? 'active':'' }}">
                    <a href="#">
                        <i class="fa fa-address-card"></i> <span>Setting</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        @if(user_can('list_setting'))
                        <li class="{{ Request::segment(2) == "settings" && Request::segment(3) == ""?"active":"" }}">
                            <a href="{{ url('/khalaadmin/settings') }}"><i class="fa fa-list"></i> Danh sách</a>
                        </li>
                        @endif
                        @if(user_can('create_setting'))
                        <li class="{{ Request::segment(2) == "settings" && Request::segment(3) == "create"?"active":"" }}">
                            <a href="{{ url('/khalaadmin/settings/create?type=Text') }}"><i class="fa fa-leaf"></i> Thêm settings loại text</a>
                        </li>
                        <li class="{{ Request::segment(2) == "settings" && Request::segment(3) == "create"?"active":"" }}">
                            <a href="{{ url('/khalaadmin/settings/create?type=Textarea') }}"><i class="fa fa-leaf"></i> Thêm settings loại textarea</a>
                        </li>
                        @endif
                        
                    </ul>
                </li>
            @endif

            <!-- link contact -->
            @if(user_can('list_contact'))
            
                <li class="{{ Request::segment(2) == "contacts" ?"active":"" }}">
                    <a href="{{ url('/khalaadmin/contacts') }}"><i class="fa fa-list"></i> Liên hệ</a>
                            
                </li>

            @endif

             <!-- link newsletter -->
            @if(user_can('list_newsletter'))
            
                <li class="{{ Request::segment(2) == "newsletters" ?"active":"" }}">
                    <a href="{{ url('/khalaadmin/newsletters') }}"><i class="fa fa-list"></i>Newsletters</a>
                            
                </li>

            @endif

            @if(\Auth::user()->is_super_admin == 1)
                <li class="{{ in_array(Request::segment(2), ['users', 'permissions', 'roles'])?"active":"" }} treeview">
                    <a href="#">
                        <i class="fa fa-users"></i> <span>Quản lý tài khoản</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="{{ Request::segment(2) == "users"?"active":"" }}">
                            <a href="{{ url('/khalaadmin/users') }}"><i class="fa fa-user-o"></i> Tài khoản </a>
                        </li>

                        <li class="{{ Request::segment(2) == "permissions"?"active":"" }}">
                            <a href="{{ url('/khalaadmin/permissions') }}"><i class="fa fa-ban"></i> Phân quyền</a>
                        </li>
                        <li class="{{ Request::segment(2) == "roles"?"active":"" }}">
                            <a href="{{ url('/khalaadmin/roles') }}"><i class="fa fa-list"></i> Vai trò</a>
                        </li>
                    </ul>
                </li>
            @endif
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>