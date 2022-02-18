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
            margin-left: 40%;
            width: 100px;
        }
    </style>
</head>
<body>
<form action="{{url('post')}}" method="post">
    <div class="labels">
        <label for="title">Title:</label>
    </div>

    <div class="inputs">
        <input type="text" name="title" id="title" required> <br/>
    </div>

    <div class="submit">
        <input type="submit" value="Post">
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
