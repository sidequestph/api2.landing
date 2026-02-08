<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Newsletter Subscription</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: #f6f6f6;
        }
        table {
            border-spacing: 0;
            width: 100%;
            background-color: #f6f6f6;
        }
        td {
            padding: 0;
            text-align: center;
        }
        img {
            max-width: 100%;
            height: auto;
            display: block;
            margin: 0 auto;
        }
    </style>
</head>
<body style="background-color: #f6f6f6;">
    <table role="presentation" style="background-color: #f6f6f6;">
        <tr>
            <td>
                <!-- 
                     The image source points to the public/images directory.
                     Ensure APP_URL in .env is set to your actual domain (e.g., https://sidequestph.com)
                     for the image to load correctly in email clients.
                -->
                <img src="{{ url('images/newsletter-response.jpg') }}" alt="Welcome to our Newsletter">
            </td>
        </tr>
        <tr>
            <td style="padding: 20px; font-family: sans-serif; font-size: 12px; color: #666666;">
                <p>You received this email because you subscribed to our newsletter.</p>
                <p><a href="{{ $unsubscribeUrl }}" style="color: #666666; text-decoration: underline;">Unsubscribe</a></p>
            </td>
        </tr>
    </table>
</body>
</html>
