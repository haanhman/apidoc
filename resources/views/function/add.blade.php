@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="row">
            <h2>create function group: <span style="color: green">{{$data['group']->name}}</span> of project <span
                        style="color: blue">{{$data['project']->name}}</span></h2>
            <div style="margin: 10px 0px;">
                {{link_to_route('function.index','Back', ['group_id'=>$data['group']->id,'project_id' => $data['project']->id], ['class' => 'btn btn-primary'])}}
            </div>

            {!! Form::open(['url' => route('function.store'), 'class' => 'form-horizontal']) !!}
            {!! Form::hidden('group_id',$data['group']->id) !!}
            {!! Form::hidden('project_id',$data['project']->id) !!}
            <div class="form-group">
                {!! Form::label('end_point', 'End point URL: ', ['class' => 'col-sm-2 control-label']) !!}
                <div class="col-sm-10">
                    {!! Form::text('end_point',null,['class' => 'form-control']) !!}
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('request_method', 'Request method: ', ['class' => 'col-sm-2 control-label']) !!}
                <div class="col-sm-10">
                    {!! Form::select('request_method',['GET', 'POST', 'PUT', 'DELETE'],null,['class' => 'form-control']) !!}
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('description', 'Description: ', ['class' => 'col-sm-2 control-label']) !!}
                <div class="col-sm-10">
                    {!! Form::textarea('description',null,['class' => 'form-control', 'style' => 'height: 100px;']) !!}
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('sample_data', 'Sample data: ', ['class' => 'col-sm-2 control-label']) !!}
                <div class="col-sm-10">
                    {!! Form::textarea('sample_data',null,['class' => 'form-control', 'style' => 'height: 100px;']) !!}
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('status', 'Status: ', ['class' => 'col-sm-2 control-label']) !!}
                <div class="col-sm-10">
                    {!! Form::select('status',[0 => 'Draft', 1=>'Done'],null,['class' => 'form-control']) !!}
                </div>
            </div>


            <h3>Argument</h3>
            <a class="add-argument" style="cursor: pointer; color: blue;">Add argument</a>
            <div id="argument">
                <div id="argument_base" class="form-group form-inline">
                    <input type="text" class="form-control" name="argument[name][]" placeholder="Name">
                    <select class="form-control" name="argument[type][]">
                        <option value="int">int</option>
                        <option value="float">float</option>
                        <option value="double">double</option>
                        <option value="string">string</option>
                        <option value="array">array</option>
                    </select>
                    <label>Required: <input type="checkbox" name="argument[is_required][]" value="1" checked=""></label>
                    <label>Header: <input type="checkbox" name="argument[is_header][]" value="1"></label>
                    <input style="width: 40%" type="text" class="form-control" name="argument[description][]"
                           placeholder="Description">
                </div>
            </div>

            <h3>Return value</h3>
            <a class="add-return" style="cursor: pointer; color: blue;">Add return value</a>
            <div id="returnvalue">
                <div id="returnvalue_base" class="form-group form-inline">
                    <input type="text" class="form-control" name="returnvalue[name][]" placeholder="Name">
                    <select class="form-control" name="returnvalue[type][]">
                        <option value="int">int</option>
                        <option value="float">float</option>
                        <option value="double">double</option>
                        <option value="string">string</option>
                        <option value="array">array</option>
                    </select>
                    <input style="width: 40%" type="text" class="form-control" name="returnvalue[description][]"
                           placeholder="Description">
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
    <script type="text/javascript">
        $(function () {
            var base_html = $('#argument_base').html();
            $('.add-argument').click(function () {
                var tmp_html = base_html;
                tmp_html += '<a class="argument-rm">Delete</a>'
                var html = '<div class="form-group form-inline">' + tmp_html + '</div>';
                $('#argument').append(html);
            });

            $('#argument').on('click', '.argument-rm', function () {
                $(this).parent().remove();
            });
            //return value

            var return_value_html = $('#returnvalue_base').html();
            $('.add-return').click(function () {
                var tmp_html = return_value_html;
                tmp_html += '<a class="argument-rm">Delete</a>'
                var html = '<div class="form-group form-inline">' + tmp_html + '</div>';
                $('#returnvalue').append(html);
            });

            $('#returnvalue').on('click', '.argument-rm', function () {
                $(this).parent().remove();
            });
        });

    </script>
    <style type="text/css">
        .argument-rm {
            color: red;
            cursor: pointer;
        }
    </style>
@endsection