@component('mail::message')
Hi, {{ $params['email'] }} did you forgot your password?

Someone (hopefully you) has asked us to reset the password for your account. 
Please click the button below to do so. If you didn't request this password reset, you can go ahead and ignore this email!

@component('mail::button', ['url' => config('app.url'). 'reset-password'])
Reset your password
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
