<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'MyShop')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    @include('partials.navbar') {{-- Navbar muncul di semua halaman --}}

    <div class="container">
        @yield('content') {{-- Konten halaman --}}
    </div>

    @include('partials.footer') {{-- Footer muncul di semua halaman --}}

</body>
</html>
