@props(['name'])

<label id="skeleton-image" for="input-image" class="flex items-center justify-center h-56 w-full bg-gray-300 rounded-lg dark:bg-gray-700 hover:bg-gray-500 hover:cursor-pointer">
  <svg class="w-10 h-10 fill-gray-400" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="100" height="100" viewBox="0 0 50 50">
    <path d="M25,2C12.317,2,2,12.317,2,25s10.317,23,23,23s23-10.317,23-23S37.683,2,25,2z M37,26H26v11h-2V26H13v-2h11V13h2v11h11V26z"></path>
  </svg>
  <span class="sr-only">Upload Image</span>
</label>
<input type="file" name="{{ $name }}" id="input-image" accept="image/png, image/jpeg" hidden required>