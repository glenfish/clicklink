<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Area</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    
    <style>
        form > input {
            height:36px;
            position:relative;
            top:1px;
            font-size: 14px;
            min-width: 230px;
        } 
        h1 {
            margin-top: 20px;
            margin-bottom: 30px;

        }
        h2 {
            font-size: 24px;
            /* margin-top: 20px; */
            margin-bottom: 10px;
        } 
        h2::before {
            content: "";
            display: block;
            margin-top: 0px;
            margin-bottom: 20px;
            border-bottom: 2px solid #ccc;
        } 
        form {
            margin-bottom: 30px;
        }   
    </style>
</head>
<body>
    <!-- <nav>
        <ul>
            <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li><a href="{{ route('admin.settings') }}">Settings</a></li>
            <li><a href="{{ route('admin.pending_users') }}">Pending User Approvals</a></li>
            <li><a href="{{ route('admin.logout') }}">Logout</a></li>
        </ul>
    </nav> -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
        <a class="navbar-brand" href="#">Admin</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/admin/dashboard') }}">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/admin/settings') }}">Settings</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('admin.pending_users') }}">Pending Users</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/admin/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="content">
        @yield('content')
    </div>
</body>
</html>