<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body { font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Arial, sans-serif; line-height: 1.6; color: #333; }
        .container { max-width: 600px; margin: 0 auto; padding: 20px; }
        .header { text-align: center; padding-bottom: 30px; border-bottom: 1px solid #e0e0e0; margin-bottom: 30px; }
        .logo { font-size: 24px; font-weight: 700; color: #1B2340; letter-spacing: -0.5px; }
        .content { margin: 30px 0; }
        .label { font-weight: 600; color: #1B2340; margin-top: 20px; margin-bottom: 10px; font-size: 14px; text-transform: uppercase; letter-spacing: 0.5px; }
        .value { background: #f5f5f5; padding: 15px; border-radius: 8px; margin-bottom: 15px; }
        .message-text { white-space: pre-wrap; word-wrap: break-word; }
        .footer { margin-top: 40px; padding-top: 20px; border-top: 1px solid #e0e0e0; font-size: 12px; color: #666; text-align: center; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="logo">RDS</div>
        </div>

        <div class="content">
            <p style="color: #666; margin: 0 0 20px 0;">You have received a new message from your portfolio contact form:</p>

            <div class="label">From</div>
            <div class="value">{{ $name }} <br><small style="color: #666;">{{ $email }}</small></div>

            <div class="label">Message</div>
            <div class="value message-text">{{ $message }}</div>
        </div>

        <div class="footer">
            <p style="margin: 0;">This email was sent from your portfolio contact form.</p>
        </div>
    </div>
</body>
</html>
