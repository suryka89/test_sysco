<nav class="sidebar sidebar-offcanvas" id="sidebar">
      <ul class="nav">
        <li class="nav-item">
          <a class="nav-link" href="{{ asset('/') }}">
            <i class="mdi mdi-view-quilt menu-icon"></i>
            <span class="menu-title">{{__('Dashboard')}}</span>
          </a>
        </li>
        @foreach($laravelAdminMenus->menus as $section)
              @if($section->items)
                <li class="nav-item sidebar-category"><p >{{ $section->section }}</p></li>
                @foreach($section->items as $menu)
                    <li class="nav-item">
                      <a class="nav-link"  href="{{ url($menu->url) }}" aria-expanded="false" aria-controls="ui-basic">
                      <i class="{{$menu->ico}} menu-icon"></i>
                        <span class="menu-title">{{ __($menu->title) }}</span>
                        <i class="icon-layers menu-icon"></i>
                      </a>
                    </li>
                @endforeach
              @endif
          @endforeach
      </ul>
    </nav>