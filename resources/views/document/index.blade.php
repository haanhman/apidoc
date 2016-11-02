@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="row">
            <h1><?php echo $data['project']->name ?></h1>

            <p class="lead"><?php echo nl2br($data['project']->description) ?></p>
            <ul>
                @foreach($data['group_function'] as $group)
                    <li><a href="#group-{{$group->id}}">{{$group->name}}</a></li>
                @endforeach
            </ul>

            @foreach($data['group_function'] as $group)
                <h2>{{$group->name}}</h2>
                <a name="group-{{$group->id}}"></a>
                <p><?php echo nl2br($group->description) ?></p>
                <hr/>
                <?php
                $function = !empty($data['function'][$group->id]) ? $data['function'][$group->id] : array();
                if(!empty($function)) {
                ?>
                <div class="panel-group" id="accordion_{{$group->id}}" role="tablist" aria-multiselectable="true">

                    <?php
                    foreach($function as $func) {
                    $args = !empty($data['argument'][$func['id']]) ? $data['argument'][$func['id']] : array();
                    $return_value = !empty($data['return_value'][$func['id']]) ? $data['return_value'][$func['id']] : array();
                    ?>
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="heading_<?php echo $func['id'] ?>">
                            <h4 class="panel-title">
                                <a role="button" data-toggle="collapse" data-parent="#accordion"
                                   href="#collapse_<?php echo $func['id'] ?>" aria-expanded="true"
                                   aria-controls="collapseOne">
                                    <?php echo '/v1' . $func['end_point'] . ' [' . $func['request_method'] . ']' ?>
                                </a>
                            </h4>
                        </div>
                        <div id="collapse_<?php echo $func['id'] ?>" class="panel-collapse collapse" role="tabpanel"
                             aria-labelledby="heading_<?php echo $func['id'] ?>">
                            <div class="panel-body">
                                <p><em><?php echo nl2br($func['description']) ?></em></p>

                                <p>End point: <strong><?php echo '/v1'.$func['end_point'] ?></strong></p>

                                <p>Request method: <strong><?php echo $func['request_method'] ?></strong></p>

                                <div><strong>Argument</strong></div>
                                <table class="table table-bordered table-hover">
                                    <tr>
                                        <th>Name</th>
                                        <th>Type</th>
                                        <th>Header</th>
                                        <th>Required</th>
                                        <th>Description</th>
                                    </tr>
                                    <?php
                                    if(!empty($args)) {
                                    foreach($args as $arg_item) {
                                    ?>
                                    <tr>
                                        <td><?php echo $arg_item['name'] ?></td>
                                        <td><?php echo $arg_item['data_type'] ?></td>
                                        <td>
                                            <?php
                                            if ($arg_item['is_header']) {
                                                echo '<i style="color: green;" class="glyphicon glyphicon-ok"></i>';
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                            if ($arg_item['is_required']) {
                                                echo '<i style="color: green;" class="glyphicon glyphicon-ok"></i>';
                                            }
                                            ?>
                                        </td>
                                        <td><?php echo $arg_item['description'] ?></td>
                                    </tr>
                                    <?php
                                    }
                                    } else {
                                        echo '<tr><td colspan="5">No argument</td></tr>';
                                    }
                                    ?>
                                </table>

                                <div><strong>Return value</strong></div>
                                <table class="table table-bordered table-hover">
                                    <tr>
                                        <th>Name</th>
                                        <th>Type</th>
                                        <th>Description</th>
                                    </tr>
                                    <?php
                                    if(!empty($return_value)) {
                                    foreach($return_value as $rt_item) {
                                    ?>
                                    <tr>
                                        <td><?php echo $rt_item['name'] ?></td>
                                        <td><?php echo $rt_item['data_type'] ?></td>
                                        <td><?php echo $rt_item['description'] ?></td>
                                    </tr>
                                    <?php
                                    }
                                    } else {
                                        echo '<tr><td colspan="3">No return value</td></tr>';
                                    }
                                    ?>
                                </table>

                                <div><strong>Sample data</strong></div>
                                <pre><code class="JavaScript"><?php echo $func['sample_data'] ?></code></pre>

                            </div>
                        </div>
                    </div>
                    <?php
                    }
                    ?>

                </div>
                <?php
                }
                ?>
            @endforeach
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function () {
            $('pre code').each(function (i, block) {
                hljs.highlightBlock(block);
            });
        });
    </script>
@endsection