<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Student Management System</title>
        
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        <style>
            /* Add custom background and styles here */
            body {
                background: url('https://png.pngtree.com/background/20210710/original/pngtree-fresh-book-student-advertising-background-picture-image_968395.jpg') no-repeat center center fixed;
                background-size: cover;
                font-family: 'Figtree', sans-serif;
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
                margin: 0;
            }

            .container {
                text-align: center;
                background-color: rgba(255, 255, 255, 0.8);
                padding: 40px;
                border-radius: 10px;
                box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
                max-width: 600px;
                width: 100%;
            }

            .title {
                font-size: 3rem;
                font-weight: bold;
                color: #333;
                margin-bottom: 30px;
            }

            .buttons {
                display: flex;
                justify-content: center;
                gap: 20px;
            }

            .buttons a {
                padding: 15px 30px;
                font-size: 1.2rem;
                color: white;
                border-radius: 8px;
                text-decoration: none;
                transition: background-color 0.3s ease;
            }

            .buttons .login {
                background-color: #3490dc;
            }

            .buttons .register {
                background-color: #38c172;
            }

            .buttons a:hover {
                opacity: 0.9;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <h1 class="title">Welcome to Student Management System</h1>
            <div class="buttons">
                <a href="{{ route('login') }}" class="login">Login</a>
                <a href="{{ route('register') }}" class="register">Register</a>
            </div>
        </div>
    </body>
</html>
