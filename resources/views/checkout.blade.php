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

<section class="bg-white py-8 antialiased dark:bg-gray-900 md:py-16">
  <form action="#" class="mx-auto max-w-screen-xl px-4 2xl:px-0">
    <div class="mt-6 sm:mt-8 lg:flex lg:items-start lg:gap-12 xl:gap-16">
      <div class="min-w-0 flex-1 space-y-8">
        <div class="space-y-4">
          <h2 class="text-xl font-semibold text-gray-900 dark:text-white">Delivery Details</h2>

          <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
            <div>
              <label for="your_name" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white"> Your name </label>
              <input type="text" id="your_name" class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500" placeholder="Bonnie Green" required />
            </div>

            <div>
              <label for="your_email" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white"> Your email* </label>
              <input type="email" id="your_email" class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500" placeholder="name@flowbite.com" required />
            </div>

            <div>
             
               <div>
              <label for="your_country" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white"> Your Country*</label>
              <input type="text" id="country" class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500" placeholder="name@flowbite.com" required />
            </div>
            </div>

            <div>
              <label for="your_country" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white"> Your City*</label>
              <input type="text" id="country" class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500" placeholder="name@flowbite.com" required />
              
            </div>

            <div>
              <label for="phone-input-3" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white"> Phone Number* </label>
               <div class="relative w-full">
                  <input type="text" id="phone-input" class="z-20 block w-full rounded-e-lg border border-s-0 border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:border-s-gray-700  dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-primary-500" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" placeholder="123-456-7890" required />
                </div>
            </div>

            <div>
              <label for="email" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white"> Email </label>
              <input type="email" id="email" class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500" placeholder="name@flowbite.com" required />
            </div>

            <div>
              <label for="company_name" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white"> Company name </label>
              <input type="text" id="company_name" class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500" placeholder="Flowbite LLC" required />
            </div>

            <div>
              <label for="address" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white"> Address Name </label>
              <input type="text" id="address" class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500" placeholder="DE42313253" required />
            </div>
          </div>
        </div>

        <div class="space-y-4">
          <h3 class="text-xl font-semibold text-gray-900 dark:text-white">Payment</h3>

          <div class="grid grid-cols-1 gap-4 md:grid-cols-3">
            <div class="rounded-lg border border-gray-200 bg-gray-50 p-4 ps-4 dark:border-gray-700 dark:bg-gray-800">
              <div class="flex items-start">
                <div class="flex h-5 items-center">
                  <input id="credit-card" aria-describedby="credit-card-text" type="radio" name="payment-method" value="" class="h-4 w-4 border-gray-300 bg-white text-primary-600 focus:ring-2 focus:ring-primary-600 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-primary-600" checked />
                </div>

                <div class="ms-4 text-sm">
                  <label for="credit-card" class="font-medium leading-none text-gray-900 dark:text-white"> Credit Card </label>
                  <p id="credit-card-text" class="mt-1 text-xs font-normal text-gray-500 dark:text-gray-400">Pay with your credit card</p>
                </div>
              </div>

              <div class="mt-4 flex items-center gap-2">
                <button type="button" class="text-sm font-medium text-gray-500 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">Delete</button>

                <div class="h-3 w-px shrink-0 bg-gray-200 dark:bg-gray-700"></div>

                <button type="button" class="text-sm font-medium text-gray-500 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">Edit</button>
              </div>
            </div>

            <div class="rounded-lg border border-gray-200 bg-gray-50 p-4 ps-4 dark:border-gray-700 dark:bg-gray-800">
              <div class="flex items-start">
                <div class="flex h-5 items-center">
                  <input id="pay-on-delivery" aria-describedby="pay-on-delivery-text" type="radio" name="payment-method" value="" class="h-4 w-4 border-gray-300 bg-white text-primary-600 focus:ring-2 focus:ring-primary-600 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-primary-600" />
                </div>

                <div class="ms-4 text-sm">
                  <label for="pay-on-delivery" class="font-medium leading-none text-gray-900 dark:text-white"> Payment on delivery </label>
                  <p id="pay-on-delivery-text" class="mt-1 text-xs font-normal text-gray-500 dark:text-gray-400">+$15 payment processing fee</p>
                </div>
              </div>

              <div class="mt-4 flex items-center gap-2">
                <button type="button" class="text-sm font-medium text-gray-500 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">Delete</button>

                <div class="h-3 w-px shrink-0 bg-gray-200 dark:bg-gray-700"></div>

                <button type="button" class="text-sm font-medium text-gray-500 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">Edit</button>
              </div>
            </div>

            <div class="rounded-lg border border-gray-200 bg-gray-50 p-4 ps-4 dark:border-gray-700 dark:bg-gray-800">
              <div class="flex items-start">
                <div class="flex h-5 items-center">
                  <input id="paypal-2" aria-describedby="paypal-text" type="radio" name="payment-method" value="" class="h-4 w-4 border-gray-300 bg-white text-primary-600 focus:ring-2 focus:ring-primary-600 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-primary-600" />
                </div>

                <div class="ms-4 text-sm">
                  <label for="paypal-2" class="font-medium leading-none text-gray-900 dark:text-white"> Paypal account </label>
                  <p id="paypal-text" class="mt-1 text-xs font-normal text-gray-500 dark:text-gray-400">Connect to your account</p>
                </div>
              </div>

              <div class="mt-4 flex items-center gap-2">
                <button type="button" class="text-sm font-medium text-gray-500 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">Delete</button>

                <div class="h-3 w-px shrink-0 bg-gray-200 dark:bg-gray-700"></div>

                <button type="button" class="text-sm font-medium text-gray-500 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">Edit</button>
              </div>
            </div>
          </div>
        </div>

        <div class="space-y-4">
          <h3 class="text-xl font-semibold text-gray-900 dark:text-white">Delivery Methods</h3>

          <div class="grid grid-cols-1 gap-4 md:grid-cols-3">
            <div class="rounded-lg border border-gray-200 bg-gray-50 p-4 ps-4 dark:border-gray-700 dark:bg-gray-800">
              <div class="flex items-start">
                <div class="flex h-5 items-center">
                  <input id="dhl" aria-describedby="dhl-text" type="radio" name="delivery-method" value="" class="h-4 w-4 border-gray-300 bg-white text-primary-600 focus:ring-2 focus:ring-primary-600 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-primary-600" checked />
                </div>

                <div class="ms-4 text-sm">
                  <label for="dhl" class="font-medium leading-none text-gray-900 dark:text-white"> $15 - DHL Fast Delivery </label>
                  <p id="dhl-text" class="mt-1 text-xs font-normal text-gray-500 dark:text-gray-400">Get it by Tommorow</p>
                </div>
              </div>
            </div>

            <div class="rounded-lg border border-gray-200 bg-gray-50 p-4 ps-4 dark:border-gray-700 dark:bg-gray-800">
              <div class="flex items-start">
                <div class="flex h-5 items-center">
                  <input id="fedex" aria-describedby="fedex-text" type="radio" name="delivery-method" value="" class="h-4 w-4 border-gray-300 bg-white text-primary-600 focus:ring-2 focus:ring-primary-600 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-primary-600" />
                </div>

                <div class="ms-4 text-sm">
                  <label for="fedex" class="font-medium leading-none text-gray-900 dark:text-white"> Free Delivery - FedEx </label>
                  <p id="fedex-text" class="mt-1 text-xs font-normal text-gray-500 dark:text-gray-400">Get it by Friday, 13 Dec 2023</p>
                </div>
              </div>
            </div>

            <div class="rounded-lg border border-gray-200 bg-gray-50 p-4 ps-4 dark:border-gray-700 dark:bg-gray-800">
              <div class="flex items-start">
                <div class="flex h-5 items-center">
                  <input id="express" aria-describedby="express-text" type="radio" name="delivery-method" value="" class="h-4 w-4 border-gray-300 bg-white text-primary-600 focus:ring-2 focus:ring-primary-600 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-primary-600" />
                </div>

                <div class="ms-4 text-sm">
                  <label for="express" class="font-medium leading-none text-gray-900 dark:text-white"> $49 - Express Delivery </label>
                  <p id="express-text" class="mt-1 text-xs font-normal text-gray-500 dark:text-gray-400">Get it today</p>
                </div>
              </div>
            </div>
          </div>
        </div>

     
      </div>

      <!-- Improved Order Summary Section -->
      <div class="mt-6 w-full space-y-6 sm:mt-8 lg:mt-0 lg:max-w-md xl:max-w-md">
        <div class="rounded-lg border border-gray-200 bg-gray-50 p-6 dark:border-gray-700 dark:bg-gray-800">
          <h3 class="mb-4 text-xl font-semibold text-gray-900 dark:text-white">Order Summary</h3>
          
          <!-- Ordered Products List -->
          <div class="mb-6 max-h-96 space-y-4 overflow-y-auto">
            <!-- Product 1 -->
            <div class="flex items-center gap-4 rounded-lg bg-white p-3 dark:bg-gray-700">
              <img src="https://flowbite.s3.amazonaws.com/blocks/e-commerce/imac-front.svg" class="h-16 w-16 rounded-md object-cover" alt="iMac Front">
              <div class="flex-1">
                <h4 class="text-sm font-medium text-gray-900 dark:text-white">Apple iMac 27"</h4>
                <div class="flex items-center gap-2 text-sm text-gray-500 dark:text-gray-400">
                  <span>Space Gray</span>
                  <span class="h-1 w-1 rounded-full bg-gray-400"></span>
                  <span>256GB SSD</span>
                </div>
                <div class="mt-1 flex items-center justify-between">
                  <span class="text-sm font-medium text-gray-900 dark:text-white">$1,499</span>
                  <span class="text-sm text-gray-500 dark:text-gray-400">Qty: 1</span>
                </div>
              </div>
            </div>
            
            <!-- Product 2 -->
            <div class="flex items-center gap-4 rounded-lg bg-white p-3 dark:bg-gray-700">
              <img src="https://flowbite.s3.amazonaws.com/blocks/e-commerce/iphone-front.svg" class="h-16 w-16 rounded-md object-cover" alt="iPhone Front">
              <div class="flex-1">
                <h4 class="text-sm font-medium text-gray-900 dark:text-white">iPhone 14 Pro</h4>
                <div class="flex items-center gap-2 text-sm text-gray-500 dark:text-gray-400">
                  <span>Deep Purple</span>
                  <span class="h-1 w-1 rounded-full bg-gray-400"></span>
                  <span>256GB</span>
                </div>
                <div class="mt-1 flex items-center justify-between">
                  <span class="text-sm font-medium text-gray-900 dark:text-white">$999</span>
                  <span class="text-sm text-gray-500 dark:text-gray-400">Qty: 2</span>
                </div>
              </div>
            </div>
            
            <!-- Product 3 -->
            <div class="flex items-center gap-4 rounded-lg bg-white p-3 dark:bg-gray-700">
              <img src="https://flowbite.s3.amazonaws.com/blocks/e-commerce/watch-front.svg" class="h-16 w-16 rounded-md object-cover" alt="Apple Watch">
              <div class="flex-1">
                <h4 class="text-sm font-medium text-gray-900 dark:text-white">Apple Watch Series 8</h4>
                <div class="flex items-center gap-2 text-sm text-gray-500 dark:text-gray-400">
                  <span>Midnight</span>
                  <span class="h-1 w-1 rounded-full bg-gray-400"></span>
                  <span>45mm</span>
                </div>
                <div class="mt-1 flex items-center justify-between">
                  <span class="text-sm font-medium text-gray-900 dark:text-white">$429</span>
                  <span class="text-sm text-gray-500 dark:text-gray-400">Qty: 1</span>
                </div>
              </div>
            </div>
          </div>
          
          <!-- Order Summary Details -->
          <div class="space-y-3 border-t border-gray-200 pt-4 dark:border-gray-700">
            <div class="flex items-center justify-between">
              <span class="text-sm font-medium text-gray-500 dark:text-gray-400">Subtotal</span>
              <span class="text-sm font-medium text-gray-900 dark:text-white">$3,926.00</span>
            </div>
            
            <div class="flex items-center justify-between">
              <span class="text-sm font-medium text-gray-500 dark:text-gray-400">Shipping</span>
              <span class="text-sm font-medium text-gray-900 dark:text-white">$15.00</span>
            </div>
            
            <div class="flex items-center justify-between">
              <span class="text-sm font-medium text-gray-500 dark:text-gray-400">Tax</span>
              <span class="text-sm font-medium text-gray-900 dark:text-white">$199.00</span>
            </div>
            
            <div class="flex items-center justify-between">
              <span class="text-sm font-medium text-gray-500 dark:text-gray-400">Discount</span>
              <span class="text-sm font-medium text-green-500">-$50.00</span>
            </div>
            
            <div class="flex items-center justify-between border-t border-gray-200 pt-3 dark:border-gray-700">
              <span class="text-base font-bold text-gray-900 dark:text-white">Total</span>
              <span class="text-base font-bold text-gray-900 dark:text-white">$4,090.00</span>
            </div>
          </div>
          
          <!-- Order Button -->
          <button type="submit" class="mt-6 w-full rounded-lg  bg-slate-900 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-primary-800 focus:outline-none focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
            Place Order
          </button>
       
          
        
       
      </div>
    </div>
  </form>
</section>
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
    </footer>
   



    <!-- Back to top -->
    <a href="#" onclick="topFunction()" id="back-to-top"
        class="back-to-top fixed hidden text-lg rounded-full z-10 bottom-5 end-5 size-9 text-center bg-amber-500 text-white justify-center items-center"><i
            class="mdi mdi-arrow-up"></i></a>



    <!---->

    <!---->
@endsection