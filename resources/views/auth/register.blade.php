<!DOCTYPE html>
<html>
    <head>
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

            input[type="text"], input[type="email"], input[type="password"]{
                width: 95%;
                padding: 10px;
                font-size: 16px;
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
            <h2>Please Sign Up</h2>
            <div class="header" style="font-size: 26px;"><strong>Sign Up</strong></div>
            <div class="card-body">
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <input id="name" type="text" name="name" required autocomplete="name" autofocus placeholder="Name">
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <input id="email" type="email" name="email" required autocomplete="email" placeholder="Email">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <input id="password" type="password" name="password" required autocomplete="current-password" placeholder="Password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <input id="password-confirm" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">
                    <button type="submit">
                        <strong>Register</strong>
                    </button>
                    <p><a href="{{ route('home') }}" style="color: white; text-decoration: none">
                        Back to Home
                    </a></p>
                    <p><a href="{{ route('login') }}" style="color: white; text-decoration: none">
                        Go to Log In
                    </a></p>
                </form>
            </div>
        </div>
    </body>
</html>
