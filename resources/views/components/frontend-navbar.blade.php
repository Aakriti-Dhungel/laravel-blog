<nav class="bg-white flex justify-between items-center px-6 py-3 fixed top-0 left-0 right-0 z-50 shadow">
    <!-- Logo -->
    <a href="{{ url('/') }}">
        <img src="{{ asset('img/diginepal.png') }}"
            alt="DigiNepal" class="w-16">
    </a>

    <!-- Desktop Menu -->
    <ul class="hidden md:flex gap-8">
        <li><a href="{{ url('/') }}" class="hover:text-gray-500">Home</a></li>
        <li><a href="{{ url('/blog') }}" class="hover:text-gray-500">Blog</a></li>
        <li><a href="{{ url('/about') }}" class="hover:text-gray-500">About Us</a></li>
        <li><a href="{{ url('/contact') }}" class="hover:text-gray-500">Contact</a></li>
    </ul>

    <!-- Right Side -->
    <div class="flex items-center gap-4">
        @auth
        <!-- User Dropdown -->
        <div class="relative hidden md:block">
            <button onclick="toggleDropdown()" class="text-gray-700 font-medium focus:outline-none">
                {{ Auth::user()->name }} <i class="fa fa-caret-down ml-1"></i>
            </button>
            <div id="dropdown" class="absolute right-0 mt-2 w-48 bg-white border rounded shadow-md hidden">
                @if(Auth::user()->role === 'admin')
                <a href="{{ route('dashboard') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Dashboard</a>
                @endif
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                        class="w-full text-left px-4 py-2 text-gray-700 hover:bg-gray-100">Logout</button>
                </form>
            </div>
        </div>
        @else
        <a href="{{ route('login') }}" class="md:block bg-[#a6c1ee] text-white px-5 py-2 rounded-full hover:bg-[#87acec]">Login</a> <!-- hidden if want to hide in mobile -->
        <a href="{{ route('register') }}" class="md:block text-gray-600 hover:text-gray-800">Register</a>
        @endauth

        <!-- Mobile Hamburger -->
        <i id="menuBtn" class="fa-solid fa-bars text-2xl md:hidden cursor-pointer"></i>
    </div>
</nav>

<!-- Mobile Menu -->
<div id="mobileMenu" class="hidden bg-white px-6 py-4 md:hidden">
    <ul class="flex flex-col gap-4 items-center">
        <li><a href="{{ url('/') }}" class="hover:text-gray-500">Home</a></li>
        <li><a href="{{ url('/blog') }}" class="hover:text-gray-500">Blog</a></li>
        <li><a href="{{ url('/about') }}" class="hover:text-gray-500">About Us</a></li>
        <li><a href="{{ url('/contact') }}" class="hover:text-gray-500">Contact</a></li>

        @auth
        @if(Auth::user()->role === 'admin')
        <li><a href="{{ route('dashboard') }}" class="hover:text-gray-500">Dashboard</a></li>
        @endif
        <li>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="text-left hover:text-gray-500">Logout</button>
            </form>
        </li>
        {{-- Comment
         @else
            <li><a href="{{ route('login') }}" class="hidden hover:text-gray-500">Login</a></li>
        <li><a href="{{ route('register') }}" class="hidden hover:text-gray-500">Register</a></li>
        --}}
        @endauth
    </ul>
</div>

<script>
    // Mobile menu toggle
    const menuBtn = document.getElementById('menuBtn');
    const mobileMenu = document.getElementById('mobileMenu');

    menuBtn.addEventListener('click', () => {
        mobileMenu.classList.toggle('hidden');
        menuBtn.classList.toggle('fa-bars');
        menuBtn.classList.toggle('fa-xmark');
    });

    // User dropdown toggle
    function toggleDropdown() {
        const dropdown = document.getElementById('dropdown');
        dropdown.classList.toggle('hidden');
    }

    // Close dropdown if clicked outside
    document.addEventListener('click', function(event) {
        const dropdown = document.getElementById('dropdown');
        const button = event.target.closest('button');
        if (dropdown && !dropdown.contains(event.target) && (!button || !button.onclick)) {
            dropdown.classList.add('hidden');
        }
    });
</script>