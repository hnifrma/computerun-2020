@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>

    <!-- Your Tickets -->
    <h1 class="full-underline content-divider">Your Tickets</h1>
    <?php
        $tickets = DB::table('registration')->where('ticket_id', Auth::user()->id)->get();
        $events = DB::table('events')->get();
        for ($i = 0; $i < count($tickets); $i++){
            $tickets[$i]->event_name = $events[$tickets[$i]->event_id - 1]->name;
            $tickets[$i]->totp_key = $events[$tickets[$i]->event_id - 1]->totp_key;
            $tickets[$i]->attendance_opened = $events[$tickets[$i]->event_id - 1]->attendance_opened;
            $tickets[$i]->attendance_is_exit = $events[$tickets[$i]->event_id - 1]->attendance_is_exit;
            $tickets[$i]->url_link = $events[$tickets[$i]->event_id - 1]->url_link;
        }
    ?>
    @if (count($tickets) > 0)
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
                @foreach ($tickets as $list)
                    <tr>
                        <th scope="row">{{$list->id}}</th>
                        <td>{{$list->event_name}}</td>
                        <td>
                            @switch ($list->status)
                                @case (0)
                                    Pending
                                    @break
                                @case (1)
                                    Rejected
                                    @break
                                @case (2)
                                    Approved
                                    @break
                                @case (3)
                                    Cancelled
                                    @break
                                @case (4)
                                    Attending
                                    @break
                                @case (5)
                                    Attended
                                    @break
                                @default
                                    Unknown
                            @endswitch
                             ({{$list->status}})
                        </td>
                        <td>
                            @if ($list->attendance_opened && $list->status >= 2)
                                @if ($list->attendance_is_exit)
                                    <a class="btn button no-minimum-width button-gradient button-small margin-0" data-toggle="modal" href="" data-target="#joinEvent" role="button" onClick="setEventModalData({{$list->event_id}},'{{$list->url_link}}')">Join Event</a>
                                @else
                                    <form action="/attendance/{{$list->event_id}}" method="POST">
                                        @csrf
                                        <input type="hidden" name="ticketnumber" value="{{Auth::user()->id}}">
                                        <input type="hidden" name="nim" value="{{Auth::user()->nim}}">
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
    @else
        <div class="placeholder-sponsors content-divider-short text-center">
            <h2 class="font-800">No Tickets Found.</h2>
            <p class="h5">You can register to events via the <b>Register</b> button.</p>
        </div>
    @endif

    <!-- Your Teams -->
    {{-- <h1 class="full-underline content-divider">Your Teams</h1>
    <?php
        $tickets = DB::table('registration')->where('ticket_id', Auth::user()->id)->get()
    ?>
    @if (count($tickets) > 0))
        <table class="table margin-0 content-divider-short">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Event</th>
                    <th scope="col">Score</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tickets as $list)
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
                                        <input type="hidden" name="ticketnumber" value="{{Auth::user()->id}}">
                                        <input type="hidden" name="nim" value="{{Auth::user()->nim}}">
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
    @else
        <div class="placeholder-sponsors content-divider-short text-center">
            <h2 class="font-800">No Teams Found.</h2>
            <p class="h5"><b>Teams are currently available for Business-IT and Mini E-Sport Competitions.</b> If you have registered for one or more, please wait until we approve your registration.</p>
        </div>
    @endif --}}
</div>

<!-- Contact Settings Form -->
<form class="modal" tabindex="-1" role="dialog" id="accountSettings" action="/changeaccountdetails" method="POST">
    @csrf
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
                    <h3>{{Auth::user()->name}}</h3>
                    <ul>
                        <li><b>Participant Type:</b>
                            @if (Auth::user()->binusian != 1)
                                Non
                            @endif
                            Binusian</li>
                        <li><b>User ID:</b> {{Auth::user()->id}}</li>
                        @if (Auth::user()->binusian == 1)
                            <li><b>NIM:</b> {{Auth::user()->nim}}</li>
                        @endif
                    </ul>
                    <div class="alert alert-warning" role="alert">
                        Please reach our <a href="/#contact-us">Contact Person</a> if your name
                        @if (Auth::user()->binusian)
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
                        <input type="tel" class="form-control" name="action-change-phone" id="action-change-phone" autocomplete="tel" placeholder="{{Auth::user()->phone}}">
                    </div>
                    <div class="form-group">
                        <label for="action-change-line">Change LINE contact (ID or Phone Number, Optional)</label>
                        <div class="input-group mb-3">
                        <input type="number" class="form-control" name="action-change-line" id="action-change-line" autocomplete="tel" placeholder="{{Auth::user()->line}}">
                            <div class="input-group-append">
                                <a onClick="phoneNumberAutofill('action-change-line')" class="btn btn-success text-white">Copy from Phone</a>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="action-change-whatsapp">Change WhatsApp phone number (Optional)</label>
                        <div class="input-group mb-3">
                        <input type="number" class="form-control" name="action-change-whatsapp" id="action-change-whatsapp" autocomplete="tel" placeholder="{{Auth::user()->whatsapp}}">
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

<!-- Create New Team Form -->
<form class="modal" tabindex="-1" role="dialog" id="accountSettings" action="/createteam" method="POST">
    @csrf
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Create New Team</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="card mb-3">
                <h5 class="card-header"><span class="badge badge-info">1</span> Team Details</h5>
                <div class="card-body">
                    <div class="form-group">
                        <label for="action-change-phone">Team Name</label>
                        <input type="tel" class="form-control" name="action-change-phone" id="action-change-phone" autocomplete="tel" placeholder="{{Auth::user()->phone}}">
                    </div>
                </div>
            </div>
            <div class="card mb-3">
                <h5 class="card-header"><span class="badge badge-info">2</span> Contact</h5>
                <div class="card-body">
                    <div class="form-group">
                        <label for="action-change-phone">Change Phone Number</label>
                        <input type="tel" class="form-control" name="action-change-phone" id="action-change-phone" autocomplete="tel" placeholder="{{Auth::user()->phone}}">
                    </div>
                    <div class="form-group">
                        <label for="action-change-line">Change LINE contact (ID or Phone Number, Optional)</label>
                        <div class="input-group mb-3">
                        <input type="number" class="form-control" name="action-change-line" id="action-change-line" autocomplete="tel" placeholder="{{Auth::user()->line}}">
                            <div class="input-group-append">
                                <a onClick="phoneNumberAutofill('action-change-line')" class="btn btn-success text-white">Copy from Phone</a>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="action-change-whatsapp">Change WhatsApp phone number (Optional)</label>
                        <div class="input-group mb-3">
                        <input type="number" class="form-control" name="action-change-whatsapp" id="action-change-whatsapp" autocomplete="tel" placeholder="{{Auth::user()->whatsapp}}">
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
                  <h5 class="card-header"><span class="badge badge-info">1</span> Enter the Event Token</h5>
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

<script src="/js/registration.js"></script>
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
@endsection
