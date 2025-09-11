<div class="main-sidebar sidebar-style-2 hidden sm:block">
    <aside id="sidebar-wrapper">
        <ul class="sidebar-menu">

            <!-- Dashboard -->
            @if(Auth::user()->role === 'admin')
            <li class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }} px-10 py-3 w-full hover:bg-blue-800 text-white font-bold">
                <a href="{{ route('admin.dashboard') }}" class="nav-link">
                    <i class="fa fa-home"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            @else
            <li class="{{ request()->routeIs('user.dashboard') ? 'active' : '' }} px-10 py-3 w-full hover:bg-blue-800 text-white font-bold">
                <a href="{{ route('user.dashboard') }}" class="nav-link">
                    <i class="fa fa-home"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            @endif

            <!-- Posts -->
            @if(Auth::user()->role === 'admin')
            <li class="{{ request()->routeIs('admin.posts.*') ? 'active' : '' }} px-10 py-3 w-full hover:bg-blue-800 text-white font-bold">
                <a href="{{ route('admin.posts.index') }}" class="nav-link">
                    <i class="fa fa-clipboard"></i>
                    <span>Posts</span>
                </a>
            </li>
            @else
            <li class="{{ request()->routeIs('user.posts.*') ? 'active' : '' }} px-10 py-3 w-full hover:bg-blue-800 text-white font-bold">
                <a href="{{ route('user.posts.index') }}" class="nav-link">
                    <i class="fa fa-clipboard"></i>
                    <span>Posts</span>
                </a>
            </li>
            @endif

            <!-- Profile -->
            @if(Auth::user()->role === 'admin')
            @if(Route::has('admin.profile.edit'))
            <li class="{{ request()->routeIs('admin.profile.*') ? 'active' : '' }} px-10 py-3 w-full hover:bg-blue-800 text-white font-bold">
                <a href="{{ route('admin.profile.edit') }}" class="nav-link">
                    <i class="fa fa-user"></i>
                    <span>Profile</span>
                </a>
            </li>
            @endif
            @else
            @if(Route::has('user.profile.edit'))
            <li class="{{ request()->routeIs('user.profile.*') ? 'active' : '' }} px-10 py-3 w-full hover:bg-blue-800 text-white font-bold">
                <a href="{{ route('user.profile.edit') }}" class="nav-link">
                    <i class="fa fa-user"></i>
                    <span>Profile</span>
                </a>
            </li>
            @endif
            @endif

        </ul>
    </aside>
</div>
