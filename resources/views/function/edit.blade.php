@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="row">
            <h2>Edit function group: <span style="color: green">{{$data['group']->name}}</span> of project <span
                        style="color: blue">{{$data['project']->name}}</span></h2>

            <div style="margin: 10px 0px;">
                {{link_to_route('function.index','Back', ['group_id'=>$data['group']->id,'project_id' => $data['project']->id], ['class' => 'btn btn-primary'])}}
            </div>
            {{ Form::model($data['function'],['url' => route('function.update', ['id' => $data['function']->id]), 'class' => 'form-horizontal', 'method' => 'PATCH'])  }}
            {!! Form::hidden('project_id',$data['project']->id) !!}
            <div class="form-group">
                {{Form::label('group_id', 'Group: ', ['class' => 'col-sm-2 control-label'])}}
                <div class="col-sm-10">
                    {{Form::select('group_id',$data['list_group'],null,['class' => 'form-control'])}}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('end_point', 'End point URL: ', ['class' => 'col-sm-2 control-label']) !!}
                <div class="col-sm-10">
                    {!! Form::text('end_point',null,['class' => 'form-control']) !!}
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('request_method', 'Request method: ', ['class' => 'col-sm-2 control-label']) !!}
                <div class="col-sm-10">
                    {!! Form::select('request_method',['GET' => 'GET', 'POST' => 'POST', 'PUT' => 'PUT', 'DELETE' =>
                    'DELETE'],null,['class' => 'form-control'])
                    !!}
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


                @foreach($data['listArgument'] as $item)
                    <div id="argument_base" class="form-group form-inline">
                        <input type="text" value="{{Html::entities($item->name)}}" class="form-control"
                               name="argument[name][{{$loop->index}}]" placeholder="Name">
                        <select class="form-control" name="argument[type][{{$loop->index}}]">
                            <option <?php if ($item->data_type == 'int') echo 'selected'; ?> value="int">int</option>
                            <option <?php if ($item->data_type == 'float') echo 'selected'; ?> value="float">float
                            </option>
                            <option <?php if ($item->data_type == 'double') echo 'selected'; ?> value="double">double
                            </option>
                            <option <?php if ($item->data_type == 'string') echo 'selected'; ?> value="string">string
                            </option>
                            <option <?php if ($item->data_type == 'array') echo 'selected'; ?> value="array">array
                            </option>
                        </select>
                        <label>Required: <input type="checkbox" name="argument[is_required][{{$loop->index}}]"
                                                value="1" <?php if ($item->is_required == 1) echo 'checked=""'; ?>></label>
                        <label>Header: <input type="checkbox" name="argument[is_header][{{$loop->index}}]"
                                              value="1" <?php if ($item->is_header == 1) echo 'checked=""'; ?>></label>
                        <input value="{{Html::entities($item->description)}}" style="width: 40%" type="text"
                               class="form-control" name="argument[description][{{$loop->index}}]"
                               placeholder="Description">
                        <a class="argument-rm">Delete</a>
                    </div>
                @endforeach
                <?php
                $arg_index = count($data['listArgument']);
                ?>
                <div id="argument_base" class="form-group form-inline">
                    <input type="text" class="form-control" name="argument[name][{{$arg_index}}]" placeholder="Name">
                    <select class="form-control" name="argument[type][{{$arg_index}}]">
                        <option value="int">int</option>
                        <option value="float">float</option>
                        <option value="double">double</option>
                        <option value="string">string</option>
                        <option value="array">array</option>
                    </select>
                    <label>Required: <input type="checkbox" name="argument[is_required][{{$arg_index}}]" value="1"
                                            checked=""></label>
                    <label>Header: <input type="checkbox" name="argument[is_header][{{$arg_index}}]" value="1"></label>
                    <input style="width: 40%" type="text" class="form-control"
                           name="argument[description][{{$arg_index}}]"
                           placeholder="Description">
                    <a class="argument-rm">Delete</a>
                </div>
            </div>

            <h3>Return value</h3>
            <a class="add-return" style="cursor: pointer; color: blue;">Add return value</a>

            <div id="returnvalue">

                @foreach($data['listReturnValue'] as $item)
                    <div class="form-group form-inline">
                        <input value="{{$item->name}}" type="text" class="form-control"
                               name="returnvalue[name][{{$loop->index}}]" placeholder="Name">
                        <select class="form-control" name="returnvalue[type][{{$loop->index}}]">
                            <option <?php if ($item->data_type == 'int') echo 'selected'; ?> value="int">int</option>
                            <option <?php if ($item->data_type == 'float') echo 'selected'; ?> value="float">float
                            </option>
                            <option <?php if ($item->data_type == 'double') echo 'selected'; ?> value="double">double
                            </option>
                            <option <?php if ($item->data_type == 'string') echo 'selected'; ?> value="string">string
                            </option>
                            <option <?php if ($item->data_type == 'array') echo 'selected'; ?> value="array">array
                            </option>
                        </select>
                        <input value="{{$item->description}}" style="width: 40%" type="text" class="form-control"
                               name="returnvalue[description][{{$loop->index}}]"
                               placeholder="Description">
                        <a class="argument-rm">Delete</a>
                    </div>
                @endforeach
                <?php
                $rt_index = count($data['listReturnValue']);
                ?>
                <div id="returnvalue_base" class="form-group form-inline">
                    <input type="text" class="form-control" name="returnvalue[name][{{$rt_index}}]" placeholder="Name">
                    <select class="form-control" name="returnvalue[type][{{$rt_index}}]">
                        <option value="int">int</option>
                        <option value="float">float</option>
                        <option value="double">double</option>
                        <option value="string">string</option>
                        <option value="array">array</option>
                    </select>
                    <input style="width: 40%" type="text" class="form-control"
                           name="returnvalue[description][{{$rt_index}}]"
                           placeholder="Description">
                    <a class="argument-rm">Delete</a>
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
            var arg_index = <?php echo $arg_index+1; ?>;
            $('.add-argument').click(function () {
                var base_html = '<input type="text" class="form-control" name="argument[name][' + arg_index + ']" placeholder="Name">';
                base_html += ' <select  class="form-control" name="argument[type][' + arg_index + ']">';
                base_html += '<option value="int">int</option>';
                base_html += '<option value="float">float</option>';
                base_html += '<option value="double">double</option>';
                base_html += '<option value="string">string</option>';
                base_html += '<option value="array">array</option>';
                base_html += '</select>';
                base_html += ' <label>Required: <input type="checkbox" name="argument[is_required][' + arg_index + ']" value="1" checked=""></label>';
                base_html += ' <label>Header: <input type="checkbox" name="argument[is_header][' + arg_index + ']" value="1"></label>';
                base_html += ' <input style="width: 40%" type="text" class="form-control" name="argument[description][' + arg_index + ']"';
                base_html += ' placeholder="Description">';
                base_html += ' <a class="argument-rm">Delete</a>';
                var html = '<div class="form-group form-inline">' + base_html + '</div>';
                $('#argument').append(html);
                arg_index++;
            });

            $('#argument').on('click', '.argument-rm', function () {
                $(this).parent().remove();
            });
            //return value
            var return_index = <?php echo $rt_index+1; ?>;
            $('.add-return').click(function () {
                var return_value_html = '<input type="text" class="form-control" name="returnvalue[name][' + return_index + ']" placeholder="Name">';
                return_value_html += ' <select class="form-control" name="returnvalue[type][' + return_index + ']">';
                return_value_html += '<option value="int">int</option>';
                return_value_html += '<option value="float">float</option>';
                return_value_html += '<option value="double">double</option>';
                return_value_html += '<option value="string">string</option>';
                return_value_html += '<option value="array">array</option>';
                return_value_html += '</select>';
                return_value_html += ' <input style="width: 40%" type="text" class="form-control" name="returnvalue[description][' + return_index + ']"';
                return_value_html += ' placeholder="Description">';
                return_value_html += ' <a class="argument-rm">Delete</a>';
                var html = '<div class="form-group form-inline">' + return_value_html + '</div>';
                $('#returnvalue').append(html);
                return_index++;
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