@extends('layouts.app', ['body_classes' => ['minimal'], 'title' => 'Confident Laravel - Add Ons', 'noindex' => true])

@section('content')

    <div class="w-full max-w-sm mx-auto my-24">

        <form action="{{ route('add-ons.store') }}" method="post" id="purchase-form">
            @csrf
            <input type="hidden" name="add_on" id="add-on-field">
            <input type="hidden" name="stripeToken" id="stripe-token-field">
        </form>

        @unless ($order)
        <div class="flex bg-white shadow-md rounded-lg px-8 pt-6 pb-8 mb-4">
            <div class="flex-initial pr-6">
                <h3 class="text-black text-2xl pb-2"><i class="fas fa-angle-up pr-1"></i> <i>init</i> Package</h3>
                <p>Upgrade to the <i>init</i> package to access the complete video course and downloadable ebook.</p>
            </div>

            <a data-purchase="true" data-name="init Package" data-amount="2900" data-add-on="3" class="flex-initial rounded-lg px-6 py-4 text-center no-underline text-white font-bold text-normal uppercase tracking-wide bg-orange-500 hover:bg-orange-500-400">
                <span class="block border-b pb-2 mb-2">Add</span> $29
            </a>
        </div>

        <div class="flex bg-white shadow-md rounded-lg px-8 pt-6 pb-8 mb-4">
            <div class="flex-initial pr-6">
                <h3 class="text-black text-2xl pb-2"><i class="fas fa-angle-double-up pr-1"></i> <i>Master</i> Package</h3>
                <p>Upgrade to the <i>Master</i> package to access the complete video course, <i>Everyday Git</i> videos, downloadable ebook, and monthly Q&amp;A calls.</p>
            </div>

            <a data-purchase="true" data-name="Master Package" data-amount="7900" data-add-on="4" class="flex-initial rounded-lg px-6 py-4 text-center no-underline text-white font-bold text-normal uppercase tracking-wide bg-orange-500 hover:bg-orange-500-400">
                <span class="block border-b pb-2 mb-2">Add</span> $79
            </a>
        </div>
        @endif

        <div class="flex bg-white shadow-md rounded-lg px-8 pt-6 pb-8 mb-4">
            <div class="flex-initial pr-6">
                <h3 class="text-black text-2xl pb-2"><i class="fas fa-headset pr-1"></i> Group Q&amp;A Calls</h3>
                <p>Gain access to previous group Q&A calls as well as get your Git questions answered in future calls.</p>
            </div>

            <a data-purchase="true" data-name="Group Q&A Calls" data-amount="2900" data-add-on="1" class="flex-initial rounded-lg px-6 py-4 text-center no-underline text-white font-bold text-normal uppercase tracking-wide bg-gray-600 hover:bg-gray-500">
                <span class="block border-b pb-2 mb-2">Add</span> $29
            </a>
        </div>

        <div class="flex bg-white shadow-md rounded-lg px-8 pt-6 pb-8 mb-4">
            <div class="flex-initial pr-6">
                <h3 class="text-black text-2xl pb-2"><i class="fas fa-play-circle pr-1"></i> <i>Everyday Git</i> Videos</h3>
                <p>Add videos demonstrating using Git in every day, real-world scenarios.</p>
            </div>

            <a data-purchase="true" data-name="Everyday Git" data-amount="2900" data-add-on="2" class="flex-initial rounded-lg px-6 py-4 text-center no-underline text-white font-bold text-normal uppercase tracking-wide bg-gray-600 hover:bg-gray-500">
                <span class="block border-b pb-2 mb-2">Add</span> $29
            </a>
        </div>

        <p class="text-center text-gray-100 text-sm"><span class="font-bold">Got a question?</span> Just <a href="m&#97;ilto&#58;%6Ama%63&#64;b&#97;&#37;73%&#54;5&#99;o%64%6&#53;f&#105;el&#100;&#103;ui%&#54;4e&#46;%63om" class="text-gray-100 hover:text-white">email me</a>.</p>
    </div>

@endsection

@push('javascript')
    <script src="https://checkout.stripe.com/checkout.js"></script>
    <script>
        var handler = StripeCheckout.configure({
            email: "{{ $user->email }}",
            key: "{{ config('services.stripe.key') }}",
            locale: 'auto',
            panelLabel: 'Pay @{{amount}}',
            allowRememberMe: false,
            name: 'Confident Laravel',
            token: function(token) {
                document.getElementById('stripe-token-field').value = token.id;
                document.getElementById('purchase-form').submit();
            }
        });

        var buttons = document.querySelectorAll("a[data-purchase]");
        for (var i = 0; i < buttons.length; i++) {
            buttons[i].addEventListener("click", function(e) {
                document.getElementById('add-on-field').value = this.dataset.addOn;
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
