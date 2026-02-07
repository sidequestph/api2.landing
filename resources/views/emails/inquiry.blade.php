<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inquiry Received</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: #f6f6f6;
        }
        table {
            border-spacing: 0;
            width: 100%;
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
<body>
    <table role="presentation">
        <tr>
            <td>
                <!-- 
                     The image source points to the public/images directory.
                     Ensure APP_URL in .env is set to your actual domain (e.g., https://sidequestph.com)
                     for the image to load correctly in email clients.
                -->
                <img src="{{ url('images/inquiry-response.png') }}" alt="Thank you for your inquiry">
            </td>
        </tr>
    </table>
</body>
</html>
