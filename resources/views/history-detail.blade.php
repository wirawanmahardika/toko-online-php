<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
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

        <span class="font-bold text-lg">Pesanan Pada {{ $date }}</span>
        <table class="w-4/5 mt-5">
            <thead>
                <tr class="border-b-2 border-black text-left">
                    <th class="w-3/6">Product</th>
                    <th class="w-2/6">Price</th>
                    <th class="w-1/6">Quantity</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($items as $i)
                    <tr class="border-b-2 border-black text-left">
                        <td class="py-2 flex items-center gap-x-9">
                            <img src="{{ $i->imageUrl }}" alt="{{ $i->name }}" class="w-1/12">
                            <span>{{ $i->name }}</span>
                        </td>
                        <td>Rp {{ number_format($i->pivot->harga) }}</td>
                        <td>{{ $i->pivot->kuantitas }}</td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</x-layout>
