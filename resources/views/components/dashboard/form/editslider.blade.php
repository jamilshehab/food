<x-app-layout>
    <x-dashboard.sidebar/>
    
    <div class="p-6">
        <form method="POST" action="{{ route('slider.update', $slider->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div>
                <x-input-label for="slider_title" :value="__('Slider Title')" />
                <x-text-input id="slider_title" name="slider_title" type="text" 
                    value="{{ old('slider_title', $slider->slider_title) }}" 
                    class="mt-1 block w-full" required />
                <x-input-error :messages="$errors->get('slider_title')" class="mt-2" />
            </div>

            <!-- Content -->
            <div class="mt-4">
                <x-input-label for="slider_content" :value="__('Content')" />
                <textarea id="slider_content" name="slider_content" rows="4"
                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                    required>{{ old('slider_content', $slider->slider_content) }}</textarea>
                <x-input-error :messages="$errors->get('slider_content')" class="mt-2" />
            </div>

            <!-- Current Image -->
            <div class="mt-4">
                <x-input-label :value="__('Current Image')" />
                <img src="{{ asset('storage/sliders/' . $slider->slider_image) }}" 
                     alt="Current Slider Image" class="h-40 mt-2 rounded">
            </div>

            <!-- New Image -->
            <div class="mt-4">
                <x-input-label for="slider_image" :value="__('New Image (Leave empty to keep current)')" />
                <input type="file" name="slider_image" id="slider_image"
                    class="block w-full mt-1 text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-slate-800 file:text-white hover:file:bg-slate-700" />
                <x-input-error :messages="$errors->get('slider_image')" class="mt-2" />
            </div>

            <!-- Anchor Link -->
            <div class="mt-4">
                <x-input-label for="anchor_link" :value="__('Button Link (Optional)')" />
                <x-text-input id="anchor_link" name="anchor_link" type="url" 
                    value="{{ old('anchor_link', $slider->anchor_link) }}" 
                    class="mt-1 block w-full" />
                <x-input-error :messages="$errors->get('anchor_link')" class="mt-2" />
            </div>

            <!-- Anchor Text -->
            <div class="mt-4">
                <x-input-label for="anchor_text" :value="__('Button Text (Optional)')" />
                <x-text-input id="anchor_text" name="anchor_text" type="text" 
                    value="{{ old('anchor_text', $slider->anchor_text) }}" 
                    class="mt-1 block w-full" />
                <x-input-error :messages="$errors->get('anchor_text')" class="mt-2" />
            </div>

            <div class="mt-6">
                <button type="submit"
                    class="w-full px-4 py-3 font-bold text-white bg-slate-800 rounded-md hover:bg-slate-700 transition duration-200">
                    {{ __('Update Slider') }}
                </button>
            </div>
        </form>
    </div>
</x-app-layout>