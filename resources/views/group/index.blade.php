@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="row">
            <h2>Group Function of: <span style="color: blue">{{$data['project']->name}}</span></h2>
            <div style="margin: 10px 0px;">
                {{link_to_route('project.create','Create new project', [], ['class' => 'btn btn-primary'])}}
            </div>
            <table class="table table-bordered table-hover">
                <tr>
                    <th>STT</th>
                    <th>Project Name</th>
                    <th>Function</th>
                    <th>Description</th>
                    <th>Created</th>
                </tr>
                @foreach($data['listItem'] as $item)
                    <tr>
                        <td>{{$loop->index+1}}</td>
                        <td>{{$item->name}}</td>
                        <td>{{link_to_route('function.index','detail',['project_id' => $data['project']->id, 'group_id' => $item->id])}}</td>
                        <td><?php echo nl2br($item->description) ?></td>
                        <td><?php echo date('d/m/Y H:i', $item->created) ?></td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection