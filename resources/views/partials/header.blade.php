<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @if ($noindex)
        <meta name="robots" content="noindex, nofollow">
    @endif
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title ?? 'Confident Laravel - from no tests to confidently tested' }}</title>

    <meta name="description" content="This 32 video course provides a step by step guide starting from no tests to a confidently tested Laravel applications.">
    <meta name="keywords" content="test,tests,testing,laravel,laravel tests,test laravel,testing laravel,laravel testing,laravel application,application,videos,course,video course,guide">

    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:site" content="@gonedark" />
    <meta name="twitter:title" content="Confident Laravel - from no tests to tested" />
    <meta name="twitter:description" content="A step by step guide to testing your Laravel applications." />
    <meta name="twitter:image" content="https://confidentlaravel.com/img/confident-laravel-testing-video-course-soon-ad.png" />

    <meta property="og:url" content="https://confidentlaravel.com" />
    <meta property="og:type" content="product" />
    <meta property="og:title" content="Confident Laravel - from no tests to tested" />
    <meta property="og:description" content="A step by step guide to testing your Laravel applications." />
    <meta property="og:image" content="https://confidentlaravel.com/img/confident-laravel-testing-video-course-soon-ad.png" />

    <link href="https://fonts.googleapis.com/css?family=Oxygen+Mono" rel="stylesheet">
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">

@if (App::environment('production'))
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-144936503-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-144936503-1');
    </script>
@endif

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
</head>


