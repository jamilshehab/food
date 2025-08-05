@extends('main')
@section('content')
    <!-- Loader Start -->
    <div id="preloader">
        <div id="status">
            <div class="spinner">
                <div class="double-bounce1"></div>
                <div class="double-bounce2"></div>
            </div>
        </div>
    </div>
    <!-- Loader End -->
    <!-- Start Navbar -->
      <nav id="topnav" class="defaultscroll is-sticky">
        <div class="container relative">
            <a class="logo" href="#home">
                <span class="inline-block dark:hidden">
                    <img src="{{ asset('storage/' . $logo->image) }}" class="l-dark" alt="">
                </span>
            </a>

            <a class="logo" href="#home">
                 <span class="inline-block dark:hidden">
                 <img src="{{ asset('storage/' . $logo->image) }}" class="l-light" alt="Logo Light">       
                </span>

                <!-- End Logo container-->

                <!-- Start Mobile Toggle -->
                <div class="menu-extras">
                    <div class="menu-item">
                        <a class="navbar-toggle" id="isToggle" onclick="toggleMenu()">
                            <div class="lines">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </a>
                    </div>
                </div>
                <!-- End Mobile Toggle -->

                <!--Login button Start-->

                <!--Login button End-->

                <div id="navigation">
                    <!-- Navigation Menu-->
                    <ul class="navigation-menu nav-light justify-end">
                        {{-- @foreach ($navigation as $nav)
                            <li class="menu-item">
                                <a href="#{{$nav->url}}">{{$nav->title}}</a>
                            </li>

                        @endforeach --}}
                        <li class="menu-item">
                                <a href="/checkout">Checkout</a>
                            </li>
                       @can('is-admin')
                        <li class="menu-item">
                            <a href="/dashboard">Dashboard</a>
                        </li>
                       @endcan
              @can('is-client')
                    <div class="sm:flex sm:items-center sm:ms-6">
                     <x-dropdown align="right" width="48">
                      <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                            <div>{{ Auth::user()->first_name  . ' ' . Auth::user()->last_name}}</div>

                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
   <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
                       </div>
                      @endcan
                    </ul>
                </div>
        </div>
    </nav>  


    <section class="swiper-slider-hero relative block h-screen restaurant-section" id="home">
        <div class="swiper-container absolute end-0 top-0 w-full h-full">
            <div class="swiper-wrapper">
                @foreach ($sliders as $slider)
                    <div class="swiper-slide flex items-center overflow-hidden">
                        <div class="slide-inner absolute end-0 top-0 w-full h-full slide-bg-image flex items-center bg-center bg-no-repeat"
                            style="background-image: url('{{ asset('storage/' . $slider->slider_image) }}')">
                            >
                            <div class="absolute inset-0 bg-slate-900/60"></div>
                            <div class="container relative">
                                <div class="grid grid-cols-1">
                                    <h1
                                        class="font-semibold lg:leading-normal leading-normal text-4xl lg:text-6xl text-white mb-5">
                                        {{ $slider->slider_title }}
                                    </h1>
                                    <p class="text-white/70 text-lg max-w-xl">{{$slider->slider_content }}</p>
                                    <div class="mt-8">
                                        <a href="{{ $slider->anchor_link }}"
                                            class="py-2 px-5 inline-block tracking-wide align-middle duration-500 text-base text-center text-amber-500 hover:text-white bg-transparent hover:bg-amber-500 border border-amber-500">
                                            {{ $slider->anchor_text }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="swiper-pagination"></div>
            <div
                class="swiper-button-next bg-transparent size-[35px] leading-[35px] -mt-[30px] bg-none border border-solid border-white/50 text-white hover:bg-amber-500 hover:border-amber-500 rounded-full text-center">
            </div>
            <div
                class="swiper-button-prev bg-transparent size-[35px] leading-[35px] -mt-[30px] bg-none border border-solid border-white/50 text-white hover:bg-amber-500 hover:border-amber-500 rounded-full text-center">
            </div>
        </div><!--end container-->
    </section>
    <!--end section-->
    <!-- End Hero -->

    <section class="restaurant-section relative md:py-24 py-16" id="about">
       @if ($about)
        <div class="container relative">
            <div class="grid md:grid-cols-12 grid-cols-1 gap-6  ">
                <div class="lg:col-span-6 md:col-span-12 lg:order-2" data-aos="fade-down">
                    <div class="text-left">
                        <!-- <h6 class="uppercase font-semibold">About Us</h6> -->

                        <h6 class="uppercase text-3xl font-semibold">{{$about->title}}</h6>
                        <p class="text-slate-400 mt-3 text-wrap">{{$about->content}}</p>
                    </div>
                </div>
                <div class="lg:col-span-6 md:col-span-6 lg:order-3" data-aos="fade-down">
                    <img src="{{ asset('storage/' . $about->images) }}" class="rounded shadow dark:shadow-gray-800" alt="">
                </div>
            </div>
        </div>  
       @else
       <div class="  ">  </div>
      @endif
    </section>



    <section class="restaurant-section relative py-36 bg-no-repeat bg-fixed bg-top bg-cover" data-aos="fade-down"
        style="background-image: url('{{ asset('assets/images/bg/pages.jpg') }}')" id="menu">
        <div class="absolute inset-0 bg-gradient-to-b from-transparent via-slate-900/50 to-slate-900"></div>
        <div class="absolute bottom-0 start-0 end-0 text-center px-3">
            <h4 class="md:text-3xl text-2xl md:leading-normal leading-normal font-semibold text-white mb-6">
                Our Menus
            </h4>
        </div>
    </section>

    <!-- Start -->
    <section class="restaurant-section relative md:py-24 py-16">
        <div class="container relative">

            <div class="grid md:grid-cols-2 gap-6">

                @foreach ($menus as $menu)
                    <div class="flex items-center" key="{{ $menu->id }}" data-aos="fade-down">
                        <img src="{{ $menu->image }}"
                            class="rounded-full size-16 mx-auto group-hover:animate-[spin_10s_linear_infinite]" alt="">
                         
                        <div class="ms-3 w-full">
                            <div class="flex justify-between items-center pb-2 border-b border-gray-100 dark:border-gray-800">
                                <button class="text-left hover:text-amber-500 transition-colors">
                                    {{ $menu->title }}
                                </button>
                                <h5 class="text-amber-500 font-medium">
                                    {{ $menu->price }} $
                                </h5>
                            </div>

                            <p class="text-slate-400 mt-2">
                                {{ $menu->description }}
                            </p>
                            <p class="text-slate-400 mt-2">
                                Ingredients: {{ $menu->ingredients }}
                            </p>
                            <button onclick="addToCart({{$menu->id}})" class="bg-black rounded-[12px] mt-5 text-white px-5 py-2">
                                Add To Cart
                            </button>
                        </div>
                    </div>
                @endforeach

            </div>



        </div>
    </section>


    <!-- Optional: add this in <head> for x-cloak support -->
    

    <!--end section-->
    <!-- End -->

    <!-- Footer Start -->
    <section x-data="cartComponent()" x-init="fetchCart()">
    {{-- <footer class="relative bg-slate-950 dark:bg-slate-950/20 text-gray-200">
        <div class="container relative">
            <div class="grid grid-cols-12">
                <div class="col-span-12">
                    <div class="py-[60px] px-0">
                        <div class="grid lg:grid-cols-3 md:grid-cols-2 justify-center gap-6">
                            <div class="text-center">
                                <h5 class="tracking-[1px] text-gray-100 font-medium text-lg mb-4">Open Hours</h5>
                                <p class="mb-2 text-gray-200/80">{{$footer->open_hours_weekdays }}</p>
                                <p class="mb-0 text-gray-200/80">{{$footer->open_hours_weekends }}</p>
                            </div>

                            <div class="text-center">
                                <h5 class="tracking-[1px] text-gray-100 font-medium text-lg mb-4">Reservation</h5>
                                <p class="mb-2"><a href="{{$footer->phone_number }}" class="text-gray-200/80">
                                        {{$footer->phone_number }}</a></p>
                                <p class="mb-0"><a href="mailto:{{$footer->email_input}}"
                                        class="text-gray-200/80">{{$footer->email_input}}</a></p>
                            </div>

                            <div class="text-center">
                                <h5 class="tracking-[1px] text-gray-100 font-medium text-lg mb-4">Address</h5>
                                <p class="mb-0 text-gray-200/80">{{$footer->address_line_1 }}, <br>
                                    {{$footer->address_line_2 }}</p>
                            </div>
                        </div><!--end grid-->


                        <div class="grid grid-cols-1 mt-12">
                            <div class="text-center">
                                <img src="assets/images/white-icon.png" class="block mx-auto" alt="">
                                <p class="max-w-xl mx-auto mt-6">
                                    {{ $footer->footer_description }}
                                </p>
                            </div>

                            <ul class="list-none text-center mt-6">

                                <li class="inline"><a href="#" target="_blank"
                                        class="size-8 inline-flex items-center justify-center tracking-wide align-middle text-base border border-gray-800 hover:border-amber-500 rounded-md hover:bg-amber-500"><i
                                            data-feather="linkedin" class="size-4 align-middle" title="Linkedin"></i></a>
                                </li>
                                <li class="inline"><a href="#" target="_blank"
                                        class="size-8 inline-flex items-center justify-center tracking-wide align-middle text-base border border-gray-800 hover:border-amber-500 rounded-md hover:bg-amber-500"><i
                                            data-feather="facebook" class="size-4 align-middle" title="facebook"></i></a>
                                </li>
                                <li class="inline"><a href="#" target="_blank"
                                        class="size-8 inline-flex items-center justify-center tracking-wide align-middle text-base border border-gray-800 hover:border-amber-500 rounded-md hover:bg-amber-500"><i
                                            data-feather="instagram" class="size-4 align-middle" title="instagram"></i></a>
                                </li>
                                <li class="inline"><a href="#" target="_blank"
                                        class="size-8 inline-flex items-center justify-center tracking-wide align-middle text-base border border-gray-800 hover:border-amber-500 rounded-md hover:bg-amber-500"><i
                                            data-feather="twitter" class="size-4 align-middle" title="twitter"></i></a>
                                </li>
                                <li class="inline"><a href="#"
                                        class="size-8 inline-flex items-center justify-center tracking-wide align-middle text-base border border-gray-800 hover:border-amber-500 rounded-md hover:bg-amber-500"><i
                                            data-feather="mail" class="size-4 align-middle" title="email"></i></a></li>
                            </ul><!--end icon-->
                        </div><!--end grid-->
                    </div>
                </div>
            </div><!--end grid-->
        </div><!--end container-->

        <div class="py-[30px] px-0 border-t border-slate-800">
            <div class="container relative text-center">
                <div class="grid md:grid-cols-1">
                    <p class="mb-0">©
                        <script>document.write(new Date().getFullYear())</script> Veganfry. Design with <i
                            class="mdi mdi-heart text-red-600"></i> by <a href="#" target="_blank" class="text-reset">Jamil
                            Shehab</a>.
                    </p>
                </div><!--end grid-->
            </div><!--end container-->
        </div>
    </footer><!--end footer--> --}}
    <!-- Footer End -->
    <!-- Switcher -->



    <!-- Add this style to hide elements with x-cloak before Alpine loads -->
    <div >
        <button @click="openCart()" class="fixed bottom-16 right-4 z-40 rounded-full bg-black p-4 text-white"
            aria-label="Open cart">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke="currentColor" fill="none" stroke-width="1.5"
                class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
            </svg>
            <span x-show="itemCount > 0" x-text="itemCount"
                class="absolute -top-2 -right-2 bg-red-500 text-white text-xs rounded-full h-5 w-5 flex items-center justify-center"></span>
        </button>

        <div x-show="sidebarIsOpen" @click.away="sidebarIsOpen = false" @keydown.escape.window="sidebarIsOpen = false"
            x-cloak class="fixed inset-0 z-[999] bg-[#0000002b] bg-opacity-50 transition-opacity"
            x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200"
            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">

            <div class="fixed right-0 top-0 h-full w-80 md:w-96 bg-white shadow-xl flex flex-col"
                x-transition:enter="transform transition ease-in-out duration-500"
                x-transition:enter-start="translate-x-full" x-transition:enter-end="translate-x-0"
                x-transition:leave="transform transition ease-in-out duration-500" x-transition:leave-start="translate-x-0"
                x-transition:leave-end="translate-x-full">

                <div class="p-4 border-b">
                    <div class="flex justify-between items-center">
                        <h3 class="text-lg font-bold text-gray-800">Your Cart (<span x-text="itemCount"></span>)</h3>
                        <button @click="sidebarIsOpen=false" class="text-gray-500 hover:text-gray-700 transition">
                            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>

                <div class="flex-1 overflow-y-auto p-4">
                    <template x-if="loading">
                        <div class="h-full flex items-center justify-center">
                            <p class="text-gray-500">Loading cart...</p>
                        </div>
                    </template>

                    <template x-if="!loading && cart?.menus?.length === 0">
                        <div class="h-full flex flex-col items-center justify-center text-center p-6">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-gray-400" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                            <h4 class="mt-4 text-lg font-medium text-gray-700">Your cart is empty</h4>
                            <p class="mt-1 text-gray-500">Start shopping to add items to your cart</p>
                        </div>
                    </template>

                    <template x-if="!loading && cart?.menus?.length > 0">
                        <div class="space-y-4">
                            <template x-for="item in cart?.menus" :key="item.id">
                                <div class="flex gap-4 pb-4 border-b">
                                    <img :src="item.image" class="w-20 h-20 object-cover rounded-lg flex-shrink-0">
                                    <div class="flex-1">
                                        <div class="flex justify-between">
                                            <h4 class="font-medium text-gray-800" x-text="item.title"></h4>
                                            <span class="font-semibold"
                                                x-text="item.price * item.pivot.quantity.toFixed(2)" ></span>
                                        </div>
                                        <p class="text-sm text-gray-600" x-text="item.price.toFixed(2)"></p>
                                        <div class="mt-2 flex items-center justify-between">
                                            <div class="flex items-center border rounded">
                                                <button @click="updateQuantity(item, -1)"
                                                    class="px-2 py-1 text-gray-600 hover:bg-gray-100"
                                                    :disabled="item.pivot.quantity <= 1">
                                                    -
                                                </button>
                                                <span class="px-2" x-text="item.pivot.quantity"></span>
                                                <button @click="updateQuantity(item, 1)"
                                                    class="px-2 py-1 text-gray-600 hover:bg-gray-100">
                                                    +
                                                </button>
                                            </div>
                                            <button @click="removeItem(item.id)"
                                                class="text-red-500 hover:text-red-700 text-sm">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </template>
                        </div>
                    </template>
                </div>

                <template x-if="!loading && cart?.menus?.length > 0">
                    <div class="p-4 border-t bg-gray-50">
                        <div class="flex justify-between items-center mb-4">
                            <span class="font-medium text-gray-700">Subtotal</span>
                            <span class="font-bold text-lg" x-text="total">$</span>
                        </div>
                        {{-- <button
                            class="w-full bg-black hover:bg-slate-900 text-white py-3 px-4 rounded-lg font-medium transition duration-200">
                            Proceed to Checkout
                        </button> --}}
                           <a href="{{route('checkout.index')}}"
                            class="w-full block text-center bg-black hover:bg-slate-900 text-white py-3 px-4 rounded-lg font-medium transition duration-200">
                            Proceed to Checkout
                    </a>
                        {{-- <div class="mt-3 text-center">
                            <a href="#" @click="sidebarIsOpen=false"
                                class="text-sm text-slate-900 hover:text-text-800 hover:underline">Continue shopping</a>
                        </div> --}}
                    </div>
                </template>
            </div>
        </div>
    </div>
</section>



    <!-- Back to top -->
    <a href="#" onclick="topFunction()" id="back-to-top"
        class="back-to-top fixed hidden text-lg rounded-full z-10 bottom-5 end-5 size-9 text-center bg-amber-500 text-white justify-center items-center"><i
            class="mdi mdi-arrow-up"></i></a>



    <!---->

    <!---->
@endsection