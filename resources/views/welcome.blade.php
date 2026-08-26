<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>TaskFlow</title>

    <style>

        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family:Arial, Helvetica, sans-serif;
        }

        body{
            background:#f4f7fb;
        }

        nav{
            background:#2563eb;
            color:white;
            padding:20px 50px;
        }

        .container{
            width:90%;
            max-width:1200px;
            margin:auto;
            padding:70px 0;
        }

        .hero{
            background:white;
            border-radius:20px;
            padding:70px;
            text-align:center;
            box-shadow:0 15px 40px rgba(0,0,0,.08);
        }

        h1{
            font-size:50px;
            color:#2563eb;
            margin-bottom:20px;
        }

        p{
            color:#555;
            font-size:20px;
            line-height:1.7;
        }

        .btn{
            display:inline-block;
            margin-top:40px;
            background:#2563eb;
            color:white;
            text-decoration:none;
            padding:15px 40px;
            border-radius:10px;
            transition:.3s;
            font-weight:bold;
        }

        .btn:hover{
            background:#1d4ed8;
        }

        footer{
            text-align:center;
            margin-top:50px;
            color:#888;
        }

    </style>

</head>

<body>

<nav>

    <h2>TaskFlow</h2>

</nav>

<div class="container">

    <div class="hero">

        <h1>Welcome {{ $user }}</h1>

        <p>
            This project will teach me Laravel from Beginner to Advanced.
        </p>

        <p style="margin-top:20px;">
            Framework Version:
            <strong>{{ $version }}</strong>
        </p>

        <a href="{{ auth()->check() ? route('tasks.index') : route('login') }}" class="btn">
            {{ auth()->check() ? 'Open My Tasks' : 'Sign In to TaskFlow' }}
        </a>

    </div>

    <footer>

        © {{ date('Y') }} TaskFlow. Built with ❤️ using Laravel.

    </footer>

</div>

</body>

</html>