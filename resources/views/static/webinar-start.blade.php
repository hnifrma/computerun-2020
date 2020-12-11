<!DOCTYPE html>
<html>
    <head>
        @component("components.meta")
        @endcomponent
    </head>
    <body>
        <div class="container-2 content-top bg-event">
            @component("components.navbar")
            @endcomponent
            @component("components.navbar-mobile", ['template' => 'event-details'])
            @endcomponent
            <div class="margin-2 text-center content-divider">
                <h3>WELCOME TO</h3>
                <h1 class="gradient-text display-2 font-800">Webinar</h1>
            </div>
            <div class="margin-2 content-divider">
                <div class="notice">
                    <p class="h4 font-800">Your attendance has been recorded.</p>
                    <p>
                        <b>IMPORTANT: Please take a screenshot of this card</b> as an evidence of your attendance.<br>
                        <ul>
                            <li><b>Attendance ID:</b> {{$attendance_id}}</li>
                            <li><b>Registration ID:</b> {{$registration_id}}</li>
                            <li><b>Event ID:</b> {{$event_id}}</li>
                            <li><b>Account ID:</b> {{$account_id}}</li>
                            <li><b>Account Name:</b> {{$account_name}}</li>
                            <li><b>Attendance Type:</b> {{$attendance_type}}</li>
                            <li><b>Attended at:</b> {{$attendance_timestamp}}</li>
                        </ul>
                    </p>
                    <a href="{{$url_link}}" target="_blank" class="button button-gradient">Continue to Zoom &gt;</a>
                </div>
            </div>
        </div>
        <div class="container-1">
            <img class="container-clip" src="/img/backgrounds/2.png">
            <div class="margin-2 after-container-clip">
                <h1 class="full-underline">how to join</h1>
                <div class="card-container content-divider-short">
                    <div class="card image-card">
                        <div>
                            <img src="/img/icons/Zoom Logo.jpg">
                        </div>
                        <div>
                            <span class="h4 font-800">1. Download and Install Zoom</span>
                            <p>Please download <b>Zoom Client for Meetings</b> on your device.<br><br>Other Zoom software (such as Plugins and Extensions) are not required.</p>
                            <a href="https://zoom.us/download" class="button button-gradient">DOWNLOAD</a>
                        </div>
                    </div>
                    <div class="card image-card">
                        <div id="qrcode" style="margin-left: auto; margin-right:auto;"></div>
                        <div>
                            <p class="h4 font-800">2. Join the meeting room</p>
                            <p>
                                Scan the QR code above or click below to join at <b>{{$url_link}}</b>
                            </p>
                            <a href="{{$url_link}}" class="button button-gradient" target="_blank">JOIN</a>
                        </div>
                    </div>
                    <div class="card image-card">
                        <div>
                            <img src="/img/icons/Events - Webinar.png">
                        </div>
                        <div>
                            <span class="h4 font-800">3. Enjoy!</span>
                            <p>Please respect to our <b>Rules and Regulations</b> throughout the webinar session.</p>
                        </div>
                    </div>
                </div>
                <div class="content-divider-short" style="visibility: hidden">Lorem Ipsum Dolor Sit Amet</div>
            </div>
        </div>
        <div class="container-0">
            <img class="container-clip" src="/img/backgrounds/5.png">
            <h1 class="full-underline after-container-clip">for questions and issues</h1>
            <div class="margin-1 content-divider h5 text-center">
                Please contact us via our LINE Official Account: <a class="font-800" href="https://line.me/R/ti/p/@995bowex" target="_blank">@995bowex</a>
            </div>
            @component ('components.sponsors')
            @endcomponent
            <img class="container-clip for-footer" src="/img/backgrounds/7.png">
        </div>
        @component('components.footer')
        @endcomponent
    </body>
    <script src="/js/qrcode.min.js"></script>
    <script>
        var payload = "{{$url_link}}";
        var qrcode = new QRCode(document.getElementById("qrcode", payload));
        qrcode.makeCode(payload);
    </script>
</html>
