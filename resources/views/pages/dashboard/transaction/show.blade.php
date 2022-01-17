<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      Transaction &raquo; #{{ $transaction->id }} {{ $transaction->name }}
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
        {data:'product.name', name:'product.name', class:"text-center"},
        {data:'product.price', name:'product.price', class:"text-center",},
      ]
      })
    </script>
  </x-slot>

  <div class="py-12 px-2">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <h2 class="font-semibold text-lg text-gray-800 leading-tight mb-5">
        Transaction Detail
      </h2>
      <div class="bg-white overflow-hidden shadow sm:rounded-lg mb-10">
        <div class="p-6 bg-white border-b border-gray-200">
          <table class="table-auto w-full">
            <tbody>
              <tr>
                <th class="border px-6 py-4 text-right">Name</th>
                <td class="border px-6 py-4 font-semibold">{{ $transaction->name }}</td>
              </tr>
              <tr>
                <th class="border px-6 py-4 text-right">Email</th>
                <td class="border px-6 py-4 font-semibold">{{ $transaction->email }}</td>
              </tr>
              <tr>
                <th class="border px-6 py-4 text-right">Address</th>
                <td class="border px-6 py-4 font-semibold">{{ $transaction->address }}</td>
              </tr>
              <tr>
                <th class="border px-6 py-4 text-right">Phone</th>
                <td class="border px-6 py-4 font-semibold">{{ $transaction->phone }}</td>
              </tr>
              <tr>
                <th class="border px-6 py-4 text-right">Courier</th>
                <td class="border px-6 py-4 font-semibold">{{ $transaction->courier }}</td>
              </tr>
              <tr>
                <th class="border px-6 py-4 text-right">Payment</th>
                <td class="border px-6 py-4 font-semibold">{{ $transaction->payment }}</td>
              </tr>
              <tr>
                <th class="border px-6 py-4 text-right">Payment Url</th>
                <td class="border px-6 py-4 font-semibold">{{ $transaction->payment_url }}</td>
              </tr>
              <tr>
                <th class="border px-6 py-4 text-right">Total Harga</th>
                <td class="border px-6 py-4 font-semibold">Rp{{ number_format($transaction->total_price) }}</td>
              </tr>
              <tr>
                <th class="border px-6 py-4 text-right">Status</th>
                <td class="border px-6 py-4 font-semibold">{{ $transaction->status }}</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>

      <h2 class="font-semibold text-lg text-gray-800 leading-tight mb-5">
        Transaction Item
      </h2>
      <div class="shadow overflow-hidden sm-rounded-md">
        <div class="px-4 py-5 bg-white sm:p-6">
          <table id="crudTable">
            <thead>
              <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Harga</th>
              </tr>
            <tbody class="pb-2"></tbody>
            </thead>
          </table>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>