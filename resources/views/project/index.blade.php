@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="row">
            <h2>List Project</h2>
            <div style="margin: 10px 0px;">
                {{link_to_route('project.import','Import project', [], ['class' => 'btn btn-default'])}}
            </div>
            <table class="table table-bordered table-hover">
                <tr>
                    <th>STT</th>
                    <th>Project Name</th>
                    <th>Prefix</th>
                    <th>Group function</th>
                    <th>Description</th>
                    <th>Document</th>
                    <th>Download JSON</th>
                    <th>Created</th>
                </tr>
                @foreach($data['listProject'] as $item)
                    <tr>
                        <td>{{$loop->index+1}}</td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->prefix}}</td>
                        <td>{{link_to_route('group.index','detail',['project_id' => $item->id])}}</td>
                        <td><?php echo nl2br($item->description) ?></td>
                        <td>{{link_to_route('document.index','Detail',['project_id' => $item->id], ['target' => '_blank'])}}</td>
                        <td class="text-center">
                            <a href="{{route('document.index', ['project_id' => $item->id, 'json' => 1])}}"><span class="glyphicon glyphicon-download-alt"></span></a>
                        </td>
                        <td><?php echo date('d/m/Y H:i', $item->created) ?></td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection