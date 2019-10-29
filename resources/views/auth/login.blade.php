@extends('layouts.app', ['body_classes' => ['minimal'], 'title' => 'Confident Laravel - Sign In', 'noindex' => true])

@section('content')

    <div class="w-full max-w-xs mx-auto mt-24">
        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <h1 class="text-black text-5xl text-center mb-8"><i class="fas fa-sign-in-alt" aria-label="Sign In"></i></h1>

            <form method="POST" action="{{ url('/login') }}" role="form">
                @csrf

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="email">Email</label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight" id="email" name="email" type="text" value="{{ old('email') }}" required autofocus>
                </div>
                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="password">Password</label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight" id="password" name="password" type="password" required>
                </div>
                <div class="flex items-center justify-between">
                    <button class="bg-blue hover:bg-blue-600 text-white font-bold py-2 px-4 rounded" type="submit">Sign In</button>
                    <a class="inline-block align-baseline font-bold text-sm text-blue hover:text-blue-700" href="{{ route('password.request') }}">
                        Forgot Password?
                    </a>
                </div>
            </form>
        </div>

        <p class="text-center text-gray-100 text-sm"><span class="font-bold">Got a question?</span> Just <a href="m&#97;ilto&#58;%6Ama%63&#64;b&#97;&#37;73%&#54;5&#99;o%64%6&#53;f&#105;el&#100;&#103;ui%&#54;4e&#46;%63om" class="text-gray-100 hover:text-white">email me</a>.</p>
    </div>

@endsection
