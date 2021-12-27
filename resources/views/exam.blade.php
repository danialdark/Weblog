@php
session_start();
if (!isset($_SESSION['start']) || !isset($_SESSION['remain'])) {
    $_SESSION['start'] = time();
    $_SESSION['remain'] = $exam->time * 60;
}

@endphp
{{-- <script>
    var time = (<?php echo $_SESSION['start']; ?>)
    alert(time)
</script> --}}
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




    <title>{{ $exam->name }}</title>
</head>

<body>
    <div>
        <div class="border p-3">
            <div class="text-center"><button class="btn btn-outline-primary">{{ __('translation.timer') }}: <span
                        id="timer"></span><span>
                        {{ __('translation.second') }}</span></button></div>
            <form action="{{ route('home.content.exams.answer', $exam->id) }}" method="post" class="text-end">
                @csrf
                @foreach ($exam->questions as $question)
                    <div class="my-3 text-end border p-2">
                        <div>
                            <h3>{{ $question->soal }}</h3>
                            <label class="form-check-label" for="answer1">
                                {{ $question->answer1 }}
                            </label>
                            <input class="form-check-input" type="radio" value="1" name="option{{ $question->id }}"
                                id="answer1" required>

                        </div>
                        <div>
                            <label class="form-check-label" for="answer2">
                                {{ $question->answer2 }}
                            </label>
                            <input class="form-check-input" type="radio" value="2" name="option{{ $question->id }}"
                                id="answer2" required>

                        </div>
                        <div>
                            <label class="form-check-label" for="answer3">
                                {{ $question->answer3 }}
                            </label>
                            <input class="form-check-input" type="radio" value="3" name="option{{ $question->id }}"
                                id="answer3" required>

                        </div>
                        <div>
                            <label class="form-check-label" for="answer4">
                                {{ $question->answer4 }}
                            </label>
                            <input class="form-check-input" type="radio" value="4" name="option{{ $question->id }}"
                                id="answer4" required>

                        </div>
                        <div>
                            <label class="form-check-label" for="answer4">
                                {{ __('translation.notanswer') }}
                            </label>
                            <input class="form-check-input" type="radio" value="0" name="option{{ $question->id }}"
                                id="answer4" required>

                        </div>
                    </div>


                @endforeach


                <button class="btn btn-outline-primary" id="id1" onclick="myFunction()"
                    type="submit">{{ __('translation.sendanswer') }}</button>
            </form>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $(document).ready(function() {
            var button = $("#id1")
            var timer = $("#timer")
            var start = (<?php echo $_SESSION['start']; ?>)
            var remain = (<?php echo $_SESSION['remain']; ?>)
            var endtime = start + remain
            if (JSON.stringify(document.cookie.match("remain")) == '["remain"]') {
                reamintimesecond = parseInt(document.cookie.split("remain=").pop().split(";")[0], 10)
            } else {

                document.cookie = "remain=" + remain
            }
            setInterval(function() {
                if (reamintimesecond > 0) {
                    document.cookie = "remain=" + reamintimesecond--
                }
                timer.html(reamintimesecond)
            }, 1000)
            $("#id1").click(function() {
                var click = (<?php echo time(); ?>)
                if (click < endtime) {
                    let timerInterval
                    Swal.fire({
                        icon: 'success',
                        title: '{{ __('translation.answer') }}',
                        showConfirmButton: true,
                        timer: 1500
                    })
                    return true
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: '{{ __('translation.timeisup') }}',
                        text: '{{ __('translation.cantsendanswer') }}',
                    })

                    button.html("your time is up")
                    return false
                }
            })

        })
    </script>

    {{-- <script>
        $(document).ready(function() {

            var button = $("#id1")
            var timer = $("#timer");
            var time = new Date
            var minut = time.getMinutes()
            var hour = time.getHours()
            var startstring = "" + hour * 3600 + minut * 60
            var start = parseInt(startstring, 10)
            if (JSON.stringify(document.cookie.match("start")) == '["start"]') {
                start = parseInt(document.cookie.split("start=").pop().split(";")[0])

            } else {
                document.cookie = "start=" + start;
            }




            var remaintime = (<?php echo $exam->time; ?>)
            if (JSON.stringify(document.cookie.match("remain")) == '["remain"]') {
                reamintimesecond = parseInt(document.cookie.split("remain=").pop().split(";")[0], 10)

            } else {

                document.cookie = "remain=" + remaintime * 60
            }
            


            setInterval(function() {
                if (reamintimesecond > 0) {
                    document.cookie = "remain=" + reamintimesecond--
                }
                timer.html(reamintimesecond)
            }, 1000)
            $("#id1").click(function() {
                var time2 = new Date
                var clicktimeminute = time2.getMinutes()
                var clicktimehoure = time2.getHours()
                var clickstring = "" + clicktimehoure * 3600 + clicktimeminute * 60
                var click = parseInt(clickstring, 10)
                if (click < endtime) {
                    let timerInterval
                    Swal.fire({
                        icon: 'success',
                        title: 'Your Answers has been saved',
                        showConfirmButton: true,
                        timer: 1500
                    })
                    return true
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Your Time Is Up...',
                        text: 'You Cant Send Answers!',
                    })
                    button.html("your time is up")
                    return false
                }
            });
        });
    </script> --}}



</body>

</html>
