<h1>Todo List</h1>

<table class="table" border="1">
    <thead>
    <tr>
        <th>ID</th>
        <th>Task Name</th>
        <th>Duration</th>
        <th>Difficulty</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($todoLists as $todoList)
        <tr>
            <td>{{ $todoList->id }}</td>
            <td>{{ $todoList->task_ismi }}</td>
            <td>{{ $todoList->sure }}</td>
            <td>{{ $todoList->zorluk_derecesi }}</td>
        </tr>
    @endforeach
    </tbody>
</table>

{{ $todoLists->links() }}
