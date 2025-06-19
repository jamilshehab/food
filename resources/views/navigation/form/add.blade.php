<x-app-layout>
<div x-data="{ showSidebar: false }" class="relative flex w-full flex-col md:flex-row">
    <div x-cloak x-show="showSidebar" class="fixed inset-0 z-10 bg-surface-dark/10 backdrop-blur-xs md:hidden" aria-hidden="true" x-on:click="showSidebar = false" x-transition.opacity></div>
    <x-dashboard.sidebar/>
    <!-- main content  -->
    <div id="main-content" class="h-svh w-full overflow-y-auto p-4 bg-white dark:bg-neutral-950">
          <form method="POST" action="{{ route('navbar.store') }}" enctype="multipart/form-data">
                @csrf

                <div>
                    <x-input-label for="title" :value="__('Your Title')" />
                    <x-text-input id="title" name="title" type="text" placeholder="title"
                        class="mt-1 block w-full" :value="old('title')" required autofocus />
                    <x-input-error :messages="$errors->get('title')" class="mt-2" />
                </div>

                <!-- Content -->
                <div>
                    <x-input-label for="title" :value="__('Your Link')" />
                    <x-text-input id="url" name="url" type="text" placeholder="url"
                        class="mt-1 block w-full" :value="old('url')" required autofocus />
                    <x-input-error :messages="$errors->get('url')" class="mt-2" />
                </div>

                <!-- Submit Button -->
                <div class="mt-6">
                    <button type="submit"
                        class="w-full px-4 py-3 font-bold text-white bg-slate-800 rounded-md hover:bg-slate-700 transition duration-200">
                        {{ __('Add Navigation') }}
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