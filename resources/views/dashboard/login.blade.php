<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/regis-custom.css">

    @component('components.meta', ['title' => 'Login'])
    @endcomponent
  </head>
  <body>
    <div class="container-2 padding-0">
        <div class="jumbotron regis-header">
            <h1 class="display-4 full-underline">login</h1>
            @if ($message ?? '' != null && $message ?? '' != "")
            <p class="text-center h3 content-divider-short">{{$message ?? ''  }}</p>
            @endif
        </div>
        <div class="container">
            @if ( $error ?? '' != null && $error ?? '' != "")
                <div class="alert alert-danger" id="error">{!! $error ?? '' !!}</div>
            @endif
            <form class="row" method="{{$method ?? 'POST'}}" action="{{$action ?? '/login'}}">
                @csrf
                <input type="hidden" name="step" value="merge">
                <div class="col-12 col-md-6 mx-auto text-dark">
                    <div class="card mb-2">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="ticketnumber">
                                    @if (isset($type) && $type == "admin")
                                        Event ID
                                    @else
                                        Ticket Number
                                    @endif
                                </label>
                                <input type="text" class="form-control" id="ticketnumber" name="ticketnumber" required>
                            </div>
                            <div class="form-group">
                                <label for="nim">
                                    @if (isset($type) && $type == "admin")
                                        Password
                                    @else
                                        NIM
                                    @endif</label>
                                <input type="number" class="form-control" id="nim" name="nim" pattern="[0-9]{6,10}" required>
                            </div>
                            @if (isset($type) && $type == "attendance")
                                <div class="form-group">
                                    <label for="event-token">Event Token</label>
                                    <input type="number" class="form-control" id="event-token" name="event-token" pattern="[0-9]{6,10}" required>
                                </div>
                            @endif
                            <button type="submit" class="button button-gradient text-center">Log In
                                @component('components.bootstrap-icons', ['icon' => 'box-arrow-in-right', 'size' => 28])
                                @endcomponent
                            </button>
                            {{-- @if (isset($action) && $action == "/login")
                                <a href="/register" class="btn btn-dark">Register for new account</a>
                            @elseif ($action == "/seminar2")
                                <a href="/seminar2live" class="btn btn-dark">Watch Seminar 2 without login</a>
                            @endif --}}
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <img class="container-clip for-footer is-bootstrap" src="/img/backgrounds/7.png">
    </div>
    @component('components.footer')
    @endcomponent
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>
