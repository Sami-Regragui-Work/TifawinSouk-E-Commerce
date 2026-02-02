<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- <meta http-equiv="X-UA-Compatible" content="ie=edge"> --}}
    <title>@yield('title', 'Admin - TifawinSouk')</title>
</head>
<body>
    <div>
        @include('admin.sidebar')
        <main>
            @include('admin.components.alerts.success')
            @include('admin.components.alerts.errors')

            @yield('content')
        </main>
    </div>
</body>
</html>
