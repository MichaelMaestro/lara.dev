<!-- resources/views/tasks.blade.php -->

@extends('app')

@section('content')
    <!-- Create Task Form... -->
    <!-- Current Tasks -->
    @if (count($tasks) > 0)
        <div class="panel panel-default">
            <div class="panel-heading">
                Current Tasks
            </div>
            <br>
            <a href="/task/create" class="btn btn-success">Создать задачу</a>
            <div class="panel-body">
                <table class="table table-striped task-table">

                    <!-- Table Headings -->
                    <thead>
                        <th>Задачи</th>
                        <th>&nbsp;</th>
                      
                    </thead>

                    <!-- Table Body -->
                    <tbody>
                        @foreach ($tasks as $task)
                            <tr>
                                <!-- Task Name -->
                                <td class="table-text">
                                    <div>{{ $task->name }} from {{ $task->project->name }} project </div>
                                    Tags:<br>
                                    @foreach($task->tags as $tag)
                                    <label><a href="/tag/{{$tag->id}}/tasks">#{{$tag->body}}</a></label>
                                    @endforeach  

                                   
                                </td>
                                <td> 
                                    @foreach($task->images as $image)
                                        <img src="\storage\app\{{ $image->path }}">
                                    @endforeach  
                                </td>
                                <td>
                                    <tr>
                                        <!-- Delete Button -->
                                        <td>
                                            <form action="{{ url('task/'.$task->id) }}" method="POST">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                                <button type="submit" class="btn btn-danger">
                                                    <i class="fa fa-trash"></i> Удалить
                                                </button>
                                            </form>
                                            @if($task->complete!=true)
                                            <form action="{{ url('task/'.$task->id) }}" method="POST">
                                            {{ csrf_field() }}
                                            {{ method_field('PATCH') }}
                                            <input type="submit" class="btn" value="Выполнить">
                                            </form>
                                            @endif

                                           

                                        </td>
                                        
                                    
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{ $tasks->links() }}
        </div>
    @endif
@endsection

