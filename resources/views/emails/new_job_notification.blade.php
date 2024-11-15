<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Job Notification</title>
</head>
<body style="font-family: Arial, sans-serif; margin: 0; padding: 0; color: #333; line-height: 1.5;">
    <table width="100%" style="background-color: #f4f4f9; padding: 20px;">
        <tr>
            <td align="center">
                <table width="600" style="background-color: #ffffff; border-radius: 10px; overflow: hidden; border: 1px solid #ddd;">
                    <tr>
                        <td style="background-color: #0047ab; color: #ffffff; padding: 20px; text-align: center; font-size: 24px;">
                            New Job Notification
                        </td>
                    </tr>
                    <tr>
                        <td style="padding: 20px;">
                            <h1 style="font-size: 22px; color: #0047ab;">New Job Posted: {{ $job['title'] }}</h1>
                            <p>Dear {{ $user->firstName }},</p>
                            <p>We are excited to inform you about a new job opportunity:</p>
                            <ul style="padding: 0; list-style: none; margin: 0;">
                                <li style="margin-bottom: 10px;"><strong>Job Title:</strong> {{ $job['title'] }}</li>
                                <li style="margin-bottom: 10px;"><strong>Description:</strong> {{ $job['description'] }}</li>
                                <li style="margin-bottom: 10px;"><strong>Location:</strong> {{ $job['location'] ?? 'N/A' }}</li>
                            </ul>
                            <p>To learn more, please click the link below:</p>
                            <a href="{{ $job['url'] }}" style="display: inline-block; padding: 10px 20px; background-color: #0047ab; color: #ffffff; text-decoration: none; border-radius: 5px;">View Job Details</a>
                            <p style="margin-top: 20px;">Thank you for being a valued member of our community!</p>
                        </td>
                    </tr>
                    <tr>
                        <td style="background-color: #f4f4f9; padding: 10px; text-align: center; font-size: 12px; color: #666;">
                            © {{ date('Y') }} {{ config('app.name') }}. All rights reserved.
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
