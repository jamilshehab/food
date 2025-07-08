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
                    <img src="{{ asset('storage/' . $logo->logo_dark) }}" class="l-dark" alt="">
                </span>
            </a>

            <a class="logo" href="#home">
                {{-- Light mode logo --}}
                <span class="inline-block dark:hidden">
                    @if($logo->logo_light)
                        <img src="{{ asset('storage/' . $logo->logo_light) }}" class="l-light" alt="Logo Light">
                    @endif
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
                        @foreach ($navigation as $nav)
                            <li class="menu-item active">
                                <a href="{{$nav->url}}">{{$nav->title}}</a>
                            </li>

                        @endforeach
                        <li class="menu-item">
                            <a href="{{route('dashboard')}}">Dashboard</a>
                        </li>

                    </ul>
                </div>
        </div>
    </nav>


    <section class="swiper-slider-hero relative block h-screen restaurant-section" id="home">
        <div class="swiper-container absolute end-0 top-0 w-full h-full">
            <div class="swiper-wrapper">
                @foreach ($sliders as $slider)
                    <div class="swiper-slide flex items-center overflow-hidden">
                        <div class="slide-inner absolute end-0 top-0 w-full h-full slide-bg-image flex items-center bg-center;"
                            style="background-image: url('{{ asset('storage/' . $slider->slider_image) }}')">
                            >
                            <div class="absolute inset-0 bg-slate-900/60"></div>
                            <div class="container relative">
                                <div class="grid grid-cols-1">
                                    <h1
                                        class="font-semibold lg:leading-normal leading-normal text-4xl lg:text-6xl text-white mb-5">
                                        {{ $slider->slider_title }}</h1>
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
        <div class="container relative">
            <div class="grid md:grid-cols-12 grid-cols-1 gap-6  ">
                <div class="lg:col-span-6 md:col-span-12 lg:order-2" data-aos="fade-down">
                    <div class="text-left">
                        <!-- <h6 class="uppercase font-semibold">About Us</h6> -->

                        <h6 class="uppercase text-3xl font-semibold">{{$about->title}}</h6>
                        <p class="text-slate-400 mt-3">{{$about->content}}</p>
                    </div>
                </div>
                <div class="lg:col-span-6 md:col-span-6 lg:order-3" data-aos="fade-down">
                    <img src="{{ asset('storage/' . $about->images) }}" class="rounded shadow dark:shadow-gray-800" alt="">
                </div>
            </div>
        </div>
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
    <div  class="container relative"  >
       
        <div class="grid md:grid-cols-2 gap-6">

            @foreach ($menus as $menu)
                <div class="flex items-center" key="{{ $menu->id }}" data-aos="fade-down">
                    <img src="{{ asset('storage/' . $menu->image) }}"
                         class="rounded-full size-16 mx-auto group-hover:animate-[spin_10s_linear_infinite]" alt="">

                    <div class="ms-3 w-full">
                        <div class="flex justify-between items-center pb-2 border-b border-gray-100 dark:border-gray-800">
                            <button 
                                class="text-left hover:text-amber-500 transition-colors">
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
<button onclick="addToCart({{ $menu->id }})"
    class="bg-black rounded-[12px] mt-5 text-white px-5 py-2">
    Add To Cart
</button>                   
 </div>
                </div>
            @endforeach

        </div>

        

    </div>
</section>


<!-- Optional: add this in <head> for x-cloak support -->
<style>
    [x-cloak] { display: none !important; }
</style>

    <!--end section-->
    <!-- End -->

    <!-- Footer Start -->
    <footer class="relative bg-slate-950 dark:bg-slate-950/20 text-gray-200">
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
                                <p class="mb-0"><a href="{{$footer->email_input}}"
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
    </footer><!--end footer-->
    <!-- Footer End -->
    <!-- Switcher -->



    <!-- Add this style to hide elements with x-cloak before Alpine loads -->

    <div x-data="{ sidebarIsOpen: false }">
        <!-- Cart Toggle Button -->
        <button @click="sidebarIsOpen = true" class="fixed bottom-16 right-4 z-40 rounded-full bg-black p-4 text-white"
            aria-label="Open cart">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke="currentColor" fill="none" stroke-width="1.5"
                class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
            </svg>
        </button>

        <!-- Cart Sidebar -->
        <div x-show="sidebarIsOpen" @click.away="sidebarIsOpen = false" @keydown.escape.window="sidebarIsOpen = false"
            x-cloak class="fixed inset-0 z-[999] bg-[#0000002b] bg-opacity-50 transition-opacity"
            x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200"
            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
            <div class="fixed right-0 top-0 h-full w-80 bg-white shadow-xl"
                x-transition:enter="transform transition ease-in-out duration-500"
                x-transition:enter-start="translate-x-full" x-transition:enter-end="translate-x-0"
                x-transition:leave="transform transition ease-in-out duration-500" x-transition:leave-start="translate-x-0"
                x-transition:leave-end="translate-x-full">
                <div class="p-4">
                    <div class="flex justify-between items-center">
                        <h3 class="text-lg font-bold">Your Cart</h3>
                        <button @click="sidebarIsOpen = false" class="text-gray-500 hover:text-gray-700">
                            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                    <div class="mt-4">
                        <p>Cart items will appear here</p>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- Back to top -->
    <a href="#" onclick="topFunction()" id="back-to-top"
        class="back-to-top fixed hidden text-lg rounded-full z-10 bottom-5 end-5 size-9 text-center bg-amber-500 text-white justify-center items-center"><i
            class="mdi mdi-arrow-up"></i></a>

            <script>
   
</script>



    <!---->

    <!---->
@endsection