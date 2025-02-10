<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'My Application')</title>
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
    <div class="container">
        @yield('content')
    </div>
</body>
</html>