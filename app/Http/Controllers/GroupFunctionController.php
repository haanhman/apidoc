<?php

namespace App\Http\Controllers;

use App\GroupFunctionModel;
use App\ProjectModel;
use Illuminate\Http\Request;

use App\Http\Requests;

class GroupFunctionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($project_id)
    {
        $data = array();

        $data['project'] = ProjectModel::findOrFail($project_id);

        $data['listItem'] = GroupFunctionModel::where('project_id','=',$project_id)
            ->orderBy('id', 'DESC')
            ->get();
        return view('group.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($project_id)
    {
        $data = array();

        $data['project'] = ProjectModel::findOrFail($project_id);
        return view('group.add', ['data' => $data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $name = trim($request->get('name'));
        $description = trim($request->get('description'));
        $project_id = intval($request->get('project_id'));
        if(!empty($name)) {
            $gf = new GroupFunctionModel();
            $gf->name = $name;
            $gf->description = $description;
            $gf->project_id = $project_id;
            $gf->created = time();
            $gf->weight = 0;
            $gf->save();
            \Session::flash('message','create group success');
            return \Redirect::route('group.index', ['project_id' => $project_id]);
        }
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
        $data['group_function'] = GroupFunctionModel::findOrFail($id);
        $project_id = $data['group_function']->project_id;
        $data['project'] = ProjectModel::findOrFail($project_id);
        return view('group.edit', ['data' => $data]);
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
        $name = trim($request->get('name'));
        $description = trim($request->get('description'));
        $project_id = intval($request->get('project_id'));
        if(!empty($name)) {
            $gf = GroupFunctionModel::findOrFail($id);
            $gf->name = $name;
            $gf->description = $description;
            $gf->project_id = $project_id;
            $gf->save();
            \Session::flash('message','edit group success');
            return \Redirect::route('group.index', ['project_id' => $project_id]);
        }
    }
}
