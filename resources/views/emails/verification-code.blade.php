<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify Your Email Address</title>
    <!--[if !mso]><!-->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <!--<![endif]-->
    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: #f8fafc;
            font-family: 'Plus Jakarta Sans', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
            -webkit-font-smoothing: antialiased;
        }
        @media only screen and (max-width: 600px) {
            .container {
                padding: 20px 10px !important;
            }
            .card {
                padding: 32px 20px !important;
                border-radius: 12px !important;
            }
            .code-text {
                font-size: 30px !important;
                letter-spacing: 8px !important;
            }
        }
    </style>
</head>

<body>
    <table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="background-color: #f8fafc; min-height: 100vh;">
        <tr>
            <td align="center" style="padding: 40px 20px;" class="container">
                <table role="presentation" cellpadding="0" cellspacing="0" style="max-width: 500px; width: 100%;">
                    <!-- Main Card -->
                    <tr>
                        <td class="card" style="background: #ffffff; border-radius: 16px; overflow: hidden; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05), 0 10px 15px -3px rgba(0, 0, 0, 0.03); border: 1px solid #e2e8f0; padding: 44px 36px; text-align: center;">
                            <!-- Gradient Accent Top Bar -->
                            <div style="height: 5px; background: linear-gradient(90deg, #2ab5b0 0%, #00b1aa 100%); margin: -44px -36px 36px -36px;"></div>

                            <!-- Centered Logo -->
                            <div style="margin-bottom: 28px; text-align: center;">
                                @if(file_exists(public_path('images/Logos/TLM.png')))
                                    <img src="{{ $message->embed(public_path('images/Logos/TLM.png')) }}" alt="TLM Logo"
                                         style="display: inline-block; height: 50px; max-width: 160px; object-fit: contain; outline: none; border: none;">
                                @else
                                    <span style="font-size: 24px; font-weight: 800; color: #0f172a; letter-spacing: -0.5px;">TLM</span>
                                @endif
                            </div>

                            <!-- Shield Icon decoration -->
                            <div style="margin-bottom: 20px;">
                                <div style="display: inline-flex; align-items: center; justify-content: center; width: 56px; height: 56px; background-color: #ecfdfa; border-radius: 50%;">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#2ab5b0" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="display: inline-block; vertical-align: middle;">
                                        <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>
                                    </svg>
                                </div>
                            </div>

                            <!-- Heading -->
                            <h1 style="margin: 0 0 12px 0; font-size: 24px; font-weight: 700; color: #0f172a; letter-spacing: -0.5px;">
                                Verify your email
                            </h1>
                            
                            <!-- Description -->
                            <p style="margin: 0 auto 32px; font-size: 15px; color: #475569; line-height: 1.6; max-width: 360px;">
                                Use the verification code below to complete your registration.
                            </p>

                            <!-- Code Box -->
                            <table role="presentation" cellpadding="0" cellspacing="0" width="100%" style="margin-bottom: 24px;">
                                <tr>
                                    <td align="center">
                                        <div style="background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%); border-radius: 12px; border: 1.5px dashed #cbd5e1; display: inline-block; padding: 18px 36px; min-width: 200px;">
                                            <span class="code-text" style="font-size: 36px; font-weight: 800; letter-spacing: 10px; color: #0f172a; font-family: 'Courier New', Courier, monospace; display: block; padding-left: 10px;">{{ $code }}</span>
                                        </div>
                                    </td>
                                </tr>
                            </table>

                            <!-- Expiry pill -->
                            <div style="display: inline-block; margin-bottom: 28px;">
                                <table role="presentation" cellpadding="0" cellspacing="0">
                                    <tr>
                                        <td style="background-color: #fffbeb; border: 1px solid #fef3c7; border-radius: 9999px; padding: 6px 14px; font-size: 13px; font-weight: 600; color: #b45309;">
                                            ⏱️ Expires in 1 minute
                                        </td>
                                    </tr>
                                </table>
                            </div>

                            <!-- Divider line -->
                            <div style="height: 1px; background-color: #f1f5f9; margin-bottom: 24px;"></div>

                            <!-- Warning text -->
                            <p style="margin: 0; font-size: 13px; color: #94a3b8; line-height: 1.5;">
                                If you did not request this verification, you can safely ignore this email.
                            </p>
                        </td>
                    </tr>
                    
                    <!-- Footer Info -->
                    <tr>
                        <td align="center" style="padding-top: 32px;">
                            <p style="margin: 0 0 8px 0; font-size: 13px; color: #64748b;">
                                Need help? Please contact <a href="mailto:support@interlink.io" style="color: #2ab5b0; text-decoration: none; font-weight: 600;">support@interlink.io</a>
                            </p>
                            <p style="margin: 0; font-size: 12px; color: #94a3b8;">
                                &copy; {{ date('Y') }} InterLink. All rights reserved.
                            </p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>

</html>
