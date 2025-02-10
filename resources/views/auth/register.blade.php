<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
</head>
<body>
    <form action="{{ url('/register') }}" method="post">
        @csrf
        <input type="text" name="email" placeholder="Email" value="{{ old('email') }}">
        @error('email') <div>{{ $message }}</div> @enderror
        <input type="password" name="password" placeholder="Password">
        @error('password') <div>{{ $message }}</div> @enderror
        <input type="password" name="password_confirmation" placeholder="Confirm Password">
        <input type="text" name="affiliate_id" placeholder="Affiliate ID" value="{{ old('affiliate_id') }}">
        <button type="submit">Register</button>
    </form>
</body>
</html>