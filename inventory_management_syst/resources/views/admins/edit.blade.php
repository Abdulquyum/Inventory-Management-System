<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Admin Dashboard</h1>
    <form action="{{ route('admin.update', $admin->id) }}" method="post">
        @csrf
        @method('PATCH')
        <label for="name">Name</label>
        <input type="text" name="name" id="name" value="{{ $admin->name }}">
        <label for="email">email</label>
        <input type="text" name="email" id="email" value="{{ $admin->email }}">
        <label for="password">Password</label>
        <input type="password" name="password" id="password">
        <button type="submit">Submit</button>
    </form>
</body>
</html>