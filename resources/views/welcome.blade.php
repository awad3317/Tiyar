<!DOCTYPE html>
<html dir="rtl" lang="ar">
<head>
    <meta charset="UTF-8">
    <title>Tiyar</title>

    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;500;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css">
    <link rel="stylesheet" href="{{ asset('css/custom_CSS.css') }}">
</head>
<body data-bs-spy="scroll" data-bs-target="#navbarContent" data-bs-offset="100">
    <!-- تضمين الناف بار -->
    @include('components.Navbar')

    <!-- تضمين الهيدر -->
    @include('components.Hero')

    <!-- تضمين عن رتم -->
    @include('components.info')

    <!-- تضمين كيف نعمل -->
    @include('components.How')

    <!-- تضمين الخدمات -->
    @include('components.Service')

    <!-- تضمين الموديل -->
    @include('components.modal')

    <!-- محتوى الصفحة -->
    <div class="container">
        @yield('content')
    </div>

    <!-- تضمين الفوتر -->
    @include('components.footer')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
</body>
</html>
