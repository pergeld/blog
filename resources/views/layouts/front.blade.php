<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Front layout</title>
</head>
<body>
    <div id="app">
        <div>
            Nav goes here for front layout
        </div>

        <div>
            {{ $slot }}
        </div>
    </div>
</body>
</html>
