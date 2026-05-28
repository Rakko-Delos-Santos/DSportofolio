<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You for Reaching Out</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', 'Roboto', 'Oxygen', 'Ubuntu', 'Cantarell', sans-serif;
            line-height: 1.6;
            color: #333;
            background-color: #f9fafb;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
        }
        .header {
            background: linear-gradient(135deg, #1B2340 0%, #2d3a5c 100%);
            padding: 40px 30px;
            text-align: center;
            position: relative;
        }
        .logo {
            width: 80px;
            height: 80px;
            margin: 0 auto 20px;
            background: rgba(255,255,255,0.1);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 2px solid rgba(255,255,255,0.2);
            font-size: 32px;
            font-weight: 700;
            color: white;
            letter-spacing: 1px;
        }
        .logo svg {
            width: 60px;
            height: 60px;
        }
        .header-text {
            color: #ffffff;
            font-size: 28px;
            font-weight: 700;
            letter-spacing: -0.5px;
        }
        .content {
            padding: 40px 30px;
        }
        .greeting {
            font-size: 18px;
            font-weight: 600;
            color: #1B2340;
            margin-bottom: 20px;
        }
        .message {
            color: #555;
            line-height: 1.8;
            margin-bottom: 20px;
            font-size: 15px;
        }
        .highlight {
            background-color: #f0f4ff;
            border-left: 4px solid #4f46e5;
            padding: 15px 20px;
            margin: 25px 0;
            border-radius: 4px;
            font-style: italic;
            color: #4f46e5;
        }
        .signature-section {
            margin-top: 40px;
            padding-top: 30px;
            border-top: 1px solid #e5e7eb;
        }
        .signature {
            color: #1B2340;
            font-weight: 600;
            font-size: 16px;
            margin-bottom: 5px;
        }
        .title {
            color: #666;
            font-size: 14px;
            margin-bottom: 15px;
        }
        .footer {
            background-color: #f9fafb;
            padding: 30px;
            border-top: 1px solid #e5e7eb;
        }
        .footer-text {
            font-size: 12px;
            color: #999;
            line-height: 1.6;
        }
        .footer-link {
            color: #4f46e5;
            text-decoration: none;
        }
        .footer-link:hover {
            text-decoration: underline;
        }
        @media (max-width: 600px) {
            .container {
                border-radius: 0;
            }
            .header {
                padding: 30px 20px;
            }
            .content {
                padding: 30px 20px;
            }
            .footer {
                padding: 20px;
            }
            .greeting {
                font-size: 16px;
            }
            .message {
                font-size: 14px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Header with Logo -->
        <div class="header">
            <div class="logo">
                RDS
            </div>
            <div class="header-text">Thank You!</div>
        </div>

        <!-- Main Content -->
        <div class="content">
            <div class="greeting">Hi {{ $name }},</div>
            
            <div class="message">
                <p>Thank you so much for reaching out and taking the time to connect with me. I truly appreciate your message and interest in my work.</p>
            </div>
            
            <div class="highlight">
                <strong>I'm currently reviewing your message</strong> and will get back to you as soon as possible—typically within 24-48 hours.
            </div>

            <div class="message">
                <p>In the meantime, feel free to explore my portfolio and check out my recent projects on GitHub. I'm always excited to discuss new opportunities, collaborations, or just exchange ideas about web development and technology.</p>
            </div>

            <!-- Signature -->
            <div class="signature-section">
                <div class="signature">Rakko Delos Santos</div>
                <div class="title">Full Stack Web Developer</div>
                <div style="color: #666; font-size: 13px; line-height: 1.8;">
                    <a href="https://github.com/Rakko-Delos-Santos" style="color: #4f46e5; text-decoration: none;">GitHub</a> • 
                    <a href="http://localhost:8000" style="color: #4f46e5; text-decoration: none;">Portfolio</a>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <div class="footer">
            <div class="footer-text">
                <p>Questions? Feel free to reply to this email. I'll be happy to help.</p>
                <p style="margin-top: 15px; color: #bbb;">
                    © 2026 Rakko Delos Santos. All rights reserved.
                </p>
            </div>
        </div>
    </div>
</body>
</html>
