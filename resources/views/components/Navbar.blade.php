<nav class="navbar navbar-expand-lg  fixed-top shadow-sm py-1" style="min-height: 60px;background-color: #0A2444">
    <div class="container-fluid px-4">
        <!-- الشعار -->
        <a class="navbar-brand py-0" href="#home">
            <img src="{{ asset('images/Tiyar.png') }}" alt="Tiyar logo" width="120" height="120">
        </a>

        <!-- زر القائمة المختصرة -->
        <button class="navbar-toggler p-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon" style="width: 1em; height: 1em;"></span>
        </button>
            <style>
                .nav-item  a{
                    color: #ffffff;
                }
                .nav-item  a:hover {
                    color: #ED8936;
                }
                .nav-link.active {
                   color: #ED8936 !important;
                    font-weight: bold;
                        }

                </style>
        <!-- محتوى القائمة -->
        <div class="collapse navbar-collapse" id="navbarContent">
            <ul class="navbar-nav mx-auto mb-1 mb-lg-0 text-center">
                <li class="nav-item">
                    <a class="nav-link active py-1  px-3 fw-bold fs-5" href="#home">الرئيسية</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link py-1 px-3 fw-bold  fs-5" href="#info">من نحن</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link py-1 px-3 fw-bold fs-5" href="#how">كيف نعمل</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link py-1 px-3 fw-bold fs-5" href="#service">ماذا نقدم</a>
                </li>
            </ul>

            <!-- زر ابدأ مشروعك (للشاشات الكبيرة فقط) -->
            <div class="d-flex ms-2 d-none d-lg-flex">
                <button type="button" class="btn btn-light btn-sm py-1 px-2 mt-auto service-btn text-white" style="background-color: #1d0948" data-bs-toggle="modal" data-bs-target="#projectModal">
                    <div class="d-flex align-items-center">
                        <img src="{{ asset('images/Vector.svg') }}" alt="ابدأ مشروعك" width="20" height="15" class="ms-1">
                        <span style="font-size: 1rem;">ابدأ مشروعك</span>
                    </div>
                </button>
            </div>
        </div>
    </div>
</nav>

<div class="d-lg-none fixed-bottom p-3 text-end" style="background-color: transparent; right: 10px; bottom: 10px; z-index: 1000;">
    <button type="button" class="btn btn-primary btn-sm py-1 px-2 mt-auto service-btn" data-bs-toggle="modal" data-bs-target="#projectModal">
        <div class="d-flex align-items-center">
            <img src="{{ asset('images/Vector.svg') }}" alt="ابدأ مشروعك" width="20" height="15" class="ms-1">
            <span style="font-size: 1rem;">ابدأ مشروعك</span>
        </div>
    </button>
</div>
