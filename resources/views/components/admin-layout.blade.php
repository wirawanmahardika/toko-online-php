<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin</title>

    {{-- fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">


    @vite('resources/css/app.css')
</head>
<body class="font-jost">
    <div class="w-full h-screen flex font-jost overflow-hidden">
        <div class="overflow-hidden bg-stone-900 w-1/6">
            <nav class="w-full flex flex-col text-gray-200">
                <div class="items-center flex justify-center gap-x-3 p-3  bg-black">
                <span class="font-bold text-gray-200 text-2xl text-center">
                    Admin
                </span>
                </div>
        
                <a href="/admin" class="hover:text-sky-600 hover:bg-slate-800 bg-black border-y border-stone-700 p-1 flex justify-between px-2 items-center cursor-pointer">
                    Home
                </a>
        
                <a href="/admin/order" class="hover:text-sky-600 hover:bg-slate-800 bg-black border-y border-stone-700 p-1 flex justify-between px-2 items-center cursor-pointer">
                    Order
                </a>
        
            <div class="hover:text-sky-600 hover:bg-slate-800 bg-black border-y border-stone-700 p-1 flex justify-between px-2 items-center cursor-pointer">
                <span class="">Category</span>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
                </svg>          
            </div>
        
            <div class="flex flex-col font-quicksand px-4 overflow-hidden ${height} py-1">
                <a href="/admin/category">Lihat</a>
                <a href="/admin/category/tambah">Tambah</a>
                <a href="/admin/category/edit">Edit</a>
            </div>
        
            <div class="hover:text-sky-600 hover:bg-slate-800 bg-black border-y border-stone-700 p-1 flex justify-between px-2 items-center cursor-pointer">
                <span class="">Item</span>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
                </svg>          
            </div>
        
            <div class="flex flex-col font-quicksand px-4 overflow-hidden ${height} py-1">
                <a href="/admin/item">Lihat</a>
                <a href="/admin/item/tambah">Tambah</a>
                <a href="/admin/item/edit">Edit</a>
            </div>
            </nav>
        </div>

        <div class="overflow-y-auto w-5/6">
          <div class="w-full h-[8vh] bg-sky-700 flex p-4 items-center justify-between gap-x-3">
            <div class="gap-x-5 items-center flex">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                </svg>              
              <span class="font-bold text-xl text-white">MiniShop</span>
            </div>
            <form action="/logout" method="post">
                @csrf
                <button type="submit" class="px-8 py-1 rounded text-white bg-black">Logout</button>
            </form>
          </div>

          {{$slot}}
        </div>
    </div>
</body>
</html>