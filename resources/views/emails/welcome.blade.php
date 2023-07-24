<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome</title>
</head>

<body>
  <div style="max-width: 600px; margin: 0 auto; padding: 20px;">
        <p>Hi, {{$form['name']}}</p>
        <p>Please see your info below, login to verify your account </p>

        <br>
        <br>
        <table>
            <thead>
                <tr>
                    <th style="background-color: #2C4484;color:#fff;">Username</th>
                    <th style="background-color: #2C4484;color:#fff;"">Password</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{$form['email']}}</td>
                    <td>{{$form['password']}}</td>
                </tr>
            </tbody>
        </table>
        <br>
        <br>
        <p> Please <a href="http://jngidocumentportal.test/" style="padding: 10px 15px;background:#2C4484;color:#fff;">login</a> with the above info</p>
        <br>
        <p>keep information secure</p>
  </div>
</body>

</html>
