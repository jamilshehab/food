<x-app-layout>
<div x-data="{ showSidebar: false }" class="relative flex w-full flex-col md:flex-row">
    <div x-cloak x-show="showSidebar" class="fixed inset-0 z-10 bg-surface-dark/10 backdrop-blur-xs md:hidden" aria-hidden="true" x-on:click="showSidebar = false" x-transition.opacity></div>
    <x-dashboard.sidebar/>
    <!-- main content  -->
     <div id="main-content" class="h-svh w-full overflow-y-auto p-4 bg-white dark:bg-neutral-950">
        <form method="POST" action="{{ route('footer.store') }}" enctype="multipart/form-data">
            @csrf

            <!-- Row with two inputs side by side -->
            <div class="flex flex-col md:flex-row gap-4">
                <!-- Title -->
                <div class="w-full md:w-1/2">
                    <x-input-label for="title" :value="__('Open Hours Weekdays')" />
                    <x-text-input id="title" name="title" type="text" placeholder="Open Hours Weekdays"
                        class="mt-1 block w-full" :value="old('open_hours_weekdays')" required autofocus />
                    <x-input-error :messages="$errors->get('open_hours_weekdays')" class="mt-2" />
                </div>

                <!-- Subtitle or additional input -->
                <div class="w-full md:w-1/2">
                    <x-input-label for="subtitle" :value="__('Open Hours Weekends')" />
                    <x-text-input id="subtitle" name="open_hours_weekends" type="text" placeholder="Open Hours Weekends"
                        class="mt-1 block w-full" :value="old('open_hours_weekends')" />
                    <x-input-error :messages="$errors->get('open_hours_weekends')" class="mt-2" />
                </div>
            </div>
              <!-- Row with two inputs side by side -->
            <div class="flex flex-col md:flex-row gap-4">
                <!-- Title -->
                <div class="w-full md:w-1/2">
                    <x-input-label for="title" :value="__('Reservation Title')" />
                    <x-text-input id="title" name="reservation_title" type="text" placeholder="About title"
                        class="mt-1 block w-full" :value="old('reservation_title')" required autofocus />
                    <x-input-error :messages="$errors->get('reservation_title')" class="mt-2" />
                </div>

                <!-- Subtitle or additional input -->
                <div class="w-full md:w-1/2">
                    <x-input-label for="phone_number" :value="__('Phone Number')" />
                    <x-text-input id="phone_number" name="phone_number" type="text" placeholder="Phone Number"
                        class="mt-1 block w-full" :value="old('phone_number')" />
                    <x-input-error :messages="$errors->get('phone_number')" class="mt-2" />
                </div>
            </div>
            <div class="flex flex-col md:flex-row gap-4">
                <!-- Title -->
                <div class="w-full md:w-1/2">
                    <x-input-label for="email_input" :value="__('Email Input')" />
                    <x-text-input id="email_input" name="email_input" type="text" placeholder="Email Input"
                        class="mt-1 block w-full" :value="old('email_input')" required autofocus />
                    <x-input-error :messages="$errors->get('email_input')" class="mt-2" />
                </div>

                <!-- Subtitle or additional input -->
                <div class="w-full md:w-1/2">
                    <x-input-label for="phone_number" :value="__('Phone Number')" />
                    <x-text-input id="phone_number" name="phone_number" type="text" placeholder="Phone Number"
                        class="mt-1 block w-full" :value="old('phone_number')" />
                    <x-input-error :messages="$errors->get('phone_number')" class="mt-2" />
                </div>
            </div>
              <div class="flex flex-col md:flex-row gap-4">
                <!-- Title -->
                <div class="w-full md:w-1/2">
                    <x-input-label for="address_line_1" :value="__('Email Input')" />
                    <x-text-input id="address_line_1" name="address_line_1" type="text" placeholder="Email Input"
                        class="mt-1 block w-full" :value="old('address_line_1')" required autofocus />
                    <x-input-error :messages="$errors->get('address_line_1')" class="mt-2" />
                </div>

                <!-- Subtitle or additional input -->
                <div class="w-full md:w-1/2">
                    <x-input-label for="address_line_2" :value="__('Address Line 2')" />
                    <x-text-input id="address_line_2" name="address_line_2" type="text" placeholder="Address Line 2"
                        class="mt-1 block w-full" :value="old('address_line_2')" />
                    <x-input-error :messages="$errors->get('address_line_2')" class="mt-2" />
                </div>
              </div>
            <!-- Content -->
            <div class="mt-4">
                <x-input-label for="content" :value="__('Content')" />
                <textarea id="content" name="footer_description" rows="4"
                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                    placeholder="Your content here" required>{{ old('footer_description') }}</textarea>
                <x-input-error :messages="$errors->get('footer_description')" class="mt-2" />
            </div>

            

            <!-- Submit Button -->
            <div class="mt-6">
                <button type="submit"
                    class="w-full px-4 py-3 font-bold text-white bg-slate-800 rounded-md hover:bg-slate-700 transition duration-200">
                    {{ __('Add') }}
                </button>
            </div>
        </form>
    </div>


    <!-- toggle button for small screen  -->
    <button class="fixed right-4 top-4 z-20 rounded-full bg-primary p-4 md:hidden text-on-primary dark:bg-primary-dark dark:text-on-primary-dark" x-on:click="showSidebar = ! showSidebar">
        <svg x-show="showSidebar" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="size-5" aria-hidden="true">
            <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8z"/>
        </svg>
        <svg x-show="! showSidebar" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="size-5" aria-hidden="true">
            <path d="M0 3a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm5-1v12h9a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1zM4 2H2a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h2z"/>
        </svg>
        <span class="sr-only">sidebar toggle</span>
    </button>
</div>
<script src="{{ asset(path: 'assets/js/image-display.js') }}"></script>

</x-app-layout>