{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>
</head>
<body>
    <h1>Users</h1>
    <a href="{{ route('tenant.user.create') }}">Create New User</a>
    <ul>
        @foreach ($users as $user)
            <li>
                {{ $user->name }} - {{ $user->email }}
                <form action="{{ route('tenant.user.destroy', $user->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
                <a href="{{ route('tenant.user.edit', $user->id) }}">Edit</a>
            </li>
        @endforeach
    </ul>
</body>
</html> --}}

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
        <h1>Users</h1>
        <a class="btn" href="{{ route('tenant.user.create') }}">Create New User</a>
        <ul>
            @foreach ($users as $user)
                <li>
                    <strong>{{ $user->name }}</strong> - {{ $user->email }}
                    <form style="display: inline;" action="{{ route('tenant.user.destroy', $user->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn" type="submit">Delete</button>
                    </form>
                    <a class="btn" href="{{ route('tenant.user.edit', $user->id) }}">Edit</a>
                </li>
            @endforeach
        </ul>
    </div>
</body>
</html>
