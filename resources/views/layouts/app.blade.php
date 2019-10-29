<!DOCTYPE html>
<html lang="en">

@include('partials.header', [
    'noindex' => !empty($noindex),
    'title' => $title ?? null,
    'description' => $description ?? null
])

<body class="font-sans text-black leading-tight antialiased {{ implode(' ', $body_classes ?? []) }}">

<header class="relative max-w-5xl mx-auto">
    <h1 class="absolute z-10 top-0 left-0 text-5xl text-white mt-6">
        <img src="{{ asset('/img/confident-laravel-logo-white.svg') }}" alt="Confident Laravel Logo" class="h-10 w-auto">
    </h1>
    <p class="absolute z-10 top-0 right-0 mt-6"><a href="{{ route('login') }}" class="text-white font-bold hover:underline">Log in</a></p>
</header>
<main>
    @yield('content')
</main>

@include('partials.footer')

</body>
</html>