<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Status;
use App\Models\Task as TaskModel;
use App\Models\Process as ProcessModel;

class Task extends Controller
{
    public function create(Request $request)
    {
        return view('manager.task.register', [
            'title' => 'Adiconar tarefa',
            'statuses' => Status::all('status'),
            'process' => ProcessModel::findOrFail($request->process_id)
        ]);
    }

    public function store(Request $request)
    {
        $task = new TaskModel();

        if ($task->validateStartDate($request->delivery)) {  
            return back()
                ->with('error', 'A data de entrega não pode ser anterior a data de criação do processo.');
        }

        if ($task->validateDeliveryDate($request->delivery, $request->start)) {  
            return back()
                ->with('error', 'A data de entrega não pode ser anterior a data de criação da tarefa.');
        }

        TaskModel::create($request->all());
    }

    public function edit(Request $request, int $id)
    {
            return view('manager.task.register', [
            'title' => "Editar tarefa {$request->name}",
            'task' => TaskModel::findOrFail($id),
            'statuses' => Status::all('status')
        ]);
    }

    public function update(Request $request)
    {
        TaskModel::where('id', $request->id)
        ->update($request->except('_token'));
         return redirect()->route('edit_task', $request->id);
    }
}
