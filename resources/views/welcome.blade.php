<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel REST API</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 80px;
            }
            ul li{
                margin-bottom: 10px
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    <a href="{{ url('/login') }}">Login</a>
                    <a href="{{ url('/register') }}">Register</a>
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Laravel REST API
                </div>
                <ul>
                    <li><a href="{{ url('/api/users/') }}">/api/users/</a></li>
                    <li><a href="{{ url('/api/books/') }}">/api/books/</a></li>
                    <li><a href="{{ url('/api/authors/') }}">/api/authors/</a></li>
                    <li><a href="{{ url('/api/fields/') }}">/api/fields/</a></li>
                    <li><a href="{{ url('/api/languages/') }}">/api/languages/</a></li>
                </ul>
            </div>
        </div>
    </body>
</html>
