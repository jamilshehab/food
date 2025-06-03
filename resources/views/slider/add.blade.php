<x-app-layout>
<div x-data="{ showSidebar: false }" class="relative flex w-full flex-col md:flex-row">
    <div x-cloak x-show="showSidebar" class="fixed inset-0 z-10 bg-surface-dark/10 backdrop-blur-xs md:hidden" aria-hidden="true" x-on:click="showSidebar = false" x-transition.opacity></div>
    <x-dashboard.sidebar/>
    <!-- main content  -->
    <div id="main-content" class="h-svh w-full overflow-y-auto p-4 bg-white dark:bg-neutral-950">
          <form method="POST" action="{{ route('slider.store') }}" enctype="multipart/form-data">
                @csrf

                <div>
                    <x-input-label for="slider_title" :value="__('Your Title')" />
                    <x-text-input id="slider_title" name="slider_title" type="text" placeholder="slider title"
                        class="mt-1 block w-full" :value="old('slider_title')" required autofocus />
                    <x-input-error :messages="$errors->get('slider_title')" class="mt-2" />
                </div>

                <!-- Content -->
                <div class="mt-4">
                    <x-input-label for="slider_content" :value="__('Slider Content')" />
                    <textarea id="slider_content" name="slider_content" rows="4"
                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                        placeholder="your content" required>{{ old('slider_content') }}</textarea>
                    <x-input-error :messages="$errors->get('slider_content')" class="mt-2" />
                </div>

                <!-- Image Upload -->
                <div class="mt-4">
                    <x-input-label for="slider_image" :value="__('Upload Image')" />
                    <input type="file" name="slider_image" id="slider_image"   
                        class="block w-full mt-1 text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-slate-800 file:text-white hover:file:bg-slate-700" />
                    <x-input-error :messages="$errors->get('slider_image')" class="mt-2" /> 
                   <img id="preview" class="my-4 w-20 h-20" src="" alt="Image preview will appear here">
               </div>
                 
                 <!-- Anchor Link -->
            <div class="mt-4">
                <x-input-label for="anchor_link" :value="__('Button Link (Optional)')" />
                <x-text-input id="anchor_link" name="anchor_link" type="text" 
                    :value="old('anchor_link')" 
                    class="mt-1 block w-full" />
                <x-input-error :messages="$errors->get('anchor_link')" class="mt-2" />
            </div>

            <!-- Anchor Text -->
            <div class="mt-4">
                <x-input-label for="anchor_text" :value="__('Button Text (Optional)')" />
                <x-text-input id="anchor_text" name="anchor_text" type="text" 
                     :value="old('anchor_text')" 
                     class="mt-1 block w-full" />
                <x-input-error :messages="$errors->get('anchor_text')" class="mt-2" />
            </div>

                <!-- Submit Button -->
                <div class="mt-6">
                    <button type="submit"
                        class="w-full px-4 py-3 font-bold text-white bg-slate-800 rounded-md hover:bg-slate-700 transition duration-200">
                        {{ __('Add Slider') }}
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