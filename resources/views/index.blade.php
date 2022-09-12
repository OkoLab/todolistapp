<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>ToDo List</title>

    @vite('resources/js/app.js')
</head>

<body>
    <div id='app'>
        <div class="container pt-10 px-10 flex justify-center">
            <app-component /> 
        </div>
    </div>
</body>

</html>
