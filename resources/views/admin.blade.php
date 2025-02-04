<x-admin-layout>
    <main class="p-3 flex flex-col w-full gap-y-8 bg-slate-300 min-h-screen">
        <div class="w-full space-y-5 bg-white p-5 rounded">
          <span class="font-bold text-4xl">Entities</span>
          <div class="flex justify-between w-full justify-items-center">
            <div class="w-1/5 h-32 rounded p-4 text-slate-200 shadow flex flex-col justify-center gap-y-2 items-center bg-red-600">
                <span class="font-bold text-xl">{{$customer}}</span>
                <span class="font-bold text-xl">Customers</span>
            </div>

            <div class="w-1/5 h-32 rounded p-4 text-slate-200 shadow flex flex-col justify-center gap-y-2 items-center bg-orange-600">
                <span class="font-bold text-xl">{{$kategori}}</span>
                <span class="font-bold text-xl">Categories</span>
            </div>

            <div class="w-1/5 h-32 rounded p-4 text-slate-200 shadow flex flex-col justify-center gap-y-2 items-center bg-emerald-600">
                <span class="font-bold text-xl">{{$item}}</span>
                <span class="font-bold text-xl">Items</span>
            </div>
          </div>
        </div>
        <div class="w-full space-y-5 bg-white p-5 rounded">
          <span class="font-bold text-4xl">Incoming Order</span>
          <table class="table-auto border-collapse border-black border-2 w-full">
            <thead>
              <tr class="bg-black text-white">
                <th class="border-2 border-black">No</th>
                <th class="border-2 border-black">Customer</th>
                <th class="border-2 border-black">Tanggal Beli</th>
                <th class="border-2 border-black">Jumlah Item</th>
                <th class="border-2 border-black">Total</th>
              </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="border-2 border-black text-center">1</td>
                    <td class="border-2 border-black text-center">
                      wira
                    </td>
                    <td class="border-2 border-black text-center">
                      2/3/2025
                    </td>
                    <td class="border-2 border-black text-center">
                      25
                    </td>
                    <td class="border-2 border-black text-center">
                      Rp 200.000
                    </td>
                  </tr>
            </tbody>
          </table>
        </div>
      </main>
</x-admin-layout>