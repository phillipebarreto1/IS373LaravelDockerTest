<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <title>Laravel</title>
</head>

<body class="antialiased">
    <x-layout>
        <div class="container mt-5">
            <h1>Not Authenticated</h1>
            <p>Click <a href="/login">here</a> to the login page to get authenticated </p>
        </div>
    </x-layout>
</body>

</html>