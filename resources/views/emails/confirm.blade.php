<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Confirm Email</title>
</head>
<body>
<h1>Thank you for registering on Sample website</h1>
<p>Please click the following link to finish your registration
    <a href="{{route('confirm_email',$user->activation_token)}}">{{route('confirm_email',$user->activation_token)}}</a>
</p>
<P>If this is not your email,please ignore it</P>
</body>
</html>