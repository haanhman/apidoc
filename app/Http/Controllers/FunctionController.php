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
            ->orderBy('id', 'DESC')
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
                    $arg->function_id = $function->id;
                    $arg->name = $name;
                    $arg->data_type = $argument['type'][$index];
                    $arg->is_requered = isset($argument['is_required'][$index]) ? $argument['is_required'][$index] : 0;
                    $arg->is_header = isset($argument['is_header'][$index]) ? $argument['is_header'][$index] : 0;;
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
                    $arg->data_type = $argument['type'][$index];
                    $arg->description = trim($argument['description'][$index]);
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
        //
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
        //
    }
}
