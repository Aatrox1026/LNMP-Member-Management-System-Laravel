<!DOCTYPE html>
<html>
<head>
    <style>
        .error {
            color: red;
        }

        .labels {
            width: 100px;
            float: left;
        }

        .inputs {
            width: 300px;
            float: left;
        }

        .submit {
            width: 408px;
        }

        div label {
            width: 100%;
        }

        div input {
            width: 100%;
        }
    </style>
</head>
<body>
    <form action="{{url('signup')}}" method="post">
        <div class="labels">
            <label for="email">Email:</label> <br/>
            <label for="password">Password:</label> <br/>
            <label for="confirm">Confirm:</label>
        </div>

        <div class="inputs">
            <input type="email" name="email" id="email" required> <br/>
            <input type="password" name="password" id="password" minlength="8" maxlength="16" required> <br/>
            <input type="password" name="password_confirmation" id="confirm" minlength="8" maxlength="16" required>
        </div>

        <div class="submit">
            <input type="submit" value="Register">
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
