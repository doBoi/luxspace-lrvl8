<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      Product &raquo; {{ $Product->name }} &raquo; Gallery
    </h2>
  </x-slot>

  <x-slot name="script">
    <script>
      // Ajax Datatables
      var datatable = $('#crudTable').DataTable({
        ajax:{
        url: '{!! url()->current() !!}'
      },
      columns:[
        {data:'id', name:'id', width:'5%'},
        {data:'url', name:'url', class:"text-center"},
        {data:'is_featured', name:'is_featured', class:"text-center",},
        {
          data:'action',
          name:'action',
          orderable:'false',
          searchable:'false',
          width:'25%'
        }
      ]
      })
    </script>
  </x-slot>

  <div class="py-12 px-2">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="mb-10">
        <a href="{{ route('dashboard.product.gallery.create', $Product->id) }}"
          class="bg-green-500 hover:bg-green-400 text-black font-bold py-2 px-4 rounded shadow-lg">
          + Upload Photos
        </a>
      </div>
      <div class="shadow overflow-hidden sm-rounded-md">
        <div class="px-4 py-5 bg-white sm:p-6">
          <table id="crudTable">
            <thead>
              <tr>
                <th>ID</th>
                <th>Photo</th>
                <th>Featured</th>
                <th>Aksi</th>
              </tr>
            <tbody class="pb-2"></tbody>
            </thead>
          </table>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>