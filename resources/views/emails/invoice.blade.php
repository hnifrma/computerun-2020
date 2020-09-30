@component('mail::message')
Hello **{{$data["name"]}}**,
Thank you for registering to COMPUTERUN 2020!

Here is your payment invoice for **{{$data["event_name"]}}**.

@component('mail::panel')
+ **Payment Code:** {{$data["payment_code"]}}
+ **Price:** {{$data["total_price"]}}
@endcomponent

Please send a bank transfer to:

@component('mail::panel')
+ **Bank:** Bank Central Asia (BCA)
+ **Account Number:** 8280288269
+ **Account Holder:** Jesslyn Wie
+ **Amount:** {{$data["total_price"]}}
+ **Message:** Payment {{$data["payment_code"]}}
@endcomponent

then reply to this email with a screenshot/picture of your bank transfer receipt.

Sincerely,
COMPUTERUN 2020.
@endcomponent
