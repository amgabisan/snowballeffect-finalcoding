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

        {{ Form::submit('Validate Bank Accounts', ['class' => 'btn btn-primary']) }}
    {{ Form::close() }}
</div>

<hr>

@if (isset($bankAccounts) && !empty($bankAccounts))
<h2>Result</h2>
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col" class="text-center">Bank Account</th>
                <th scope="col" class="text-center">Result</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($bankAccounts as $key => $value)
        <?php
            if ($value) {
                echo '<tr class="table-success">';
                $icon = 'check';
                $text = 'Valid Bank Account';
            } else {
                echo '<tr class="table-danger">';
                $icon = 'times';
                $text = 'Invalid Bank Account';
            }
        ?>
            <td class="text-center">{{ $key }}</td>
            <td class="text-center"><i class="fas fa-{{ $icon }}"></i> {{ $text }}</td>
        </tr>
        @endforeach
        </tbody>
    </table>
<hr>
@endif
@endsection
