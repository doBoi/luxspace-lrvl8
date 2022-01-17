<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Transation') }}
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
        {data:'name', name:'name', class:"text-center"},
        {data:'phone', name:'phone', class:"text-center"},
        {data:'courier', name:'courier', class:"text-center"},
        {data:'total_price', name:'total_price', class:"text-center",},
        {data:'status', name:'status', class:"text-center",},
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
      <div class="shadow overflow-hidden sm-rounded-md">
        <div class="px-4 py-5 bg-white sm:p-6">
          <table id="crudTable">
            <thead>
              <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Phone</th>
                <th>Courier</th>
                <th>Total_Harga</th>
                <th>Status</th>
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