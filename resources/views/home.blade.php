<x-layout>
    <x-slot:title>{{$title}}</x-slot:title>
    
    <div class="h-screen w-full bg-[#d9d9d9] grid grid-cols-2">
        <div class="flex items-center justify-center flex-col">
            <span class="font-bold text-3xl">GET ALL YOU NEED</span>
            <span class="text-xl">With Fantastic Price</span>
            <a href="/shop" class="mt-2 rounded bg-black px-4 py-1 text-lg text-white">Shop Now</a>
        </div>
        <div class="flex items-center justify-center">
            <img src="/img/baju.png" alt="baju">
        </div>
    </div>

    <div class="p-10 w-full">
        <span class="text-2xl">Shop By Categories</span>
        <div class="grid grid-cols-3 gap-7 w-full mt-5">

            @foreach ($kategoris as $k)
                <div class="flex relative items-center justify-center flex-col gap-y-4 p-9 bg-[#d9d9d9]">
                    <img src="{{"storage/".$k->image}}" class="w-4/5">
                    <div class="absolute bottom-3 rounded px-3 text-xl bg-black text-white py-1 font-bold">{{$k->name}}</div>
                </div>
            @endforeach
        
        </div>
    </div>

    <footer class="w-full bg-black text-white justify-center items-center flex text-sm py-2">2024 Wirawan All Rights Reserved</footer>
</x-layout>
