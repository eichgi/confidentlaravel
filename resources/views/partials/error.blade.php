@if (count($errors) || Session::has('error'))
    <div class="alert alert-danger">

        @if (Session::has('error'))
            @include(session('error.template'), (array)session('error.data'))
        @else
            <p><strong>Whoops!</strong> There were some problems with your input.</p>
        @endif

        @if (count($errors))
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        @endif
    </div>
@endif