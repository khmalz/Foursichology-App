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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.css" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="flex min-h-screen items-center justify-center bg-slate-200">
    <nav id="navbar" class="fixed left-0 top-0 z-20 w-full bg-emerald-600/90 shadow transition-all duration-700">
        <div class="mx-auto flex max-w-screen-xl flex-wrap items-center justify-between p-4">
            <a href="{{ route('home') }}" class="flex items-center">
                <span class="self-center whitespace-nowrap text-2xl font-semibold text-white"
                    id="txchange">Foursichology</span>
            </a>
            <div class="flex md:order-2">
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
                        <li>
                            <a href="{{ route('pengaduan.index') }}"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Pengaduan</a>
                        </li>
                        <li>
                            <form action="{{ route('logout') }}" method="post">
                                @csrf
                                <button type="submit"
                                    class="block w-full px-4 py-2 text-left text-sm text-gray-700 hover:bg-gray-100">Logout</button>
                            </form>
                        </li>
                    </ul>
                </div>

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
                        <a href="{{ route('home') }}"
                            class="block rounded bg-teal-700 py-2 pl-3 pr-4 text-white md:bg-transparent md:p-0"
                            aria-current="page" id="txchange">Home</a>
                    </li>
                    <li>
                        <a href="{{ route('dashboard') }}"
                            class="block rounded bg-teal-700 py-2 pl-3 pr-4 text-white md:bg-transparent md:p-0"
                            aria-current="page" id="txchange">Dashboard</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="w-full max-w-6xl border bg-white p-5 shadow-2xl">
        @if (session('success'))
            <div class="mb-4 flex items-center rounded-lg border border-green-300 bg-green-50 p-4 text-sm text-green-800"
                role="alert">
                <svg class="mr-3 inline h-4 w-4 flex-shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                </svg>
                <span class="sr-only">Info</span>
                <div>
                    {{ session('success') }}
                </div>
            </div>
        @endif

        <h1 class="font-poppins mb-2 text-center text-2xl font-semibold uppercase">Pengaduan</h1>

        <div class="mt-5">
            <form action="{{ route('pengaduan.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="student_id" value="{{ auth()->user()->student->id }}">
                <div class="mb-3 grid grid-cols-2 gap-x-4 space-y-1">
                    <div>
                        <label for="email" class="mb-2 block text-sm font-medium text-gray-900">Your
                            Email</label>
                        <input type="email" name="email" id="email"
                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-emerald-500 focus:ring-emerald-500 disabled:bg-gray-200/80"
                            placeholder="name@flowbite.com" disabled value="{{ auth()->user()->email }}" required>
                    </div>
                    <div>
                        <label for="name" class="mb-2 block text-sm font-medium text-gray-900">Your
                            Name</label>
                        <input type="text" name="name" id="name"
                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-emerald-500 focus:ring-emerald-500 disabled:bg-gray-200/80"
                            placeholder="John Doe" disabled value="{{ auth()->user()->name }}" required>
                    </div>
                    <div>
                        <label for="nis" class="mb-2 block text-sm font-medium text-gray-900">Your
                            NIS</label>
                        <input type="text" name="nis" id="nis"
                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-emerald-500 focus:ring-emerald-500 disabled:bg-gray-200/80"
                            placeholder="John Doe" disabled value="{{ auth()->user()->student->nis }}" required>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="description" class="mb-2 block text-sm font-medium text-gray-900">Description</label>
                    <textarea id="description" name="description" rows="4"
                        class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-emerald-500 focus:ring-emerald-500"
                        placeholder="Leave a description..."></textarea>
                </div>
                <div class="mb-3">
                    <label class="mb-2 block text-sm font-medium text-gray-900" for="multiple_files">Bukti</label>
                    <input
                        class="block w-full cursor-pointer rounded-lg border border-gray-300 bg-gray-50 text-sm text-gray-900 file:!bg-emerald-600 focus:border-emerald-500 focus:outline-none focus:ring-emerald-500"
                        id="multiple_files" name="images[]" onchange="previewImageMultiple()" type="file"
                        multiple>
                </div>

                <div class="mb-3">
                    <div class="grid grid-cols-1 gap-2 md:grid-cols-3" id="image-container"></div>
                </div>

                <div class="mb-6 flex items-center">
                    <input id="link-checkbox" type="checkbox" name="anonim" value="1"
                        class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-emerald-600 focus:ring-2 focus:ring-emerald-500">
                    <label for="link-checkbox" class="ml-2 text-sm font-medium text-gray-900">Sebagai Anonim</label>
                </div>

                <button type="submit"
                    class="w-full rounded-lg bg-emerald-700 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-emerald-800 focus:outline-none focus:ring-4 focus:ring-emerald-300 sm:w-auto">Submit</button>
            </form>
        </div>

    </div>

    <script src="https://code.jquery.com/jquery-3.7.0.min.js"
        integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.0/flowbite.min.js"></script>

    <script>
        const imageInput = document.querySelector("#multiple_files");
        const imageContainer = document.querySelector("#image-container");

        function previewImageMultiple() {
            // Bersihkan semua elemen gambar yang ada sebelumnya
            imageContainer.innerHTML = "";

            const files = imageInput.files;

            for (let i = 0; i < files.length; i++) {
                const file = files[i];
                if (file) {
                    const blob = URL.createObjectURL(file);

                    // Buat div dan elemen gambar dengan template literal
                    const imageHTML = `
                        <div id="image-${i + 1}">
                            <img alt="evidence-${i + 1}" src="${blob}" class="h-[200px] w-full max-w-md rounded-sm border object-cover">
                        </div>
                    `;

                    // Tambahkan div dan elemen gambar ke dalam container
                    imageContainer.innerHTML += imageHTML;
                }
            }
        };
    </script>
</body>

</html>
