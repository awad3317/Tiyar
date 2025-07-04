<section id="service" class="py-5" style="background-color: #F4F4F4">
    <div class="container py-4">
        <h1 class="display-4 fw-bold mb-5" style="color: #571170" data-aos="fade-left">خدماتنا</h1>
<style>
    .h6{
        color:#571170;
    }
</style>
        <div class="row g-4">
            <!-- خدمة 1 -->
            @if(count($services) > 0)
                @foreach($services as $service)
                    <div class="col-lg-3 col-md-4 col-sm-6" data-aos="fade-left">
                        <div class="service-card-wrapper">
                            <div class="card h-100 border-0 service-card" style="border-radius: 15px;">
                                <div class="card-body d-flex flex-column align-items-center text-center p-3">
                                    <img src="{{ asset('storage/' . $service->icon_service) }}" alt="{{ $service->name }}" width="50" height="50" class="mb-2">
                                    <h3 class="h6 mb-2 bold">{{ $service->name }}</h3>
                                    <a href="{{ $service->id }}" type="button" class="btn btn-primary btn-sm py-1 px-2 mt-auto service-btn" style="border-radius: 10px;" data-bs-toggle="modal" data-bs-target="#projectModal">
                                        <div class="d-flex align-items-center">
                                            <img src="{{ asset('images/Vector.svg') }}" alt="ابدأ مشروعك" width="16" height="12" class="ms-1">
                                            <span style="font-size: 0.85rem; color: #f3f4f6">ابدأ مشروعك</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="service-card-shadow" style="border-radius: 15px;"></div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="col-12 text-center py-5">
                    <div class="alert alert-info" role="alert">
                        <i class="fas fa-info-circle me-2"></i> لا توجد خدمات متاحة حالياً
                    </div>
                </div>
            @endif


{{--            <!-- خدمة 2 -->--}}
{{--            <div class="col-lg-3 col-md-4 col-sm-6" data-aos="fade-left" data-aos-delay="100">--}}
{{--                <div class="service-card-wrapper">--}}
{{--                    <div class="card h-100 border-0 service-card" style="border-radius: 15px;">--}}
{{--                        <div class="card-body d-flex flex-column align-items-center text-center p-3">--}}
{{--                            <img src="{{ asset('images/web_dev_1.svg') }}" alt="تطوير المواقع الالكترونية" width="50" height="50" class="mb-2">--}}
{{--                            <h3 class="h6  mb-2">تطوير المواقع الالكترونية</h3>--}}
{{--                            <button type="button" class="btn btn-primary btn-sm py-1 px-2 mt-auto service-btn" style="border-radius: 10px;" data-bs-toggle="modal" data-bs-target="#projectModal">--}}
{{--                                <div class="d-flex align-items-center">--}}
{{--                                    <img src="{{ asset('images/Vector.svg') }}" alt="ابدأ مشروعك" width="16" height="12" class="ms-1">--}}
{{--                                    <span style="font-size: 0.85rem;">ابدأ مشروعك</span>--}}
{{--                                </div>--}}
{{--                            </button>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="service-card-shadow" style="border-radius: 15px;"></div>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <!-- خدمة 3 -->--}}
{{--            <div class="col-lg-3 col-md-4 col-sm-6" data-aos="fade-left" data-aos-delay="200">--}}
{{--                <div class="service-card-wrapper">--}}
{{--                    <div class="card h-100 border-0 service-card" style="border-radius: 15px;">--}}
{{--                        <div class="card-body d-flex flex-column align-items-center text-center p-3">--}}
{{--                            <img src="{{ asset('images/mobile_dev_1.svg') }}" alt="تطوير تطبيقات الهواتف الذكية" width="50" height="50" class="mb-2">--}}
{{--                            <h3 class="h6  mb-2">تطوير تطبيقات الهواتف الذكية</h3>--}}
{{--                            <button type="button" class="btn btn-primary btn-sm py-1 px-2 mt-auto service-btn" style="border-radius: 10px;" data-bs-toggle="modal" data-bs-target="#projectModal">--}}
{{--                                <div class="d-flex align-items-center">--}}
{{--                                    <img src="{{ asset('images/Vector.svg') }}" alt="ابدأ مشروعك" width="16" height="12" class="ms-1">--}}
{{--                                    <span style="font-size: 0.85rem;">ابدأ مشروعك</span>--}}
{{--                                </div>--}}
{{--                            </button>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="service-card-shadow" style="border-radius: 15px;"></div>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <!-- خدمة 4 -->--}}
{{--            <div class="col-lg-3 col-md-4 col-sm-6" data-aos="fade-left" data-aos-delay="300">--}}
{{--                <div class="service-card-wrapper">--}}
{{--                    <div class="card h-100 border-0 service-card" style="border-radius: 15px;">--}}
{{--                        <div class="card-body d-flex flex-column align-items-center text-center p-3">--}}
{{--                            <img src="{{ asset('images/servers_1.svg') }}" alt="ادارة الاستضافات و الخوادم" width="50" height="50" class="mb-2">--}}
{{--                            <h3 class="h6  mb-2">ادارة الاستضافات و الخوادم</h3>--}}
{{--                            <button type="button" class="btn btn-primary btn-sm py-1 px-2 mt-auto service-btn" style="border-radius: 10px;" data-bs-toggle="modal" data-bs-target="#projectModal">--}}
{{--                                <div class="d-flex align-items-center">--}}
{{--                                    <img src="{{ asset('images/Vector.svg') }}" alt="ابدأ مشروعك" width="16" height="12" class="ms-1">--}}
{{--                                    <span style="font-size: 0.85rem;">ابدأ مشروعك</span>--}}
{{--                                </div>--}}
{{--                            </button>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="service-card-shadow" style="border-radius: 15px;"></div>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <!-- خدمة 5 -->--}}
{{--            <div class="col-lg-3 col-md-4 col-sm-6" data-aos="fade-left" data-aos-delay="400">--}}
{{--                <div class="service-card-wrapper">--}}
{{--                    <div class="card h-100 border-0 service-card" style="border-radius: 15px;">--}}
{{--                        <div class="card-body d-flex flex-column align-items-center text-center p-3">--}}
{{--                            <img src="{{ asset('images/ideas_1.svg') }}" alt="تقديم الاستشارات التقنية" width="50" height="50" class="mb-2">--}}
{{--                            <h3 class="h6  mb-2">تقديم الاستشارات التقنية</h3>--}}
{{--                            <button type="button" class="btn btn-primary btn-sm py-1 px-2 mt-auto service-btn" style="border-radius: 10px;" data-bs-toggle="modal" data-bs-target="#projectModal">--}}
{{--                                <div class="d-flex align-items-center">--}}
{{--                                    <img src="{{ asset('images/Vector.svg') }}" alt="ابدأ مشروعك" width="16" height="12" class="ms-1">--}}
{{--                                    <span style="font-size: 0.85rem;">ابدأ مشروعك</span>--}}
{{--                                </div>--}}
{{--                            </button>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="service-card-shadow" style="border-radius: 15px;"></div>--}}
{{--                </div>--}}
{{--            </div>--}}
        </div>
    </div>
</section>
