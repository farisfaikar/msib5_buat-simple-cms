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
                <div class="rounded-md max-h-24 overflow-y-clip">
                  @if ($n->image !== null)
                    <img src="{{ asset($n->image) }}" alt="{{ $n->headline }}" class="w-64">
                  @else
                    @foreach ($n->media as $image)
                      <img src="{{ asset($image->getUrl()) }}" alt="{{ $n->headline }}" class="w-64">
                    @endforeach
                  @endif
                </div>
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
                  <a href="{{ route('news.show', $n) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Details</a>
                  <a href="{{ route('news.edit', $n) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                  <button id="deleteButton{{ $loop->iteration }}" data-modal-toggle="deleteModal{{ $loop->iteration }}" class="cursor-pointer font-medium text-blue-600 dark:text-red-500 hover:underline" type="button">
                    Delete
                  </button>
                </div>
              </td>
            </tr>
            <!-- Delete modal -->
            <div id="deleteModal{{ $loop->iteration }}" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
              <div class="relative p-4 w-full max-w-md h-full md:h-auto">
                <!-- Modal content -->
                <div class="relative p-4 text-center bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
                  <button type="button" class="text-gray-400 absolute top-2.5 right-2.5 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="deleteModal{{ $loop->iteration }}">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                    <span class="sr-only">Close modal</span>
                  </button>
                  <svg class="text-gray-400 dark:text-gray-500 w-11 h-11 mb-3.5 mx-auto" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                  </svg>
                  <p class="mb-4 text-gray-500 dark:text-gray-300">Are you sure you want to delete this news?</p>
                  <div class="flex justify-center items-center space-x-4">
                    <form action="{{ route('news.destroy', $n) }}" method="post" class="inline-block">
                      @method('delete')
                      @csrf

                      <button data-modal-toggle="deleteModal{{ $loop->iteration }}" type="button" class="py-2 px-3 text-sm font-medium text-gray-500 bg-white rounded-lg border border-gray-200 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-primary-300 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                        No, cancel
                      </button>
                      <button type="submit" class="py-2 px-3 text-sm font-medium text-center text-white bg-red-600 rounded-lg hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-red-900">
                        Yes, I'm sure
                      </button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          @endforeach

      </table>
    </div>
  </div>
</x-app-layout>
