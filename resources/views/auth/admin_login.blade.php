<!DOCTYPE html>
<html>
<head>
    <title>Admin Login</title>
</head>
<body>
    <form action="{{ url('/admin/login') }}" method="post">
        @csrf
        <input type="text" name="email" placeholder="Admin Email">
        <input type="password" name="password" placeholder="Password">
        <button type="submit">Login</button>
    </form>
</body>
</html>