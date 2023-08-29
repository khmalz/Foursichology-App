<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Foursichology</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="Foursichology" name="keywords" />
    <meta content="Provide information about the importance of mental health" name="description" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('frontend/plugins/fontawesome-free/css/all.min.css') }}">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="flex min-h-screen items-center justify-center bg-slate-200">
    <div
        class="w-[90%] border bg-white p-5 shadow-2xl md:flex md:h-auto md:w-1/2 md:flex-col md:justify-center md:rounded-lg md:rounded-r-none lg:w-1/3">
        <h1 class="font-poppins mb-2 text-2xl font-light">Login</h1>
        <hr class="mb-4 border border-t-0 border-slate-200" />
        @if ($errors->any())
            <p class="mt-2 text-center text-red-600">The credentials were invalid</p>
        @endif
        <form action="{{ route('login') }}" method="post">
            @csrf
            <div class="mb-4">
                <label for="name" class="font-poppins mb-2 block text-sm font-semibold text-slate-700">Email</label>
                <input autofocus type="text"
                    class="w-full rounded-lg px-4 py-2 text-slate-800 placeholder:text-sm placeholder:text-slate-600/50 focus:border-emerald-700/90 focus:outline-none focus:ring-emerald-700/90"
                    placeholder="Input Your Email" id="email" name="email" value="{{ old('email') }}" />
            </div>
            <div class="mb-4">
                <label for="password"
                    class="font-poppins mb-2 block text-sm font-semibold text-slate-700">Password</label>
                <input type="password"
                    class="w-full rounded-lg px-4 py-2 text-slate-800 placeholder:text-sm placeholder:text-slate-600/50 focus:border-emerald-700/90 focus:outline-none focus:ring-emerald-700/90"
                    placeholder="Input Your Password" id="password" name="password" />
            </div>
            <div class="mb-4 flex items-center justify-between md:mb-2">
                <a href="{{ route('password.request') }}" class="text-sm text-emerald-700 hover:text-emerald-800">Forgot
                    Your Password?</a>
                <a href="{{ route('register') }}" class="text-sm text-emerald-700 hover:text-emerald-800">Don't
                    Have an Account?</a>
            </div>
            <button type="submit"
                class="w-1/4 place-self-end rounded bg-emerald-600/90 px-4 py-1.5 text-white transition duration-300 hover:bg-emerald-700/90 focus:outline-none md:mt-5">
                Login
            </button>
        </form>

        <a href="{{ route('home') }}" class="mt-6 flex items-center gap-x-1 text-[13px]"><span>&larr;</span> Back To
            Home</a>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.0.min.js"
        integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.0/flowbite.min.js"></script>
</body>

</html>
