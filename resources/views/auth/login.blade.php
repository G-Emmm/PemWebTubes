<!DOCTYPE html>
<html>
    <head>
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Nunito&display=swap');
        </style>
        <style>
            *{
                padding: 0;
                margin: 0;
            }
            
            body{
                background-image: url("https://www.hariansederhana.com/wp-content/uploads/2019/03/IMG_0906-01.jpeg");
                background-attachment: fixed;
                background-position: center;
                background-repeat: no-repeat;
                background-size: cover;
                font-family: 'Nunito', sans-serif;
                color: white;
            }

            .form{
                height: 92vh;
                float: right;
                padding: 30px;
                width: 20%;
                background-color: rgba(0, 0, 0, 0.6);
            }

            .email>input{
                padding-left: 20px;
            }

            form>*{
                margin-bottom: 20px;
            }

            .header{
                margin-bottom: 20px;
                text-align: center;
                font-size: 18px;
            }

            h2{
                text-align: center;
                margin-top: 100px;
                margin-bottom: 50px;
            }

            input[type="email"], input[type="password"]{
                width: 95%;
                padding: 10px;
                font-size: 16px;
            }

            input[type="email"]:focus, input[type="password"]:focus{
            }

            button{
                width: 100%;
                padding: 4px;
                margin-top: 20px;
                border-radius: 10px;
                color: black;
                background-color: white;
                font-size: 20px;
            }

            button:hover{
                cursor: pointer;
                background-color: black;
                color: white;
                border: 2px solid white;
                transition: 0.6s;
            }
        </style>
    </head>
    <body>
        <div class="form">
            <h2>Login With Your Account</h2>
            <div class="header" style="font-size: 26px;"><strong>Login</strong></div>
            <div class="card-body">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <input id="email" type="email" name="email" required autocomplete="email" autofocus placeholder="Email">
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <input id="password" type="password" name="password" required autocomplete="current-password" placeholder="Password"><br>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label for="remember">Remember Me</label>
                    <button type="submit">
                        <strong>Login</strong> 
                    </button>
                    @if (Route::has('password.request'))
                        <p><a href="{{ route('password.request') }}" style="color: white; text-decoration: none">
                            Forgot Your Password?
                        </a></p>
                    @endif
                    <p><a href="{{ url('/home') }}" style="color: white; text-decoration: none">
                        Back to Home
                    </a></p>
                    <p><a href="{{ route('register') }}" style="color: white; text-decoration: none">
                        Go to Sign Up
                    </a></p>
                </form>
            </div>
        </div>

    </body>
</html>
