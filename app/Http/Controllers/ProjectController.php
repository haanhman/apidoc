<?php

namespace App\Http\Controllers;

use App\ArgumentModel;
use App\FunctionModel;
use App\GroupFunctionModel;
use App\ProjectModel;
use App\ReturnValueModel;
use Illuminate\Http\Request;

use App\Http\Requests;

class ProjectController extends Controller
{
    private $project;
    private $group_function;
    private $function;
    private $argument;
    private $return_value;
    private $project_id;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = array();
        $data['listProject'] = ProjectModel::orderBy('id', 'DESC')->get();
        return view('project.index', ['data' => $data]);
    }

    public function import()
    {
        return view('project.import');
    }

    private function deleteData($pName = '') {
        $pro = ProjectModel::where('name', '=', $pName)->first();
        if(!empty($pro)) {
            ProjectModel::find($pro->id)->delete();
            GroupFunctionModel::where('project_id', '=', $pro->id)->delete();
            FunctionModel::where('project_id', '=', $pro->id)->delete();
            ArgumentModel::where('project_id', '=', $pro->id)->delete();
            ReturnValueModel::where('project_id', '=', $pro->id)->delete();
        }
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!$request->hasFile('json')) {
            die('Please browse json file');
        }

        $file = $request->file('json');
        $content = file_get_contents($file->getPathname());
        $json = json_decode($content, true);
        $this->project = $json['project'];
        $this->group_function = $json['group_function'];
        $this->function = $json['function'];
        $this->argument = $json['argument'];
        $this->return_value = $json['return_value'];

        $this->deleteData($this->project['name']);
        $pItem = new ProjectModel();
        $pItem->name = $this->project['name'];
        $pItem->prefix = $this->project['prefix'];
        $pItem->description = $this->project['description'];
        $pItem->status = $this->project['status'];
        $pItem->created = $this->project['created'];
        $pItem->save();

        $this->project_id = $pItem->id;
        foreach ($this->group_function as $item) {
            $listFunction = isset($this->function[$item['id']]) ? $this->function[$item['id']] : array();
            unset($item['id']);
            $item['project_id'] = $this->project_id;
            $gfun = new GroupFunctionModel();
            foreach ($item as $key => $vl) {
                $gfun->$key = $vl;
            }
            $gfun->save();
            $this->insertListFunction($listFunction, $gfun->id);
        }
        return redirect()->route('project.index');

    }

    private function insertListFunction($function, $groupId)
    {
        if (empty($function)) {
            return;
        }
        foreach ($function as $item) {
            $oldId = $item['id'];
            unset($item['id']);
            $fun = new FunctionModel();
            foreach ($item as $key => $vl) {
                $fun->$key = $vl;
            }
            $fun->group_id = $groupId;
            $fun->project_id = $this->project_id;
            $fun->save();
            $newId = $fun->id;
            $this->insertArgument($oldId, $newId);
            $this->insertReturnValue($oldId, $newId);
        }
    }

    private function insertArgument($oldId, $newId)
    {
        $argument = isset($this->argument[$oldId]) ? $this->argument[$oldId]  : array();
        if(empty($argument)) {
            return;
        }
        foreach ($argument as $index => $item) {
            unset($argument[$index]['id']);
            $argument[$index]['function_id'] = $newId;
            $argument[$index]['project_id'] = $this->project_id;
        }
        ArgumentModel::insert($argument);
    }

    private function insertReturnValue($oldId, $newId) {
        $list = isset($this->return_value[$oldId]) ? $this->return_value[$oldId]  : array();
        if(empty($list)) {
            return;
        }
        foreach ($list as $index => $item) {
            unset($list[$index]['id']);
            $list[$index]['function_id'] = $newId;
            $list[$index]['project_id'] = $this->project_id;
        }
        ReturnValueModel::insert($list);
    }
}
