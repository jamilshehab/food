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
                    <img src="{{asset('assets/images/logo-dark.png')}}" class="l-dark" alt="">
                    <img src="{{asset('assets/images/logo-light.png')}}" class="l-light" alt="">
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

                    <li class="menu-item"><a href="#"> Menus </a><span></li>

                 </ul><!--end navigation menu-->
            </div><!--end navigation-->
        </div><!--end container-->
    </nav><!--end header-->
    <!-- End Navbar -->

    <!-- Start Hero -->
   <section class="swiper-slider-hero relative block h-screen" id="home">
            <div class="swiper-container absolute end-0 top-0 w-full h-full">
                <div class="swiper-wrapper">
                    <div class="swiper-slide flex items-center overflow-hidden">
                        <div class="slide-inner absolute end-0 top-0 w-full h-full slide-bg-image flex items-center bg-center;" data-background="assets/images/bg/bg1.jpg">
                            <div class="absolute inset-0 bg-slate-900/60"></div>
                            <div class="container relative">
                                <div class="grid grid-cols-1">
                                    <h1 class="font-semibold lg:leading-normal leading-normal text-4xl lg:text-6xl text-white mb-5">Taste The <br> Difference</h1>
                                    <p class="text-white/70 text-lg max-w-xl">My veggie-packed take on a deli-style pasta salad! I swap spiralized summer squash for half the noodles and a creamy tahini dressing.</p>
                                
                                    <div class="mt-8">
                                        <a href="menu-one.html" class="py-2 px-5 inline-block tracking-wide align-middle duration-500 text-base text-center text-amber-500 hover:text-white bg-transparent hover:bg-amber-500 border border-amber-500">View Our Menu</a>
                                    </div>
                                </div><!--end grid-->
                            </div><!--end container-->
                        </div><!-- end slide-inner --> 
                    </div> <!-- end swiper-slide -->

                    <div class="swiper-slide flex items-center overflow-hidden">
                        <div class="slide-inner absolute end-0 top-0 w-full h-full slide-bg-image flex items-center bg-center;" data-background="assets/images/bg/bg2.jpg">
                            <div class="absolute inset-0 bg-slate-900/60"></div>
                            <div class="container relative">
                                <div class="grid grid-cols-1">
                                    <h1 class="font-semibold lg:leading-normal leading-normal text-4xl lg:text-6xl text-white mb-5">Taste The <br> Everyone</h1>
                                    <p class="text-white/70 text-lg max-w-xl">My veggie-packed take on a deli-style pasta salad! I swap spiralized summer squash for half the noodles and a creamy tahini dressing.</p>
                                
                                    <div class="mt-8">
                                        <a href="reservation.html" class="py-2 px-5 inline-block tracking-wide align-middle duration-500 text-base text-center text-amber-500 hover:text-white bg-transparent hover:bg-amber-500 border border-amber-500">Book A Table</a>
                                    </div>
                                </div><!--end grid-->
                            </div><!--end container-->
                        </div><!-- end slide-inner --> 
                    </div> <!-- end swiper-slide -->
                </div>
                <!-- end swiper-wrapper -->

                <!-- swipper controls -->
                <!-- <div class="swiper-pagination"></div> -->
                <div class="swiper-button-next bg-transparent size-[35px] leading-[35px] -mt-[30px] bg-none border border-solid border-white/50 text-white hover:bg-amber-500 hover:border-amber-500 rounded-full text-center"></div>
                <div class="swiper-button-prev bg-transparent size-[35px] leading-[35px] -mt-[30px] bg-none border border-solid border-white/50 text-white hover:bg-amber-500 hover:border-amber-500 rounded-full text-center"></div>
            </div><!--end container-->
        </section><!--end section-->
    <!-- End Hero -->

    <section class="relative md:py-24 py-16">
        <div class="container relative">
            <div class="grid md:grid-cols-12 grid-cols-1 gap-6 items-center">
                <div class="lg:col-span-4 md:col-span-12 lg:order-2">
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

                        <div class="mt-4">
                            <a href="aboutus.html" class="hover:text-amber-500 h6">Read More <i
                                    class="mdi mdi-arrow-right"></i></a>
                        </div>
                    </div>
                </div>

                <div class="lg:col-span-4 md:col-span-6 lg:order-1">
                    <img src="assets/images/menu/m1.jpg" class="rounded shadow dark:shadow-gray-800" alt="">
                </div>

                <div class="lg:col-span-4 md:col-span-6 lg:order-3">
                    <img src="assets/images/menu/m2.jpg" class="rounded shadow dark:shadow-gray-800" alt="">
                </div>
            </div>
        </div>
    </section>

   

    <!-- Start -->

    <!-- End -->

    <section class="relative py-36 bg-[url('../../assets/images/bg/pages.html')] bg-no-repeat bg-fixed bg-top bg-cover">
        <div class="absolute inset-0 bg-gradient-to-b from-transparent via-slate-900/50 to-slate-900"></div>
        <div class="absolute bottom-0 start-0 end-0 text-center px-3">
            <h4 class="md:text-3xl text-2xl md:leading-normal leading-normal font-semibold text-white mb-6">Our Menus
            </h4>
        </div>
    </section>

    <!-- Start -->
    <section class="relative md:py-24 py-16">
        <div class="container relative">
            <div class="grid md:grid-cols-2 gap-6">
                <div class="flex items-center">
                    <img src="assets/images/menu/1.jpg"
                        class="rounded-full size-16 mx-auto group-hover:animate-[spin_10s_linear_infinite]" alt="">

                    <div class="ms-3 w-full">
                        <div
                            class="flex justify-between items-center pb-2 border-b border-gray-100 dark:border-gray-800">
                            <a href="#" class="text-lg h5 block hover:text-amber-500 duration-500">Black bean dip</a>
                            <h5 class="text-amber-500 font-medium">$25.00</h5>
                        </div>

                        <p class="text-slate-400 mt-2">A reader will be distracted by the readable</p>
                    </div>
                </div><!--end content-->

                <div class="flex items-center">
                    <img src="assets/images/menu/2.jpg"
                        class="rounded-full size-16 mx-auto group-hover:animate-[spin_10s_linear_infinite]" alt="">

                    <div class="ms-3 w-full">
                        <div
                            class="flex justify-between items-center pb-2 border-b border-gray-100 dark:border-gray-800">
                            <a href="#" class="text-lg h5 block hover:text-amber-500 duration-500">Onion Pizza</a>
                            <h5 class="text-amber-500 font-medium">$25.00</h5>
                        </div>

                        <p class="text-slate-400 mt-2">A reader will be distracted by the readable</p>
                    </div>
                </div><!--end content-->

                <div class="flex items-center">
                    <img src="assets/images/menu/3.jpg"
                        class="rounded-full size-16 mx-auto group-hover:animate-[spin_10s_linear_infinite]" alt="">

                    <div class="ms-3 w-full">
                        <div
                            class="flex justify-between items-center pb-2 border-b border-gray-100 dark:border-gray-800">
                            <a href="#" class="text-lg h5 block hover:text-amber-500 duration-500">Chicken Breast</a>
                            <h5 class="text-amber-500 font-medium">$25.00</h5>
                        </div>

                        <p class="text-slate-400 mt-2">A reader will be distracted by the readable</p>
                    </div>
                </div><!--end content-->

                <div class="flex items-center">
                    <img src="assets/images/menu/4.jpg"
                        class="rounded-full size-16 mx-auto group-hover:animate-[spin_10s_linear_infinite]" alt="">

                    <div class="ms-3 w-full">
                        <div
                            class="flex justify-between items-center pb-2 border-b border-gray-100 dark:border-gray-800">
                            <a href="#" class="text-lg h5 block hover:text-amber-500 duration-500">Veg Pizza</a>
                            <h5 class="text-amber-500 font-medium">$25.00</h5>
                        </div>

                        <p class="text-slate-400 mt-2">A reader will be distracted by the readable</p>
                    </div>
                </div><!--end content-->

                <div class="flex items-center">
                    <img src="assets/images/menu/5.jpg"
                        class="rounded-full size-16 mx-auto group-hover:animate-[spin_10s_linear_infinite]" alt="">

                    <div class="ms-3 w-full">
                        <div
                            class="flex justify-between items-center pb-2 border-b border-gray-100 dark:border-gray-800">
                            <a href="#" class="text-lg h5 block hover:text-amber-500 duration-500">Cordon Bleu</a>
                            <h5 class="text-amber-500 font-medium">$25.00</h5>
                        </div>

                        <p class="text-slate-400 mt-2">A reader will be distracted by the readable</p>
                    </div>
                </div><!--end content-->

                <div class="flex items-center">
                    <img src="assets/images/menu/6.jpg"
                        class="rounded-full size-16 mx-auto group-hover:animate-[spin_10s_linear_infinite]" alt="">

                    <div class="ms-3 w-full">
                        <div
                            class="flex justify-between items-center pb-2 border-b border-gray-100 dark:border-gray-800">
                            <a href="#" class="text-lg h5 block hover:text-amber-500 duration-500">Boerewors</a>
                            <h5 class="text-amber-500 font-medium">$25.00</h5>
                        </div>

                        <p class="text-slate-400 mt-2">A reader will be distracted by the readable</p>
                    </div>
                </div><!--end content-->

                <div class="flex items-center">
                    <img src="assets/images/menu/7.jpg"
                        class="rounded-full size-16 mx-auto group-hover:animate-[spin_10s_linear_infinite]" alt="">

                    <div class="ms-3 w-full">
                        <div
                            class="flex justify-between items-center pb-2 border-b border-gray-100 dark:border-gray-800">
                            <a href="#" class="text-lg h5 block hover:text-amber-500 duration-500">Tarte Tatin</a>
                            <h5 class="text-amber-500 font-medium">$25.00</h5>
                        </div>

                        <p class="text-slate-400 mt-2">A reader will be distracted by the readable</p>
                    </div>
                </div><!--end content-->

                <div class="flex items-center">
                    <img src="assets/images/menu/8.jpg"
                        class="rounded-full size-16 mx-auto group-hover:animate-[spin_10s_linear_infinite]" alt="">

                    <div class="ms-3 w-full">
                        <div
                            class="flex justify-between items-center pb-2 border-b border-gray-100 dark:border-gray-800">
                            <a href="#" class="text-lg h5 block hover:text-amber-500 duration-500">Green Tea</a>
                            <h5 class="text-amber-500 font-medium">$25.00</h5>
                        </div>

                        <p class="text-slate-400 mt-2">A reader will be distracted by the readable</p>
                    </div>
                </div><!--end content-->
            </div>
        </div><!--end container-->

        <div class="container relative md:mt-24 mt-16">
            <div class="grid grid-cols-1 pb-8 text-center">
                <h3 class="mb-6 md:text-3xl text-2xl md:leading-normal leading-normal font-semibold">Our Chefs</h3>

                <p class="text-slate-400 max-w-xl mx-auto">Our buzzy food-hall style concept is inspired by
                    international dining styles, especially in Asia.</p>
            </div><!--end grid-->

            <div class="grid lg:grid-cols-4 sm:grid-cols-2 grid-cols-1 mt-6 gap-6">
                <div class="group relative overflow-hidden rounded-md duration-500">
                    <img src="assets/images/client/1.jpg"
                        class="rounded-md shadow dark:shadow-gray-800 group-hover:scale-110 duration-500" alt="">
                    <div
                        class="absolute inset-0 bg-gradient-to-t from-slate-950 group-hover:via-slate-950/70 to-transparent">
                    </div>

                    <div
                        class="absolute p-6 -bottom-[84px] group-hover:bottom-0 start-0 end-0 text-center duration-500">
                        <a href="#" class="text-white hover:text-amber-500 h5 text-lg font-medium">Gary Brook</a>

                        <p class="text-white/70 mt-1">Master Chef</p>

                        <ul class="list-none mt-2">
                            <li class="inline"><a href="#"
                                    class="size-8 inline-flex items-center justify-center align-middle rounded-full bg-amber-500 text-white"><i
                                        data-feather="facebook" class="h-4 w-4"></i></a></li>
                            <li class="inline"><a href="#"
                                    class="size-8 inline-flex items-center justify-center align-middle rounded-full bg-amber-500 text-white"><i
                                        data-feather="instagram" class="h-4 w-4"></i></a></li>
                            <li class="inline"><a href="#"
                                    class="size-8 inline-flex items-center justify-center align-middle rounded-full bg-amber-500 text-white"><i
                                        data-feather="linkedin" class="h-4 w-4"></i></a></li>
                            <li class="inline"><a href="#"
                                    class="size-8 inline-flex items-center justify-center align-middle rounded-full bg-amber-500 text-white"><i
                                        data-feather="twitter" class="h-4 w-4"></i></a></li>
                        </ul><!--end icon-->
                    </div>
                </div><!--end content-->

                <div class="group relative overflow-hidden rounded-md duration-500">
                    <img src="assets/images/client/2.jpg"
                        class="rounded-md shadow dark:shadow-gray-800 group-hover:scale-110 duration-500" alt="">
                    <div
                        class="absolute inset-0 bg-gradient-to-t from-slate-950 group-hover:via-slate-950/70 to-transparent">
                    </div>

                    <div
                        class="absolute p-6 -bottom-[84px] group-hover:bottom-0 start-0 end-0 text-center duration-500">
                        <a href="#" class="text-white hover:text-amber-500 h5 text-lg font-medium">Leena Dolman</a>

                        <p class="text-white/70 mt-1">Master Chef</p>

                        <ul class="list-none mt-2">
                            <li class="inline"><a href="#"
                                    class="size-8 inline-flex items-center justify-center align-middle rounded-full bg-amber-500 text-white"><i
                                        data-feather="facebook" class="h-4 w-4"></i></a></li>
                            <li class="inline"><a href="#"
                                    class="size-8 inline-flex items-center justify-center align-middle rounded-full bg-amber-500 text-white"><i
                                        data-feather="instagram" class="h-4 w-4"></i></a></li>
                            <li class="inline"><a href="#"
                                    class="size-8 inline-flex items-center justify-center align-middle rounded-full bg-amber-500 text-white"><i
                                        data-feather="linkedin" class="h-4 w-4"></i></a></li>
                            <li class="inline"><a href="#"
                                    class="size-8 inline-flex items-center justify-center align-middle rounded-full bg-amber-500 text-white"><i
                                        data-feather="twitter" class="h-4 w-4"></i></a></li>
                        </ul><!--end icon-->
                    </div>
                </div><!--end content-->

                <div class="group relative overflow-hidden rounded-md duration-500">
                    <img src="assets/images/client/3.jpg"
                        class="rounded-md shadow dark:shadow-gray-800 group-hover:scale-110 duration-500" alt="">
                    <div
                        class="absolute inset-0 bg-gradient-to-t from-slate-950 group-hover:via-slate-950/70 to-transparent">
                    </div>

                    <div
                        class="absolute p-6 -bottom-[84px] group-hover:bottom-0 start-0 end-0 text-center duration-500">
                        <a href="#" class="text-white hover:text-amber-500 h5 text-lg font-medium">Carol Francis</a>

                        <p class="text-white/70 mt-1">Master Chef</p>

                        <ul class="list-none mt-2">
                            <li class="inline"><a href="#"
                                    class="size-8 inline-flex items-center justify-center align-middle rounded-full bg-amber-500 text-white"><i
                                        data-feather="facebook" class="h-4 w-4"></i></a></li>
                            <li class="inline"><a href="#"
                                    class="size-8 inline-flex items-center justify-center align-middle rounded-full bg-amber-500 text-white"><i
                                        data-feather="instagram" class="h-4 w-4"></i></a></li>
                            <li class="inline"><a href="#"
                                    class="size-8 inline-flex items-center justify-center align-middle rounded-full bg-amber-500 text-white"><i
                                        data-feather="linkedin" class="h-4 w-4"></i></a></li>
                            <li class="inline"><a href="#"
                                    class="size-8 inline-flex items-center justify-center align-middle rounded-full bg-amber-500 text-white"><i
                                        data-feather="twitter" class="h-4 w-4"></i></a></li>
                        </ul><!--end icon-->
                    </div>
                </div><!--end content-->

                <div class="group relative overflow-hidden rounded-md duration-500">
                    <img src="assets/images/client/4.jpg"
                        class="rounded-md shadow dark:shadow-gray-800 group-hover:scale-110 duration-500" alt="">
                    <div
                        class="absolute inset-0 bg-gradient-to-t from-slate-950 group-hover:via-slate-950/70 to-transparent">
                    </div>

                    <div
                        class="absolute p-6 -bottom-[84px] group-hover:bottom-0 start-0 end-0 text-center duration-500">
                        <a href="#" class="text-white hover:text-amber-500 h5 text-lg font-medium">Joe Thomas</a>

                        <p class="text-white/70 mt-1">Master Chef</p>

                        <ul class="list-none mt-2">
                            <li class="inline"><a href="#"
                                    class="size-8 inline-flex items-center justify-center align-middle rounded-full bg-amber-500 text-white"><i
                                        data-feather="facebook" class="h-4 w-4"></i></a></li>
                            <li class="inline"><a href="#"
                                    class="size-8 inline-flex items-center justify-center align-middle rounded-full bg-amber-500 text-white"><i
                                        data-feather="instagram" class="h-4 w-4"></i></a></li>
                            <li class="inline"><a href="#"
                                    class="size-8 inline-flex items-center justify-center align-middle rounded-full bg-amber-500 text-white"><i
                                        data-feather="linkedin" class="h-4 w-4"></i></a></li>
                            <li class="inline"><a href="#"
                                    class="size-8 inline-flex items-center justify-center align-middle rounded-full bg-amber-500 text-white"><i
                                        data-feather="twitter" class="h-4 w-4"></i></a></li>
                        </ul><!--end icon-->
                    </div>
                </div><!--end content-->
            </div><!--end grid-->
        </div><!--end container-->
    </section><!--end section-->
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
                                <li class="inline"><a href="https://1.envato.market/veganfry" target="_blank"
                                        class="size-8 inline-flex items-center justify-center tracking-wide align-middle text-base border border-gray-800 hover:border-amber-500 rounded-md hover:bg-amber-500"><i
                                            data-feather="shopping-cart" class="size-4 align-middle"
                                            title="Buy Now"></i></a></li>
                                <li class="inline"><a href="https://dribbble.com/shreethemes" target="_blank"
                                        class="size-8 inline-flex items-center justify-center tracking-wide align-middle text-base border border-gray-800 hover:border-amber-500 rounded-md hover:bg-amber-500"><i
                                            data-feather="dribbble" class="size-4 align-middle"
                                            title="dribbble"></i></a></li>
                                <li class="inline"><a href="http://linkedin.com/company/shreethemes" target="_blank"
                                        class="size-8 inline-flex items-center justify-center tracking-wide align-middle text-base border border-gray-800 hover:border-amber-500 rounded-md hover:bg-amber-500"><i
                                            data-feather="linkedin" class="size-4 align-middle"
                                            title="Linkedin"></i></a></li>
                                <li class="inline"><a href="https://www.facebook.com/shreethemes" target="_blank"
                                        class="size-8 inline-flex items-center justify-center tracking-wide align-middle text-base border border-gray-800 hover:border-amber-500 rounded-md hover:bg-amber-500"><i
                                            data-feather="facebook" class="size-4 align-middle"
                                            title="facebook"></i></a></li>
                                <li class="inline"><a href="https://www.instagram.com/shreethemes/" target="_blank"
                                        class="size-8 inline-flex items-center justify-center tracking-wide align-middle text-base border border-gray-800 hover:border-amber-500 rounded-md hover:bg-amber-500"><i
                                            data-feather="instagram" class="size-4 align-middle"
                                            title="instagram"></i></a></li>
                                <li class="inline"><a href="https://twitter.com/shreethemes" target="_blank"
                                        class="size-8 inline-flex items-center justify-center tracking-wide align-middle text-base border border-gray-800 hover:border-amber-500 rounded-md hover:bg-amber-500"><i
                                            data-feather="twitter" class="size-4 align-middle" title="twitter"></i></a>
                                </li>
                                <li class="inline"><a href="mailto:support@shreethemes.in"
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
                            class="mdi mdi-heart text-red-600"></i> by <a href="https://shreethemes.in/" target="_blank"
                            class="text-reset">Shreethemes</a>.
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