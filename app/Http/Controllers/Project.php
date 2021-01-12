<?php

namespace App\Http\Controllers;

use App\Models\Project as ProjectModel;
use App\Models\Status;
use Illuminate\Http\Request;

class Project extends Controller
{
    public function create()
    {
        $statuses = Status::all('status');
        return view('manager.project.register', [
            'title' => 'Criar projeto',
            'statuses' => $statuses
        ]);
    }

    public function store(Request $request)
    {
        ProjectModel::create($request->all());
    }

    public function edit(Request $request, int $id)
    {
        $statuses = Status::all('status');
        $project = ProjectModel::findOrFail($id);

        return view('manager.project.register', [
            "title" => "Editar projeto | {$project->name}",
            'statuses' => $statuses,
            'project' => $project
        ])->with('id', $id);
    }

    public function update(Request $request)
    {
        ProjectModel::where('id', $request->id)
            ->update($request->except('_token'));
        return redirect()->route('edit_project', $request->id);
    }
}
