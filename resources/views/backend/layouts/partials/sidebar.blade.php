@php
    $user = \Auth::guard('admin')->user();
@endphp
<div class="nk-apps-sidebar is-dark">
    <div class="nk-apps-brand">
        <a href="html/index.html" class="logo-link">
            <img class="logo-light logo-img" src="./images/logo-small.png" srcset="./images/logo-small2x.png 2x" alt="logo">
            <img class="logo-dark logo-img" src="./images/logo-dark-small.png" srcset="./images/logo-dark-small2x.png 2x" alt="logo-dark">
        </a>
    </div>
    <div class="nk-sidebar-element">
        <div class="nk-sidebar-body">
            <div class="nk-sidebar-content" data-simplebar>
                <div class="nk-sidebar-menu">
                    <!-- Menu -->
                    <ul class="nk-menu apps-menu">
                        {{-- {{ dd(\Request::route()->getName()) }} --}}
                        @foreach (menu() as $menuKey => $menu)
                            {{-- @can($menu['permission']) --}}
                            @php
                                $route_name = 'admin.'.$menu['route'];
                            @endphp
                                <li class="nk-menu-item @isset($route_name){{ \Request::route()->getName() === $route_name ? 'active current-page' : '' }}@endisset">
                                    <a href="{{route('admin.'.$menu['route'].'')}}" class="nk-menu-link" title="{{ $menu['title'] }}">
                                        <span class="nk-menu-icon"><em class="icon ni {{$menu['icon']}}"></em></span>
                                    </a>
                                </li>
                            {{-- @endcan --}}
                        @endforeach
                    </ul>
                </div>
                <div class="nk-sidebar-footer">
                    <ul class="nk-menu nk-menu-md">
                        <li class="nk-menu-item">
                            <a href="#" class="nk-menu-link" title="Settings">
                                <span class="nk-menu-icon"><em class="icon ni ni-setting"></em></span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="nk-sidebar-profile nk-sidebar-profile-fixed dropdown">
                <a href="#" data-toggle="dropdown" data-offset="50,-60">
                    <div class="user-avatar">
                        <span>AB</span>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-md ml-4">
                    <div class="dropdown-inner user-card-wrap d-none d-md-block">
                        <div class="user-card">
                            <div class="user-avatar">
                                <span>AB</span>
                            </div>
                            <div class="user-info">
                                <span class="lead-text">{{$user->name}}</span>
                                <span class="sub-text text-soft">{{$user->email}}</span>
                            </div>
                        </div>
                    </div>
                    <div class="dropdown-inner">
                        <ul class="link-list">
                            <li><a href="#"><em class="icon ni ni-user-alt"></em><span>View Profile</span></a></li>
                            <li><a href="#"><em class="icon ni ni-setting-alt"></em><span>Account Setting</span></a></li>
                            <li><a href="#"><em class="icon ni ni-activity-alt"></em><span>Login Activity</span></a></li>
                        </ul>
                    </div>
                    <div class="dropdown-inner">
                        <ul class="link-list">
                            <li><a href="{{ route('admin.logout.submit') }}"  onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();"><em class="icon ni ni-signout"></em><span>Sign out</span></a></li>
                            <form id="logout-form" action="{{ route('admin.logout.submit') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>