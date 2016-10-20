@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="row">
            <h2>List Project</h2>
            <div style="margin: 10px 0px;">
                {{link_to_route('project.create','Create new project', [], ['class' => 'btn btn-primary'])}}
            </div>
            <table class="table table-bordered table-hover">
                <tr>
                    <th>STT</th>
                    <th>Project Name</th>
                    <th>Group function</th>
                    <th>Description</th>
                    <th>Created</th>
                </tr>
                @foreach($data['listProject'] as $item)
                    <tr>
                        <td>{{$loop->index+1}}</td>
                        <td>{{$item->name}}</td>
                        <td>{{link_to_route('group.index','detail',['project_id' => $item->id])}}</td>
                        <td><?php echo nl2br($item->description) ?></td>
                        <td><?php echo date('d/m/Y H:i', $item->created) ?></td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection