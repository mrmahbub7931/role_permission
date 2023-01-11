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
                        <li class="nk-menu-item">
                            <a href="{{route('admin.dashboard')}}" class="nk-menu-link" title="Dashboard">
                                <span class="nk-menu-icon"><em class="icon ni ni-dashboard"></em></span>
                            </a>
                        </li>
                        <li class="nk-menu-hr"></li>
                        <li class="nk-menu-item">
                            <a href="html/apps/mailbox.html" class="nk-menu-link" title="Mailbox">
                                <span class="nk-menu-icon"><em class="icon ni ni-inbox"></em></span>
                            </a>
                        </li>
                        <li class="nk-menu-item">
                            <a href="html/apps/messages.html" class="nk-menu-link" title="Messages">
                                <span class="nk-menu-icon"><em class="icon ni ni-chat"></em></span>
                            </a>
                        </li>
                        <li class="nk-menu-item">
                            <a href="html/apps/file-manager.html" class="nk-menu-link" title="File Manager">
                                <span class="nk-menu-icon"><em class="icon ni ni-folder"></em></span>
                            </a>
                        </li>
                        <li class="nk-menu-item">
                            <a href="html/apps/chats.html" class="nk-menu-link" title="Chats">
                                <span class="nk-menu-icon"><em class="icon ni ni-chat-circle"></em></span>
                            </a>
                        </li>
                        <li class="nk-menu-item">
                            <a href="html/apps/calendar.html" class="nk-menu-link" title="Calendar">
                                <span class="nk-menu-icon"><em class="icon ni ni-calendar"></em></span>
                            </a>
                        </li>
                        <li class="nk-menu-item">
                            <a href="html/apps/kanban.html" class="nk-menu-link">
                                <span class="nk-menu-icon"><em class="icon ni ni-template"></em></span>
                            </a>
                        </li>
                        <li class="nk-menu-hr"></li>
                        <li class="nk-menu-item">
                            <a href="html/components.html" class="nk-menu-link" title="Go to Components">
                                <span class="nk-menu-icon"><em class="icon ni ni-layers"></em></span>
                            </a>
                        </li>
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