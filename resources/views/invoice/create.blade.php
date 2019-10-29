@extends('layouts.minimal')

@section('content')

    <div class="middle-box text-center loginscreen animated fadeInDown">
        <div>

            <h3>Generate Invoice</h3>
            <p>Enter your billing information as it should appear on the invoice. Be sure to include any order or tax identifiers.</p>
            <form class="m-t" role="form" method="POST" action="{{ route('invoice.store') }}">
                {{ csrf_field() }}

                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <textarea id="billing-information-field" class="form-control" name="billing_information" rows="5" autofocus>{{ old('billing_information') }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary block full-width m-b">Save</button>
            </form>
        </div>
    </div>

    <p class="text-center"><span class="font-bold">All done?</span> Return to the <a href="{{ url('/dashboard') }}">Dashboard</a>.</p>

@endsection


