<!DOCTYPE html>
<html>
<head>
    <title>{{ $subject }}</title>
</head>
<body>
    <div style="font-family: Arial, sans-serif; max-width: 600px; margin: 0 auto;">
        <h2>{{ $subject }}</h2>
        <div style="margin: 20px 0;">
            {!! nl2br(e($content)) !!}
        </div>
        <hr>
        <p style="font-size: 12px; color: #666;">
            You are receiving this email because you subscribed to our newsletter. 
            If you wish to stop receiving these emails, please
        </p>
    </div>
</body>
</html>