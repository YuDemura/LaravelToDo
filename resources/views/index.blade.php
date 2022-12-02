<html>
    <head>
        <title>Todo</title>
    </head>
    <body>
      <ul class="list-group">
          @foreach ($tasks as $task)
          <li>
            {{ $task->status}}-{{ $task->title }}
          </li>
          @endforeach
      </ul>
    </body>
</html>
