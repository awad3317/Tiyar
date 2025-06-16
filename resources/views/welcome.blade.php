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
@if(session('success') || session('error'))
    <div class="message-center" style="position: fixed;left: 50%;transform: translate(-50%, -50%);z-index: 9999;padding: 20px;border-radius: 8px;text-align: center;animation: fadeInOut 4s forwards;
        {{ session('success') ? 'background: #4CAF50; color: white;' : 'background: #F44336; color: white;' }}">
        {{ session('success') ?? session('error') }}
    </div>
@endif

<style>
    @keyframes fadeInOut {
        0% { opacity: 0; }
        10% { opacity: 1; }
        90% { opacity: 1; }
        100% { opacity: 0; visibility: hidden; }
    }
</style>

    <!-- تضمين الناف بار -->
    @include('components.Navbar')

    <!-- تضمين الهيدر -->
    @include('components.Hero')

    <!-- تضمين عن تيار -->
    @include('components.info')

    <!-- اعمالنا -->
    @include('components.Work_us', ['projects' => $projects])
    <!-- تضمين كيف نعمل -->
    @include('components.How')

    <!-- تضمين الخدمات -->
    @include('components.Service', ['services' => $services])

    <!-- تضمين الموديل -->
    @include('components.modal', ['services' => $services])

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
