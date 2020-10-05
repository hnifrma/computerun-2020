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

@component('mail::panel')
### Notice

If you are registering for **Business-IT Case** and/or **Mobile Application Development** competitions, you will be required to send a copy of **University Student ID Card (Kartu Tanda Mahasiswa / KTM)** for further verification.

<img src="https://computerun.id/docs/Verifikasi KTM.jpg" alt="Instructions can be found on https://computerun.id/docs/Verifikasi%20KTM.jpg">
@endcomponent

Sincerely,
COMPUTERUN 2020.
@endcomponent
