  <form method="POST" action="{{ route('about.store') }}" enctype="multipart/form-data">
                @csrf
                <div>
                    <x-input-label for="title" :value="__('Your Title')" />
                    <x-text-input id="title" name="title" type="text" placeholder="slider title"
                        class="mt-1 block w-full" :value="old('title')" required autofocus />
                    <x-input-error :messages="$errors->get('title')" class="mt-2" />
                </div>

                <!-- Content -->
                <div class="mt-4">
                    <x-input-label for="content" :value="__('Content')" />
                    <textarea id="content" name="content" rows="4"
                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                        placeholder="your content" required>{{ old('content') }}</textarea>
                    <x-input-error :messages="$errors->get('content')" class="mt-2" />
                </div>

                <!-- Image Upload -->
                <div class="mt-4">
                    <x-input-label for="slider_image" :value="__('Upload Image')" />
                    <input type="file" multiple ="images[]" id="image"   
                        class="block w-full mt-1 text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-slate-800 file:text-white hover:file:bg-slate-700" />
                    <x-input-error :messages="$errors->get('image')" class="mt-2" /> 
                      @if ($about && $about->images->isNotEmpty())
                     <div class="grid grid-cols-3 gap-4 mt-4">
                      @foreach ($about->images as $img)
                        <img src="{{ asset('storage/' . $img->images) }}" alt="Image" class="w-full h-auto rounded shadow">
                      @endforeach
                  </div>
@else
    <p class="text-gray-500">No images uploaded yet.</p>
@endif
                </div>
              
                <div class="mt-6">
                    <button type="submit"
                        class="w-full px-4 py-3 font-bold text-white bg-slate-800 rounded-md hover:bg-slate-700 transition duration-200">
                        {{ __('Add') }}
                    </button>
                </div>
            </form>