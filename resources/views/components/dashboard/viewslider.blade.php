<x-app-layout>
    <div class="container px-4 mx-auto py-12">
        @if($sliders->count() > 0)
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white border border-gray-300 rounded-lg shadow-sm">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Title</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Content</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Image</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Submitted On</th>
                            {{-- <th class="px-6 py-3 text-center text-sm font-semibold text-gray-700">Actions</th> --}}
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach($sliders as $slider)
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 text-sm text-gray-800">{{ Str::limit($slider->slider_title, 4) }}</td>
                                <td class="px-6 py-4 text-sm text-gray-800">{{ Str::limit($slider->slider_content, limit: 15) }}</td>
                                <td class="px-6 py-4 text-sm text-gray-800">
                                    @if($slider->slider_image)
                                        <img src="{{ asset('storage/' . $slider->slider_image) }}" 
                                             alt="Slider Image" 
                                             class="w-16 h-auto rounded-md">
                                    @else
                                        —
                                    @endif
                                </td>
                                
                                <td class="px-6 py-4 text-sm text-gray-600">
                                    {{ $slider->created_at->format('M d, Y H:i') }}
                                </td>
                                {{-- <td class="px-6 py-4 text-center space-x-2">
                                    <a href="{{ route('problems.show', $slider->id) }}" 
                                     class="inline-block px-3 py-1 bg-gray-600 text-white text-sm rounded hover:bg-gray-700">
                                       View
                                       </a>
                                    <a href="{{ route('problems.edit', $problem->id) }}" 
                                       class="inline-block px-3 py-1 bg-blue-600 text-white text-sm rounded hover:bg-blue-700">
                                        Edit
                                    </a>

                                    <form action="{{ route('problems.destroy', $problem->id) }}" method="POST"
                                          onsubmit="return confirm('Are you sure you want to delete this?');"
                                          class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="px-3 py-1 bg-red-600 text-white text-sm rounded hover:bg-red-700">
                                            Delete
                                        </button>
                                    </form>
                                </td> --}}
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="mt-6 flex justify-center">
                {{ $slider->links() }}
            </div>
        @else
            <p class="text-gray-600 text-center text-xl mt-8">No Tickets Found.</p>
        @endif
    </div>
</x-app-layout>