<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin layout</title>
</head>
<body>
    <div id="app">
        <div>
            <ul>
                <li><a href="{{ route('profile') }}">Profile</a></li>
                <li><a href="{{ route('password') }}">Update Password</a></li>
                <li>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf

                        <a href="{{ route('logout') }}" onclick="event.preventDefault();
                        this.closest('form').submit();"
                        >
                            Logout
                        </a>
                    </form>
                </li>
            </ul>
        </div>

        <div>
            {{ $slot }}
        </div>
    </div>
</body>
</html>
