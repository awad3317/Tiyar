@php use Illuminate\Support\Str; @endphp
<section id="portfolio" class="py-5" style="background-color: #F4F4F4">
    <div class="container py-4">
        <h1 class="display-4 fw-bold mb-4 text-center" style="color: #571170" data-aos="fade-up">أعمالنا</h1>

        <!-- فلترة التصنيفات -->
        <div class="text-center mb-5">
            <button class="btn bt btn-sm rounded-pill mx-1 filter-btn active" data-filter="all">الكل</button>
            <button class="btn bt btn-sm rounded-pill mx-1 filter-btn" data-filter="web">مواقع إلكترونية</button>
            <button class="btn bt btn-sm rounded-pill mx-1 filter-btn" data-filter="app">تطبيقات</button>
            <button class="btn bt btn-sm rounded-pill mx-1 filter-btn" data-filter="graphic">تصاميم</button>
        </div>

        <div class="row g-4" id="portfolio-items">
            @if (isset($projects) && count($projects) > 0)
                @foreach ($projects as $project)
                    @php
                        $isPdf = Str::endsWith($project->link, '.pdf');
                        $image = $project->image
                            ? asset('storage/' . $project->image)
                            : asset('images/placeholder-website.png');
                        $url = $isPdf ? asset($project->link) : $project->link;
                    @endphp

                    <div class="col-lg-4 col-md-6 portfolio-item" data-category="{{ $project->type }}"
                        data-aos="zoom-in">
                        <div class="card shadow-sm border-0 rounded-4 h-100">

                            {{-- صورة --}}
                            <div class="ratio ratio-16x9 rounded-top-4 overflow-hidden">
                                @if ($project->image)
                                    {{-- إذا كانت هناك صورة محفوظة في قاعدة البيانات --}}
                                    <img src="{{ asset('storage/' . $project->image) }}"
                                        class="project-cover" alt="صورة المشروع">
                                @elseif (!$isPdf && filter_var($url, FILTER_VALIDATE_URL))
                                    {{-- إذا لم يكن PDF ولكنه رابط لموقع --}}
                                    <img src="https://api.screenshotmachine.com?key=fadae1&url={{ urlencode($url) }}&dimension=1024x768"
                                        class="project-cover" alt="لقطة الموقع">
                                @else
                                    {{-- صورة افتراضية إذا لا PDF ولا صورة --}}
                                    <img src="{{ asset('images/placeholder-website.png') }}"
                                        class="project-cover" alt="صورة افتراضية">
                                @endif
                            </div>

                            {{-- المحتوى --}}
                            <div class="card-body d-flex flex-column p-4">

                                <h5 class="card-title fw-bold text-primary">
                                    {{ $project->title }}
                                </h5>

                                <p class="card-text text-muted mb-4" style="min-height: 60px; overflow: hidden;">
                                    {{ Str::limit($project->description, 120) }}
                                </p>

                                <div class="mt-auto d-flex justify-content-between align-items-center">

                                    <a href="{{ $url }}" target="_blank"
                                        class="btn btn-primary btn-sm px-4 rounded-pill">
                                        <i class="bi bi-box-arrow-up-right me-1"></i>
                                        {{ $isPdf ? 'عرض الملف' : 'زيارة المشروع' }}
                                    </a>

                                    @if (!empty($project->client->link_of_location))
                                        <a href="{{ $project->client->link_of_location }}" target="_blank"
                                            class="btn btn-outline-secondary btn-sm px-4 rounded-pill">
                                            <i class="bi bi-globe2 me-1"></i> موقع العميل
                                        </a>
                                    @endif

                                </div>

                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="col-12 text-center py-5">
                    <div class="alert text-white" style="background-color: #735eb3" role="alert">
                        <i class="fas fa-info-circle me-2"></i> لا يوجد مشاريع حالياً
                    </div>
                </div>
            @endif
        </div>
    </div>
</section>

<style>
    .ratio iframe {
        width: 100%;
        height: 100%;
        border: none;
        border-radius: 0.75rem 0.75rem 0 0;
    }
.project-cover {
    width: 100%;
    height: 250px; /* يمكنك تعديل الارتفاع حسب ذوقك */
    overflow: hidden;
    background: #f8f8f8;
    border-top-left-radius: 1rem;
    border-top-right-radius: 1rem;
}

.project-cover img {
    width: 100%;
    height: 100%;
    object-fit: cover;  /* تغطية كاملة بدون ضغط */
    display: block;
    transition: 0.3s;
}

.project-cover img:hover {
    transform: scale(1.03);
}

    .filter-btn.active {
        background-color: #735eb3;
        color: white;
    }

    .bt {
        border-color: #735eb3;
        background-color: #FFFFFF;
        color: #735eb3;
    }

    .bt:hover {
        border-color: #735eb3;
        background-color: #735eb3;
        color: #FFFFFF;
    }

    .object-fit-cover {
        object-fit: cover;
    }
</style>

<script>
    document.querySelectorAll('.filter-btn').forEach(button => {
        button.addEventListener('click', () => {
            document.querySelectorAll('.filter-btn').forEach(btn => btn.classList.remove('active'));
            button.classList.add('active');

            const category = button.getAttribute('data-filter');
            document.querySelectorAll('.portfolio-item').forEach(item => {
                item.style.display = (category === 'all' || item.dataset.category ===
                    category) ? 'block' : 'none';
            });
        });
    });
</script>
