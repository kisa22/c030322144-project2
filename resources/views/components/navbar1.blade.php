<!-- Header Start -->
<header id="navbar" class="fixed top-0 z-10 w-full bg-white shadow-md transparent">
    <div class="container flex items-center justify-between px-6 py-4 mx-auto">
        <div class="flex items-center">
            <img src="{{ asset('img/logo.png') }}" alt="Logo" class="w-20">
            <div class="ml-4">
                <input type="text" id="search" placeholder="Search for products" autocomplete="off" class="px-4 py-2 border rounded-md">
            </div>
        </div>
        <nav class="hidden space-x-10 lg:flex">
            <a href="/" class="text-gray-700 hover:text-pink-500">Go Back</a>
        </nav>
        <button id="hamburger" name="hamburger" type="button" class="block lg:hidden">
            <span class="transition duration-300 ease-in-out origin-top-left hamburger-line"></span>
            <span class="transition duration-300 ease-in-out hamburger-line"></span>
            <span class="transition duration-300 ease-in-out origin-bottom-left hamburger-line"></span>
        </button>
    </div>
</header>
<!-- Header End -->
