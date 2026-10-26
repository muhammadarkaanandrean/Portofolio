<!DOCTYPE html>
<html lang="id" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Portofolio Muhammad Arkaan Andrean - Mahasiswa Informatika">
    <title>@yield('title', 'Portofolio | Muhammad Arkaan Andrean')</title>

    {{-- Terapkan tema tersimpan sebelum halaman tampil (mencegah kedip). Default: gelap --}}
    <script>
        try { if (localStorage.getItem('theme') === 'light') document.documentElement.classList.remove('dark'); } catch (e) {}
    </script>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-50 font-sans text-slate-700 antialiased transition-colors dark:bg-slate-950 dark:text-slate-300">
    @yield('content')
</body>
</html>
