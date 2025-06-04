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
            <!-- Logo container-->
            <a class="logo" href="index.html">
                <span class="inline-block dark:hidden">
                    <img src="{{asset('assets/images/logo/logo-dark.png')}}" class="l-dark" alt="">
                    <img src="{{asset('assets/images/logo/logo-light.png')}}" class="l-light" alt="">
                </span>
                <img src="{{asset('assets/images/logo-light.png')}}" class="hidden dark:inline-block" alt="">
            </a>
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
                    <li class="menu-item">
                        <a href="#">Home</a> 
                    </li>

                    <li><a href="#about" class="menu-item">Our Story</a></li>

                    <li ><a href="#menu" class="menu-item"> Menus </a><span></li>
                    <li ><a href="{{route('dashboard')}}" class="menu-item"> Dashboard </a><span></li>

                 </ul> 
            </div> 
        </div> 
    </nav> 
 
     
<section class="swiper-slider-hero relative block h-screen" id="home">
            <div class="swiper-container absolute end-0 top-0 w-full h-full">
                <div class="swiper-wrapper">
                    @foreach ($sliders as $slider)
                        <div class="swiper-slide flex items-center overflow-hidden">
                        <div class="slide-inner absolute end-0 top-0 w-full h-full slide-bg-image flex items-center bg-center;"                         style="background-image: url('{{ asset('storage/' . $slider->slider_image) }}')">  
>
                            <div class="absolute inset-0 bg-slate-900/60"></div>
                            <div class="container relative">
                                <div class="grid grid-cols-1">
                                    <h1 class="font-semibold lg:leading-normal leading-normal text-4xl lg:text-6xl text-white mb-5">{{ $slider->slider_title }}</h1>
                                    <p class="text-white/70 text-lg max-w-xl">{{$slider->slider_content }}</p>    
                                    <div class="mt-8">
                                        <a href="{{ $slider->anchor_link }}" class="py-2 px-5 inline-block tracking-wide align-middle duration-500 text-base text-center text-amber-500 hover:text-white bg-transparent hover:bg-amber-500 border border-amber-500"> {{ $slider->anchor_text }}</a>
                                    </div>
                                </div><!--end grid-->
                            </div><!--end container-->
                        </div><!-- end slide-inner --> 
                    </div>
                    @endforeach
                </div>
                 <div class="swiper-button-next bg-transparent size-[35px] leading-[35px] -mt-[30px] bg-none border border-solid border-white/50 text-white hover:bg-amber-500 hover:border-amber-500 rounded-full text-center"></div>
                <div class="swiper-button-prev bg-transparent size-[35px] leading-[35px] -mt-[30px] bg-none border border-solid border-white/50 text-white hover:bg-amber-500 hover:border-amber-500 rounded-full text-center"></div>
            </div><!--end container-->
        </section>
<!--end section-->
    <!-- End Hero -->

    <section class="relative md:py-24 py-16" id="about">
        <div class="container relative">
            <div class="grid md:grid-cols-12 grid-cols-1 gap-6 items-center">
                <div class="lg:col-span-4 md:col-span-12 lg:order-2" data-aos="fade-down">
                    <div class="text-center">
                        <!-- <h6 class="uppercase font-semibold">About Us</h6> -->

                        <h4 class="text-3xl font-semibold">Our Story</h4>

                        <p class="text-slate-400 mt-6">Our buzzy food-hall style concept is inspired by international
                            dining styles, especially in Asia. Explore the following fast-action food stations as busy
                            chefs perform.</p>
                        <p class="text-slate-400 mt-3">Enjoy a verdant Garden to Glass experience. It’s in the view,
                            it’s reflected in the design, and it infuses many drinks. In fact, all our delicious fresh
                            ingredients are sustainably picked from our Jemima’s Kitchen Garden. Our flourishing range
                            of cocktails, spirits, beers and wines are all made with integrity and offer something for
                            every guest.</p>

                        
                    </div>
                </div>

                <div class="lg:col-span-4 md:col-span-6 lg:order-1" data-aos="fade-down">
                    <img src="{{asset('assets/images/about/m1.jpg')}}" class="rounded shadow dark:shadow-gray-800" alt="">
                </div>

                <div class="lg:col-span-4 md:col-span-6 lg:order-3" data-aos="fade-down">
                    <img src="{{asset('assets/images/about/m2.jpg')}}" class="rounded shadow dark:shadow-gray-800" alt="">
                </div>
            </div>
        </div>
    </section>

   

    <!-- Start -->

    <!-- End -->

    <section class="relative py-36 bg-no-repeat bg-fixed bg-top bg-cover" data-aos="fade-down" 
         style="background-image: url('{{ asset('assets/images/bg/pages.jpg') }}')" 
         id="menu">
    <div class="absolute inset-0 bg-gradient-to-b from-transparent via-slate-900/50 to-slate-900"></div>
    <div class="absolute bottom-0 start-0 end-0 text-center px-3">
        <h4 class="md:text-3xl text-2xl md:leading-normal leading-normal font-semibold text-white mb-6">
            Our Menus
        </h4>
    </div>
</section>

    <!-- Start -->
      <section class="relative md:py-24 py-16">
    <div class="container relative">
        <div class="grid md:grid-cols-2 gap-6">

            @foreach ($menus as $menu)
                <div class="flex items-center" key="{{ $menu->id }}" data-aos="fade-down">
                    <img src="{{ asset('storage/' . $menu->image) }}"
                         class="rounded-full size-16 mx-auto group-hover:animate-[spin_10s_linear_infinite]"
                         alt="">

                    <div class="ms-3 w-full">
                        <div class="flex justify-between items-center pb-2 border-b border-gray-100 dark:border-gray-800">
                            <a href="#" class="text-lg h5 block hover:text-amber-500 duration-500">
                                {{ $menu->name }}
                            </a>
                            <h5 class="text-amber-500 font-medium">
                                {{ $menu->price }} $
                            </h5>
                        </div>

                        <p class="text-slate-400 mt-2">
                            {{ $menu->description }}
                        </p>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</section>
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
                                <p class="mb-2 text-gray-200/80">Monday - Friday: 10:00AM - 11:00PM</p>
                                <p class="mb-0 text-gray-200/80">Saturday - Sunday: 9:00AM - 1:00PM</p>
                            </div>

                            <div class="text-center">
                                <h5 class="tracking-[1px] text-gray-100 font-medium text-lg mb-4">Reservation</h5>
                                <p class="mb-2"><a href="tel:+152534-468-854" class="text-gray-200/80">+152
                                        534-468-854</a></p>
                                <p class="mb-0"><a href="mailto:contact@example.com"
                                        class="text-gray-200/80">contact@example.com</a></p>
                            </div>

                            <div class="text-center">
                                <h5 class="tracking-[1px] text-gray-100 font-medium text-lg mb-4">Address</h5>
                                <p class="mb-0 text-gray-200/80">C/54 Northwest Freeway, <br> Suite 558, USA 485</p>
                            </div>
                        </div><!--end grid-->


                        <div class="grid grid-cols-1 mt-12">
                            <div class="text-center">
                                <img src="assets/images/white-icon.png" class="block mx-auto" alt="">
                                <p class="max-w-xl mx-auto mt-6">Splash your dream color Bring your home to lively
                                    Colors. We make it a priority to offer flexible services to accomodate your needs
                                </p>
                            </div>

                            <ul class="list-none text-center mt-6">
                                 
                                <li class="inline"><a href="#" target="_blank"
                                        class="size-8 inline-flex items-center justify-center tracking-wide align-middle text-base border border-gray-800 hover:border-amber-500 rounded-md hover:bg-amber-500"><i
                                            data-feather="linkedin" class="size-4 align-middle"
                                            title="Linkedin"></i></a></li>
                                <li class="inline"><a href="#" target="_blank"
                                        class="size-8 inline-flex items-center justify-center tracking-wide align-middle text-base border border-gray-800 hover:border-amber-500 rounded-md hover:bg-amber-500"><i
                                            data-feather="facebook" class="size-4 align-middle"
                                            title="facebook"></i></a></li>
                                <li class="inline"><a href="#" target="_blank"
                                        class="size-8 inline-flex items-center justify-center tracking-wide align-middle text-base border border-gray-800 hover:border-amber-500 rounded-md hover:bg-amber-500"><i
                                            data-feather="instagram" class="size-4 align-middle"
                                            title="instagram"></i></a></li>
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
                            class="mdi mdi-heart text-red-600"></i> by <a href="#" target="_blank"
                            class="text-reset">Jamil Shehab</a>.
                    </p>
                </div><!--end grid-->
            </div><!--end container-->
        </div>
    </footer><!--end footer-->
    <!-- Footer End -->
    <!-- Switcher -->
    
  
    <!-- LTR & RTL Mode Code -->

    <!-- Back to top -->
    <a href="#" onclick="topFunction()" id="back-to-top"
        class="back-to-top fixed hidden text-lg rounded-full z-10 bottom-5 end-5 size-9 text-center bg-amber-500 text-white justify-center items-center"><i
            class="mdi mdi-arrow-up"></i></a>
    <!-- Back to top -->

    <!-- JAVASCRIPTS -->
    
    <!-- JAVASCRIPTS -->
 
@endsection