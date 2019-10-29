<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href="/favicon.ico">

    <title>@yield('title')</title>

    <meta name="description" content="@yield('description')">
    <meta name="keywords" content="git,learn,learn git,getting git,git videos,videos,tutorial,guide">

    <!-- Bootstrap Core CSS -->
    <link href="/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>

    <!-- Theme CSS -->
    <link href="/vendor/css/creative-custom.min.css" rel="stylesheet">

    <style>
        header {
            margin-bottom: 60px;
        }
        header .header-content {
            position: static;
            transform: none;
            padding: 30px 0;
        }

        header .header-content .header-content-inner hr {
            margin: 15px auto;
        }

        header .header-content .header-content-inner p {
            font-size: 14px;
            margin: 0 auto;
        }

        aside {
            padding: 0 0 90px;
            margin: 30px 0 0;
        }

        .extend {
            margin: 0 -90px 20px;
        }

        @media (min-width: 768px) {
            header {
                min-height: auto;
            }
        }

        @media (min-width: 992px) {
            .container {
                width: 750px;
            }
        }
        @media (min-width: 1200px) {
            .container {
                width: 750px;
            }
        }
    </style>

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

<body class="learn">

<header class="bg-primary">
    <div class="header-content">
        <div class="header-content-inner">
            <a href="{{ url('/') }}" title="Confident Laravel video course"><img class="brand img-responsive center-block" width="300" src="/img/getting-git.svg" alt="Confident Laravel"/></a>
            <hr class="light">
            <p>A comprehensive video course from <code>git init</code> to <em>Git Master</em>.</p>
        </div>
    </div>
</header>

<main>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                @yield('content')
            </div>
        </div>
    </div>
</main>


@unless(isset($hide_callout))
<hr class="primary">

<aside>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                @include('partials.learn.callout')
            </div>
        </div>

        <div class="row" style="margin-top: 30px;">
            <div class="col-sm-12">
                <p class="text-center"><a href="{{ url('learn') }}" title="Return to Learn Git - Table of Contents">Learn Git - Table of Contents</a></p>
            </div>
        </div>
    </div>
</aside>
@endunless

<script src="/js/jquery-2.1.1.js"></script>
<script src="/js/bootstrap.min.js"></script>

</body>
</html>
