<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.bunny.net">
  <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

  <!-- Icon -->
  <link rel="icon" href="{{ asset('img/news-cms-icon.png') }}">

  <!-- Vite -->
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="antialiased">
  <div class="relative sm:flex sm:flex-col sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
    @if (Route::has('login'))
      <!-- Navbar -->
      <div class="flex justify-between items-center sm:sticky sm:top-0 sm:right-0 backdrop-blur-sm px-6 lg:px-8 py-4 text-right z-10 dark:bg-gray-900/50 w-full">
        <!-- Logo -->
        <a href="{{ route('home') }}" class="flex items-center gap-4 hover:bg-gray-800 rounded p-2 focus:outline-red-500 focus:outline focus:outline-2">
          <x-application-logo class="w-auto h-8 stroke-red-500" />
          <h1 class="font-semibold text-gray-600 dark:text-gray-400 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">News CMS</h1>
        </a>
        <div>
          @auth
            <a href="{{ url('/dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
          @else
            <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>

            @if (Route::has('register'))
              <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
            @endif
          @endauth
        </div>
      </div>
    @endif

    <div class="max-w-7xl min-w-full mx-auto p-6 lg:p-8">
      <div class="flex gap-4 items-center justify-start">
        <x-application-logo class="w-auto h-16 stroke-red-500" />
        <h1 class="text-4xl font-semibold text-gray-900 dark:text-white">Hottest News!</h1>
      </div>

      <div class="mt-16">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8">
          @for ($i = 0; $i < 4; $i++)
            @include('partials.news-card', [
                'link' => 'bebas.com',
                'image' => 'https://source.unsplash.com/800x400',
                'headline' => 'Lorem Ipsum',
                'content' => 'Text something idk Lorem',
            ])
          @endfor
        </div>
      </div>

      <!-- Footer -->
    </div>
  </div>
</body>

</html>
