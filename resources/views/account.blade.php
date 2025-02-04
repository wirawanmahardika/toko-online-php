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

        <span class="font-bold text-lg">Name</span>
        <div class="rounded bg-[#d9d9d9] px-3 py-1 w-3/5">{{$name}}</div>

        <span class="font-bold text-lg mt-5">Email</span>
        <div class="rounded bg-[#d9d9d9] px-3 py-1 w-3/5">{{$email}}</div>

        <span class="font-bold text-lg mt-5">Alamat</span>
        <div class="rounded bg-[#d9d9d9] px-3 py-1 w-3/5">
            <span>Koordinat : {{$koordinat}}</span> <br>
            <span>{{$alamat}}</span>
        </div>
    </div>
</x-layout>
