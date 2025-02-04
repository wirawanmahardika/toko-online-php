<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <div class="grid grid-cols-3 p-10 gap-5 justify-items-stretch">
        <form action="/shop" class="row-span-2 bg-[#d9d9d9] text-center flex flex-col p-3">
            <span class="text-xl my-3">Product Name</span>
            <input name="name" type="text" value="{{ request('name') }}"
                class="outline-none w-4/5 mx-auto rounded py-2 px-2">

            <span class="text-xl my-3">Category</span>
            <select name="kategori" type="text" class="outline-none w-4/5 mx-auto rounded py-2 px-2">
                <option selected value="">-- None --</option>
                @foreach ($kategoris as $k)
                    @if (request('kategori') === $k->name)
                        <option selected value="{{ $k->name }}">{{ $k->name }}</option>
                    @else
                        <option value="{{ $k->name }}">{{ $k->name }}</option>
                    @endif
                @endforeach
            </select>

            <span class="text-xl my-3">Price</span>
            <div class="flex flex-col">
                <span class="text-gray-600 text-left ml-10 mt-5">From</span>
                <input name="from" value="" type="number"
                    class="outline-none w-4/5 mx-auto rounded py-2 px-2">
                <span class="text-gray-600 text-left ml-10">To</span>
                <input name="to" value="" type="number"
                    class="outline-none w-4/5 mx-auto rounded py-2 px-2">
            </div>
            <button type="submit" class="bg-black w-4/5 rounded mx-auto px-5 mt-6 text-white py-2">Apply</button>
        </form>

        @foreach ($items as $item)
            <div data-harga="{{ $item->harga }}" data-id="{{ $item->id }}" data-image="{{ $item->image }}"
                data-nama="{{ $item->name }}" data-stok="{{ $item->stok }}"
                class="flex justify-center flex-col gap-y-1 w-4/5">
                <div class="bg-[#d9d9d9] flex items-center justify-center p-5">
                    <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->name }}" class="w-3/5">
                </div>
                <span class="font-bold text-xl">{{ $item->name }}</span>
                <span>Stock : {{ $item->stok }}</span>
                <span>Price : Rp {{ number_format($item->harga) }}</span>
                <button class="btn-order || rounded px-10 py-1 bg-black text-white w-fit">Order</button>
            </div>
        @endforeach
    </div>

    <div id="blurrer" class="fixed inset-0 bg-black opacity-40 hidden">
    </div>
    <div id="checkout" class="fixed top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 bg-white w-2/5 p-8 hidden">
        <img id="item_image" alt="produk" class="w-1/2">
        <form method="POST" action="/checkout"
            class="flex items-center justify-center w-1/2 flex-col gap-y-5 font-bold">
            @csrf
            <span id="item_nama" class="text-xl"></span>
            {{-- <span class="text-lg font-normal">Stock : 10</span> --}}
            <div class="flex gap-x-3">
                <div id="minus" class="cursor-pointer text-xl w-8 text-center bg-red-700 rounded">-</div>
                <span id="kuantitas-displayer" class="text-lg">0</span>

                <input id="kuantitas" name="kuantitas" type="hidden" value="0">
                <input id="item_id" type="hidden" name="item_id">
                <input id="item_harga" type="hidden" name="item_harga">

                <div id="plus" class="cursor-pointer text-xl w-8 text-center bg-green-600 rounded">+</div>
            </div>
            <button type="submit" class="px-4 py-1 bg-black font-semibold text-white rounded">Checkout</button>
        </form>
    </div>

    <script src="/js/shop.js"></script>
</x-layout>
