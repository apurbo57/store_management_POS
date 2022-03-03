<header class="top-header">
    <nav class="navbar navbar-expand">
        <div class="left-topbar d-flex align-items-center">
            <a href="javascript:;" class="toggle-btn">	<i class="bx bx-menu"></i>
            </a>
        </div>
        <div class="flex-grow-1 search-bar">
            <h4>Ma Electronics</h4>
        </div>
        <div class="right-topbar ml-auto">
            <ul class="navbar-nav">
                <li class="nav-item search-btn-mobile">
                    <a class="nav-link position-relative" href="javascript:;">	<i class="bx bx-search vertical-align-middle"></i>
                    </a>
                </li>
                <li class="nav-item dropdown dropdown-lg">
                    <a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative" href="javascript:;" data-toggle="dropdown">	<span class="msg-count">6</span>
                        <i class="bx bx-comment-detail vertical-align-middle"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a href="javascript:;">
                            <div class="msg-header">
                                <h6 class="msg-header-title">6 New</h6>
                                <p class="msg-header-subtitle">Application Messages</p>
                            </div>
                        </a>
                        <div class="header-message-list">
                            <a class="dropdown-item" href="javascript:;">
                                <div class="media align-items-center">
                                    <div class="user-online">
                                        <img src="{{ asset('backend/assets/images/avatars/avatar-1.png') }}" class="msg-avatar" alt="user avatar">
                                    </div>
                                    <div class="media-body">
                                        <h6 class="msg-name">Daisy Anderson <span class="msg-time float-right">5 sec
                                            ago</span></h6>
                                        <p class="msg-info">The standard chunk of lorem</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <a href="javascript:;">
                            <div class="text-center msg-footer">View All Messages</div>
                        </a>
                    </div>
                </li>
                <li class="nav-item dropdown dropdown-lg">
                    <a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative" href="javascript:;" data-toggle="dropdown">	<i class="bx bx-bell vertical-align-middle"></i>
                        <span class="msg-count">8</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a href="javascript:;">
                            <div class="msg-header">
                                <h6 class="msg-header-title">8 New</h6>
                                <p class="msg-header-subtitle">Application Notifications</p>
                            </div>
                        </a>
                        <div class="header-notifications-list">
                            <a class="dropdown-item" href="javascript:;">
                                <div class="media align-items-center">
                                    <div class="notify bg-light-primary text-primary"><i class="bx bx-group"></i>
                                    </div>
                                    <div class="media-body">
                                        <h6 class="msg-name">New Customers<span class="msg-time float-right">14 Sec
                                            ago</span></h6>
                                        <p class="msg-info">5 new user registered</p>
                                    </div>
                                </div>
                            </a>
                            <a class="dropdown-item" href="javascript:;">
                                <div class="media align-items-center">
                                    <div class="notify bg-light-danger text-danger"><i class="bx bx-cart-alt"></i>
                                    </div>
                                    <div class="media-body">
                                        <h6 class="msg-name">New Orders <span class="msg-time float-right">2 min
                                            ago</span></h6>
                                        <p class="msg-info">You have recived new orders</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <a href="javascript:;">
                            <div class="text-center msg-footer">View All Notifications</div>
                        </a>
                    </div>
                </li>
                <li class="nav-item dropdown dropdown-user-profile">
                    <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="javascript:;" data-toggle="dropdown">
                        <div class="media user-box align-items-center">
                            <div class="media-body user-info">
                                <p class="user-name mb-0">{{ auth()->user()->name }}</p>
                                <p class="designattion mb-0">{{ auth()->user()->email }}</p>
                            </div>
                            <img src="{{ asset('backend/assets/images/avatars/avatar-1.png') }}" class="user-img" alt="user avatar">
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">	<a class="dropdown-item" href="javascript:;"><i class="bx bx-user"></i><span>Profile</span></a>
                        <form action="{{ route('staff.logout') }}" method="post">
                            @csrf
                            <div class="dropdown-divider mb-0"></div>	<button class="dropdown-item" type="submit"><i class="bx bx-power-off"></i><span>Logout</span></button>
                        </form>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</header>