@component('mail::message')

Hi **{{$data["name"]}}**,

Wish you have a good day!

Thank you for your interest to join Webinar Computerun 2020. We have a great event planned and know that you will receive much informative knowledge through the webinar.

This email is just a friendly reminder about our upcoming webinar **{{$data["event_name"]}}**, which will be held on:

Date : {{$data["event_date"]}}
Time : {{$data["event_time"]}} 

Make sure to attend on time and don't forget to use the virtual background for participants, which you can download on https://tinyurl.com/VBPeserta.

The zoom link can be found on the profile page in your tickets section.

Thank you and see you at the event!

@component('mail::panel')
### Important
If you haven't installed Zoom yet, please install them first from https://zoom.us/download (under "Zoom Client for Meetings").
@endcomponent

Sincerely,
COMPUTERUN 2020.
@endcomponent
