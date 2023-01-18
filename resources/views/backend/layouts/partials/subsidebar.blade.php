<div class="nk-sidebar" data-content="sidebarMenu">
    <div class="nk-sidebar-inner" data-simplebar>
        <ul class="nk-menu nk-menu-md">
            @foreach (menu() as $menuKey => $menu)
               
                    @foreach ($menu['sub_menu'] as $submenuKey => $submenu)
                    @php
                        $route_name = 'admin.'.$submenu['route'];
                        // dd($route_name);
                    @endphp
                    {{-- {{ dd($submenu['sub_item']) }} --}}
                    {{-- @if ($route_name === \Request::route()->getName()) --}}
                        <li class="nk-menu-item @isset($route_name) {{ $route_name === \Request::route()->getName() ? 'has-sub active' : '' }}@endisset">
                            <a href="#" class="nk-menu-link nk-menu-toggle">
                                <span class="nk-menu-icon"><em class="ni ni-{{$submenu['icon']}}"></em></span>
                                <span class="nk-menu-text">{{$submenu['title']}}</span>
                            </a>
                            @if (isset($submenu['sub_item']))
                                <ul class="nk-menu-sub">
                                    @foreach ($submenu['sub_item'] as $subitemKey => $sub_item)    
                                        <li class="nk-menu-item @isset($route_name){{ (\Request::route()->getName() == 'admin.'.$menu['route']) ? 'active' : '' }}@endisset">
                                            <a href="{{route('admin.'.$sub_item['route'])}}" class="nk-menu-link"><span class="nk-menu-text">{{$sub_item['title']}}</span></a>
                                        </li>
                                    @endforeach
                                </ul><!-- .nk-menu-sub -->
                            @endif
                        </li><!-- .nk-menu-item -->
                        {{-- @endif --}}
                    @endforeach
            @endforeach
        </ul><!-- .nk-menu -->
    </div>
</div>