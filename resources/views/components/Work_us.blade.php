<section id="portfolio" class="py-5" style="background-color: #F4F4F4">
    <div class="container py-4">
        <h1 class="display-4 fw-bold mb-4 text-center" style="color: #571170" data-aos="fade-up">أعمالنا</h1>

        <!-- فلترة التصنيفات -->
        <div class="text-center mb-5">
            <button class="btn btn-outline-primary btn-sm rounded-pill mx-1 filter-btn active" data-filter="all">الكل</button>
            <button class="btn btn-outline-primary btn-sm rounded-pill mx-1 filter-btn" data-filter="web">مواقع إلكترونية</button>
            <button class="btn btn-outline-primary btn-sm rounded-pill mx-1 filter-btn" data-filter="app">تطبيقات</button>
            <button class="btn btn-outline-primary btn-sm rounded-pill mx-1 filter-btn" data-filter="graphic">تصاميم</button>
        </div>

        <div class="row g-4" id="portfolio-items">
            @if(isset($projects) && count($projects) > 0)
                @foreach($projects as $project)
                    @if(isset($project->type))
                        <div class="col-lg-4 col-md-6 portfolio-item" data-category="{{$project->type}}" data-aos="zoom-in">
                            <div class="card h-100 shadow-sm border-0 rounded-4">
                                <div class="ratio ratio-16x9 rounded-top-4">
                                    <img src="https://api.screenshotmachine.com?key=fadae1&url={{ urlencode($project->link) }}&dimension=1024x768" alt="لقطة الموقع">
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">{{$project->title}}</h5>
                                    <p class="card-text text-muted small">{{$project->description}}</p>
                                    <a href="{{$project->link}}" target="_blank" class="btn btn-outline-primary btn-sm rounded-pill">زيارة المشروع</a>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="alert alert-info" role="alert">
                            <i class="fas fa-info-circle me-2"></i> لا يوجد مشاريع حالياً
                        </div>
                    @endif

                @endforeach
            @else
                <div class="col-12 text-center py-5">
                    <div class="alert alert-info" role="alert">
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
    .filter-btn.active {
        background-color: #0A2463;
        color: white;
    }
</style>

<script>
    document.querySelectorAll('.filter-btn').forEach(button => {
        button.addEventListener('click', () => {
            document.querySelectorAll('.filter-btn').forEach(btn => btn.classList.remove('active'));
            button.classList.add('active');

            const category = button.getAttribute('data-filter');
            document.querySelectorAll('.portfolio-item').forEach(item => {
                item.style.display = (category === 'all' || item.dataset.category === category) ? 'block' : 'none';
            });
        });
    });
</script>
