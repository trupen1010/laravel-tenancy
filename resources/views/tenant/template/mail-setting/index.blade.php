<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 800px;
            margin: auto;
            padding: 20px;
        }
        h1 {
            text-align: center;
        }
        ul {
            list-style-type: none;
            padding: 0;
        }
        li {
            background-color: #fff;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 5px;
        }
        .btn {
            padding: 5px 10px;
            background-color: #4caf50;
            color: #fff;
            text-decoration: none;
            border: none;
            border-radius: 3px;
        }
        .btn:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Mail Settings</h1>
        @if (empty($tenantMailSetting->id))
            <a class="btn" href="{{ route('tenant.mail-setting.create') }}">Create New Mail Settings</a>
        @endif
        <ul>
            <li>
                <strong>Mailer: {{ $tenantMailSetting->mail_mailer ?? '' }}</strong><br />
                <strong>Host: {{ $tenantMailSetting->mail_host ?? '' }}</strong><br />
                <strong>Port: {{ $tenantMailSetting->mail_port ?? '' }}</strong><br />
                <strong>User Name: {{ $tenantMailSetting->mail_username ?? '' }}</strong><br />
                <strong>Password: {{ $tenantMailSetting->mail_password ?? '' }}</strong><br />
                <strong>Encryption: {{ $tenantMailSetting->mail_encryption ?? '' }}</strong><br />
                <strong>From Address: {{ $tenantMailSetting->mail_from_address ?? '' }}</strong><br />
                <strong>From Name: {{ $tenantMailSetting->mail_from_name ?? '' }}</strong><br />

                @if (isset($tenantMailSetting->id) && !empty($tenantMailSetting->id))
                    <a class="btn" href="{{ route('tenant.mail-setting.edit', $tenantMailSetting->id) }}">Edit</a>
                    
                    <a class="btn" href="{{ route('tenant.send-mail') }}">Send Mail</a>
                @endif
            </li>
        </ul>
    </div>
</body>
</html>
