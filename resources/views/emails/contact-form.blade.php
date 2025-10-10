<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>New Contact Form Submission</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        .header {
            background-color: #f8f9fa;
            padding: 20px;
            text-align: center;
            border-radius: 5px;
            margin-bottom: 20px;
        }
        .content {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 5px;
            border: 1px solid #e9ecef;
        }
        .field {
            margin-bottom: 15px;
        }
        .field-label {
            font-weight: bold;
            color: #495057;
        }
        .field-value {
            margin-top: 5px;
            padding: 10px;
            background-color: #f8f9fa;
            border-radius: 3px;
        }
        .footer {
            margin-top: 20px;
            padding-top: 20px;
            border-top: 1px solid #e9ecef;
            font-size: 12px;
            color: #6c757d;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>New Contact Form Submission</h1>
        <p>You have received a new message from your website contact form.</p>
    </div>

    <div class="content">
        <div class="field">
            <div class="field-label">Name:</div>
            <div class="field-value">{{ $contactMessage->name }}</div>
        </div>

        <div class="field">
            <div class="field-label">Email:</div>
            <div class="field-value">{{ $contactMessage->email }}</div>
        </div>

        @if($contactMessage->phone)
        <div class="field">
            <div class="field-label">Phone:</div>
            <div class="field-value">{{ $contactMessage->phone }}</div>
        </div>
        @endif

        @if($contactMessage->subject)
        <div class="field">
            <div class="field-label">Subject:</div>
            <div class="field-value">{{ $contactMessage->subject }}</div>
        </div>
        @endif

        <div class="field">
            <div class="field-label">Message:</div>
            <div class="field-value">{{ $contactMessage->message }}</div>
        </div>

        <div class="field">
            <div class="field-label">Submitted at:</div>
            <div class="field-value">{{ $contactMessage->created_at->format('F j, Y \a\t g:i A') }}</div>
        </div>
    </div>

    <div class="footer">
        <p>This message was sent from your website contact form.</p>
        <p>VIS GmbH - Construction Website Management System</p>
    </div>
</body>
</html>
