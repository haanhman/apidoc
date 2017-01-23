<?php

namespace App\Http\Controllers;

use App\ArgumentModel;
use App\FunctionModel;
use App\GroupFunctionModel;
use App\ProjectModel;
use App\ReturnValueModel;
use Collective\Html\FormFacade;
use Collective\Html\HtmlFacade;
use DebugBar\DebugBar;
use Illuminate\Http\Request;

use App\Http\Requests;

class FunctionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($project_id, $group_id)
    {
        $data = array();
        $data['project'] = ProjectModel::findOrFail($project_id);
        $data['group'] = GroupFunctionModel::findOrFail($group_id);

        $data['listItem'] = FunctionModel::where('group_id', '=' , $group_id)
            ->orderBy('request_method', 'ASC')
            ->get();
        return view('function.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($project_id, $group_id)
    {

        $data = array();
        $data['project'] = ProjectModel::findOrFail($project_id);
        $data['group'] = GroupFunctionModel::findOrFail($group_id);
        return view('function.add', ['data' => $data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $group_id = intval($request->get('group_id', 0));
        $project_id = intval($request->get('project_id', 0));
        $function = new FunctionModel();
        $function->project_id = $project_id;
        $function->group_id = $group_id;
        $function->end_point = trim($request->get('end_point'));
        $function->request_method = trim($request->get('request_method'));
        $function->description = trim($request->get('description'));
        $function->sample_data = trim($request->get('sample_data'));
        $function->status = intval($request->get('status'));
        $function->created = time();
        $function->save();

        //argument
        $argument = $request->get('argument');
        if(!empty($argument)) {
            $argument['name'] = array_filter($argument['name']);
            if(!empty($argument['name'])) {
                foreach($argument['name'] as $index => $name) {
                    $arg = new ArgumentModel();
                    $arg->project_id = $project_id;
                    $arg->function_id = $function->id;
                    $arg->name = $name;
                    $arg->data_type = $argument['type'][$index];
                    $arg->is_required = isset($argument['is_required'][$index]) ? intval($argument['is_required'][$index]) : 0;
                    $arg->is_header = isset($argument['is_header'][$index]) ? intval($argument['is_header'][$index]) : 0;
                    $arg->description = trim($argument['description'][$index]);
                    $arg->weight = $index;
                    $arg->created = time();
                    $arg->save();
                }
            }
        }

        //return value
        $return_value = $request->get('returnvalue');
        if(!empty($return_value)) {
            $return_value['name'] = array_filter($return_value['name']);
            if(!empty($return_value['name'])) {
                foreach($return_value['name'] as $index => $name) {
                    $arg = new ReturnValueModel();
                    $arg->project_id = $project_id;
                    $arg->function_id = $function->id;
                    $arg->name = $name;
                    $arg->data_type = $return_value['type'][$index];
                    $arg->description = trim($return_value['description'][$index]);
                    $arg->weight = $index;
                    $arg->created = time();
                    $arg->save();
                }
            }

        }
        \Session::flash('message', 'Create function success');
        return \Redirect::route('function.index',['group_id' => $group_id, 'project_id' => $project_id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = array();
        $data['function'] = FunctionModel::findOrFail($id);
        $group_id = $data['function']->group_id;
        $data['group'] = GroupFunctionModel::findOrFail($group_id);
        $data['project'] = ProjectModel::findOrFail($data['group']->project_id);

        //argument & return value
        $data['listArgument'] = ArgumentModel::where('function_id','=',$id)->get();
        $data['listReturnValue'] = ReturnValueModel::where('function_id','=',$id)->get();

        //lay danh sach group
        $listGroup = GroupFunctionModel::all();
        $data['list_group'] = array();
        foreach($listGroup as $item) {
            $data['list_group'][$item->id] = $item->name;
        }

        return view('function.edit', ['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $group_id = intval($request->get('group_id'));
        $project_id = intval($request->get('project_id', 0));
        $function = FunctionModel::findOrFail($id);
        $function->end_point = trim($request->get('end_point'));
        $function->request_method = trim($request->get('request_method'));
        $function->description = trim($request->get('description'));
        $function->sample_data = trim($request->get('sample_data'));
        $function->status = intval($request->get('status'));
        $function->group_id = $group_id;
        $function->save();

        //remove all data
        $listArgument = ArgumentModel::where('function_id','=',$id)->get();
        $listReturnValue = ReturnValueModel::where('function_id','=',$id)->get();
        if(!empty($listArgument)) {
            $list_id = array();
            foreach($listArgument as $item) {
                $list_id[] = $item->id;
            }
            ArgumentModel::destroy($list_id);
        }

        if(!empty($listReturnValue)) {
            $list_id = array();
            foreach($listReturnValue as $item) {
                $list_id[] = $item->id;
            }
            ReturnValueModel::destroy($list_id);
        }

        //argument
        $argument = $request->get('argument');
        if(!empty($argument)) {
            $argument['name'] = array_filter($argument['name']);
            if(!empty($argument['name'])) {
                foreach($argument['name'] as $index => $name) {
                    $arg = new ArgumentModel();
                    $arg->function_id = $function->id;
                    $arg->name = $name;
                    $arg->data_type = $argument['type'][$index];
                    $arg->is_required = isset($argument['is_required'][$index]) ? intval($argument['is_required'][$index]) : 0;
                    $arg->is_header = isset($argument['is_header'][$index]) ? intval($argument['is_header'][$index]) : 0;
                    $arg->description = trim($argument['description'][$index]);
                    $arg->weight = $index;
                    $arg->created = time();
                    $arg->save();
                }
            }
        }

        //return value
        $return_value = $request->get('returnvalue');
        if(!empty($return_value)) {
            $return_value['name'] = array_filter($return_value['name']);
            if(!empty($return_value['name'])) {
                foreach($return_value['name'] as $index => $name) {
                    $arg = new ReturnValueModel();
                    $arg->function_id = $function->id;
                    $arg->name = $name;
                    $arg->data_type = $return_value['type'][$index];
                    $arg->description = trim($return_value['description'][$index]);
                    $arg->weight = $index;
                    $arg->created = time();
                    $arg->save();
                }
            }

        }

        \Session::flash('message', 'Edit function success');
        return \Redirect::route('function.index',['group_id' => $group_id, 'project_id' => $project_id]);
        //eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9
        //.eyJpc3MiOiJodHRwOi8vZ3VuZHVtLmRldi91c2VyL3JlZ2lzdGVyIiwiaWF0IjoxNDc2Nzc2NzI4LCJleHAiOjE0NzY5OTI3MjgsIm5iZiI6MTQ3Njc3NjcyOCwianRpIjoiTlRjU3laWU9Cc0RNVjNjeiIsInN1YiI6Mn0
        //.NFaqwKhLl6hp5PkM7Q4rTe-oW6c2I-zmKvMNnMzwqxw
        /*
         *
         * aaa_1:sddsdgsgsdgsdgsdgsd
         * */

    }

    public function delete($id) {
        FunctionModel::destroy($id);
        $list = ArgumentModel::where('function_id', $id)->get();
        foreach($list as $item) {
            $item->delete();
        }
        $list = ReturnValueModel::where('function_id', $id)->get();
        foreach($list as $item) {
            $item->delete();
        }
        \Session::flash('message', 'Edit function success');
        return \Redirect::back();
    }
}
