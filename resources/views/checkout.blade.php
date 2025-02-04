<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <div class="flex">
        <div class="basis-3/4 p-10 flex flex-col gap-y-4">
            <span class="text-3xl">Checkout</span>
            @if (count($items) !== 0)
                <a href="/empty-cart" class="px-4 py-1 rounded text-white bg-red-600 w-fit">Kosongkan</a>
            @endif

            <table class="w-full">
                <thead>
                    <tr class="border-b-2 border-black text-left">
                        <th class="w-2/5">Product</th>
                        <th class="w-1/5">Price</th>
                        <th class="w-1/5">Quantity</th>
                        <th class="w-1/5">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($items as $item)
                        <tr class="border-b-2 border-black text-left">
                            <td class="py-2 flex items-center gap-x-9">
                                <img src="{{ $item['imageUrl'] }}" alt="{{ $item['name'] }}" class="w-1/12">
                                <span>{{ $item['name'] }}</span>
                            </td>
                            <td>Rp {{ number_format($item['harga']) }}</td>
                            <td>{{ $item['kuantitas'] }}</td>
                            <td>
                                <a class="px-4 py-1 rounded text-white bg-red-600 mx-auto"
                                    href="/delete-item-cart/{{ $item['id'] }}">
                                    Delete
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            @if (count($items) === 0)
                <span class="italic text-xl font-semibold text-red-500 text-center">Belum ada item dikeranjang</span>
            @endif

        </div>
        <div class="basis-1/4 ">
            <div class="mt-10 p-5 bg-[#d9d9d9] w-3/4 flex flex-col gap-y-1">
                <span class="font-bold ">Total Harga Product</span>
                <span>Rp {{ number_format($totalHarga) }}</span>
                <span class="font-bold ">Ongkos Pengantaran</span>
                <span>Rp 20,000</span>

                <form action="/order" method="post" class="w-3/5 mx-auto">
                    @csrf
                    @if (count($items) > 0)
                        <button type="submit"
                            class="hover:bg-gray-700 bg-black rounded px-5 mt-4 py-1 mx-auto text-white font-semibold w-full">
                            Start COD
                        </button>
                    @else
                        <button disabled type="submit"
                            class="bg-black rounded px-5 mt-4 py-1 mx-auto text-white font-semibold w-full">
                            Start COD
                        </button>
                    @endif
                </form>
            </div>
        </div>
    </div>
</x-layout>
