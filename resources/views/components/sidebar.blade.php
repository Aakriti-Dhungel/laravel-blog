<!-- Sidebar for Larger Screens -->
<div class="main-sidebar sidebar-style-2 hidden sm:block">
    <aside id="sidebar-wrapper">
        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <!-- Dashboard -->
            <li class="{{ request()->routeIs('dashboard') ? 'active' : '' }} px-10 py-3 w-full hover:bg-blue-800 text-white font-bold">
                <a href="{{ route('dashboard') }}" class="nav-link ">
                    <i class="fa fa-home" aria-hidden="true"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <!-- Posts -->
            <li class="{{ request()->routeIs('post.*') ? 'active' : '' }} px-10 py-3 w-full  hover:bg-blue-800 text-white font-bold">
                <a href="{{ route('posts.index') }}" class="nav-link">
                    <i class="fa fa-clipboard" aria-hidden="true"></i>
                    <span>Posts</span>
                </a>
            </li>
        </ul>
    </aside>

</div>