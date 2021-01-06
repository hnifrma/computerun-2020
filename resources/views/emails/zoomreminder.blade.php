@component('mail::message')
Hello **{{$data["name"]}}**,
Thank you for registering to our COMPUTERUN 2020 webinar, **{{$data["event_name"]}}**!

We would like to remind you that the event will start via Zoom. If you haven't installed Zoom yet, please install them first from https://zoom.us/download (under "Zoom Client for Meetings").

On {{$data["event_date"]}}, you will be able to obtain the Zoom meeting link via our website at https://computerun.id. Sign in to your account (as used to register for this webinar), then click on the **Join Event** button next to the chosen webinar. **We recommend you to join at least 15 minutes before the start of the event** to avoid network traffic congestions on our website.

We would also like to request you to download and use our provided virtual background [here](https://computerun.id/docs/Virtual%20Background%20Peserta.jpg) (or as attached below) throughout the webinar, especially during the documentation section. And finally, please respect and follow the webinar rules and guidelines, which will be detailed at the start of the event.

<img src="https://computerun.id/docs/Virtual%20Background%20Peserta.jpg" alt="File can be found on https://computerun.id/docs/Virtual%20Background%20Peserta.jpg">

If you think this is a mistake, please let us know by replying to this message. Thank you for your attention.

Sincerely,
COMPUTERUN 2020.
@endcomponent
