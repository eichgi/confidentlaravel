@extends('layouts.app', ['body_classes' => ['home']])

@section('content')

    @include('partials.error')

    <div id="banner">
        <div class="max-w-5xl mx-auto">
            <div class="md:flex">
                <div class="md:w-7/12 md:self-center md:order-last">
                    <img class="border border-gray-500" src="/img/tested-laravel-application-animation.png">
                </div>
                <div class="md:w-5/12">
                    <h2 class="text-5xl text-teal-900 py-6">From <span class="font-mono font-bold">0</span> tests to <span class="block"><strong>confidently</strong> tested</span></h2>
                    <p class="text-2xl text-green-100 font-normal leading-tight">A step by step guide to testing your Laravel applications.</p>
                    <p class="pt-12">
                        <a href="#intro" class="border border-white text-white font-bold py-4 px-6 rounded-full hover:bg-white hover:text-green-600 hover:border-transparent">Learn More</a>
                        <a href="#buy-now" class="ml-6 border border-yellow-500 bg-yellow-500 text-white font-bold py-4 px-6 rounded-full hover:bg-yellow-700 hover:text-white hover:border-transparent">Buy Now</a>
                    </p>
                </div>
            </div>
        </div>
        <span id="stripe"></span>
    </div>

    <hr class="m-0 border-t-2 border-green-400">

    <div class="max-w-5xl mx-auto py-12 px-6 mb-8 leading-normal text-xl border-b border-gray-200">
        <div class="md:flex md:items-center">
            <div class="md:w-3/5 pl-6">
                <p class="mb-6">Testing is something we all know we should do. <b>But we don't</b>.
                <p class="mb-6">Only 17% of Laravel applications have tests.</p>
                <p class="mb-6">I've been asking developers, <em>Why <span class="underline">aren't</span> you testing?</em></p>
                <p class="mb-6">There are two main answers:</p>
                <ol class="list-decimal list-inside pl-6 mb-6">
                  <li><i>Don't have the <span class="underline">time</span>.</i></li>
                  <li><i>Don't know <span class="underline">how</span> to start.</i></li>
                </ol>

                <p>These are real barriers to testing. I am changing that.</p>
            </div>
            <div class="md:w-2/5 order-first">
                <figure class="embed-container">
                    <iframe id="video-player" src="https://player.vimeo.com/video/351189312" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                </figure>
            </div>
        </div>
    </div>

    <div class="max-w-4xl mx-auto mt-12 px-6 leading-normal text-xl">
        <div>
            <h2 class="font-bold text-4xl text-center md:text-left mb-6">How is this different?</h2>
            <p class="mb-6">To overcome the barriers to testing I have paired <em>Laravel Shift</em> with this video course to get you writing tests so you may feel confident about your Laravel applications.</p>
            <p class="mb-6">A new <a href="#" class="text-orange-500 hover:text-orange-300">Test Generator Shift</a> addresses the <span class="underline">time barrier</span>. This Shift will generate test cases for all of your controller actions as well as the create factories for all of your models.</p>
            <p class="mb-24">This video course will address the <span class="underline">where to start</span>. I start with no tests and incrementally build upon our testing skills to test the various part of your Laravel application.</p>
        </div>
    </div>

    <aside class="bg-gray-200 p-6 mt-12">
        <div class="max-w-3xl mx-auto my-12 px-8 md:my-0 md:pr-0 md:self-center">
            <div class="mb-6">
                <p class="font-serif text-gray-600 text-2xl italic mb-6">&ldquo;I might have teared up a bit when I learned about Confident Laravel. I so want to test my code, but when you have a large application, it's so hard to start.&rdquo;</p>
            </div>

            <div class="text-base flex items-center justify-center md:justify-end">
                <img class="h-12 w-12 border-2 border-white rounded-full mr-4" src="/img/twitter-avatar-megseegmiller.jpg" alt="Photo of Meg Seegmiller">
                <span><a class="no-underline uppercase tracking-wide font-semibold text-gray-700 hover:text-gray-900" href="https://twitter.com/megseegmiller/status/1155993341181300736">Meg Seegmiller</a></span>
            </div>
        </div>
    </aside>

    <div class="max-w-4xl mx-auto mt-12 leading-normal text-xl">
        <div class="md:flex">
            <div class="md:w-1/2 md:pr-3">
                <h2 class="font-bold text-4xl text-center md:text-left mb-6">What will we test?</h2>
                <p class="mb-6">Confident Laravel will test this very Laravel application you're using right now. <em>What could be better?</em></p>
                <p class="mb-6">You've used the site. You're familiar with its features. You don't have to write any code, which means you can <strong>focus on the writing tests</strong>.</p>
                <p class="mb-6">We'll start with <em class="underline">zero tests</em>. We'll write the first test together. We'll continue testing more complex parts of the application.</p>
                <p>We'll stop once we're confident we've <strong>tested all the important behavior</strong>.</p>
            </div>

            <div class="md:w-1/2 md:pl-3">
                <h2 class="font-bold text-4xl text-center mb-8 md:text-left">What will I learn?</h2>
                <div class="leading-normal text-xl mb-12">
                    <p class="mb-6">With Confident Laravel you'll learn how to:</p>

                    <ul class="bullseye mb-6 list-reset pl-2">
                        <li>Configure and organize your tests</li>
                        <li>Send <em class="underline">real</em> requests to your application</li>
                        <li>Create <em>factories</em> for testing with models</li>
                        <li><em>Mock</em> core Laravel components and custom classes</li>
                        <li>Test code which uses third-party services, like <a href="https://stripe.com/" class="text-orange-500 hover:text-orange-300">Stripe</a> and <a href="https://www.algolia.com/" class="text-orange-500 hover:text-orange-300">Algolia</a></li>
                        <li>Write <em class="underline">flexible</em> tests which change with your code</li>
                        <li>Balance <i>coverage</i> with <b>confidence</b> to get the most from your tests</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-green-300 mt-12 pt-6 border-t-2 border-green-500">
        <h2 class="font-bold text-4xl text-teal-900 text-center mt-4">What are the videos?</h2>

        @foreach($lessons as $lesson)
            <div class="lesson">
                <div class="max-w-4xl mx-auto p-6">
                    <h4 class="font-bold text-teal-900 text-xl mb-4">Lesson {{ $lesson->id }}: {{ $lesson->name }}</h4>

                    <ol class="list-none flex flex-wrap pl-2">
                        @foreach($videos[$lesson->id] as $video)
                            <li class="w-1/3 md:w-1/4 px-4 mb-6 relative">
                                <img class="block w-full mb-2" src="{{ asset('/img/video-thumbnail.jpg') }}" alt="">
                                <p class="text-teal-900 leading-tight font-semibold">{{ $video->title }}</p>
                            </li>
                        @endforeach
                    </ol>
                </div>
            </div>
        @endforeach
    </div>

    <aside class="bg-gray-200 p-6 mt-12">
        <div class="max-w-3xl mx-auto my-12 px-8 md:my-0 md:pr-0 md:self-center">
            <div class="mb-6">
                <p class="font-serif text-gray-600 text-2xl italic mb-6">&ldquo;We had an application with a lot of service integrations which limited our testing ability. JMac helped me understand how to use mocks. Now I'm testing the integrations with ease.&rdquo;</p>
            </div>

            <div class="text-base flex items-center justify-center md:justify-end">
                <img class="h-12 w-12 border-2 border-white rounded-full mr-4" src="/img/twitter-avatar-Treggats.jpg" alt="Photo of Tonko Mulder">
                <span><a class="no-underline uppercase tracking-wide font-semibold text-gray-700 hover:text-gray-900" href="https://twitter.com/Treggats">Tonko Mulder</a></span>
            </div>
        </div>
    </aside>

    <div class="max-w-4xl mx-auto mb-8 py-12 px-6">
        <h2 class="font-bold text-4xl text-center mb-8">What's included in the packages?</h2>

        <div class="md:flex md:flex-wrap">
            <div class="md:w-1/2 md:px-6">
                <h3 class="text-black text-2xl pb-2"><i class="far fa-play-circle pr-1"></i> Video Course</h3>
                <div class="leading-normal mb-8">
                    <p>All packages include access to the full video course broken into <em class="underline">4 lessons</em> containing <em class="underline">24 videos</em> total. That's <strong>over 7 hours of content</strong>.</p>
                </div>

                <h3 class="text-black text-2xl pb-2"><i class="far fa-lightbulb pr-2"></i> Testing Tips</h3>
                <div class="leading-normal mb-8">
                    <p>All packages also come with set of <em>Testing Tips</em>. Throughout the video course I mention dozens of tips for testing. I collected all these so you can easily <strong>reference them while testing</strong>.</p>
                </div>
            </div>

            <div class="md:w-1/2 md:px-6">
                <h3 class="text-black text-2xl pb-2"><i class="far fa-plus-square pr-1"></i> Bonus Videos</h3>
                <div class="leading-normal mb-8">
                    <p>The <em>Master</em> package includes an <em><span class="underline">10 additional videos</span></em> which dive deepering into common tactics you'll use when <strong>testing every day code</strong>.</p>
                </div>

                <h3 class="text-black text-2xl pb-2"><i class="fas fa-headset pr-1"></i> Group Q&A Calls</h3>
                <div class="leading-normal mb-8">
                    <p>The <em>Master</em> package also includes access to <em>group calls</em>. These are monthly, 20 minute <span class="underline">live-streams</span> where you can <strong>get specific testing questions answered</strong> as well as learn more testing strategies.</p>
                </div>
            </div>
        </div>
    </div>

    <aside class="bg-gray-200 p-6 mt-12">
        <div class="max-w-3xl mx-auto my-12 px-8 md:my-0 md:pr-0 md:self-center">
            <div class="mb-6">
                <p class="font-serif text-gray-600 text-2xl italic mb-6">&ldquo;I loved your Git course, you know how to simplify things and go the minimal way. Confident Laravel is an absolute buy for me.&rdquo;</p>
            </div>

            <div class="text-base flex items-center justify-center md:justify-end">
                <img class="h-12 w-12 border-2 border-white rounded-full mr-4" src="/img/twitter-avatar-abadir.jpg" alt="Photo of Mina Abadir">
                <span><a class="no-underline uppercase tracking-wide font-semibold text-gray-700 hover:text-gray-900" href="https://twitter.com/abadir_">Mina Abadir</a></span>
            </div>
        </div>
    </aside>

    <div id="buy-now" class="bg-gray-700 pt-16 pb-32 px-6">
        <form action="{{ action('OrderController@store') }}" method="post" id="purchase-form">
            @csrf
            <input type="hidden" name="product_id" id="product-id-field">
            <input type="hidden" name="stripeEmail" id="stripe-email-field">
            <input type="hidden" name="stripeToken" id="stripe-token-field">
        </form>

        <div class="text-center mb-12">
            <h1 class="text-4xl font-bold text-white">Which package do you want?</h1>
        </div>

        <div class="max-w-4xl mx-auto md:flex md:items-baseline md:justify-center">
            @foreach($products as $product)
            <div class="max-w-sm mx-auto rounded-lg md:w-1/2 bg-white shadow-lg overflow-hidden mb-8 md:mb-0 md:mx-2">
                <div class="bg-green-300 uppercase tracking-wide text-teal-900 text-center text-lg font-semibold py-6 px-6">{{ $product->name }}</div>
                <div class="p-8">
                    @if($product->id === 2)
                        <i class="w-full block text-gray-900 pb-6 text-center text-5xl fas fa-headset"></i>
                    @else
                        <i class="w-full block text-gray-900 pb-6 text-center text-5xl fas fa-user-friends"></i>
                    @endif
                    <ul class="bullseye text-lg mb-8 text-gray-900" style="padding-left: 0">

                        <li><strong class="text-black">Full access</strong> to the video course</li>
                        <li>Download the <strong class="text-black">complete code</strong> for the Confident Laravel application</li>
                        <li>Collection of the <strong class="text-black">Testing Tips</strong></li>
                        <li><strong class="text-black">Forever-free updates</strong> to all materials</li>

                        @if($product->id > 2)
                        <li><strong class="text-black">Bonus videos</strong> detailing additional testing tactics</li>
                        <li style="background-position-y: .125rem;">Access to <strong class="text-black">group Q&A calls</strong></li>
                        <li><strong class="text-black">Free run</strong> of the <em>Test Generator</em></li>
                        @endif
                    </ul>

                    @if (hasCoupon())
                    <a data-purchase="true" data-name="{{ $product->name }}" data-amount="{{ coupon()->priceInCents($product) }}" data-product-id="{{ $product->id }}" class="mb-4 block w-full rounded-lg p-6 text-center no-underline text-white font-bold text-normal uppercase tracking-wide {{ $product->id === 3 ? 'bg-yellow-500 hover:bg-yellow-600' : 'bg-gray-500 hover:bg-gray-600'}}">
                        <span class="inline-block border-r pr-2 mr-2">Buy Now</span> <s class="opacity-75 font-semibold text-sm">${{ intval($product->price) }}</s> ${{ intval(coupon()->price($product)) }}
                    </a>
                    @else
                    <a data-purchase="true" data-name="{{ $product->name }}" data-amount="{{ $product->priceInCents() }}" data-product-id="{{ $product->id }}" class="mb-4 block w-full rounded-lg p-6 text-center no-underline text-white font-bold text-normal uppercase tracking-wide {{ $product->id === 3 ? 'bg-yellow-500 hover:bg-yellow-600' : 'bg-gray-500 hover:bg-gray-600'}}">
                        <span class="inline-block border-r pr-4 mr-4">Buy Now</span> ${{ intval($product->price) }}
                    </a>
                    @endif
                </div>
            </div>

            @endforeach
        </div>
    </div>

    <aside class="bg-gray-200 p-6 mt-12">
        <div class="max-w-3xl mx-auto my-12 px-8 md:my-0 md:pr-0 md:self-center">
            <div class="mb-6">
                <p class="font-serif text-gray-600 text-2xl italic mb-6">&ldquo;To this day people still ask me how do I test my existing application. This course fills that gap.&rdquo;</p>
            </div>

            <div class="text-base flex items-center justify-center md:justify-end">
                <img class="h-12 w-12 border-2 border-white rounded-full mr-4" src="/img/twitter-avatar-adamwathan.jpg" alt="Photo of Adam Wathan">
                <span><a class="no-underline uppercase tracking-wide font-semibold text-gray-700 hover:text-gray-900" href="https://twitter.com/adamwathan">Adam Wathan</a></span>
            </div>
        </div>
    </aside>

    <div class="max-w-4xl mx-auto pt-24 pb-16 bg-white px-6">
        <h2 class="font-bold text-4xl text-center mb-8">Frequently Asked Questions</h2>

        <div class="leading-normal text-xl mt-12">
            <p class="text-xl font-bold mb-4">Can I pay with PayPal?</p>
            <p>Sure. Just send payment to <a class="text-orange-500 hover:text-orange-300" href="m&#97;&#105;l&#116;&#111;&#58;j%6D%61%63&#64;c&#111;&#37;&#54;E&#102;i%64en&#116;lara%76el&#46;co%6D">j&#109;ac&#64;confide&#110;tl&#97;r&#97;vel&#46;c&#111;m</a> and I'll get your account set up.</p>
        </div>

        <div class="leading-normal text-xl mt-12">
            <p class="text-xl font-bold mb-4">Can I get a discount if I purchasing for my students/team/company?</p>
            <p>If you plan to purchase more than 5 packages, <a class="text-orange-500 hover:text-orange-300" href="m&#97;&#105;l&#116;&#111;&#58;j%6D%61%63&#64;c&#111;&#37;&#54;E&#102;i%64en&#116;lara%76el&#46;co%6D">email me</a> with your details for a discounted rate.</p>
        </div>

        <div class="leading-normal text-xl mt-12">
            <p class="text-xl font-bold mb-4">What if I can't make one of the group Q&A calls?</p>
            <p>No worries. You can send me your questions ahead of time and I'll answer them during the call. You can watch the recording at your convenience.</p>
        </div>

        <div class="leading-normal text-xl mt-12">
            <p class="text-xl font-bold mb-4">What if I have another question?</p>
            <p>Just <a class="text-orange-500 hover:text-orange-300" href="m&#97;&#105;l&#116;&#111;&#58;j%6D%61%63&#64;c&#111;&#37;&#54;E&#102;i%64en&#116;lara%76el&#46;co%6D">email me</a>. Unless I'm sleeping, you'll get a pretty snappy reply.</p>
        </div>
    </div>

    <aside id="footer">
        <div class="relative max-w-4xl mx-auto px-6 mt-24">
            <div class="flex items-center">
                <div class="flex-auto">
                    <h2 class="text-3xl font-bold mb-6">Not ready to buy?</h2>
                    <p class="text-xl font-normal mb-6">Sign up to watch <em>Lesson 1</em> for free.</p>
                </div>
                <div class="flex-none">
                     <a href="{{ url('register') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">Create Account</a>
                </div>
            </div>
        </div>
    </aside>

    <aside class="antialiased px-6 pt-16 pb-16 sm:pt-24 bg-gray-900">
        <div class="max-w-4xl mx-auto text-white text-shadow">
            <div class="md:flex">
                <div class="text-center md:w-1/3">
                    <img class="rounded-full inline-block border-4 border-white" src="{{ asset('img/jason-mccreary-bio.jpg') }}" alt="Jason McCreary" width="180" height="180">
                </div>
                <div class="md:w-2/3">
                    <h3 class="text-3xl font-bold mb-4 mt-8 text-center md:text-left md:mt-0">Who is JMac?</h3>
                    <div class="text-xl">
                        <p class="mb-4">Hi. I'm <a class="text-white underline hover:text-gray-400" href="https://twitter.com/gonedark">Jason McCreary</a>. I go by <em>JMac</em> because I always seem to work with other programmers named Jason.</p>

                        <p>I love <a class="text-white underline hover:text-gray-400" href="https://www.youtube.com/user/thejasonmccreary">sharing my knowledge</a> and building things. I created <a class="text-white underline hover:text-gray-400" href="https://laravelshift.com/">Laravel Shift</a>, recorded <a class="text-white underline hover:text-gray-400" href="https://gettinggit.com">Getting Git</a>. and wrote <a class="text-white underline hover:text-gray-400" href="https://basecodefieldguide.com">BaseCode</a>.</p>
                    </div>
                </div>
            </div>
        </div>
    </aside>

@stop

@push('javascript')
<script src="https://checkout.stripe.com/checkout.js"></script>
<script>
    var handler = StripeCheckout.configure({
        key: "{{ config('services.stripe.key') }}",
        locale: 'auto',
        panelLabel: 'Pay @{{amount}}',
        allowRememberMe: false,
        name: 'Confident Laravel',
        token: function(token) {
            document.getElementById('stripe-token-field').value = token.id;
            document.getElementById('stripe-email-field').value = token.email;
            document.getElementById('purchase-form').submit();
        }
    });

    var buttons = document.querySelectorAll("a[data-purchase]");
    for (var i = 0; i < buttons.length; i++) {
        buttons[i].addEventListener("click", function(e) {
            document.getElementById('product-id-field').value = this.dataset.productId;
            handler.open({
                description: this.dataset.name,
                amount: this.dataset.amount
            });
            e.preventDefault();
        });
    }

    window.addEventListener('popstate', function() {
        handler.close();
    });
</script>
@endpush
