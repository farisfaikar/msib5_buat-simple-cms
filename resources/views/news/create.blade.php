<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
      {{ __('Create News') }}
    </h2>
  </x-slot>

  <!-- News Form -->
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
    <form method="post" action="{{ route('news.store') }}" class="mt-6 space-y-6">
      @csrf

      <div>
        <x-image-upload name="image" />
      </div>

      <div>
        <x-input-label for="headlineInput" :value="__('Headline')" />
        <x-text-input id="headlineInput" name="headline" type="text" class="mt-1 block w-full" required autofocus autocomplete="headline" />
        <x-input-error class="mt-2" :messages="$errors->get('headline')" />
      </div>

      <div>
        <x-input-label for="contentInput" :value="__('Content')" />
        <x-text-area id="contentInput" name="content" rows="10" class="mt-1 block w-full" required autofocus autocomplete="content" />
        <x-input-error class="mt-2" :messages="$errors->get('content')" />
      </div>

      <div>
        <x-input-label for="userUuidInput" :value="__('Author')" />
        <x-select name="user_uuid" id="userUuidInput">
          <option value="" disabled selected>-- Select Author --</option>
          @foreach ($users as $user)
            <option value="{{ $user->uuid }}">{{ $user->name }}</option>
          @endforeach
        </x-select>
      </div>

      <div class="flex items-center gap-4">
        <x-primary-button>{{ __('Post News') }}</x-primary-button>
      </div>
    </form>
  </div>

</x-app-layout>
