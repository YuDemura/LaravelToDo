<html>
    <head>
        <title>Todo</title>
    </head>
    <body>
      <ul class="list-group">
          @foreach ($tasks as $task)
          <li>
            {{ $task->status}}-{{ $task->title }}-{{ $task->status_name}}
          </li>
          @endforeach
      </ul>
    </body>
</html>
