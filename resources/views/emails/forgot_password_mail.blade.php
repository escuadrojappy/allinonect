@component('mail::message')
Hi, {{ $params['email'] }}

We received a request to reset your password. Please click on the link below to reset your password:

@component('mail::button', ['url' => config('app.url'). 'reset-password?token='. $params['temp_token']])
Reset your password
@endcomponent

This link will expire on {{ $params['expires_at'] }}. If you do not reset your password before then, you will need to submit a new password reset request.

Thanks,<br>
{{ config('app.name') }}
@endcomponent
