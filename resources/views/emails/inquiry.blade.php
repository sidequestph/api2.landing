<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
<head>
    <meta charset="utf-8"> <!-- Standard encoding -->
    <meta name="viewport" content="width=device-width">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> <!-- Force IE to use its best rendering engine -->
    <meta name="x-apple-disable-message-reformatting">  <!-- Stop iOS Mail from messing with our scaling -->
    <title>Welcome to SideQuest!</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&family=Press+Start+2P&display=swap" rel="stylesheet">

    <!-- Typography Settings -->
    <!--[if mso]>
        <style>
            * {
                font-family: sans-serif !important;
            }
        </style>
    <![endif]-->

    <!-- CSS Resets to normalize client behavior -->
    <style>
        /* Kill default margins/padding from clients */
        html,
        body {
            margin: 0 auto !important;
            padding: 0 !important;
            height: 100% !important;
            width: 100% !important;
        }

        /* Stop clients from resizing our text automatically */
        * {
            -ms-text-size-adjust: 100%;
            -webkit-text-size-adjust: 100%;
        }

        /* Fix Outlook adding weird spacing to tables */
        table,
        td {
            mso-table-lspace: 0pt !important;
            mso-table-rspace: 0pt !important;
        }

        /* Fix Webkit padding bugs */
        table {
            border-spacing: 0 !important;
            border-collapse: collapse !important;
            table-layout: fixed !important;
            margin: 0 auto !important;
        }

        /* Better image resizing in IE */
        img {
            -ms-interpolation-mode: bicubic;
        }

        /* Stop clients from messing with our links */
        a {
            text-decoration: none;
        }

        /* Media Queries for Mobile */
        @media screen and (max-width: 600px) {
            .email-container {
                width: 100% !important;
                margin: auto !important;
            }
            .content-padding {
                padding: 30px 20px !important;
            }
        }
    </style>

</head>

<!-- Professional Light Theme: Light Gray Background -->
<body width="100%" style="margin: 0; padding: 0 !important; mso-line-height-rule: exactly; background-color: #f6f6f6; font-family: 'Nunito', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">
    <center style="width: 100%; background-color: #f6f6f6;">
    <!--[if mso | IE]>
    <table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%" style="background-color: #f6f6f6;">
    <tr>
    <td>
    <![endif]-->

        <!-- Preheader text -->
        <div style="display: none; font-size: 1px; line-height: 1px; max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden; mso-hide: all; font-family: sans-serif;">
            We've received your inquiry! Here is what happens next...
        </div>

        <!-- Main Email Container: White Paper Look -->
        <table align="center" role="presentation" cellspacing="0" cellpadding="0" border="0" width="600" style="margin: 40px auto; background-color: #ffffff; border-radius: 8px; box-shadow: 0 4px 12px rgba(0,0,0,0.1);" class="email-container">
            
            <!-- Header Section: Simple & Clean -->
            <tr>
                <td style="padding: 40px 40px 20px; text-align: center; border-bottom: 3px solid #bc13fe;">
                     <h1 style="margin: 0; font-family: 'Press Start 2P', cursive; font-size: 20px; font-weight: 400; color: #bc13fe; line-height: 1.5;">SIDEQUEST</h1>
                     <p style="margin: 5px 0 0; font-size: 14px; color: #888888; text-transform: uppercase; letter-spacing: 1px; font-family: 'Nunito', sans-serif;">Philippines</p>
                </td>
            </tr>

            <!-- Main Content Area: Left Aligned "Open Letter" Style -->
            <tr>
                <td class="content-padding" style="padding: 40px 40px 30px; text-align: left; color: #444444; font-size: 16px; line-height: 1.6;">
                    
                    <p style="margin: 0 0 20px; font-size: 18px; color: #222222;"><strong>Hi {{ $lead->full_name }},</strong></p>
                    
                    <p style="margin: 0 0 20px;">
                        <strong>Quest Accepted!</strong> We are thrilled to see your name in our lobby.
                    </p>
                    
                    <p style="margin: 0 0 20px;">
                        Thank you for choosing SideQuest as your co-op partner. Our team is already reviewing your mission details, and we're equipping our gear to help you conquer your goals.
                    </p>

                    <!-- Value Prop / What's Next Section -->
                    <table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%" style="background-color: #f9f9f9; border-radius: 6px; margin: 25px 0;">
                        <tr>
                            <td style="padding: 20px;">
                                <h3 style="margin: 0 0 15px; font-size: 16px; color: #bc13fe; text-transform: uppercase;">What Happens Next?</h3>
                                <ul style="margin: 0; padding-left: 20px; color: #555555;">
                                    <li style="margin-bottom: 10px;"><strong>Review:</strong> We analyze your requirements (0-24 hrs).</li>
                                    <li style="margin-bottom: 10px;"><strong>Strategy:</strong> We draft a preliminary battle plan.</li>
                                    <li style="margin-bottom: 0;"><strong>Connect:</strong> We'll reach out to schedule a discovery chat.</li>
                                </ul>
                            </td>
                        </tr>
                    </table>
                    
                    <p style="margin: 0 0 30px;">
                        While you wait, feel free to check out our previous victories.
                    </p>

                    <!-- CTA Button -->
                    <table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%" style="margin-bottom: 30px;">
                        <tr>
                            <td align="center">
                                <a href="https://sidequestph.com/#portfolio" style="display: inline-block; padding: 14px 30px; background-color: #bc13fe; color: #ffffff; text-decoration: none; border-radius: 50px; font-weight: bold; font-size: 16px; box-shadow: 0 4px 6px rgba(188, 19, 254, 0.2);">View Our Work &rarr;</a>
                            </td>
                        </tr>
                    </table>

                    <p style="margin: 0;">
                        Best regards,<br>
                        <strong style="color: #222222;">The SideQuest Team</strong>
                    </p>

                </td>
            </tr>

            <!-- Footer: Subtle & Professional -->
            <tr>
                <td style="padding: 30px 40px; background-color: #f4f4f4; border-radius: 0 0 8px 8px; text-align: center; border-top: 1px solid #eeeeee;">
                    
                    <!-- Social Media Icons -->
                    <table align="center" role="presentation" cellspacing="0" cellpadding="0" border="0" style="margin: 0 auto 30px;">
                        <tr>
                            <td style="padding: 0 8px;">
                                <a href="#" target="_blank" style="text-decoration: none;"><img src="https://cdn-icons-png.flaticon.com/512/124/124010.png" width="24" height="24" alt="Facebook" border="0" style="display: block; width: 24px; max-width: 24px; min-width: 24px;"></a>
                            </td>
                            <td style="padding: 0 8px;">
                                <a href="#" target="_blank" style="text-decoration: none;"><img src="https://cdn-icons-png.flaticon.com/512/174/174855.png" width="24" height="24" alt="Instagram" border="0" style="display: block; width: 24px; max-width: 24px; min-width: 24px;"></a>
                            </td>
                            <td style="padding: 0 8px;">
                                <a href="#" target="_blank" style="text-decoration: none;"><img src="https://cdn-icons-png.flaticon.com/512/174/174857.png" width="24" height="24" alt="LinkedIn" border="0" style="display: block; width: 24px; max-width: 24px; min-width: 24px;"></a>
                            </td>
                        </tr>
                    </table>

                    <p style="margin: 0 0 10px; font-size: 12px; color: #888888; line-height: 1.5;">
                        &copy; {{ date('Y') }} SideQuest Philippines. All rights reserved.<br>
                        Manila, Philippines
                    </p>
                    
                    <p style="margin: 0; font-size: 12px; color: #888888;">
                        <a href="https://sidequestph.com" style="color: #888888; text-decoration: underline;">Visit Website</a>
                        <span style="margin: 0 5px;">|</span>
                        <a href="#" style="color: #888888; text-decoration: underline;">Privacy Policy</a>
                    </p>
                </td>
            </tr>

        </table>

    <!--[if mso | IE]>
    </td>
    </tr>
    </table>
    <![endif]-->
    </center>
</body>
</html>
