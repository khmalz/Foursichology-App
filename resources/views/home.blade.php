<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

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

    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.css" rel="stylesheet" />
</head>

<body>
    <nav id="navbar" class="fixed left-0 top-0 z-20 w-full bg-transparent transition-all duration-700">
        <div class="mx-auto flex max-w-screen-xl flex-wrap items-center justify-between p-4">
            <a href="{{ route('home') }}" class="flex items-center">
                <span class="self-center whitespace-nowrap text-2xl font-semibold text-white"
                    id="textTitle">Foursichology</span>
            </a>
            <div class="flex md:order-2">
                @auth
                    <button type="button" id="textWelcome" data-dropdown-toggle="user-dropdown" aria-expanded="false"
                        class="inline-flex cursor-pointer items-center justify-center rounded-lg px-4 py-2 text-sm font-medium text-white hover:bg-gray-100 hover:text-gray-900">
                        Welcome
                    </button>
                    <!-- Dropdown menu -->
                    <div class="z-50 my-4 hidden list-none divide-y divide-gray-100 rounded-lg bg-white text-base shadow"
                        id="user-dropdown">
                        <div class="px-4 py-3">
                            <span class="block text-sm text-gray-900">{{ auth()->user()->name }}</span>
                            <span class="block truncate text-sm text-gray-500">{{ auth()->user()->email }}</span>
                        </div>
                        <ul class="py-2" aria-labelledby="textWelcome">
                            <li>
                                <a href="{{ route('dashboard') }}"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Dashboard</a>
                            </li>
                            @role('siswa')
                                <li>
                                    <a href="{{ route('pengaduan.index') }}"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Pengaduan</a>
                                </li>
                            @endrole
                            <li>
                                <form action="{{ route('logout') }}" method="post">
                                    @csrf
                                    <button type="submit"
                                        class="block w-full px-4 py-2 text-left text-sm text-gray-700 hover:bg-gray-100">Logout</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                @else
                    <a href="{{ route('login') }}" id="btnLogin"
                        class="mr-3 rounded-lg border bg-white px-4 py-2 text-center text-sm font-medium text-teal-700 hover:bg-transparent hover:text-white focus:outline-none focus:ring-2 focus:ring-white md:mr-0">
                        Login
                    </a>
                @endauth

                <button id="hamburgerMenu" data-collapse-toggle="navbar-sticky" type="button"
                    class="inline-flex h-10 w-10 items-center justify-center rounded-lg p-2 text-sm text-white hover:bg-gray-100 hover:text-emerald-700 focus:outline-none focus:ring-2 focus:ring-gray-200 md:hidden"
                    aria-controls="navbar-sticky" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 17 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 1h15M1 7h15M1 13h15" />
                    </svg>
                </button>
            </div>
            <div class="hidden w-full items-center justify-between md:order-1 md:flex md:w-auto" id="navbar-sticky">
                <ul
                    class="mt-4 flex flex-col space-y-2 rounded-lg border border-gray-100 bg-gray-50 p-4 font-medium md:mt-0 md:flex-row md:space-x-8 md:space-y-0 md:border-0 md:bg-transparent md:p-0">
                    <li>
                        <a href="{{ url('#home') }}"
                            class="block rounded bg-teal-700 py-2 pl-3 pr-4 text-white md:bg-transparent md:p-0"
                            aria-current="page" id="txchangeActive">Home</a>
                    </li>
                    <li>
                        <a href="{{ url('#about') }}" id="txchange"
                            class="block rounded py-2 pl-3 pr-4 hover:bg-gray-200/80 md:p-0 md:text-white md:hover:bg-transparent">About</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div>
        <section id="home" class="relative bg-emerald-600/90 pt-20">
            <div class="absolute bottom-0 right-0 bg-contain bg-right-bottom bg-no-repeat"
                style="
               background-image: url('frontend/assets/img/shape-bottom.png');
               width: 100%;
               height: 100%;
           ">
            </div>
            <div class="container relative">
                <div class="grid grid-cols-1 pb-20 pt-10 md:justify-center lg:grid-cols-2">
                    <div class="order-2 flex flex-col items-start justify-center gap-y-3 lg:order-1">
                        <h1 class="mb-4 text-2xl font-bold text-white md:text-5xl">
                            Melapor Kejahatan Bullying
                        </h1>
                        <p class="font-semibold text-white md:text-xl">
                            Jangan takut untuk melapor, di sini semua aman!
                        </p>
                        <button type="button"
                            class="mb-2 mr-2 rounded-lg border px-5 py-2.5 text-center text-xs font-medium text-white hover:bg-white hover:text-emerald-600/90 focus:outline-none focus:ring-emerald-300 md:text-sm">
                            Learn More
                        </button>
                    </div>
                    <div class="order-1 lg:order-2">
                        <img src="{{ asset('/frontend/assets/img/banner.png') }}" alt="Banner"
                            class="h-auto max-w-full" />
                    </div>
                </div>
            </div>
        </section>

        <section id="about" class="bg-gray-100 py-20">
            <div class="container grid grid-cols-1 md:grid-cols-2">
                <div class="">
                    <img src="{{ asset('/frontend/assets/img/question.svg') }}" alt="Banner"
                        class="h-auto max-w-md" />
                </div>
                <div class="flex flex-col justify-center gap-y-5">
                    <h2 class="text-3xl font-bold">About Us</h2>
                    <p class="text-lg">
                        Foursichology adalah sebuah website yang bertujuan untuk
                        memberikan solusi terhadap permasalahan bullying
                        yang mungkin terjadi di lingkungan SMKN 46. Website
                        ini di khususkan sebagai sarana pelaporan yang aman,
                        nyaman, dan rahasia bagi siswa untuk melaporkan
                        insiden bullying yang mereka alami.
                    </p>
                    <div class="mt-4 rounded-lg bg-gray-200/90 p-6 shadow-md">
                        <p class="mb-4 text-lg font-bold">
                            Langkah Penggunaan:
                        </p>
                        <ul class="ml-6 list-disc">
                            <li class="mb-2 font-semibold">
                                Login dengan Akun yang Disediakan
                            </li>
                            <li class="mb-2 font-semibold">
                                Isi Form Pelaporan dengan Data yang Valid
                                dan Spesifik
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <section id="lapor" class="bg-emerald-600/90 p-5">
            <div class="container grid grid-cols-1 md:grid-cols-2">
                <div class="flex flex-col justify-center gap-y-5">
                    <h2 class="text-3xl font-bold text-white">Keluhkan jika kamu memiliki masalah
                    </h2>
                    <p class="text-lg text-white">
                        Kami memiliki website untuk mengadukan masalah kamu jika kamu mendapatkan perundungan,kami akan
                        selalu membimbing mu!.Masukan emailmu dan klik link yang di berikan agar kamu bisa konsultasi
                    </p>
                    <div>
                        <a href="{{ route('pengaduan.index') }}"
                            class="mb-2 mr-2 rounded-lg border px-5 py-2.5 text-center text-xs font-medium text-white hover:bg-white hover:text-emerald-600/90 focus:outline-none focus:ring-emerald-300 md:text-sm">
                            Lapor
                        </a>
                    </div>
                </div>
                <div class="flex justify-center">
                    <img src="{{ asset('frontend/assets/img/newsletter.png') }}" alt="Banner"
                        class="h-auto max-w-md" />
                </div>
            </div>
        </section>
    </div>

    <footer class="bg-[#0F2E51]">
        <div class="mx-auto w-full max-w-screen-xl">
            <div class="grid grid-cols-2 gap-8 px-4 py-6 md:grid-cols-3 lg:py-8">
                <div>
                    <h2 class="mb-6 text-lg font-semibold uppercase text-white">Get In Touch</h2>
                    <ul class="font-medium text-white">
                        <li class="mb-4">
                            <p><i class="fa fa-map-marker-alt mr-3"></i>SMKN 46 Jakarta,
                                Jakarta Timur</p>
                        </li>
                        <li class="mb-4">
                            <p><i class="fa fa-phone-alt mr-3"></i>+62 895 139 15797</p>
                        </li>
                        <li class="mb-4">
                        </li>
                        <li class="mb-4">
                            <p><i class="fa fa-envelope mr-3"></i>Foursichology@gmail.com</p>
                        </li>
                    </ul>
                </div>
                <div>
                    <h2 class="mb-6 text-lg font-semibold uppercase text-white">Quick Link</h2>
                    <ul class="font-medium text-gray-500">
                        <li class="mb-4">
                            <a href="{{ url('#about') }}" class="hover:underline">About</a>
                        </li>
                    </ul>
                </div>
                <div>
                    <h2 class="mb-6 text-lg font-semibold uppercase text-white">Foursichology</h2>
                    <ul class="font-medium text-white">
                        <li class="mb-4">
                            <p>"Sabar bukan berarti lemah, melainkan ujian mental."</p>
                        </li>
                    </ul>
                </div>
            </div>
            <hr class="border-gray-200sm:mx-auto my-6 lg:my-8" />
            <div class="sm:flex sm:items-center sm:justify-between">
                <span class="text-sm text-gray-500 sm:text-center">© 2023 <a href="https://flowbite.com/"
                        class="hover:underline">Flowbite™</a>. All Rights Reserved.
                </span>
                <div class="mt-4 flex space-x-5 sm:mt-0 sm:justify-center">
                    <a href="#" class="text-gray-500 hover:text-gray-900">
                        <svg class="h-4 w-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 8 19">
                            <path fill-rule="evenodd"
                                d="M6.135 3H8V0H6.135a4.147 4.147 0 0 0-4.142 4.142V6H0v3h2v9.938h3V9h2.021l.592-3H5V3.591A.6.6 0 0 1 5.592 3h.543Z"
                                clip-rule="evenodd" />
                        </svg>
                        <span class="sr-only">Facebook page</span>
                    </a>
                    <a href="#" class="text-gray-500 hover:text-gray-900">
                        <svg class="h-4 w-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 21 16">
                            <path
                                d="M16.942 1.556a16.3 16.3 0 0 0-4.126-1.3 12.04 12.04 0 0 0-.529 1.1 15.175 15.175 0 0 0-4.573 0 11.585 11.585 0 0 0-.535-1.1 16.274 16.274 0 0 0-4.129 1.3A17.392 17.392 0 0 0 .182 13.218a15.785 15.785 0 0 0 4.963 2.521c.41-.564.773-1.16 1.084-1.785a10.63 10.63 0 0 1-1.706-.83c.143-.106.283-.217.418-.33a11.664 11.664 0 0 0 10.118 0c.137.113.277.224.418.33-.544.328-1.116.606-1.71.832a12.52 12.52 0 0 0 1.084 1.785 16.46 16.46 0 0 0 5.064-2.595 17.286 17.286 0 0 0-2.973-11.59ZM6.678 10.813a1.941 1.941 0 0 1-1.8-2.045 1.93 1.93 0 0 1 1.8-2.047 1.919 1.919 0 0 1 1.8 2.047 1.93 1.93 0 0 1-1.8 2.045Zm6.644 0a1.94 1.94 0 0 1-1.8-2.045 1.93 1.93 0 0 1 1.8-2.047 1.918 1.918 0 0 1 1.8 2.047 1.93 1.93 0 0 1-1.8 2.045Z" />
                        </svg>
                        <span class="sr-only">Discord community</span>
                    </a>
                    <a href="#" class="text-gray-500 hover:text-gray-900">
                        <svg class="h-4 w-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 20 17">
                            <path fill-rule="evenodd"
                                d="M20 1.892a8.178 8.178 0 0 1-2.355.635 4.074 4.074 0 0 0 1.8-2.235 8.344 8.344 0 0 1-2.605.98A4.13 4.13 0 0 0 13.85 0a4.068 4.068 0 0 0-4.1 4.038 4 4 0 0 0 .105.919A11.705 11.705 0 0 1 1.4.734a4.006 4.006 0 0 0 1.268 5.392 4.165 4.165 0 0 1-1.859-.5v.05A4.057 4.057 0 0 0 4.1 9.635a4.19 4.19 0 0 1-1.856.07 4.108 4.108 0 0 0 3.831 2.807A8.36 8.36 0 0 1 0 14.184 11.732 11.732 0 0 0 6.291 16 11.502 11.502 0 0 0 17.964 4.5c0-.177 0-.35-.012-.523A8.143 8.143 0 0 0 20 1.892Z"
                                clip-rule="evenodd" />
                        </svg>
                        <span class="sr-only">Twitter page</span>
                    </a>
                    <a href="#" class="text-gray-500 hover:text-gray-900">
                        <svg class="h-4 w-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M10 .333A9.911 9.911 0 0 0 6.866 19.65c.5.092.678-.215.678-.477 0-.237-.01-1.017-.014-1.845-2.757.6-3.338-1.169-3.338-1.169a2.627 2.627 0 0 0-1.1-1.451c-.9-.615.07-.6.07-.6a2.084 2.084 0 0 1 1.518 1.021 2.11 2.11 0 0 0 2.884.823c.044-.503.268-.973.63-1.325-2.2-.25-4.516-1.1-4.516-4.9A3.832 3.832 0 0 1 4.7 7.068a3.56 3.56 0 0 1 .095-2.623s.832-.266 2.726 1.016a9.409 9.409 0 0 1 4.962 0c1.89-1.282 2.717-1.016 2.717-1.016.366.83.402 1.768.1 2.623a3.827 3.827 0 0 1 1.02 2.659c0 3.807-2.319 4.644-4.525 4.889a2.366 2.366 0 0 1 .673 1.834c0 1.326-.012 2.394-.012 2.72 0 .263.18.572.681.475A9.911 9.911 0 0 0 10 .333Z"
                                clip-rule="evenodd" />
                        </svg>
                        <span class="sr-only">GitHub account</span>
                    </a>
                    <a href="#" class="text-gray-500 hover:text-gray-900">
                        <svg class="h-4 w-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M10 0a10 10 0 1 0 10 10A10.009 10.009 0 0 0 10 0Zm6.613 4.614a8.523 8.523 0 0 1 1.93 5.32 20.094 20.094 0 0 0-5.949-.274c-.059-.149-.122-.292-.184-.441a23.879 23.879 0 0 0-.566-1.239 11.41 11.41 0 0 0 4.769-3.366ZM8 1.707a8.821 8.821 0 0 1 2-.238 8.5 8.5 0 0 1 5.664 2.152 9.608 9.608 0 0 1-4.476 3.087A45.758 45.758 0 0 0 8 1.707ZM1.642 8.262a8.57 8.57 0 0 1 4.73-5.981A53.998 53.998 0 0 1 9.54 7.222a32.078 32.078 0 0 1-7.9 1.04h.002Zm2.01 7.46a8.51 8.51 0 0 1-2.2-5.707v-.262a31.64 31.64 0 0 0 8.777-1.219c.243.477.477.964.692 1.449-.114.032-.227.067-.336.1a13.569 13.569 0 0 0-6.942 5.636l.009.003ZM10 18.556a8.508 8.508 0 0 1-5.243-1.8 11.717 11.717 0 0 1 6.7-5.332.509.509 0 0 1 .055-.02 35.65 35.65 0 0 1 1.819 6.476 8.476 8.476 0 0 1-3.331.676Zm4.772-1.462A37.232 37.232 0 0 0 13.113 11a12.513 12.513 0 0 1 5.321.364 8.56 8.56 0 0 1-3.66 5.73h-.002Z"
                                clip-rule="evenodd" />
                        </svg>
                        <span class="sr-only">Dribbble account</span>
                    </a>
                </div>
            </div>
        </div>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.7.0.min.js"
        integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.0/flowbite.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            let nav = $("#navbar").get(0);
            let texts = document.querySelectorAll("#txchange");
            let textTitle = $("#textTitle").get(0);
            let textWelcome = $("#textWelcome").get(0);
            let textActive = $("#txchangeActive").get(0);
            let loginButton = $("#btnLogin").get(0);
            let hamburgerMenu = $("#hamburgerMenu").get(0);
            let width = window.innerWidth;
            window.onscroll = function() {
                if (window.scrollY >= 150) {
                    nav.classList.add(
                        "bg-white/70",
                        "shadow",
                        "backdrop-blur-[1px]"
                    );
                    nav.classList.remove("bg-transparent");

                    if (width >= 768) {
                        textActive.classList.remove('text-white')
                        textActive.classList.add('text-dark')
                    }

                    texts.forEach((text) => {
                        text.classList.add("md:text-dark");
                    });
                    texts.forEach((text) => {
                        text.classList.remove("md:text-white");
                    });

                    hamburgerMenu.classList.add("text-emerald-700")
                    hamburgerMenu.classList.remove("text-white")

                    if (loginButton) {
                        loginButton.classList.remove(
                            "bg-white",
                            "hover:text-white",
                            "hover:bg-transparent",
                        );
                        loginButton.classList.add('border-teal-700', 'hover:bg-white', 'hover:border-white',
                            'hover:text-teal-700');
                    } else {
                        textTitle.classList.remove('text-white')
                        textTitle.classList.add('text-dark')

                        textWelcome.classList.remove('text-white')
                        textWelcome.classList.add('text-dark')
                    }
                } else {
                    nav.classList.remove(
                        "bg-white/70",
                        "shadow",
                        "backdrop-blur-[1px]"
                    );
                    nav.classList.add("bg-transparent");

                    if (width >= 768) {
                        textActive.classList.remove('text-dark')
                        textActive.classList.add('text-white')
                    }

                    texts.forEach((text) => {
                        text.classList.add("md:text-white");
                    });
                    texts.forEach((text) => {
                        text.classList.remove("md:text-dark");
                    });

                    hamburgerMenu.classList.add("text-white")
                    hamburgerMenu.classList.remove("text-emerald-700")

                    if (loginButton) {
                        loginButton.classList.add(
                            "bg-white",
                            "hover:text-white",
                            "hover:bg-transparent",
                        );
                        loginButton.classList.remove('border-teal-700', 'hover:bg-white', 'hover:border-white',
                            'hover:text-teal-700');
                    } else {
                        textTitle.classList.remove('text-dark')
                        textTitle.classList.add('text-white')

                        textWelcome.classList.remove('text-dark')
                        textWelcome.classList.add('text-white')
                    }
                }
            };

            $(".navscroll").click(function(e) {
                var href = $(this).attr("href");
                var sectionTujuan = $(href)[0];
                var jarakTujuan = $(sectionTujuan).offset().top;
                $("html, body").animate({
                        scrollTop: jarakTujuan - 80
                    },
                    40
                );

                e.preventDefault();
            });
        });
    </script>
</body>

</html>
