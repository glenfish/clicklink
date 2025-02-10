<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
<body>
    <h1>Dashboard</h1>
    <p>{{ $hasJob ? 'You have a job' : 'You have no jobs' }}</p>
    <a href="{{ url('/logout') }}">Logout</a>
</body>
</html>