{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create User</title>
</head>
<body>
    <h1>Create User</h1>
    <form action="{{ route('tenant.user.store') }}" method="POST">
        @csrf
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name"><br>

        <label for="email">Email:</label><br>
        <input type="text" id="email" name="email"><br>

        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password"><br>

        <button type="submit">Submit</button>
    </form>
</body>
</html>
 --}}

 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create User</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 400px;
            margin: auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        h1 {
            text-align: center;
        }
        form {
            margin-top: 20px;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
            box-sizing: border-box;
        }
        button[type="submit"] {
            padding: 10px 20px;
            background-color: #4caf50;
            color: #fff;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }
        button[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Create Mail Settings</h1>
        <form action="{{ route('tenant.mail-setting.store') }}" method="POST">
            @csrf
            <label for="mail_mailer">Mail Mailer:</label>
            <input type="text" id="mail_mailer" name="mail_mailer" required>

            <label for="mail_host">Mail Host:</label>
            <input type="text" id="mail_host" name="mail_host" required>

            <label for="mail_port">Mail Port:</label>
            <input type="text" id="mail_port" name="mail_port" required>

            <label for="mail_username">Mail Username:</label>
            <input type="text" id="mail_username" name="mail_username" required>

            <label for="mail_password">Mail Password:</label>
            <input type="password" id="mail_password" name="mail_password" required>

            <label for="mail_encryption">Mail Encryption:</label>
            <input type="text" id="mail_encryption" name="mail_encryption" required>

            <label for="mail_from_address">Mail From Address:</label>
            <input type="text" id="mail_from_address" name="mail_from_address" required>

            <label for="mail_from_name">Mail From Name:</label>
            <input type="text" id="mail_from_name" name="mail_from_name" required>
            <button type="submit">Submit</button>
        </form>
    </div>
</body>
</html>
