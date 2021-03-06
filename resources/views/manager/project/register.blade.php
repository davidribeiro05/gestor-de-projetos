@extends('layout')

@section('content')
    <form method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-row">
            <input type="hidden" class="form-control" id="id" name="id"
                   value="{{!empty($project->id) ? $project->id : '' }}">
            <div class="form-group col-md-6">
                <label for="name">Nome do projeto:</label>
                <input type="text" class="form-control" id="name" name="name"
                       value="{{!empty($project->id) ? $project->name : '' }}" required>
            </div>
            <div class="form-group col-md-3">
                <label for="start">Data de início:</label>
                <input type="date" class="form-control" id="start" name="start" required
                       value="{{!empty($project->id) ? $project->start : '' }}">
            </div>
            <div class="form-group col-md-3">
                <label for="delivery">Data de entrega:</label>
                <input type="date" class="form-control" id="delivery" name="delivery"
                       value="{{!empty($project->id) ? $project->delivery : '' }}">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-12">
                <label for="description">Descrição do projeto:</label>
                <input type="text" class="form-control" id="description" name="description" required
                       value="{{!empty($project->id) ? $project->description : '' }}">
            </div>
            <div class="form-group col-md-2">
                <label for="workedHours">Horas trabalhadas:</label>
                <input type="time" class="form-control" id="workedHours" name="workedHours"
                       value="{{!empty($project->id) ? $project->workedHours : '' }}">
            </div>
            <div class="form-group col-md-2">
                <label for="status">Status</label>
                <select class="custom-select" name="status" id="status">
                    <option selected value="{{!empty($project->id) ? $project->status : 'Iniciado' }}">
                        {{!empty($project->id) ? $project->status : 'Status'}}
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
                    @if(!empty($project->id))
                        <input formaction="{{route('update_project')}}" type="submit"
                               class="dropdown-item"
                               value="Salvar">
                    @else
                        <input formaction="{{route('create_project')}}" type="submit"
                               class="dropdown-item"
                               value="Salvar">
                    @endif
                    @if(!empty($project->id))
                        <a href="{{route('form_process', ['project_id' => $project->id])}}"
                           class="dropdown-item" type="submit">
                            Adicionar processo
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </form>
@endsection
