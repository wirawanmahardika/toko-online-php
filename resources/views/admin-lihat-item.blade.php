<x-admin-layout>
    <div class="w-full p-5 grid grid-cols-3 gap-5 overflow-y-auto ">
        <span class="col-span-3 font-bold text-5xl text-center">Items</span>

        @foreach ($items as $i)
            <div
                class="hover:bg-slate-600 p-5 flex flex-col gap-y-5 items-center border-2 border-black rounded-lg shadow-lg h-full justify-end">
                <img class="max-w-[66%]" src="{{ $i->imageUrl }}" alt={{ $i->name }} />
                <div class="flex flex-col items-start w-full gap-y-3">
                    <span class="font-bold text-4xl self-center text-center">
                        {{ $i->name }}
                    </span>
                    <div class="w-full grid grid-cols-2 gap-1 justify-items-start">
                        <span>ID : {{ $i->id }}</span>
                        <span>Category : {{ $i->kategori->name }}</span>
                        <span>Stock : {{ $i->stok }}</span>
                        <span>Price : Rp {{ number_format($i->harga) }}</span>
                    </div>
                </div>
                <form method="post" action="/admin/item/delete/{{ $i->id }}">
                    @csrf
                    <button type="submit" class="px-3 py-1 bg-black text-white rounded">Delete</button>
                </form>
            </div>
        @endforeach
    </div>

</x-admin-layout>
