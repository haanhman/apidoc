@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="row">
            <h2>Edit group of project: <span style="color: blue">{{$data['project']->name}}</span></h2>
            <div style="margin: 10px 0px;">
                {{link_to_route('group.index','Back', ['project_id'=>$data['project']->id], ['class' => 'btn btn-primary'])}}
            </div>
            {{ Form::model($data['group_function'],['url' => route('group.update', ['id' => $data['group_function']->id]), 'class' => 'form-horizontal', 'method' => 'PATCH'])  }}
            {!! Form::hidden('project_id',$data['project']->id) !!}
            <div class="form-group">
                {!! Form::label('name', 'Group name: ', ['class' => 'col-sm-2 control-label']) !!}
                <div class="col-sm-10">
                    {!! Form::text('name',null,['class' => 'form-control']) !!}
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('description', 'Description: ', ['class' => 'col-sm-2 control-label']) !!}
                <div class="col-sm-10">
                    {!! Form::textarea('description',null,['class' => 'form-control', 'style' => 'height: 100px;']) !!}
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    {!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}
                </div>
            </div>
            {!! Form::close() !!}


        </div>
    </div>
@endsection