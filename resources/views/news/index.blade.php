<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
      {{ __('News') }}
    </h2>
  </x-slot>

  <!-- News Table -->
  <div class="relative overflow-x-auto max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
    <div class="pb-4 bg-white dark:bg-gray-900 flex md:flex-row gap-3 flex-col justify-between items-center">
      <label for="table-search" class="sr-only">Search</label>
      <div class="relative md:w-auto w-full">
        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
          <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
          </svg>
        </div>
        <input type="text" id="table-search" class="w-full block p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg md:w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-700 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search for news headlines">
      </div>
      <a href="{{ route('news.create') }}" class="cursor-pointer flex items-center justify-center gap-1 md:w-auto w-full focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity">
          <line x1="12" y1="5" x2="12" y2="19"></line>
          <line x1="5" y1="12" x2="19" y2="12"></line>
        </svg>Post News
      </a>
    </div>
    <div class="relative overflow-x-auto shadow-lg sm:rounded-lg">
      <table class="min-w-[64rem] w-full text-sm text-left text-gray-500 dark:text-gray-400 table-fixed">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-800 dark:text-gray-400">
          <tr>
            <th scope="col" class="px-6 py-3">
              Thumbnail
            </th>
            <th scope="col" class="px-6 py-3">
              Headline
            </th>
            <th scope="col" class="px-6 py-3">
              Content
            </th>
            <th scope="col" class="px-6 py-3">
              Author
            </th>
            <th scope="col" class="px-6 py-3">
              Read Time
            </th>
            <th scope="col" class="px-6 py-3">
            </th>
          </tr>
        </thead>
        <tbody class="bg-white dark:bg-gray-900">
          @foreach ($news as $n)
            <tr class="dark:border-gray-800 border-b">
              <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                @if ($n->image !== null)
                  <img src="{{ asset($n->image) }}" alt="{{ $n->headline }}" class="rounded-md w-64">
                @else
                  @foreach ($n->media as $image)
                    <img src="{{ asset($image->getUrl()) }}" alt="{{ $n->headline }}" class="rounded-md w-64">
                  @endforeach
                @endif
              </th>
              <td class="px-6 py-4">
                {{ $n->headline }}
              </td>
              <td class="px-6 py-4">
                {{ strlen($n->content) > 50 ? substr($n->content, 0, 50) . '...' : $n->content }}
              </td>
              <td class="px-6 py-4">
                {{ $n->user->name }}
              </td>
              <td class="px-6 py-4">
                {{ $n->read_time }} minutes
              </td>
              <td class="px-6 py-4">
                <div class="flex lg:flex-row flex-col gap-1 justify-between items-center">
                  <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Details</a>
                  <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                  <a href="#" class="font-medium text-blue-600 dark:text-red-500 hover:underline">Delete</a>
                </div>
              </td>
            </tr>
          @endforeach

      </table>
    </div>
  </div>
</x-app-layout>
