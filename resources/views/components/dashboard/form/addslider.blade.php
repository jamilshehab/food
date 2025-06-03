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