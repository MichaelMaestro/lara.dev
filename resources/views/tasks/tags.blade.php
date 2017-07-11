@extends('app')

@section('content')
    <!-- Create Task Form... -->
    <!-- Current Tasks -->
<div class="panel panel-default">
            <div class="panel-heading">
                Current Tasks
            </div>
            <br>
            <a href="/task/create" class="btn btn-success">Создать задачу</a>
            <div class="panel-body">
	            <table class="table table-striped task-table">
		            <th>Task</th>
		            <th>Project</th>
                    @foreach ($tasks as $task)
		            <tr>

			            <td>{{ $task->name }}</td>	
			            <td>{{ $task->project->name }} </td>

		            </tr>
                    @endforeach
				</table>
            </div>
            {{ $tasks->links() }}
</div>


