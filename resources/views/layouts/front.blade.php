<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Front layout</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    @vite('resources/css/app.css')
</head>
<body class="relative bg-body text-white pb-12">
    <div id="app">
        @include('partials.header')
        <div>
            {{ $slot }}
        </div>
    </div>

    @vite('resources/js/app.js')
</body>
</html>
