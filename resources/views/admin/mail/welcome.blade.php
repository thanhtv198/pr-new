<!DOCTYPE html>
<html>
<head>
    <title>{{ trans('common.mail.welcome_title') }}</title>
</head>
 
<body>
    <h3>{{ trans('common.mail.welcome_thank') }}</h3>
    <h3>{{ trans('common.mail.welcome_your_email') }} {{ $user['email'] }}</h3>
    <div class="message">
        {{ trans('common.mail.welcome_register_success') }} {{ $user['name']}}.
        {{ trans('common.mail.welcome_please_login') }}
        <br/>
        <a href="{{ route('login') }}">{{ trans('common.mail.welcome_login') }}</a></div>
<br/>
<br/>

</body>
 
</html>