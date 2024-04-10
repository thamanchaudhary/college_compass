<aside>
    <div id="sidebar" class="nav-collapse ">
        <ul class="sidebar-menu" id="nav-accordion" style="font-weight:bold;">
            @if(Route::has('admin.index'))
            <li><a href="{{ URL::route('user.index') }}" class="{{ ($_panel == 'Dashboard') ? 'active' : '' }}"><i class="fa fa-dashboard"></i><span>{{__('Dashboard')}}</span></a></li>
            @endif
            <li><a href="{{ URL::route('user.index') }}" class="{{ ($_panel == 'Dashboard') ? 'active' : '' }}"><i class="fa fa-dashboard"></i><span>{{__('Profile')}}</span></a></li>
            <li><a href="{{ URL::route('user.index') }}" class="{{ ($_panel == 'Dashboard') ? 'active' : '' }}"><i class="fa fa-dashboard"></i><span>{{__('My Wish List')}}</span></a></li>
            <li><a href="{{ URL::route('user.index') }}" class="{{ ($_panel == 'Dashboard') ? 'active' : '' }}"><i class="fa fa-dashboard"></i><span>{{__('My Carrer')}}</span></a></li>
            <li><a href="{{ URL::route('user.index') }}" class="{{ ($_panel == 'Dashboard') ? 'active' : '' }}"><i class="fa fa-dashboard"></i><span>{{__('Recommanded College')}}</span></a></li>
        </ul>
    </div>
</aside>