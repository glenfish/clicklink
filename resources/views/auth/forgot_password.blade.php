<!DOCTYPE html>
<html>
<head>
    <title>Forgot Password</title>
</head>
<body>
    <form action="{{ url('/forgot_password') }}" method="post">
        @csrf
        <input type="text" name="email" placeholder="Email">
        <button type="submit">Send Reset Link</button>
    </form>
</body>
</html