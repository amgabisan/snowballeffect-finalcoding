@extends ('partials.layout')

@section ('content')

<h2>Bank Account Validation</h2>
<hr>
<div class="text-center">
    {{ Form::open(['url' => '', 'method' => 'POST']) }}
        {{ Form::file('csvFile', ['class' => 'd-none', 'id' => 'csvFile-btn']) }}
        <button type="button" class="btn btn-dark" id="file-btn">Upload CSV File</button> <span id="file-title"></span>

        {{ Form::submit('Click Me!', ['class' => 'btn btn-primary']) }}
    {{ Form::close() }}
</div>


@endsection
