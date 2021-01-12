<?php

namespace App\Http\Controllers;

use App\Models\Process as ProcessModel;
use App\Models\Project as ProjectModel;
use App\Models\Status;
use Illuminate\Http\Request;

class Process extends Controller
{
    public function create(Request $request)
    {

        return view('manager.process.register', [
            'title' => 'Adicionar processos',
            'statuses' => Status::all('status'),
            'project' => ProjectModel::findOrFail($request->project_id)
        ]);
    }

    public function store(Request $request)
    {
        ProcessModel::create($request->all());
    }

    public function edit(Request $request, int $id)
    {
        $statuses = $statuses = Status::all('status');
        $process = ProcessModel::find($id);

        return view('manager.process.register', [
            'title' => 'Adicionar processos',
            'statuses' => $statuses,
            'process' => $process
        ]);
    }

    public function update(Request $request)
    {
        ProcessModel::where('id', $request->id)
            ->update($request->except('_token'));
        return redirect()->route('edit_process', $request->id);
    }
}
