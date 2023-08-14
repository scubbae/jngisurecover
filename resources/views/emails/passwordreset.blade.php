<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Password Reset</title>
</head>
<body>
    <div style="max-width: 600px; margin: 0 auto; padding: 20px;">
        <p>Please see your info below, to reset your password</p>
        <br>
        <br>
        <p>{{$form['email']}}</p>
        <p>{{$form['token']}}</p>
        <br>
        <br>
        <p><a href="{{ route('reset-password', ['email' => $email, 'token' => $token]) }}" style="padding: 10px 15px;background:#2C4484;color:#fff;">Reset Password</a></p>
        <br>
        <p>If you did not request a password reset, please ignore this email or contact admin.</p>
  </div>
</body>
</html>