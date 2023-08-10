<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sure Cover Request</title>
</head>

<body>
  <div style="max-width: 600px; margin: 0 auto; padding: 20px;">
        <p>Request info</p>
        <br>
        <br>
        <table>
            <thead>
                <tr>
                    <th>Agent</th>
                    <th>Email</th>
                    <th>Clent</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{$form['agent_name']}}</td>
                    <td>{{$form['email']}}</td>
                    <td>{{$form['client']}}</td>
                </tr>
            </tbody>
        </table>
        <br>
        <br>
        <p> Please <a href="http://jngidocumentportal.test/" style="padding: 10px 15px;background:#2C4484;color:#fff;">login</a> here</p>
        <br>
  </div>
</body>

</html>
