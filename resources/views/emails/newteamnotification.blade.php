@component('mail::message')
Hello **{{$data["name"]}}**,
Thank you for registering to our COMPUTERUN 2020 {{$data["event_name"]}}!

You are recently being added by **{{$data["team_leader_name"]}}** ({{$data["team_leader_email"]}}) as **{{$data["role"]}}** for **{{$data["event_name"]}}**.

@component('mail::panel')
+ **Team ID:** {{$data["team_id"]}}
+ **Team Name:** {{$data["team_name"]}}
@endcomponent

If you think this is a mistake or an abuse, please let us know by replying to this message. Thank you for your attention.

Sincerely,
COMPUTERUN 2020.
@endcomponent
