<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body class="p-5">
    <h1>Login</h1>
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="row g-3 align-items-center">
            <div class="col-auto">
                <label for="inputPassword10" class="col-form-label">Name</label>
            </div>
            <div class="col-auto">
                <input type="text" id="inputPassword10" name="name" class="form-control"
                    aria-describedby="passwordHelpInline" value="{{ old('name') }}">
            </div>
        </div>
        <div class="row g-3 align-items-center">
            <div class="col-auto">
                <label for="inputPassword9" class="col-form-label">Password</label>
            </div>
            <div class="col-auto">
                <input type="password" id="inputPassword9" name="password" class="form-control"
                    aria-describedby="passwordHelpInline">
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Log In</button>
    </form>
    @if ($errors->any())
    <ul>
        @foreach ($errors->all() as $item)
        <li>{{ $item }}</li>
        @endforeach
    </ul>
    @endif
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
