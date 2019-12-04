<!DOCTYPE html>
<html>
    <head>
    </head>
    <body>
        <form action="/login" method="post">
            {{csrf_field()}}
            Email <input type="text" name = "email" value="{{Cookie::get('user_email')}}"><br>
            Password <input type="password" name = "password" value="{{Cookie::get('user_password')}}"><br>
            <input type="checkbox" name="remember">Remember me <br>
            <input type="submit" value = "Login"><br>
        </form>
    </body>
</html>
