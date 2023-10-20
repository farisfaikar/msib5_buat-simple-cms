<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
      {{ __('Edit News') }}
    </h2>
  </x-slot>

  <!-- News Form -->
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <div class="bg-gray-800 p-4 sm:p-8 rounded-lg">
      {{-- @dd($news) --}}
      <form method="post" enctype="multipart/form-data" action="{{ route('news.update', $news) }}" class="flex flex-col gap-6 max-w-xl">
        @method('patch')
        @csrf

        <div class="mt-0">
          <label id="skeleton-image" for="input-image" class="flex items-center justify-center h-56 w-full bg-gray-300 rounded-lg dark:bg-gray-700 hover:bg-gray-500 hover:cursor-pointer">
            <svg class="w-10 h-10 fill-gray-400" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="100" height="100" viewBox="0 0 50 50">
              <path d="M25,2C12.317,2,2,12.317,2,25s10.317,23,23,23s23-10.317,23-23S37.683,2,25,2z M37,26H26v11h-2V26H13v-2h11V13h2v11h11V26z"></path>
            </svg>
            <span class="sr-only">Upload Image</span>
          </label>
          {{-- @foreach ($news->media as $image)
            <input type="file" name="image" id="input-image" accept="image/png, image/jpeg" value="{{ $image->getUrl() }}" hidden required>
          @endforeach --}}
          <input type="file" name="image" id="input-image" accept="image/png, image/jpeg" hidden required>
        </div>

        <div>
          <x-input-label for="headlineInput" :value="__('Headline')" />
          <x-text-input id="headlineInput" name="headline" type="text" class="mt-1 block w-full" required autofocus autocomplete="headline" value="{{ $news->headline }}" />
          <x-input-error class="mt-2" :messages="$errors->get('headline')" />
        </div>

        <div>
          <x-input-label for="contentInput" :value="__('Content')" />
          <x-text-area id="contentInput" name="content" rows="10" class="mt-1 block w-full" required autofocus autocomplete="content" placeholder="{{ $news->content }}" />
          <x-input-error class="mt-2" :messages="$errors->get('content')" />
        </div>

        <div>
          <x-input-label for="userUuidInput" :value="__('Author')" />
          <x-select name="user_uuid" id="userUuidInput">
            <option value="" disabled selected>-- Select Author --</option>
            @foreach ($users as $user)
              <option value="{{ $user->uuid }}" {{ $user->uuid === $news->user_uuid ? 'selected' : '' }}>{{ $user->name }}</option>
            @endforeach
          </x-select>
        </div>

        <div class="flex items-center gap-4">
          <x-primary-button>{{ __('Post News') }}</x-primary-button>
        </div>
      </form>
    </div>
  </div>


</x-app-layout>
