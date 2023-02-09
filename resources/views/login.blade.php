<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <link rel="stylesheet" href="{{ asset('css/login.css') }}">
        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
    </head>
    <body>
        <div class="login">
            <h3>Login</h3>
            <form action="{{ route('login.attempt') }}" method="post" >
                @csrf
                <div class="form-group">
                    <label for="email">Email <small>*</small></label>
                    <input type="text" name="email" id="email" class="form-control" />
                </div>
                <div class="form-group">
                    <label for="password">Password <small>*</small></label>
                    <input type="password" name="password" id="password" class="form-control" />
                </div>

                @if ($errors->has('filed'))
                    <span class="error_message">{{ $errors->first('filed') }}</span>
                @endif
                <button class="btn">Login</button>
            </form>
        </div>
    </body>
</html>
