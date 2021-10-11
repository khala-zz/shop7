<header class="main-header">
    <!-- Logo -->
    <a href="{{ url('/khalaadmin') }}" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>M</b>CRM</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>Quản Lý</b> Website</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">

                <!-- Messages: style can be found in dropdown.less-->
                @if(user_can("list_order"))
                    <li class="dropdown messages-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa  fa-opencart"></i>
                            <span class="label label-success">{{ count(getUnreadOrder()) }}</span>
                        </a>
                        
                        <ul class="dropdown-menu">
                            @if(count(getUnreadOrder()) == 0)
                                <li class="header">You have no messages</li>
                            @else
                                <li class="header">You have {{ count(getUnreadOrder()) }} messages</li>
                                <li>
                                    <!-- inner menu: contains the actual data -->
                                    <ul class="menu">

                                        @foreach(getUnreadOrder() as $message)
                                            <li><!-- start message -->
                                                <a href="{{ url('/admin/mailbox-show/' . $message->id) }}">
                                                    <div class="pull-left">
                                                        
                                                            <img src="{{ url('theme/dist/img/image_placeholder.png') }}" class="img-circle" alt="User Image">
                                                        
                                                    </div>
                                                    <h4>
                                                        {{ $message  -> name }}
                                                        <small><i class="fa fa-clock-o"></i> {{ Carbon\Carbon::parse($message->created_at)->diffForHumans() }}</small>
                                                    </h4>
                                                    <p>{{ $message->name }}</p>
                                                </a>
                                            </li>
                                        @endforeach
                                        <!-- end message -->
                                    </ul>
                                </li>
                                <li class="footer"><a href="{{ url('khalaadmin/orders') }}">Xem tất cả</a></li>
                            @endif
                        </ul>
                       
                    </li>
                @endif
                
                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        @if(\Auth::user()->image != null)
                            <img src="{{ url('uploads/users/' . \Auth::user()->image) }}" width="160" height="160" class="user-image" alt="User Image">
                        @else
                            <img src="{{ url('theme/dist/img/image_placeholder.png') }}" class="user-image" alt="User Image">
                        @endif

                        <span class="hidden-xs">{{ \Auth::user()->name }}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">

                            @if(\Auth::user()->image != null)
                                <img src="{{ url('uploads/users/' . \Auth::user()->image) }}" width="160" height="160" class="img-circle" alt="User Image">
                            @else
                                <img src="{{ url('theme/dist/img/image_placeholder.png') }}" class="img-circle" alt="User Image">
                            @endif

                            <p>
                                {{ \Auth::user()->name . (\Auth::user()->position_title!=''?' - ' . \Auth::user()->position_title:'') }}
                                @if(\Auth::user()->created_at != null) <small>Member since {{ \Auth::user()->created_at->diffForHumans() }}</small> @endif
                            </p>
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="{{ url('khalaadmin/my-profile') }}" class="btn btn-default btn-flat">Trang cá nhân</a>
                            </div>
                            <div class="pull-right">
                                <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn btn-default btn-flat">Đăng xuất</a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>