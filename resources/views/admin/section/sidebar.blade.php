<aside>
    <div id="sidebar" class="nav-collapse ">
        <ul class="sidebar-menu" id="nav-accordion" style="font-weight:bold;">
            @if(Route::has('admin.index'))
            <li><a href="{{ URL::route('admin.index') }}" class="{{ ($_panel == 'Dashboard') ? 'active' : '' }}"><span>{{__('Dashboard')}}</span></a></li>
            @endif
            @if(Route::has('admin.index'))
            <li><a href="{{ URL::route('admin.university.index') }}" class="{{ ($_panel == 'University') ? 'active' : '' }}"><span>{{__('University list')}}</span></a></li>
            @endif
            @if(Route::has('admin.index'))
            <li><a href="{{ URL::route('admin.college.index') }}" class="{{ ($_panel == 'College List') ? 'active' : '' }}"><span>{{__('Program List')}}</span></a></li>
            @endif
            @if(Route::has('admin.index'))
            <li><a href="{{ URL::route('admin.college.index') }}" class="{{ ($_panel == 'College') ? 'active' : '' }}"><span>{{__('College List')}}</span></a></li>
            @endif
        </ul>
    </div>
</aside>