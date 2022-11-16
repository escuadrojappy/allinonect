@component('mail::message')
Hi, {{ $params['name'] }}

Here's your credentials:

Email Address: {{ $params['email'] }} 
<br>
Password: {{ $params['password'] }}

@component('mail::button', ['url' => config('app.url')])
Login
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
