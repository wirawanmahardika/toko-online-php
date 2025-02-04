<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Signup</title>

    {{-- fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

    @vite('resources/css/app.css')
</head>
<body class="font-jost">
    <div class="w-2/5 mx-auto min-h-screen center">
        <form method="post" action="/signup" class="flex flex-col gap-y-2 w-full">
            @csrf
            <span class="font-bold text-3xl">Create New Account</span>
            @if (session()->has("message"))
                <span id="message" class="text-center bg-green-300 px-3 py-1 rounded mb-10 ">{{session()->get('message')}}</span>
            @else
                <span id="message" class="text-gray-500 mb-10 ">Please enter details</span>
            @endif

            <div class="flex flex-col gap-y-2">
                <label for="name">Nama</label>
                <input value="{{old('name')}}" type="name" name="name" placeholder="masukkan nama..." class="py-1 rounded-lg outline-none border-2 focus-within:border-gray-400 border-black px-2 ">
                @if ($errors->has("name")) <span class="mt-1 text-red-500 italic text-sm">{{$errors->first('name')}}</span> @endif
            </div>

            <div class="flex flex-col gap-y-2">
                <label for="email">Email</label>
                <input value="{{old('email')}}" type="email" name="email" placeholder="masukkan email..." class="py-1 rounded-lg outline-none border-2 focus-within:border-gray-400 border-black px-2 ">
                @if ($errors->has("email")) <span class="mt-1 text-red-500 italic text-sm">{{$errors->first('email')}}</span> @endif
            </div>

            <div class="flex flex-col gap-y-2">
                <label for="alamat">Alamat</label>
                @if ($errors->has("alamat")) <span class="text-red-500 italic text-sm">{{$errors->first('alamat')}}</span> @endif
                @if ($errors->has("koordinat")) <span class="text-red-500 italic text-sm">{{$errors->first('koordinat')}}</span> @endif
                <div class="flex gap-x-4">
                    <input value="{{old('alamat')}}" type="text" name="alamat" placeholder="tempat (jakarta raya, indonesia)" class="py-1 rounded-lg w-1/2 outline-none border-2 focus-within:border-gray-400 border-black px-2 ">
                    <input value="{{old('koordinat')}}" type="text" name="koordinat" placeholder="koordinat (5.123123, 195.123124)" class="py-1 rounded-lg w-1/2 outline-none border-2 focus-within:border-gray-400 border-black px-2 ">
                </div>
            </div>

            <div class="flex flex-col gap-y-2">
                <label for="password">Password</label>
                <input type="password" name="password" placeholder="masukkan password..." class="py-1 rounded-lg outline-none border-2 focus-within:border-gray-400 border-black px-2 ">
                @if ($errors->has("password")) <span class="mt-1 text-red-500 italic text-sm">{{$errors->first('password')}}</span> @endif
            </div>

            <button type="submit" class="bg-black rounded-xl mt-4 text-white py-2">Sign Up</button>
            <span class="mt-5 text-gray-700">Sudah Punya Akun? Login <a href="/login" class=" font-bold text-blue-600">disini</a></span>

            <span class="text-gray-700">Kembali ke <a href="/" class=" font-bold text-blue-600">Home</a></span>
        </form>

    </div>
</body>
</html>