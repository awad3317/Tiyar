<!DOCTYPE html>
<html dir="rtl" lang="ar">
<head>
    <meta charset="UTF-8">

    <title>تيار للحلول والابتكار | تصميم مواقع وتطبيقات احترافية</title>
    <link rel="canonical" href="{{ url()->current() }}" />
    <meta name="robots" content="index, follow">
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;500;700&display=swap" rel="stylesheet">
    <link  href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/custom_CSS.css') }}">


    <meta name="description" content="شركة تيار للحلول والابتكار شركة تقنية متخصصة في تصميم وتطوير المواقع، التطبيقات، والتصاميم الإبداعية. نقدم حلول رقمية متكاملة ترتقي بأعمالك.">
    <meta name="keywords" content="تصميم مواقع، تطبيقات، شركة تقنية، تيار، حلول رقمية، تطوير، برمجة، تصميم، UX UI">
    <meta name="author" content="Tiyar Solutions">

    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="تيار للحلول والابتكار | تصميم مواقع وتطبيقات احترافية">
    <meta property="og:description" content="شركة تيار متخصصة في تصميم وتطوير المواقع، التطبيقات، والتصاميم الإبداعية. حلول رقمية مبتكرة لأعمالك.">
    {{-- <meta property="og:image" content="{{ asset('images/preview.png') }}"> --}}
    <meta property="og:image" content="{{ asset('favicons/favicon-96x96.png') }}">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="تيار للحلول والابتكار | تصميم مواقع وتطبيقات احترافية">
    <meta name="twitter:description" content="شركة تيار متخصصة في تصميم وتطوير المواقع، التطبيقات، والتصاميم الإبداعية. حلول رقمية مبتكرة لأعمالك.">
   <link rel="icon" type="image/x-icon" href="{{ asset('favicons/favicon.ico') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicons/favicon-16x16.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicons/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('favicons/favicon-96x96.png') }}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('favicons/web-app-manifest-192x192.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('favicons/apple-touch-icon.png') }}">
    <link rel="manifest" href="{{ asset('favicons/site.webmanifest') }}">
    <meta name="msapplication-TileImage" content="{{ asset('favicons/favicon-96x96.png') }}">
    <meta name="msapplication-TileColor" content="#ffffff">


    <meta name="google-site-verification" content="leQEJX4FXoNBgBQp4HQ1CsLcML_tw7CUwICRShoWgx4" />
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

    <!-- تضمين العملاؤنا -->
@include('components.our-clients', ['clients' => $clients])

    <!-- محتوى الصفحة -->
    <div class="container">
        @yield('content')
    </div>

    <!-- تضمين الفوتر -->
    @include('components.footer')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init({
        duration: 800,
        once: false,
        easing: 'ease',
        mirror: true,
        offset: 120,
    });
</script>

</body>
</html>
