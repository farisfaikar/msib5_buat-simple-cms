<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
      {{ __('News Detail') }}
    </h2>
  </x-slot>

  <!-- News Form -->
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <div class="bg-gray-800 p-4 sm:p-8 rounded-lg flex flex-col gap-4">
      <div class="flex items-center gap-4 self-end">
        <a href="{{ URL::previous() }}" class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">{{ __('← Go Back') }}</a>
      </div>
      <div class="w-full max-h-80 overflow-hidden rounded-lg bg-gray-900">
        @if ($news->image !== null)
          <img src="{{ asset($news->image) }}" alt="{{ $news->headline }}" class="w-full">
        @else
          @foreach ($news->media as $image)
            <img src="{{ asset($image->getUrl()) }}" alt="{{ $news->headline }}" class="w-full">
          @endforeach
        @endif
        </label>
      </div>

      <h1 class="text-3xl text-white font-extrabold">{{ $news->headline }}</h1>
      <p class="text-white">{{ $news->content }}</p>

      <p class="text-white">By {{ $news->user->name }}</p>
    </div>
  </div>


</x-app-layout>
