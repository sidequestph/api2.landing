<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
<head>
    <meta charset="utf-8"> <!-- Standard encoding -->
    <meta name="viewport" content="width=device-width">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> <!-- Force IE to use its best rendering engine -->
    <meta name="x-apple-disable-message-reformatting">  <!-- Stop iOS Mail from messing with our scaling -->
    <title>Welcome to SideQuest!</title> <!-- Title appears in some email notifications -->

    <!-- Typography Settings -->
    
    <!-- Outlook hates web fonts, so we force a safe fallback here to avoid Times New Roman -->
    <!--[if mso]>
        <style>
            * {
                font-family: sans-serif !important;
            }
        </style>
    <![endif]-->

    <!-- Everyone else gets the nice web fonts -->
    <!--[if !mso]><!-->
        <!-- Insert web font reference here if needed -->
    <!--<![endif]-->

    <!-- CSS Resets to normalize client behavior -->
    <style>
        /* Kill default margins/padding from clients */
        /* html,
        body {
            margin: 0 auto !important;
            padding: 0 !important;
            height: 100% !important;
            width: 100% !important;
        } */

        /* Stop clients from resizing our text automatically */
        * {
            -ms-text-size-adjust: 100%;
            -webkit-text-size-adjust: 100%;
        }

        /* Center the email on older Android versions */
        div[style*="margin: 16px 0"] {
            margin: 0 !important;
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

        /* Prevent auto-linking of dates, addresses, etc. */
        *[x-apple-data-detectors],  /* iOS */
        .unstyle-auto-detected-links *,
        .aBn {
            border-bottom: 0 !important;
            cursor: default !important;
            color: inherit !important;
            text-decoration: none !important;
            font-size: inherit !important;
            font-family: inherit !important;
            font-weight: inherit !important;
            line-height: inherit !important;
        }

        /* Hide Gmail's annoying download button on images */
        .a6S {
            display: none !important;
            opacity: 0.01 !important;
        }

        /* Stop Gmail from purple-washing our text in threads */
        .im {
            color: inherit !important;
        }

        /* Fix the right gutter issue in Gmail iOS */
        
        /* Small screens (iPhone SE/5s size) */
        @media only screen and (min-device-width: 320px) and (max-device-width: 374px) {
            u ~ div .email-container {
                min-width: 320px !important;
            }
        }
        /* Medium mobile screens */
        @media only screen and (min-device-width: 375px) and (max-device-width: 413px) {
            u ~ div .email-container {
                min-width: 375px !important;
            }
        }
        /* Larger mobile screens */
        @media only screen and (min-device-width: 414px) {
            u ~ div .email-container {
                min-width: 414px !important;
            }
        }

    </style>

    <!-- Custom Styles & Enhancements -->
    <style>

        /* Button hover effects */
        .button-td,
        .button-a {
            transition: all 100ms ease-in;
        }
        .button-td-primary:hover,
        .button-a-primary:hover {
            background: #a010d6 !important;
            border-color: #a010d6 !important;
        }

        /* Mobile Layout Adjustments */
        @media screen and (max-width: 600px) {

            .email-container {
                width: 100% !important;
                margin: auto !important;
            }

            /* Make elements full-width on mobile */
            .fluid {
                max-width: 100% !important;
                height: auto !important;
                margin-left: auto !important;
                margin-right: auto !important;
            }

            /* Stack columns vertically on mobile */
            .stack-column,
            .stack-column-center {
                display: block !important;
                width: 100% !important;
                max-width: 100% !important;
                direction: ltr !important;
            }
            
            /* Center text for stacked columns */
            .stack-column-center {
                text-align: center !important;
            }

            /* Utility for centering elements */
            .center-on-narrow {
                text-align: center !important;
                display: block !important;
                margin-left: auto !important;
                margin-right: auto !important;
                float: none !important;
            }
            table.center-on-narrow {
                display: inline-block !important;
            }

            /* Adjust text sizes for mobile reading */
            .header-text {
                font-size: 28px !important;
            }
            .content-text {
                font-size: 16px !important;
            }
        }

    </style>

</head>

<!-- Background color defined in 3 places for maximum compatibility (Body, Center, MSO) -->
<body width="100%" style="margin: 0; padding: 0 !important; mso-line-height-rule: exactly; background-color: #121212;">
    <center style="width: 100%; background-color: #121212;">
    <!--[if mso | IE]>
    <table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%" style="background-color: #121212;">
    <tr>
    <td>
    <![endif]-->

        <!-- Preheader text (what they see in the inbox list) -->
        <div style="display: none; font-size: 1px; line-height: 1px; max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden; mso-hide: all; font-family: sans-serif;">
            Quest Accepted! We are excited to work with you.
        </div>

        <!-- Invisible spacer to keep the inbox preview clean -->
        <div style="display: none; font-size: 1px; line-height: 1px; max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden; mso-hide: all; font-family: sans-serif;">
            &zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;
        </div>

        <!-- Main Email Container -->
        <table align="center" role="presentation" cellspacing="0" cellpadding="0" border="0" width="600" style="margin: auto;" class="email-container">
            
            <!-- Hero Image (Optional) -->
            <!-- <tr>
                <td style="background-color: #ffffff;">
                    <img src="..." ... class="g-img">
                </td>
            </tr> -->

            <!-- Header Section -->
            <tr>
                <td style="padding: 40px 20px; text-align: center; background: #1E1E1E; border-bottom: 2px solid #bc13fe; border-radius: 16px 16px 0 0;">
                     <h1 class="header-text" style="margin: 0; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; font-size: 32px; font-weight: 800; color: #bc13fe; text-transform: uppercase; letter-spacing: 2px; text-shadow: 0 0 10px rgba(188, 19, 254, 0.5);">SideQuest</h1>
                </td>
            </tr>

            <!-- Main Content Area -->
            <tr>
                <td style="background-color: #1E1E1E;">
                    <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                        <tr>
                            <td style="padding: 40px 30px; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; font-size: 16px; line-height: 1.8; color: #e0e0e0; text-align: center;">
                                <h2 style="margin: 0 0 20px 0; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; font-size: 24px; color: #ffffff;">Hi {{ $lead->full_name }}! 👋</h2>
                                
                                <p class="content-text" style="margin: 0 0 20px 0;">
                                    <strong style="font-size: 18px; color: #ffffff;">Quest Accepted! ⚔️</strong>
                                    <br><br>
                                    Welcome to the SideQuest lobby! We are beyond <span style="color: #bc13fe; font-weight: bold;">excited</span> to have you here.
                                    <br><br>
                                    Thank you for believing in us and choosing us as your co-op partner. Your inquiry has been successfully added to our quest log, and our guild of elite engineers and designers is already equipping their gear to help you conquer your goals.
                                    <br><br>
                                    We know that every great adventure starts with a single step, and we're honored you took that step with us. We're currently reviewing your mission details and will ping you back faster than a speedrun! ⚡
                                    <br><br>
                                    Get ready to <strong style="color: #ffffff;">level up</strong>!
                                </p>

                                <!-- User's Original Message -->
                                <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="background-color: #252525; border-radius: 8px; border-left: 3px solid #bc13fe; margin: 30px 0;">
                                    <tr>
                                        <td style="padding: 20px; text-align: left;">
                                            <p style="margin: 0; font-size: 12px; color: #888; text-transform: uppercase; letter-spacing: 1px; font-family: sans-serif;">Your Inquiry</p>
                                            <p style="margin: 10px 0 0; font-style: italic; color: #ccc; font-family: sans-serif;">"{{ \Illuminate\Support\Str::limit($lead->message, 150) }}"</p>
                                        </td>
                                    </tr>
                                </table>

                            </td>
                        </tr>
                        <tr>
                            <td style="padding: 0 30px 40px; font-family: sans-serif; font-size: 15px; line-height: 20px; color: #555555;">
                                <!-- CTA Button -->
                                <table align="center" role="presentation" cellspacing="0" cellpadding="0" border="0" style="margin: auto;">
                                    <tr>
                                        <td class="button-td button-td-primary" style="border-radius: 50px; background: #bc13fe;">
                                            <a class="button-a button-a-primary" href="https://sidequestph.com" style="background: #bc13fe; border: 1px solid #bc13fe; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; font-size: 16px; line-height: 15px; font-weight: bold; text-decoration: none; padding: 15px 30px; color: #ffffff; display: block; border-radius: 50px;">Visit Our Website</a>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>

                    </table>
                </td>
            </tr>

            <!-- Footer -->
            <tr>
                <td style="padding: 30px 20px; background-color: #000000; border-radius: 0 0 16px 16px; text-align: center;">
                    
                    <!-- Social Media Icons -->
                    <table align="center" role="presentation" cellspacing="0" cellpadding="0" border="0" style="margin: auto;">
                        <tr>
                            <td style="padding: 0 10px;">
                                <a href="#" target="_blank"><img src="https://cdn-icons-png.flaticon.com/512/124/124010.png" width="32" height="32" alt="Facebook" border="0" style="height: auto; font-family: sans-serif; font-size: 15px; line-height: 15px; color: #555555;"></a>
                            </td>
                            <td style="padding: 0 10px;">
                                <a href="#" target="_blank"><img src="https://cdn-icons-png.flaticon.com/512/174/174855.png" width="32" height="32" alt="Instagram" border="0" style="height: auto; font-family: sans-serif; font-size: 15px; line-height: 15px; color: #555555;"></a>
                            </td>
                            <td style="padding: 0 10px;">
                                <a href="#" target="_blank"><img src="https://cdn-icons-png.flaticon.com/512/174/174857.png" width="32" height="32" alt="LinkedIn" border="0" style="height: auto; font-family: sans-serif; font-size: 15px; line-height: 15px; color: #555555;"></a>
                            </td>
                        </tr>
                    </table>

                    <p style="margin: 20px 0 10px; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; font-size: 14px; line-height: 18px; color: #888888;">
                        &copy; {{ date('Y') }} <a href="https://sidequestph.com" style="color: #bc13fe; text-decoration: none; font-weight: bold;">SideQuest</a>. All rights reserved.
                    </p>
                    <p style="margin: 0; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; font-size: 12px; line-height: 16px; color: #555555;">
                        You received this email because you contacted us via our website.
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
