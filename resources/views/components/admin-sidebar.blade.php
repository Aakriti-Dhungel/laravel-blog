<div class="main-sidebar sidebar-style-2 hidden sm:block">
    <aside id="sidebar-wrapper">
        <ul class="sidebar-menu">

            <!-- Dashboard -->
            <li class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }} 
                       px-10 py-3 w-full hover:bg-blue-800 text-white font-bold">
                <a href="{{ route('admin.dashboard') }}" class="nav-link flex items-center gap-2">
                    <i class="fa fa-home"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <!-- Posts -->
            <li class="{{ request()->routeIs('admin.posts.*') ? 'active' : '' }} 
                       px-10 py-3 w-full hover:bg-blue-800 text-white font-bold">
                <a href="{{ route('admin.posts.index') }}" class="nav-link flex items-center gap-2">
                    <i class="fa fa-clipboard"></i>
                    <span>Posts</span>
                </a>
            </li>
            <!-- Category -->
            <li class="{{ request()->routeIs('admin.categories.*') ? 'active' : '' }} 
                       px-10 py-3 w-full hover:bg-blue-800 text-white font-bold">
                <a href="{{ route('admin.categories.index') }}" class="nav-link flex items-center gap-2">
                    <i class="fa fa-clipboard"></i>
                    <span>Category</span>
                </a>
            </li>

            <!-- Profile -->
            @if(Route::has('admin.profile.edit'))
            <li class="{{ request()->routeIs('admin.profile.*') ? 'active' : '' }} 
                       px-10 py-3 w-full hover:bg-blue-800 text-white font-bold">
                <a href="{{ route('admin.profile.edit') }}" class="nav-link flex items-center gap-2">
                    <i class="fa fa-user"></i>
                    <span>Profile</span>
                </a>
            </li>
            @endif

            <!-- Logout -->
            <li class="px-10 py-3 w-full hover:bg-blue-800 text-white font-bold">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="nav-link flex items-center gap-2 w-full text-left">
                        <i class="fa fa-sign-out"></i>
                        <span>Logout</span>
                    </button>
                </form>
            </li>
        </ul>
    </aside>
</div>
