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
    <h1>Register</h1>
    <form method="POST" action="{{ route('register') }}">
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
        <div class="gender-selection mb-5">
            <h6>Gender: </h6>
            <div class="form-check d-inline-block">
                <input class="form-check-input" type="radio" name="gender" id="flexRadioDefault1" value="Female" {{
                    old('gender') == 'Female' ? 'checked' : '' }}>
                <label class="form-check-label" for="flexRadioDefault1">
                    Female
                </label>
            </div>
            <div class="form-check d-inline-block">
                <input class="form-check-input" type="radio" name="gender" id="flexRadioDefault2" value="Male"
                    {{  old('gender') == 'Male' ? 'checked' : '' }}>
                <label class="form-check-label" for="flexRadioDefault2">
                    Male
                </label>
            </div>
        </div>
        <div class="hobby-selection mb-5">
            @foreach ($hobbies as $key => $item)
            <div class="form-check d-inline-block">
                <input class="form-check-input" name="hobbies[]" type="checkbox" value="{{ $item->id }}" id="{{ "
                    flexCheckDefault" . $key }}">
                <label class="form-check-label" for="{{ " flexCheckDefault" . $key }}">
                    {{ $item->name }}
                </label>
            </div>
            @endforeach
        </div>
        <div class="row g-3 align-items-center">
            <div class="col-auto">
                <label for="inputPassword6" class="col-form-label">Instagram Username</label>
            </div>
            <div class="col-auto">
                <input type="text" id="inputPassword6" name="instagram_username" class="form-control"
                    aria-describedby="passwordHelpInline" value="{{ old('instagram_username') }}">
            </div>
        </div>
        <div class="row g-3 align-items-center">
            <div class="col-auto">
                <label for="inputPassword7" class="col-form-label">Mobile Number</label>
            </div>
            <div class="col-auto">
                <input type="number" id="inputPassword7" name="mobile_number" class="form-control"
                    aria-describedby="passwordHelpInline" value="{{ old('mobile_number') }}">
            </div>
        </div>
        <div class="row g-3 align-items-center">
            <div class="col-auto">
                <label for="inputPassword8" class="col-form-label">Age</label>
            </div>
            <div class="col-auto">
                <input type="number" id="inputPassword8" name="age" class="form-control"
                    aria-describedby="passwordHelpInline" value="{{ old('age') }}">
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
        <button type="submit" class="btn btn-primary">Register</button>
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
