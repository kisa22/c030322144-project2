<!-- Header Start -->
<header class="absolute top-0 left-0 z-10 flex items-center w-full bg-transparent">
  <div class="container">
    <div class="relative flex items-center justify-between">
      <div class="px-4 ">
        <a href="#home" class="left-0 block py-1">
          <img src="./img/logo.png" alt="" class="w-28">
        </a>
      </div>
      <div class="flex items-center px-4 ">
        <button id="hamburger" name="hamburger" type="button" class="absolute block right-4 lg:hidden">
          <span class="transition duration-300 ease-in-out origin-top-left hamburger-line"></span>
          <span class="transition duration-300 ease-in-out hamburger-line"></span>
          <span class="transition duration-300 ease-in-out origin-bottom-left hamburger-line"></span>
        </button>

        <nav id="nav-menu"
          class="absolute hidden py-5 bg-white rounded-lg shadow-lg max-w-[250px]  right-4 top-full lg:block lg:static lg:bg-transparent lg:max-w-full lg:shadow-none lg:rounded-none">
          <ul class="block lg:flex">
            <li class="group">
              <a href="#home" class="flex py-2 mx-8 text-base text-pink group-hover:text-orange-500 ">Home</a>
            </li>
            <li class="group">
              <a href="#about" class="flex py-2 mx-8 text-base text-pink group-hover:text-orange-500">About</a>
            </li>
            <li class="group">
              <a href="#product" class="flex py-2 mx-8 text-base text-pink group-hover:text-orange-500">Product</a>
            </li>
            <li class="group">
              <a href="#contact" class="flex py-2 mx-8 text-base text-pink group-hover:text-orange-500">Contact</a>
            </li>
          </ul>
        </nav>
      </div>
    </div>
  </div>
</header>
<!-- Header End -->