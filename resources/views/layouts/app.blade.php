<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <script
            src="https://code.jquery.com/jquery-3.6.0.js"
            integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
            crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jeditable.js/2.0.18/jquery.jeditable.min.js" integrity="sha512-Jn+modod+CgT0sdSdiL5Zr74JeTDTR2DGzeSRG1oUVnZjZFnkdSPOFUiwAr/St/lIvYEyBaZ6F46vJE4fbHg6A==" crossorigin="anonymous"></script>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        <script src="{{ asset('js/jquery-jeditable.js') }}" defer></script>

        <script src="{{ asset('js/jquery.printPage.js') }}" defer></script>

        <script src="{{ asset('js/pdfmake.0.1.68.min.js') }}" defer></script>

        <script src="{{ asset('js/pdfmake.vfs_fonts.0.1.68.min.js') }}" defer></script>

        <script src="{{ asset('js/jquery-table2excel.js') }}" defer></script>

        <script src="{{ asset('js/custom.js') }}" defer></script>

    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative text-center" role="alert">
                                <span class="block sm:inline ">{{$error}}</span>
                            </div>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if (session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative text-center" role="alert">
                    <span class="block sm:inline">{{session('success')}}</span>
                </div>
            @endif

            @if (session('error'))
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative text-center" role="alert">
                        <span class="block sm:inline ">{{session('error')}}</span>
                    </div>
            @endif
            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        <footer>
            <div class="container mx-auto px-6">
                <div class="mt-16 border-t-2 border-gray-300 flex flex-col items-center">
                    <div class="sm:w-2/3 text-center py-6">
                        <p class="text-sm text-blue-700 font-bold mb-2">
                            © 2021
                        </p>
                    </div>
                </div>
            </div>
        </footer>
    </body>
</html>
