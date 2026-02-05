<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Admins List</h1>
    <ul>
        @foreach($admin as $admin)
            <li> {{$admin->id}} - {{ $admin->name }} - {{ $admin->email}} - {{ $admin->staff_id}} - {{ $admin->password}}</li>
            <!-- <a href="{{ route('admin.destroy', $admin->id) }}">Delete</a> -->
            <form action="{{ route('admin.destroy', $admin->id) }}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit">Delete</button>
            </form>
        @endforeach
    </ul>
</body>
</html>