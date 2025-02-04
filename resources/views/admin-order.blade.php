<x-admin-layout>
    <div class="p-5 flex flex-col gap-y-6">
        <span class="font-bold text-5xl text-center">Orders</span>
  
        <table class="border-collapse">
          <thead>
            <tr>
              <th class="border-2 border-black bg-black text-white w-1/12">
                ID
              </th>
              <th class="border-2 border-black bg-black text-white w-2/12">
                Username
              </th>
              <th class="border-2 border-black bg-black text-white w-2-12">
                Tanggal Beli
              </th>
              <th class="border-2 border-black bg-black text-white w-1/12">
                Status
              </th>
              <th class="border-2 border-black bg-black text-white w-2/12">
                Total
              </th>
              <th class="border-2 border-black bg-black text-white w-4/12">
                Aksi
              </th>
            </tr>
          </thead>
          <tbody>
            @foreach ($pesanans as $p)
            <tr>
                <td class="border-2 border-black text-center p-1">{{$p->id}}</td>
                <td class="border-2 border-black text-center p-1">{{$p->user->name}}</td>
                <td class="border-2 border-black text-center p-1">{{$p->created_at->format('G:i d/m/y')}}</td>
                {{-- <td class="border-2 border-black text-center p-1">22:12 2/3/2025</td> --}}
                <td class="border-2 border-black text-center p-1">{{$p->status}}</td>
                <td class="border-2 border-black text-center p-1">Rp {{number_format($p->total_harga)}}</td>
                <td class="border-2 border-black p-1">
                  <div class="flex justify-around">
                    <button data-koordinat="{{$p->user->koordinat}}" data-alamat="{{$p->user->alamat}}" class="alamat-toggle || px-2 py-0.5 font-normal bg-orange-500">
                      Alamat
                    </button>
                    <a href="/set-status/{{$p->id}}?status=batal" class="px-2 py-0.5 font-normal bg-red-500">
                      Hapus
                    </a>
                    <button data-id_order="{{$p->id}}" class="status-toggle || px-2 py-0.5 font-normal bg-green-500">
                      Set Status
                    </button>
                    <button data-id_order="{{$p->id}}" class="detail-toggle || px-2 py-0.5 font-normal bg-sky-500">
                      Detail
                    </button>
                  </div>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
    </div>


    {{-- set status --}}
    <div id="blurer" class="fixed inset-0 backdrop-blur-sm hidden"></div>
    <div id="status-changer" class="fixed top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 p-8 bg-black text-white hidden flex-col gap-y-5 rounded">
      <svg
        id="status-toggle-closer"
        xmlns="http://www.w3.org/2000/svg"
        fill="none"
        viewBox="0 0 24 24"
        strokeWidth={1.5}
        stroke="currentColor"
        class="size-6 absolute top-4 right-4 hover:fill-red-500 cursor-pointer"
      >
        <path
          strokeLinecap="round"
          strokeLinejoin="round"
          d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"
        />
      </svg>

      <span class="text-center font-bold text-2xl">Set Status Ke</span>
      <div class="flex gap-x-6">
        <a id="pengemasan" class="px-4 py-1 cursor-pointer bg-red-500">
          Pengemasan
        </a>
        <a id="dikirim" class="px-4 py-1 cursor-pointer bg-orange-500">
          Dikirim
        </a>
        <a id="selesai" class="px-4 py-1 cursor-pointer bg-emerald-500">
          Selesai
        </a>
      </div>
    </div >
    {{-- set status end --}}


    {{-- alamat --}}
    <div
      id="alamat"
      class="fixed top-1/2 overflow-y-auto max-h-[80vh] left-1/2 -translate-x-1/2 -translate-y-1/2 p-4 bg-stone-400 hidden flex-col gap-y-5 rounded border-2 border-black"
    >
      <div>
        <span class="block font-bold text-lg">Koordinat</span>
        <span id="koordinat" class="block">-5.123, 192.3213</span>
      </div>
      <div>
        <span class="block font-bold text-lg">Jalan</span>
        <span id="jalan" class="block">Kecamatan Tamalanrea, Pondok Indah</span>
      </div>
    </div>
    {{-- alamat end --}}

    {{-- detail --}}
    <div id="detail" class="fixed top-1/2 overflow-y-auto max-h-[80vh] left-1/2 -translate-x-1/2 -translate-y-1/2 p-4 bg-stone-400 flex-col gap-y-5 rounded border-2 border-black hidden">
      <span class="font-bold text-4xl text-center">Detail</span>
      <div id="order-detail-displayer" class="grid grid-cols-2 gap-y-5 justify-items-center items-center"></div>
    </div>
    {{-- detail end --}}

    <script src="/js/admin-order.js"></script>
</x-admin-layout>