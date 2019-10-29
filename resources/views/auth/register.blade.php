@extends('layouts.minimal')

@section('content')

<div class="middle-box text-center loginscreen animated fadeInDown">
    <div>
        <h3>Confident Laravel</h3>
        <p><b>Sign up for free</b> and start your journey to becoming a <em>Git Master</em>.</p>
        <form class="m-t" role="form" method="POST" action="{{ route('register') }}">
            @csrf

            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Name" required autofocus>
            </div>

            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email" required autofocus>
            </div>

            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <input id="password" type="password" class="form-control" name="password" placeholder="Password" required>

                @if ($errors->has('password'))
                    <span class="help-block"><strong>{{ $errors->first('password') }}</strong></span>
                @endif
            </div>

            <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" required>
            </div>

            <button type="submit" class="btn btn-primary block full-width m-b">Sign up</button>
        </form>
    </div>
</div>
@endsection
