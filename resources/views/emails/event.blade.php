<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Email</title>
</head>
<body>
    <tr>
        <td style="padding:0 35px; background-color: #F6F6F9">
            <h2 style="color:#455056; font-size:20px;line-height:24px; margin:0;">
                Hi!
            </h2>
            <h1 style="color:#455056; font-size:20px;line-height:24px; margin:0;">
                Here is the created event:
            </h2>
            <br>
            <h2 style="color:#1e1e2d; font-weight:500; margin:0;font-size:28px;font-family:'Rubik',sans-serif;">
                    Name : {{ $event->name }}
            </h2>
            <br>
            <h2 style="color:#455056; font-size:20px;line-height:12px; margin:0;">
                    Slug : {{ $event->slug }}
            </h2>
            <br>
            <h2 style="color:#455056; font-size:20px; line-height:12px; margin:0;">
                From: {{ $event->start_at }} - To: {{ $event->end_at }}
            </h2>
            <br>
        </td>
    </tr>
</body>
</html>
