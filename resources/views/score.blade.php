
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>{{ __('translation.score') }}</title>
</head>

<body>
    <div class="container my-5 py-5">
        <div class="card my-5 py-5">
            <div class="card-header text-center">
                {{ __('translation.yourscore') }}
            </div>
            <div class="card-body row justify-content-between">
                <button class="btn btn-info shadow my-2">{{ auth()->user()->firstname }}
                    {{ auth()->user()->lastname }}</button>
                <button class="btn btn-warning shadow my-2">{{$score}} </button>

            </div>
            <div class="card-footer text-center">
                <a href="{{ route('home.content.exams.index') }}"
                    class="btn btn-primary">{{ __('translation.return') }}</a>
            </div>

        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


</body>

</html>
