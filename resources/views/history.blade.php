<x-layout>
    <x-slot:title>{{$title}}</x-slot:title>
    <div class="p-10 w-full flex flex-col">
        <span class="text-xl">My Profile</span>

        <div class="mt-3 flex gap-x-9 mb-7">
            <a href="/account" class="px-4 py-1 rounded text-white bg-black">Personal Information</a>
            <a href="/account/history" class="px-4 py-1 rounded text-white bg-black">Riwayat Pesanan</a>
            <form action="/logout" method="post">
                @csrf
                <button type="submit" class="px-8 py-1 rounded text-white bg-red-800">Logout</button>
            </form>
        </div>

        <span class="font-bold text-xl">History</span>
        <table class="w-4/5 mt-5">
            <thead>
                <tr class="border-b-2 border-black text-left">
                    <th class="w-2/6">Date</th>
                    <th class="w-1/6">Status</th>
                    <th class="w-1/6">Total Price</th>
                    <th class="w-2/6 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pesanans as $p)
                    <tr class="border-b-2 border-black text-left">
                        <td class="py-2 flex items-center gap-x-9">{{$p->created_at->format('d/m/y')}}</td>
                        <td>{{$p->status}}</td>
                        <td>Rp {{number_format($p->total_harga)}}</td>
                        <td class="flex gap-x-3 justify-evenly">
                            <a href="/delete-order/{{$p->id}}" class="px-3 py-1 rounded text-white bg-red-500">Delete</a>
                            <a href="/account/history/{{$p->id}}" class="px-3 py-1 rounded text-white bg-green-500">Detail</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-layout>
