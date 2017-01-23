<?php

namespace App\Http\Controllers;

use App\ArgumentModel;
use App\FunctionModel;
use App\GroupFunctionModel;
use App\ProjectModel;
use App\ReturnValueModel;
use Illuminate\Http\Request;

use App\Http\Requests;

class DocumentController extends Controller
{
    public function index($project_id)
    {
        $data = array();
        $data['project'] = ProjectModel::findOrFail($project_id);
        $data['group_function'] = GroupFunctionModel::where('project_id', '=', $project_id)->orderBy('weight', 'ASC')->get();
        if (empty($data['group_function']->toArray())) {
            die('chua co group function');
        } else
            $listGroupFunctionId = array();
        foreach ($data['group_function'] as $item) {
            $listGroupFunctionId[] = $item->id;
        }

        $function = FunctionModel::whereIn('group_id', $listGroupFunctionId)->where('status', '=', 1)->orderBy('request_method', 'ASC')->get();
        if (!empty($function)) {
            $listFunctionId = array();
            foreach ($function as $item) {
                $data['function'][$item->group_id][] = $item->toArray();
                $listFunctionId[] = $item->id;
            }

            //lay danh sach argument va return value

            $argument = ArgumentModel::whereIn('function_id', $listFunctionId)->orderBy('weight', 'ASC')->get();
            $returnValue = ReturnValueModel::whereIn('function_id', $listFunctionId)->orderBy('weight', 'ASC')->get();
            foreach ($argument as $item) {
                $data['argument'][$item->function_id][] = $item->toArray();
            }
            foreach ($returnValue as $item) {
                $data['return_value'][$item->function_id][] = $item->toArray();
            }
        }
        if (isset($_GET['json'])) {
            return $this->exportJsonData($data);
        }
        return view(isset($_GET['md']) ? 'document.md' : 'document.index', ['data' => $data]);
    }

    private function exportJsonData($data)
    {
        $jsonData = array();
        $jsonData['project'] = $data['project']->toArray();
        $jsonData['group_function'] = $data['group_function']->toArray();
        $jsonData['function'] = $data['function'];
        $jsonData['argument'] = $data['argument'];
        $jsonData['return_value'] = $data['return_value'];
        $path = storage_path() . '/json';
        if (!is_dir($path)) {
            mkdir($path);
        }
        $fileName = $jsonData['project']['id'] . '_' . date('d-m-Y') . '.json';
        file_put_contents($path . '/' . $fileName, json_encode($jsonData));
        return '<h1>' . $fileName . '</h1>';
    }
}
