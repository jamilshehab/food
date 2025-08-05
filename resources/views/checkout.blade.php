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
            {{-- <a class="logo" href="#home">
                <span class="inline-block dark:hidden">
                    <img src="{{$logo->logo_dark}}" class="l-dark" alt="">
                </span>
            </a> --}}

            <a class="logo" href="#home">
                {{-- Light mode logo --}}
                {{-- <span class="inline-block dark:hidden">
                 <img src="{{$logo->logo_light }}" class="l-light" alt="Logo Light">       
                </span> --}}

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
                           <div class="  sm:flex sm:items-center sm:ms-6">
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

<section class="bg-white py-8 antialiased dark:bg-gray-900 md:py-16">
  <form action="{{route('checkout.store')}}" method="POST" class="mx-auto max-w-screen-xl px-4 2xl:px-0">
    @csrf
    <div class="mt-6 sm:mt-8 lg:flex lg:items-start lg:gap-12 xl:gap-16">
      <div class="min-w-0 flex-1 space-y-8">
        <div class="space-y-4">
          <h2 class="text-xl font-semibold text-gray-900 dark:text-white">Delivery Details</h2>

          <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
            <div>
              <label for="first_name" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white"> first Name </label>
              <input type="text" name="first_name" id="first_name" class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500" placeholder="Jamil" required />
            </div>
            <div>
              <label for="last_name" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white"> last Name </label>
              <input type="text"  name="last_name" id="last_name" class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500" placeholder="Shehab" required />
            </div>
            <div>
              <label for="your_email" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white"> Your email* </label>
              <input type="email" id="your_email" class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500" name="email" placeholder="name@example.com" required />
            </div>

            <div>
             
               <div>
              <label for="your_country" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white"> Your Country*</label>
              <input type="text" id="country" name="country" class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500" placeholder="Lebanon" required />
            </div>
            </div>

            <div>
              <label for="your_city" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white"> Your City</label>
              <input type="text" id="city" name="city" class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500" placeholder="Beirut" required />
            </div>
              <div>
              <label for="company" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white"> Company name </label>
              <input type="text" name="company" id="company" class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500" placeholder="Twister" required />
            </div>
            <div>
              <label for="phone-input" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white"> Phone Number </label>
               <div class="relative w-full">
                  <input type="text" id="phone_number" name="phone_number" class="z-20 block w-full rounded-e-lg border border-s-0 border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:border-s-gray-700  dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-primary-500"  placeholder="123-456-7890" required />
                </div>
            </div>
            <div>
              <label for="address" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white"> Address Name </label>
              <input type="text" id="address" name="address" class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500" placeholder="Zeidaneye Street" required />
            </div> 
          </div>
        </div>

        <div class="space-y-4">
          <h3 class="text-xl font-semibold text-gray-900 dark:text-white">Payment</h3>
           <div class="flex items-center py-2">
             <input 
              type="text" 
              name="payment" 
              placeholder="Cash On Delivery"
              class="block w-full rounded-lg border border-gray-300 bg-gray-100 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400" 
              disabled 
              readonly
             />
           </div>
        </div>

        

     
      </div>

      <!-- Improved Order Summary Section -->
      <div class="mt-6 w-full space-y-6 sm:mt-8 lg:mt-0 lg:max-w-md xl:max-w-md">
        <div class="rounded-lg border border-gray-200 bg-gray-50 p-6 dark:border-gray-700 dark:bg-gray-800">
          <h3 class="mb-4 text-xl font-semibold text-gray-900 dark:text-white">Order Summary</h3>
          @if(count($cartItems) > 0 )
          <!-- Ordered Products List -->
          <div class="mb-6 max-h-96 space-y-4 overflow-y-auto">
            <!-- Product 1 -->
            @foreach ($cartItems as $orderItems)
            <div class="flex items-center gap-4 rounded-lg bg-white p-3 dark:bg-gray-700">
              <img src="{{$orderItems->image}}" class="h-16 w-16 rounded-md object-cover" alt="iMac Front">
              <div class="flex-1">
                <h4 class="text-sm font-medium text-gray-900 dark:text-white">{{$orderItems->title}}</h4>
                <div class="flex items-center gap-2 text-sm text-gray-500 dark:text-gray-400">
                  <span>{{$orderItems->ingredients}}</span>
                 
                  
                </div>
                <div class="mt-1 flex items-center justify-between">
                  <span class="text-sm font-medium text-gray-900 dark:text-white">{{$orderItems->price . "$"}}</span>
                  <span class="text-sm text-gray-500 dark:text-gray-400">x{{$orderItems->pivot->quantity}} </span>
                </div>
              </div>
            </div>
            @endforeach
            
            <!-- Product 2 -->
          
            
            <!-- Product 3 -->
             
          </div>
          
          <!-- Order Summary Details -->
          <div class="space-y-3 border-t border-gray-200 pt-4 dark:border-gray-700">
          
            <div class="flex items-center justify-between border-t border-gray-200 pt-3 dark:border-gray-700">
              <span class="text-base font-bold text-gray-900 dark:text-white">Total</span>
              <span class="text-base font-bold text-gray-900 dark:text-white">{{$cartItems  ? $cartTotal . "$" : "Error"}}</span>
            </div>
          </div>
          @else
           <div class="flex inline-flex w-full justify-between bg-yellow-200 border border-yellow-200 text-slate-700 px-4 py-3 my-2 rounded "
        role="alert">
        <span class="block sm:inline pl-2">
             No Products Found
        </span>
    </div>
          @endif
          <!-- Order Button -->
          <button type="submit" class="mt-6 w-full rounded-lg  bg-slate-900 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-primary-800 focus:outline-none focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
            Place Order
          </button>
       
          
        
       
      </div>
    </div>
  </form>
</section>
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
    </footer> --}}
   



    <!-- Back to top -->
    <a href="#" onclick="topFunction()" id="back-to-top"
        class="back-to-top fixed hidden text-lg rounded-full z-10 bottom-5 end-5 size-9 text-center bg-amber-500 text-white justify-center items-center"><i
            class="mdi mdi-arrow-up"></i></a>



    <!---->

    <!---->
@endsection