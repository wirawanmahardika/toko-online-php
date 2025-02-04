<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>

    {{-- fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

    @vite('resources/css/app.css')
</head>
<body class="font-jost">
    <div class="w-2/5 mx-auto h-screen center">
        <form method="post" action="/login" class=" flex flex-col gap-y-2 w-full">
            @csrf
            <span class="font-bold text-3xl text-center">Welcome</span>
            <span id="message" class="text-gray-500 mb-10">Please Login Here</span>

            <div class="flex flex-col gap-y-2">
                <label for="email">Email Adress</label>
                <input value="{{old('email')}}" type="email" name="email" class="py-1 rounded-lg outline-none border-2 focus-within:border-gray-400 border-black px-2 ">
                @if ($errors->has("email")) <span class="mt-1 text-red-500 italic text-sm">{{$errors->first('email')}}</span> @endif
            </div>

            <div class="flex flex-col gap-y-2">
                <label for="password">Password</label>
                <input type="password" name="password" class="py-1 rounded-lg outline-none border-2 focus-within:border-gray-400 border-black px-2 ">
                @if ($errors->has("password")) <span class="mt-1 text-red-500 italic text-sm">{{$errors->first('password')}}</span> @endif
            </div>

            <button type="submit" class="bg-black rounded-xl mt-4 text-white py-2">Login</button>

            <span class="mt-5 text-gray-700">Belum punya akun? Daftar <a href="/signup" class=" font-bold text-blue-600">disini</a></span>
            <span class="text-gray-700">Kembali ke <a href="/" class=" font-bold text-blue-600">Home</a></span>
        </form>
    </div>
    {{-- <script src="/js/login.js"></script> --}}
</body>
</html>