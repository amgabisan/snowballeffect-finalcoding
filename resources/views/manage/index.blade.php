@extends ('partials.layout')

@section ('content')

<h2>Bank Account Validation</h2>
<hr>

@if ($errors->has('csvFile'))
    <div class="alert alert-danger">
        <h4 class="alert-heading">Errr! Please check the error and fix to successfully upload CSV</h4>
        <ul>
            @foreach ($errors->get('csvFile') as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="text-center">
    {{ Form::open(['url' => '', 'method' => 'POST', 'files'=>'true']) }}
        {{ Form::file('csvFile', ['class' => 'd-none', 'id' => 'csvFile-btn']) }}
        <button type="button" class="btn btn-dark" id="file-btn">Upload CSV File</button> <span id="file-title"></span>

        {{ Form::submit('Submit', ['class' => 'btn btn-primary']) }}
    {{ Form::close() }}
</div>

<hr>


@endsection
