
        <section id="info" class=" py-5  rounded-2" style="background-color: #1d0948">
    <div class="container">
        <div class="row align-items-center flex-column-reverse flex-md-row">
            <!-- الصورة -->
            <div class="col-md-6 mt-4 mt-md-0 px-4 px-md-0">
                <img
                    src="{{ asset('images/Info.svg') }}"
                    alt="Info section image"
                    class="img-fluid p-md-5 pt-4 pt-md-0"
                    loading="lazy"
                    decoding="async"
                />
            </div>

            <!-- النص -->
            <div class="col-md-6 pe-md-4">
                <h1 class="display-4 fw-bold mb-4" style="color: #ff0049" data-aos="fade-left">عن رتم</h1>
                <p class="lead text-white-50" data-aos="fade-up">
                    رتم فريق تقني يسعى لتقديم الحلول التقنية الذكية للجهات الحكومية والخاصة والأفراد من خلال تطوير المواقع والتطبيقات وبناء المشاريع البرمجية بتجربة استخدام عملية و واجهات فريدة.
                </p>
            </div>
        </div>
    </div>
</section>


@push('scripts')
<script>
    $(document).ready(function() {
        AOS.init({
            easing: 'ease-out-quad',
            duration: 1000,
        });
    });
</script>
@endpush

@push('styles')
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
@endpush
