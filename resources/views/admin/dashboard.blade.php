<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
</head>
<body>
    <h1>Admin Dashboard</h1>
    <a href="/admin/logout">Logout</a>
    <h2>Users</h2>
    <ul>
        @foreach($users as $user)
            <li>{{ $user->email }}</li>
        @endforeach
    </ul>
</body>
</html>