<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      Product &raquo; {{ $Product->name }} &raquo; Gallery &raquo;Upload Photos
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      @if ($errors->any())
      <div class="mb-5" role="alert">
        <div class="bg-red-500 text-white font-bold rounded-t px-4 py-2">
          There's Something Wrong
        </div>
        <div class="border border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700">
          <p>
          <ul>
            @foreach ($errors->all() as $error)
            <li> {{ $error }} </li>
            @endforeach
          </ul>
          </p>
        </div>
      </div>
      @endif
      <form action="{{ route('dashboard.product.gallery.store', $Product->id) }}" class="w-full p-2" method="post"
        enctype="multipart/form-data">
        @csrf
        <div class="flex flex-wrap -mx-3 mb-6 ">
          <div class="w-full px-3">
            <label for="" class="block uppercase tracking-white text-gray-700 text-xs font-bold mb-2">Photos</label>
            <input type="file" placeholder="Photos" multiple accept="image/*" name="files[]"
              class="block w-full bg-gray-200 text-gray-700 border boder-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
          </div>
        </div>

        <div class="flex flex-wrap -mx-3 mb-6 ">
          <div class="w-full px-3 flex justify-end">
            <button type="submit"
              class="bg-green-500 hover:bg-green-400 text-white font-bold py-2 px-4 rounded shadow-lg ">
              Save Gallery
            </button>
          </div>
        </div>
    </div>
    </form>
  </div>
  </div>
</x-app-layout>