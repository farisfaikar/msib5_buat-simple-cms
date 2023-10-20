@props(['news', 'image', 'headline', 'content'])

<a href="{{ route('news.show', $news) }}" class="flex flex-col gap-6 scale-100 p-6 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
  <div>
    <script>
      const deleteSkeleton = (index) => {
        console.log(index);
        const skeletonImage = document.getElementById("skeleton-image-" + index);
        console.log(skeletonImage);
        skeletonImage.remove();
      }
    </script>
    <div class="max-h-72 overflow-y-hidden rounded bg-gray-900">
      <img src="{{ $image }}" alt="{{ $headline }}" onload="deleteSkeleton({{ $index }})" />
    </div>
    <div id="skeleton-image-{{ $index }}" role="status" class="flex items-center justify-center h-56 w-full bg-gray-300 rounded-lg animate-pulse dark:bg-gray-700">
      <svg class="w-10 h-10 text-gray-200 dark:text-gray-600" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 20">
        <path d="M5 5V.13a2.96 2.96 0 0 0-1.293.749L.879 3.707A2.98 2.98 0 0 0 .13 5H5Z" />
        <path d="M14.066 0H7v5a2 2 0 0 1-2 2H0v11a1.97 1.97 0 0 0 1.934 2h12.132A1.97 1.97 0 0 0 16 18V2a1.97 1.97 0 0 0-1.934-2ZM9 13a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-2a2 2 0 0 1 2-2h2a2 2 0 0 1 2 2v2Zm4 .382a1 1 0 0 1-1.447.894L10 13v-2l1.553-1.276a1 1 0 0 1 1.447.894v2.764Z" />
      </svg>
      <span class="sr-only">Loading...</span>
    </div>
  </div>

  <div class="flex justify-between">
    <div class="flex flex-col gap-4">
      <h2 class="text-xl font-semibold text-gray-900 dark:text-white">{{ $headline }}</h2>

      <p class="text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
        {{ $content }}
      </p>
    </div>
    <!-- Arrow Icon -->
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="self-start shrink-0 stroke-red-500 w-6 h-6 mx-6">
      <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75" />
    </svg>
  </div>
</a>
