<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<h1>Task {{ $task->name }} is created</h1>

<p>Project is:{{ $task->project->name }}</p>

<p>And Tags: 
@foreach($task->tags as $tag)
{{ $tag->body }}
@endforeach
</p>
</body>
</html>