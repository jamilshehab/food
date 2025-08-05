<x-app-layout>
<div x-data="{ showSidebar: false }" class="relative flex w-full flex-col md:flex-row">
    <div x-cloak x-show="showSidebar" class="fixed inset-0 z-10 bg-surface-dark/10 backdrop-blur-xs md:hidden" aria-hidden="true" x-on:click="showSidebar = false" x-transition.opacity></div>
    <x-dashboard.sidebar/>
    <!-- main content  -->
    <div id="main-content" class="h-svh w-full overflow-y-auto p-4 bg-white dark:bg-neutral-950">
        <div class="container px-4 mx-auto py-12">
        @if($logo)
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white border border-gray-300 rounded-lg shadow-sm">
                    <thead class="bg-gray-100">
                        <tr>
                             <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Logo</th>
                             <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Submitted On</th>
                            {{-- <th class="px-6 py-3 text-center text-sm font-semibold text-gray-700">Actions</th> --}}
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                             <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 text-sm text-gray-800">
                                  <img src="{{ asset('storage/' . $logo->image) }}" 
                                   alt="Logo Image" 
                                   class="w-32 h-auto rounded-md">
                                </td>            
                                <td class="px-6 py-4 text-sm text-gray-600">
                                    {{ $logo->created_at->format('M d, Y H:i') }}
                                </td>
                                <td class="px-6 py-4 text-center space-x-2">
                            
                                    <a href="{{ route('logo.edit', $logo->id) }}" 
                                       class="inline-block px-3 py-1 bg-blue-600 text-white text-sm rounded hover:bg-blue-700">
                                        Edit
                                    </a>
                              <form action="{{ route('logo.destroy', $logo->id) }}" method="POST"
                                          onsubmit="return confirm('Are you sure you want to delete this?');"
                                          class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="px-3 py-1 bg-red-600 text-white text-sm rounded hover:bg-red-700">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                     </tbody>
                </table>
            </div>
        @else
        <div class="flex justify-between items-center ">
            <div class="">
                <h1 class="text-xl">No Logo Found</h1>
            </div>
           <div class="">
           <a href="{{ route('logo.create') }}" class="py-2 px-2 bg-black text-white rounded-lg"> Add Your Logo</a>
        </div>
        </div>
         @endif
    </div>
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
</x-app-layout>
 
