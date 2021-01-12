@extends('layout')

@section('content')
    <form method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-row">
            <input type="hidden" class="form-control" id="id" name="id"
                   value="{{!empty($task->id) ? $task->id : '' }}">
                   <input type="hidden" name="processes_id"
                   value="{{empty($process->id)  ? $task->processes_id : $process->id}}">
            <div class="form-group col-md-6">
                <label for="name">Nome da tarefa:</label>
                <input type="text" class="form-control" id="name" name="name"
                       value="{{!empty($task->id) ? $task->name : '' }}" required>
            </div>
            <div class="form-group col-md-3">
                <label for="start">Data de início:</label>
                <input type="date" class="form-control" id="start" name="start" required
                       value="{{!empty($task->id) ? $task->start : '' }}">
            </div>
            <div class="form-group col-md-3">
                <label for="delivery">Data de entrega:</label>
                <input type="date" class="form-control" id="delivery" name="delivery"
                       value="{{!empty($task->id) ? $task->delivery : '' }}">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-12">
                <label for="description">Descrição da tarefa:</label>
                <input type="text" class="form-control" id="description" name="description" required
                       value="{{!empty($task->id) ? $task->description : '' }}">
            </div>
            <div class="form-group col-md-2">
                <label for="workedHours">Horas trabalhadas:</label>
                <input type="time" class="form-control" id="workedHours" name="workedHours"
                       value="{{!empty($task->id) ? $task->workedHours : '' }}">
            </div>
            <div class="form-group col-md-2">
                <label for="status">Status</label>
                <select class="custom-select" name="status" id="status">
                    <option selected value="{{!empty($task->id) ? $task->status : 'Iniciado' }}">
                        {{!empty($task->id) ? $task->status : 'Status'}}
                    </option>
                    @foreach($statuses as $status)
                        <option value="{{$status->status}}">
                            {{$status->status}}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="d-flex flex-row-reverse input-group mb-3">
            <div class="input-group-prepend">
                <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">Ações
                </button>
                <div class="dropdown-menu">
                    <a href="/" class="dropdown-item">Cancelar</a>
                    @if(!empty($task->id))
                        <input formaction="{{route('update_task')}}" type="submit"
                               class="dropdown-item"
                               value="Salvar">
                    @else
                        <input formaction="{{route('create_task')}}" type="submit"
                               class="dropdown-item"
                               value="Salvar">
                    @endif
                </div>
            </div>
        </div>
    </form>
@endsection
