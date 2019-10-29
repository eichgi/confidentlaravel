<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">

    <meta name="robots" content="noindex,nofollow">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" href="/favicon.ico">

    <title>{{ $title ?? 'Confident Laravel - a step by step guide to testing Laravel applications' }}</title>

    <link href="{{ mix('css/app.css') }}" rel="stylesheet">

@if (config('app.env') == 'production')
    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-88765295-1', 'auto');
        ga('send', 'pageview');
    </script>
@endif
</head>

<body>
<div id="app" class="min-h-screen bg-gray-200 antialiased lg:flex lg:flex-col">

    <header class="bg-gray-900 sm:flex sm:items-center sm:justify-between lg:bg-white lg:flex-shrink-0">
        <div class="flex justify-between px-4 py-3 lg:w-72 lg:bg-gray-900 lg:justify-center lg:py-5">
            <!-- logo -->
            <div>
                <img src="{{ asset('/img/confident-laravel-logo.svg') }}" alt="Confident Laravel Logo" class="h-8 w-auto">
            </div>
            <!-- hamburger -->
            <div class="flex sm:hidden">
                <button type="button" class="px-2 text-gray-500 hover:text-white focus:outline-none focus:text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-6 w-6 fill-current">
                        <path fill-rule="evenodd" d="M4 5h16a1 1 0 0 1 0 2H4a1 1 0 1 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2z"></path>
                    </svg>
                </button>
            </div>
        </div>


        <!-- top nav (large screens) -->
        <nav class="sm:flex sm:items-center sm:px-4 lg:flex-1 lg:justify-between hidden">
            <div class="hidden lg:block lg:relative lg:max-w-xl lg:w-full">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3">
                    <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 fill-current text-gray-600">
                        <path d="M16.32 14.9l1.1 1.1c.4-.02.83.13 1.14.44l3 3a1.5 1.5 0 0 1-2.12 2.12l-3-3a1.5 1.5 0 0 1-.44-1.14l-1.1-1.1a8 8 0 1 1 1.41-1.41l.01-.01zM10 16a6 6 0 1 0 0-12 6 6 0 0 0 0 12z"></path>
                    </svg>
                </div>
                <input placeholder="Search videos by keyword" class="block w-full border border-transparent bg-gray-200 focus:outline-none focus:bg-white focus:border-gray-300 text-gray-900 rounded-lg pl-10 pr-4 py-2">
            </div>

            <!-- account -->
            <div class="sm:flex sm:items-center">
                <div class="relative px-5 py-5 sm:py-0 sm:ml-4 sm:px-0">
                    <div class="flex items-center sm:hidden">
                        <img src="{{ asset('/img/jason-mccreary-bio.jpg') }}" alt="" class="h-12 w-12 object-cover rounded-full border-2 border-gray-600"><span class="ml-4 font-semibold text-gray-200 sm:hidden">Isla Schoger</span>
                    </div>
                    <div class="mt-5 sm:hidden">
                        <a href="#account" class="block text-gray-400 hover:text-white">Account settings</a><a href="#support" class="mt-3 block text-gray-400 hover:text-white">Support</a><a href="#sign-out" class="mt-3 block text-gray-400 hover:text-white">Sign out</a>
                    </div>
                    <div class="relative hidden sm:block">
                        <button type="button" class="block focus:outline-none">
                            <span class="block h-10 w-10 overflow-hidden rounded-full border-2  border-gray-600 lg:border-gray-300"><img src="{{ asset('/img/jason-mccreary-bio.jpg') }}" alt="" class="h-full w-full object-cover"></span>
                        </button>
                        <div class="hidden">
                            <button type="button" class="z-30 block fixed inset-0 w-full h-full cursor-default"></button>
                            <div class="absolute z-40 right-0">
                                <div class="mt-3 bg-white lg:border rounded-lg w-48 py-2 shadow-xl">
                                    <a href="#account" class="block hover:text-white text-gray-800 px-4 py-2 hover:bg-indigo-500">Account settings</a>
                                    <a href="#support" class="block hover:text-white text-gray-800 mt-0 px-4 py-2 hover:bg-indigo-500">Support</a>
                                    <a href="#sign-out" class="block hover:text-white text-gray-800 mt-0 px-4 py-2 hover:bg-indigo-500">Sign out</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </header>


    <div class="lg:flex-1 lg:flex lg:overflow-y-hidden">
        <section class="bg-gray-800 lg:w-72">
            <!-- search box small (can likely be restyled above) -->
            <div class="flex justify-between px-4 py-3 lg:hidden">
                <div class="relative max-w-xl w-full">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3">
                        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 fill-current text-gray-600">
                            <path d="M16.32 14.9l1.1 1.1c.4-.02.83.13 1.14.44l3 3a1.5 1.5 0 0 1-2.12 2.12l-3-3a1.5 1.5 0 0 1-.44-1.14l-1.1-1.1a8 8 0 1 1 1.41-1.41l.01-.01zM10 16a6 6 0 1 0 0-12 6 6 0 0 0 0 12z"></path>
                        </svg>
                    </div>
                    <input placeholder="Search course by keywords" class="block w-full bg-gray-900 focus:outline-none focus:bg-white focus:text-gray-900 text-white rounded-lg pl-10 pr-4 py-2">
                </div>
            </div>

            @include('partials.dashboard-nav')

        </section>

        <main class="py-6 lg:flex-1">
            @yield('content')
        </main>

    </div>
</div>


<script src="/js/jquery-2.1.1.js"></script>
<script src="https://player.vimeo.com/api/player.js"></script>
<script>
    var iframe = $('#video-player');
    var player = new Vimeo.Player(iframe);

    player.on('ended', function() {
        $.ajax('/watches', {
            method: 'POST',
            data: {
                video_id: iframe.data('video-id')
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    });
</script>
</body>
</html>