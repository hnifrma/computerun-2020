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

    @component('components.meta', ['title' => 'Your Tickets'])
    @endcomponent
    </head>
    <body>
    <div class="container-2 bg-event">
        <div class="margin-1 jumbotron regis-header">
            <div class="row">
                <div class="col-12 col-md-6">
                    <h4 class="font-800">Ticket No.</h4>
                    <h1 class="display-4">{{$account_details["ticketnumber"]}}</h1>
                </div>
                <div class="col-12 col-md-6">
                    <h4 class="font-800">NIM</h4>
                    <h1 class="display-4">{{$account_details["nim"]}}</h1>
                </div>
            </div>
            <p class="lead">Hi, {{$account_details["name"]}}! Manage your tickets here.</p>
            {{-- <a class="btn btn-primary" href="/register" role="button">Register</a> --}}
            <a class="btn button button-dark" data-toggle="modal" href="" data-target="#accountSettings" role="button">Contact Settings</a>
            <a class="btn button button-white" href="/logout" role="button">Log Out</a>
        </div>
    </div>
    <div class="container-0">
        <img class="container-clip" src="/img/backgrounds/2.png">

        <div class="margin-2 after-container-clip">
            @if ( $error != null && $error != "")
                <div class="alert alert-danger" id="error">{{$error}}</div>
            @endif
            <h1 class="full-underline content-divider-short">Your Tickets List</h1>
            <table class="table margin-0 content-divider-short">
                <thead>
                    <tr>
                        <th scope="col">Req. ID</th>
                        <th scope="col">Event</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($events as $list)
                        <tr>
                            <th scope="row">{{$list->id}}</th>
                            <td>{{$list->event_name}}</td>
                            <td>{{$list->status}}</td>
                            <td>
                                @if ($list->attendance_opened && $list->status_code >= 2)
                                    @if ($list->attendance_is_exit)
                                        <a class="btn button no-minimum-width button-gradient button-small margin-0" data-toggle="modal" href="" data-target="#joinEvent" role="button" onClick="setEventModalData({{$list->event_id}},'{{$list->url_link}}')">Join Event</a>
                                    @else
                                        <form action="/attendance/{{$list->event_id}}" method="POST">
                                            @csrf
                                            <input type="hidden" name="ticketnumber" value="{{$account_details["ticketnumber"]}}">
                                            <input type="hidden" name="nim" value="{{$account_details["nim"]}}">
                                            <input type="hidden" name="event-token" value="{{$list->totp_key}}">
                                            <button class="btn button no-minimum-width button-gradient button-small margin-0" action="submit">Join Event</button>
                                        </form>
                                    @endif
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <?php
            // <h3>Download Ticket</h3>
            // <p>You can download and save this ticket to your device. No printing required.</p>
            // <form method="POST" action="/eticket">
            //     @csrf
            //     <input type="hidden" name="ticketno" value="{{$account_details["ticketnumber"]}}">
            //     <input type="hidden" name="nim" value="{{$account_details["nim"]}}">
            //     <input type="hidden" name="name" value="{{$account_details["name"]}}">
            //     <button class="btn btn-info text-white" type="submit" target="_blank">Download as PDF</button>
            // </form>
            // <form method="POST" action="/eticket">
            //     @csrf
            //     <input type="hidden" name="ticketno" value="{{$account_details["ticketnumber"]}}">
            //     <input type="hidden" name="nim" value="{{$account_details["nim"]}}">
            //     <input type="hidden" name="name" value="{{$account_details["name"]}}">
            //     <input type="hidden" name="format" value="espass">
            //     <button class="btn btn-info text-white" type="submit" target="_blank">Download as Espass (PassAndroid)</button>
            // </form>
            ?>
            <form class="modal" tabindex="-1" role="dialog" id="accountSettings" action="/login" method="POST">
                @csrf
                <input type="hidden" name="ticketnumber" value="{{$account_details["ticketnumber"]}}">
                <input type="hidden" name="nim" value="{{$account_details["nim"]}}">
                <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title">Contact Settings</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                        <div class="card mb-3">
                            <h5 class="card-header"><span class="badge badge-info">1</span> Account Details</h5>
                            <div class="card-body">
                                <h3>{{$account_details["name"]}}</h3>
                                <ul>
                                    <li><b>Participant Type:</b>
                                        @if (!$account_details["binusian"])
                                            Non
                                        @endif
                                        Binusian</li>
                                    <li><b>Ticket Number:</b> {{$account_details["ticketnumber"]}}</li>
                                    <li><b>NIM:</b> {{$account_details["nim"]}}</li>
                                </ul>
                                <div class="alert alert-warning" role="alert">
                                    Please reach our <a href="/#contact-us">Contact Person</a> if your name
                                    @if ($account_details["binusian"])
                                        and NIM
                                    @endif
                                    has been mistakenly inputted
                                </div>
                            </div>
                        </div>
                        <div class="card mb-3">
                            <h5 class="card-header"><span class="badge badge-info">2</span> Contact</h5>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="action-change-phone">Change Phone Number</label>
                                    <input type="tel" class="form-control" name="action-change-phone" id="action-change-phone" autocomplete="tel" placeholder="{{$account_details["contact"]["phone"]}}">
                                </div>
                                <div class="form-group">
                                    <label for="action-change-email">Change Email</label>
                                    <input type="email" class="form-control" name="action-change-email" id="action-change-email" autocomplete="email" placeholder="{{$account_details["contact"]["email"]}}">
                                </div>
                                @if ($account_details["binusian"] && !preg_match("/[.0-9a-z]@binus.ac.id$/", $account_details["contact"]["email"]))
                                    <div class="alert alert-info" role="alert">
                                        <b>Note:</b> it is recommended to use your Binusian email address (<b>@binus.ac.id</b>).
                                    </div>
                                @endif
                                <div class="form-group">
                                    <label for="action-change-line">Change LINE contact (ID or Phone Number, Optional)</label>
                                    <div class="input-group mb-3">
                                    <input type="number" class="form-control" name="action-change-line" id="action-change-line" autocomplete="tel" placeholder="{{$account_details["contact"]["line"]}}">
                                        <div class="input-group-append">
                                            <a onClick="phoneNumberAutofill('action-change-line')" class="btn btn-success text-white">Copy from Phone</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="action-change-whatsapp">Change WhatsApp phone number (Optional)</label>
                                    <div class="input-group mb-3">
                                    <input type="number" class="form-control" name="action-change-whatsapp" id="action-change-whatsapp" autocomplete="tel" placeholder="{{$account_details["contact"]["whatsapp"]}}">
                                        <div class="input-group-append">
                                            <a onClick="phoneNumberAutofill('action-change-whatsapp')" class="btn btn-success text-white">Copy from Phone</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
                </div>
            </form>
            <form class="modal" tabindex="-1" role="dialog" id="joinEvent" action="" method="POST">
                @csrf
                <input type="hidden" name="ticketnumber" value="{{$account_details["ticketnumber"]}}">
                <input type="hidden" name="nim" value="{{$account_details["nim"]}}">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Join Event</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="card mb-3">
                            <h5 class="card-header"><span class="badge badge-info">1</span> Join the Event</h5>
                            <div class="card-body">
                                <b>Please join the online event using the link below:</b>
                                <a id="eventLink" href="#" target="_blank"></a><br><br>
                                <div id="qrCanvas" style="width: 100%; height: auto;"></div>
                            </div>
                        </div>
                        <div class="card mb-3">
                            <h5 class="card-header"><span class="badge badge-info">2</span> Enter the Event Token</h5>
                            <div class="card-body">
                                <p>
                                    You will be given an <b>Event Token</b> during the event to record your attendance. Please enter the token below.
                                </p>
                                <div class="form-group">
                                    <label for="event-token">Event Token</label>
                                    <input type="tel" class="form-control" name="event-token" id="event-token">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
    <script src="/js/vendor/qrcode.min.js"></script>
    <script>
        function setEventModalData(id, eventLink) {
            document.getElementById("qrCanvas").innerHTML = "";
            document.getElementById("joinEvent").action = "/attendance/" + id;
            var link = document.getElementById("eventLink");
            link.href = link.innerHTML = eventLink;
            new QRCode(document.getElementById("qrCanvas"), eventLink);
        }
    </script>
  </body>
</html>
