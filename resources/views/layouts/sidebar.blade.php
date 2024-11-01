<nav class="nxl-navigation">
    <div class="navbar-wrapper">
        <div class="m-header">
            <a href="/" class="b-brand">
                <!-- ========   change your logo hear   ============ -->
                <img src="{{ asset('user/img/cambiz-word.png') }}" style="height: 30px" alt=""
                    class="logo logo-lg" />
                <img src="{{ asset('user/img/cambiz-icon.png') }}" alt="" class="logo logo-sm" />
            </a>
        </div>
        <div class="navbar-content">
            <ul class="nxl-navbar">
                <li class="nxl-item nxl-caption">
                    <label>General</label>
                </li>
                @hasrole('Admin')
                    <li class="nxl-item">
                        <a href="javascript:void(0);" class="nxl-link">
                            <span class="nxl-micon"><i class="feather-airplay"></i></span>
                            <span class="nxl-mtext">Dashboard</span></span>
                        </a>

                    </li>
                    <li class="nxl-item nxl-hasmenu">
                        <a href="javascript:void(0);" class="nxl-link ">
                            <span class="nxl-micon"><i class="feather-users"></i></span>
                            <span class="nxl-mtext">Users</span>
                        </a>
                    </li>
                    <li class="nxl-item nxl-hasmenu {{ request()->is('service-requests*') ? 'active' : '' }}">
                        <a href="javascript:void(0);" class="nxl-link">
                            <span class="nxl-micon"><i class="feather-user-check"></i></span>
                            <span class="nxl-mtext">Service Requests</span>
                        </a>
                    </li>
                    <li class="nxl-item nxl-hasmenu">
                        <a href="javascript:void(0);" class="nxl-link">
                            <span class="nxl-micon"><i class="feather-check-circle"></i></span>
                            <span class="nxl-mtext">Profile</span>
                        </a>
                    </li>
                    <li class="nxl-item nxl-hasmenu">
                        <a href="javascript:void(0);" class="nxl-link">
                            <span class="nxl-micon"><i class="feather-settings"></i></span>
                            <span class="nxl-mtext">Settings</span><span class="nxl-arrow"><i
                                    class="feather-chevron-right"></i></span>
                        </a>
                        <ul class="nxl-submenu">
                            <li class="nxl-item"><a class="nxl-link" href="/">Users</a></li>
                            <li class="nxl-item"><a class="nxl-link" href="/">Roles & Permissions</a></li>
                        </ul>
                    </li>
                @endhasrole

                @hasrole('Solicitor')
                    <li class="nxl-item">
                        <a href="javascript:void(0);" class="nxl-link">
                            <span class="nxl-micon"><i class="feather-airplay"></i></span>
                            <span class="nxl-mtext">Dashboard</span></span>
                        </a>

                    </li>
                    <li class="nxl-item nxl-hasmenu">
                        <a href="javascript:void(0);" class="nxl-link">
                            <span class="nxl-micon"><i class="feather-grid"></i></span>
                            <span class="nxl-mtext">Practice Areas</span>
                        </a>
                    </li>
                    <li class="nxl-item nxl-hasmenu">
                        <a href="javascript:void(0);" class="nxl-link">
                            <span class="nxl-micon"><i class="feather-hash"></i></span>
                            <span class="nxl-mtext">Service Requests</span>
                        </a>
                    </li>
                    <li class="nxl-item nxl-hasmenu">
                        <a href="javascript:void(0);" class="nxl-link">
                            <span class="nxl-micon"><i class="feather-message-circle"></i></span>
                            <span class="nxl-mtext">Messages</span>
                        </a>
                    </li>
                    <li class="nxl-item nxl-hasmenu">
                        <a href="javascript:void(0);" class="nxl-link">
                            <span class="nxl-micon"><i class="feather-check-circle"></i></span>
                            <span class="nxl-mtext">Profile</span>
                        </a>
                    </li>
                    <li class="nxl-item nxl-hasmenu">
                        <a href="javascript:void(0);" class="nxl-link">
                            <span class="nxl-micon"><i class="feather-help-circle"></i></span>
                            <span class="nxl-mtext">Help</span>
                        </a>
                    </li>
                @endhasrole
                @hasrole('Client')
                    <li class="nxl-item">
                        <a href="javascript:void(0);" class="nxl-link">
                            <span class="nxl-micon"><i class="feather-airplay"></i></span>
                            <span class="nxl-mtext">Dashboard</span></span>
                        </a>

                    </li>
                    <li class="nxl-item nxl-hasmenu">
                        <a href="javascript:void(0);" class="nxl-link">
                            <span class="nxl-micon"><i class="feather-user-check"></i></span>
                            <span class="nxl-mtext">Service Requests</span>
                        </a>
                    </li>
                    <li class="nxl-item nxl-hasmenu">
                        <a href="javascript:void(0);" class="nxl-link">
                            <span class="nxl-micon"><i class="feather-message-circle"></i></span>
                            <span class="nxl-mtext">Messages</span>
                        </a>
                    </li>
                    <li class="nxl-item nxl-hasmenu">
                        <a href="javascript:void(0);" class="nxl-link">
                            <span class="nxl-micon"><i class="feather-check-circle"></i></span>
                            <span class="nxl-mtext">Profile</span>
                        </a>
                    </li>
                    <li class="nxl-item nxl-hasmenu">
                        <a href="javascript:void(0);" class="nxl-link">
                            <span class="nxl-micon"><i class="feather-help-circle"></i></span>
                            <span class="nxl-mtext">Help</span>
                        </a>
                    </li>
                @endhasrole
            </ul>
        </div>
    </div>
</nav>
