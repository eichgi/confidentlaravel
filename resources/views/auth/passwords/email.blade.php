@extends('layouts.app', ['body_classes' => ['minimal'], 'title' => 'Confident Laravel - Forgot Password', 'noindex' => true])

@section('content')

    <div class="w-full max-w-xs mx-auto mt-24">
        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <h1 class="text-black text-5xl text-center mb-8"><i class="fas fa-sync-alt" aria-label="Forgot Password"></i></h1>

            @if (session('status'))
                <div class="bg-green-100 border-l-4 border-green text-green-700 p-4 mb-8" role="alert">
                    <p>{{ session('status') }}</p>
                </div>
            @endif

            @if ($errors->has('email'))
                <div class="bg-red-500-100 border-l-4 border-red-500 text-red-500-600 p-4 mb-8" role="alert">
                    <p>{{ $errors->first('email') }}</p>
                </div>
            @endif

            <form method="POST" action="{{ url('/password/email') }}" role="form">
                @csrf

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="email">Email</label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight" id="email" name="email" type="text" value="{{ old('email') }}" required autofocus>
                </div>

                <button class="w-full bg-blue hover:bg-blue-600 text-white font-bold py-2 px-4 rounded mt-6" type="submit">Send a password reset link</button>
            </form>
        </div>

        <p class="text-center text-gray-100 text-sm"><span class="font-bold">Got a question?</span> Just <a href="m&#97;ilto&#58;%6Ama%63&#64;b&#97;&#37;73%&#54;5&#99;o%64%6&#53;f&#105;el&#100;&#103;ui%&#54;4e&#46;%63om" class="text-gray-100 hover:text-white">email me</a>.</p>
    </div>

@endsection


