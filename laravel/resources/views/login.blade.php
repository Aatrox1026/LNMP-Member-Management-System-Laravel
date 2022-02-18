<!DOCTYPE html>
<html>
<head>
    <style>
        .error {
            color: red;
        }

        .labels {
            width: 7.5%;
            float: left;
        }

        .inputs {
            width: 92.5%;
            float: left;
        }

        .inputs input {
            width: 300px;
        }

        .submit {
            width: 100%;
        }

        div label,input {
            width: 100%;
        }

        .submit input {
            width: 100px;
        }

        .submit a {
            width: 24%;
            float: left;
        }
    </style>
</head>
<body>
    <form action="{{url('login')}}" method="post">
        <div class="labels">
            <label for="email">Email:</label> <br/>
            <label for="password">Password:</label>
        </div>

        <div class="inputs">
            <input type="email" name="email" id="email" required> <br/>
            <input type="password" name="password" id="password" required>
        </div>

        <div class="submit">
            <a href="{{url('signup')}}">SignUp</a>
            <input type="submit" value="Login">
        </div>
    </form>
    <div class="error">
        @isset($errors)
            @foreach($errors as $attr => $error)
                {{$error}} <br/>
            @endforeach
        @endisset
    </div>
</body>
</html>
