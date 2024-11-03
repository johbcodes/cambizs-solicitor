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
                <li class="nxl-item {{ Request::is('dashboard*') ? 'active' : '' }}">
                    <a href="{{ route('dashboard') }}" class="nxl-link">
                        <span class="nxl-micon"><i class="feather-airplay"></i></span>
                        <span class="nxl-mtext">Dashboard</span>
                    </a>
                </li>

                @hasrole('Admin')
                    <li class="nxl-item nxl-hasmenu">
                        <a href="{{ route('admin.users') }}" class="nxl-link">
                            <span class="nxl-micon"><i class="feather-users"></i></span>
                            <span class="nxl-mtext">Users</span>
                        </a>
                    </li>
                    <li class="nxl-item nxl-hasmenu {{ request()->is('admin/service-requests*') ? 'active' : '' }}">
                        <a href="{{ route('admin.service.requests.index') }}" class="nxl-link">
                            <span class="nxl-micon"><i class="feather-user-check"></i></span>
                            <span class="nxl-mtext">Service Requests</span>
                        </a>
                    </li>
                    <li class="nxl-item nxl-hasmenu">
                        <a href="{{ route('admin.settings') }}" class="nxl-link">
                            <span class="nxl-micon"><i class="feather-settings"></i></span>
                            <span class="nxl-mtext">Settings</span>
                        </a>
                    </li>
                @endhasrole

                @hasrole('Solicitor')
                    <li class="nxl-item nxl-hasmenu">
                        <a href="{{ route('solicitor.practice_areas.index') }}" class="nxl-link">
                            <span class="nxl-micon"><i class="feather-grid"></i></span>
                            <span class="nxl-mtext">Practice Areas</span>
                        </a>
                    </li>
                    <li class="nxl-item nxl-hasmenu">
                        <a href="{{ route('solicitor.service.requests.index') }}" class="nxl-link">
                            <span class="nxl-micon"><i class="feather-hash"></i></span>
                            <span class="nxl-mtext">Service Requests</span>
                        </a>
                    </li>
                    <li class="nxl-item nxl-hasmenu">
                        <a href="{{ route('solicitor.messages') }}" class="nxl-link">
                            <span class="nxl-micon"><i class="feather-message-circle"></i></span>
                            <span class="nxl-mtext">Messages</span>
                        </a>
                    </li>
                @endhasrole

                @hasrole('Client')
                    <li class="nxl-item nxl-hasmenu">
                        <a href="{{ route('client.service.requests.index') }}" class="nxl-link">
                            <span class="nxl-micon"><i class="feather-user-check"></i></span>
                            <span class="nxl-mtext">Service Requests</span>
                        </a>
                    </li>
                    <li class="nxl-item nxl-hasmenu">
                        <a href="{{ route('solicitor.messages') }}" class="nxl-link">
                            <span class="nxl-micon"><i class="feather-message-circle"></i></span>
                            <span class="nxl-mtext">Messages</span>
                        </a>
                    </li>
                @endhasrole

                <li class="nxl-item nxl-hasmenu">
                    <a href="{{ route('profile.edit') }}" class="nxl-link">
                        <span class="nxl-micon"><i class="feather-check-circle"></i></span>
                        <span class="nxl-mtext">Profile</span>
                    </a>
                </li>
                <li class="nxl-item nxl-hasmenu">
                    <a href="{{ route('help') }}" class="nxl-link">
                        <span class="nxl-micon"><i class="feather-help-circle"></i></span>
                        <span class="nxl-mtext">Help</span>
                    </a>
                </li>
            </ul>

        </div>
    </div>
</nav>
