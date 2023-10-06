<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Haftalık Görevler</title>
</head>
<body>
<h1>Haftalık Görevler</h1>

@foreach ($haftalar as $hafta => $veriler)
    <h2>Hafta {{ $hafta }}</h2>
    <table border="1">
        <thead>
        <tr>
            <th>Task</th>
            <th>Developer</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($veriler as $data)
            <tr>
                <td>{{ $data->task_id }}</td>
                <td>{{ $data->developer_id }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endforeach
</body>
</html>
