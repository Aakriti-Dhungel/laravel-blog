<!-- resources/views/components/frontend-navbar.blade.php -->
<!-- Very little is needed to make a happy life. - Marcus Aurelius -->
<nav class="flex items-center justify-between w-full h-[80px] bg-blue-700 px-4 md:px-8 shadow-lg sticky top-0 z-50">
    <!-- Logo -->
    <div class="flex items-center">
        <a href="#"><img src="{{ asset('images/digi_nepal.png') }}" alt="DigiNepal Blog" class="h-8"></a>
    </div>

    <!-- Hamburger Menu for Mobile -->
    <button id="menu-toggle" class="md:hidden text-white z-50" aria-label="Toggle navigation" aria-expanded="false">
        <i id="hamburger-icon" class="fa fa-bars fa-2x"></i>
        <i id="close-icon" class="fa fa-times fa-2x hidden"></i>
    </button>

    <!-- Navigation Links -->
    <div id="menu" class="hidden md:flex absolute md:static top-[80px] left-0 w-full md:w-auto bg-blue-700">
        <ul class="flex flex-col md:flex-row gap-3 p-4 md:p-0">
            <li>
                <a href="#" class="block text-white hover:bg-blue-600 px-4 py-2 rounded-lg">Home</a>
            </li>
            <li>
                <a href="#" class="block text-white hover:bg-blue-600 px-4 py-2 rounded-lg">Blog</a>
            </li>
            <li class="relative group">
                <a href="#" class="block text-white hover:bg-blue-600 px-4 py-2 rounded-lg flex items-center">
                    Categories
                    <i class="fa fa-chevron-down fa-sm ml-1"></i>
                </a>
                <ul class="flex flex-col md:absolute md:bg-blue-700 md:hidden md:group-hover:flex md:w-48">
                    <li>
                        <a href="#" class="block text-white hover:bg-blue-600 px-4 py-2">Tech</a>
                    </li>
                    <li>
                        <a href="#" class="block text-white hover:bg-blue-600 px-4 py-2">Lifestyle</a>
                    </li>
                    <li>
                        <a href="#" class="block text-white hover:bg-blue-600 px-4 py-2">Travel</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#" class="block text-white hover:bg-blue-600 px-4 py-2 rounded-lg">About</a>
            </li>
            <li>
                <a href="#" class="block text-white hover:bg-blue-600 px-4 py-2 rounded-lg">Contact</a>
            </li>
            <li>
                <button id="search-toggle" class="block text-white hover:bg-blue-600 px-4 py-2 rounded-lg" aria-label="Open search">
                    <i class="fa fa-search fa-lg"></i>
                </button>
            </li>
        </ul>
    </div>
</nav>

<!-- Search Modal -->
<div id="search-modal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
    <div class="bg-white rounded-lg p-4 w-full max-w-md mx-4">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-lg font-bold">Search Blog</h2>
            <button id="close-search" class="text-gray-600" aria-label="Close search">
                <i class="fa fa-times fa-lg"></i>
            </button>
        </div>
        <form action="#" method="GET">
            <input type="text" name="query" class="w-full p-2 border rounded-lg" placeholder="Search posts..." aria-label="Search query">
            <button type="submit" class="mt-4 bg-blue-500 text-white px-4 py-2 rounded-lg">Search</button>
        </form>
    </div>
</div>

<script>
    const menuToggle = document.getElementById('menu-toggle');
    const menu = document.getElementById('menu');
    const hamburgerIcon = document.getElementById('hamburger-icon');
    const closeIcon = document.getElementById('close-icon');
    const menuLinks = document.querySelectorAll('#menu a');
    const searchToggle = document.getElementById('search-toggle');
    const searchModal = document.getElementById('search-modal');
    const closeSearch = document.getElementById('close-search');

    const closeMenu = () => {
        menu.classList.add('hidden');
        hamburgerIcon.classList.remove('hidden');
        closeIcon.classList.add('hidden');
        menuToggle.setAttribute('aria-expanded', 'false');
    };

    menuToggle.addEventListener('click', () => {
        menu.classList.toggle('hidden');
        hamburgerIcon.classList.toggle('hidden');
        closeIcon.classList.toggle('hidden');
        menuToggle.setAttribute('aria-expanded', menu.classList.contains('hidden') ? 'false' : 'true');
    });

    menuLinks.forEach(link => {
        link.addEventListener('click', closeMenu);
    });

    searchToggle.addEventListener('click', () => {
        searchModal.classList.toggle('hidden');
        closeMenu();
    });

    closeSearch.addEventListener('click', () => {
        searchModal.classList.add('hidden');
    });

    searchModal.addEventListener('click', (e) => {
        if (e.target === searchModal) {
            searchModal.classList.add('hidden');
        }
    });
</script>