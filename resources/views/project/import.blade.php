@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="row">
            <h2>Import Project</h2>
            {!! Form::open(['url' => route('project.store'), 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
            <div class="form-group">
                {!! Form::file('json') !!}
                {!! Form::submit('Submit') !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection