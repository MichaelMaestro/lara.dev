@extends('app')
@section('content')

  <!-- Bootstrap шаблон... -->

  <div class="panel-body">
    <!-- Отображение ошибок проверки ввода -->
    @include('common.errors')

    <!-- Форма новой задачи -->
    <form action="{{ url('task') }}" method="POST" class="form-horizontal">
      {{ csrf_field() }}

      <!-- Имя задачи -->
      <div class="form-group">
        <div class="col-md-6 col-sm-6">
          <input type="text" name="name" id="task-name" class="form-control" placeholder="Имя задачи">
          <select class="form-control" name="project_id">
            <option selected disabled>Выберите проект</option>
              @foreach ($projects as $project)
              <option value="{{ $project->id }}">
                {{ $project->name }}
              </option>
              @endforeach
          </select>

          <select class="form-control" name="tag_ids[]" multiple>
            <option selected disabled>Выберите Тэг</option>
                @foreach($tags as $tag)
              <option value="{{ $tag->id }}">
                {{$tag->body}}
              </option>
              @endforeach
          </select>
        </div>
      </div>

      <!-- Кнопка добавления задачи -->
      <div class="form-group">
        <div class="col-sm-offset-3 col-sm-6">
          <button type="submit" class="btn btn-default">
            <i class="fa fa-plus"></i> Добавить задачу
          </button>
        </div>
      </div>
    </form>
  </div>

  <!-- TODO: Текущие задачи -->
@endsection