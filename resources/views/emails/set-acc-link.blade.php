<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to AI Survey</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        .email-container {
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }
        .logo {
            max-height: 60px;
            max-width: 200px;
        }
        .email-header {
            padding: 20px 30px;
            text-align: center;
            background-color: #f7f9fc;
            border-bottom: 1px solid #e1e5ea;
        }
        .email-body {
            padding: 30px;
            background-color: #ffffff;
        }
        .welcome-text {
            font-size: 22px;
            font-weight: 600;
            color: #0056b3;
            margin-top: 0;
            margin-bottom: 20px;
        }
        .button {
            display: inline-block;
            background-color: #0056b3;
            color: white !important;
            padding: 12px 25px;
            text-decoration: none;
            border-radius: 5px;
            font-weight: 600;
            margin: 25px 0;
            transition: background-color 0.3s;
        }
        .button:hover {
            background-color: #003d82;
        }
        .email-footer {
            padding: 20px 30px;
            background-color: #f7f9fc;
            border-top: 1px solid #e1e5ea;
            font-size: 14px;
        }
        .company-info {
            margin-top: 15px;
            color: #6c757d;
            font-size: 12px;
        }
        .security-note {
            padding: 10px 15px;
            background-color: #fff8e1;
            border-left: 4px solid #ffc107;
            margin: 20px 0;
            font-size: 14px;
            color: #6d4c00;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="email-header">
            <img src="{{ asset('assets/images/dcismicon.png')}}" alt="DCISM Logo" class="logo">
        </div>
        <div class="email-body">
            <h2 class="welcome-text">Welcome to AI Survey!</h2>
            
            <p>We are excited to test our system.</p>

            <p>Your account has been created to grant you access to AI survey and to <b>activate your account for the Evaluation System</b>.</p>
            
            <p>To complete your account setup, please click the button below to set your account:</p>
            
            <div style="text-align: center;">
                <a href="{{ $url }}" class="button">Set Your Account</a>
            </div>
            
            <div class="security-note">
                <strong>Note:</strong> For security purposes, this link will expire soon and is only valid once, after you set your password.
            </div>
        </div>
        
        <div class="email-footer">
            <p>If you have any questions, please contact your respective coordinator.</p>
            
            <p style="margin-bottom: 5px;"><strong>Regards,</strong></p>
            <p>DCISM Development Team</p>

            <div class="company-info">
                © 2025 Department of Computer Science and Information Systems Management. All rights reserved.
            </div>
        </div>
    </div>
</body>
</html>
