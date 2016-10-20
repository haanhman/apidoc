@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="row">
            <h2>List function group: <span style="color: green">{{$data['group']->name}}</span> of project <span
                        style="color: blue">{{$data['project']->name}}</span></h2>
            <div style="margin: 10px 0px;">
                {{link_to_route('function.create','Create new function', ['group_id'=>$data['group']->id,'project_id' => $data['project']->id], ['class' => 'btn btn-primary'])}}
            </div>
            <p class="bg-success">{{Session::get('message')}}</p>
            <table class="table table-bordered table-hover">
                <tr>
                    <th>STT</th>
                    <th>End point</th>
                    <th>Method</th>
                    <th>Description</th>
                    <th>Created</th>
                </tr>
                @foreach($data['listItem'] as $item)
                    <tr>
                        <td>{{$loop->index+1}}</td>
                        <td>{{$item->end_point}}</td>
                        <td>{{$item->request_method}}</td>
                        <td><?php echo nl2br($item->description) ?></td>
                        <td><?php echo date('d/m/Y H:i', $item->created) ?></td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection