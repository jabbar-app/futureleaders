<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{ $subject }}</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f6f8fb;
      color: #333;
      margin: 0;
      padding: 0;
    }

    .email-container {
      background-color: #ffffff;
      max-width: 600px;
      margin: 30px auto;
      padding: 30px;
      border-radius: 8px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .header {
      font-size: 24px;
      font-weight: bold;
      color: #0056b3;
      margin-bottom: 20px;
    }

    .content {
      font-size: 16px;
      line-height: 1.7;
    }

    .footer {
      margin-top: 30px;
      font-size: 13px;
      color: #888;
      text-align: center;
    }
  </style>
</head>

<body>
  <div class="email-container">
    <div class="header">{{ $subject }}</div>
    <div class="content">
      {!! nl2br($body) !!}
    </div>
    <div class="footer">
      &copy; {{ date('Y') }} Program Langkat-Binjai Future Leaders. All rights reserved.
    </div>
  </div>
</body>

</html>
