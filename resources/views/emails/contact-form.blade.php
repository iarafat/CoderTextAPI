@component('mail::message')
# Mail From Website Contact Form.


**Name:** {{ $firstName.' '. $lastName }}

**Subject:** {{ $emailSubject }}

**Email:** {{ $email }}

## Message:
@component('mail::panel')
    {{ $message }}
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
