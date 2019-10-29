@extends('layouts.app', ['body_classes' => ['minimal'], 'title' => 'Confident Laravel - Create Account', 'noindex' => true])

@section('content')

    <div class="w-full max-w-xs mx-auto mt-24">
        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <h1 class="text-black text-5xl text-center mb-8"><i class="fas fa-map-signs" aria-label="Map Signs"></i></h1>

            <p class="mb-8">Before sending you to the video course, let's finish creating your account.</p>

            <form role="form" method="POST" action="{{ url('/users') }}">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="name">Name</label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight {{ $errors->has('name') ? 'border-red-500' : '' }}" id="name" name="name" type="text" value="{{ old('name') }}" required autofocus>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="password">Password</label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight {{ $errors->has('password') ? 'border-red-500' : '' }}" id="password" name="password" type="password" required>

                    @if ($errors->has('password'))
                        <p class="text-red-500 text-sm italic mt-2">{{ $errors->first('password') }}</p>
                    @endif
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="confirm-password">Confirm Password</label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight {{ $errors->has('password_confirmation') ? 'border-red-500' : '' }}" id="confirm-password" name="password_confirmation" type="password" required>
                </div>

                <button class="block w-full bg-teal-200 hover:bg-teal-300 text-green-900 font-semibold py-2 px-4 rounded mt-6" type="submit">Create account</button>
            </form>
        </div>

        <p class="text-center text-gray-100 text-sm"><span class="font-bold">Got a question?</span> Just <a href="m&#97;ilto&#58;%6Ama%63&#64;b&#97;&#37;73%&#54;5&#99;o%64%6&#53;f&#105;el&#100;&#103;ui%&#54;4e&#46;%63om" class="text-gray-100 hover:text-white">email me</a>.</p>
    </div>

@endsection
