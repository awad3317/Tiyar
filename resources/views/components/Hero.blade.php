<section class="mt-5" id="home" class="w-full top-0 left-0 pb-5 pb-md-4 mt-5" style="background-color: #F4F4F4;">
    <div class="container px-4 px-lg-5 py-4 py-md-5">
        <div class="row align-items-center my-5">
            <!-- النص والرسالة -->
            <div class="col-md-7 order-md-1 order-1 mt-md-2 mt-5" data-aos="fade-left">
                <div class="hero-text mb-4 mb-md-0">
                    <h1 class="display-4 fw-medium text-dark mb-3">
                        نقودك
                        <span class="fw-bold changing-text" style="color: #34495E;"></span>
                    </h1>

                    <h1 class="display-4 fw-medium text-dark mb-4">
                        التقني لنُحدث الفرق في عالمك الرقمي
                    </h1>

                    <div class="my-4" data-aos="fade-down" >
                        <button type="button" class="btn btn-primary py-3 px-5 service-btn" data-bs-toggle="modal" data-bs-target="#projectModal">
                            <div class="d-flex align-items-center justify-content-center">
                                <img src="{{ asset('images/Vector.svg') }}" alt="ابدأ مشروعك" width="24" height="20" class="ms-2">
                                <span style="font-size: 1.1rem;color:#ffffff">ابدأ مشروعك</span>
                            </div>
                        </button>
                    </div>
                </div>
            </div>

            <!-- الصورة -->
            <div class="col-md-5 order-md-2 order-2 mt-1 mt-md-2" data-aos="fade-right">
                <img
                    src="{{ asset('images/team_code.png') }}"
                    alt="Hero section image"
                    class="img-fluid p-md-4 mt-3"
                    loading="lazy"
                    decoding="async"
                >
            </div>
        </div>
    </div>
    <style>
        .changing-text {
            transition: opacity 0.5s ease-in-out;
            opacity: 1;
        }
        .changing-text.fade-out {
            opacity: 0;
        }
    </style>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const words = [ "للابتكار", "للابداع", "لتحول الرقمي", "لتقنية"];
            let currentIndex = 0;
            const textElement = document.querySelector(".changing-text");

            setInterval(() => {
                // إزالة النص تدريجياً
                textElement.classList.add("fade-out");

                setTimeout(() => {
                    currentIndex = (currentIndex + 1) % words.length;
                    textElement.textContent = words[currentIndex];
                    textElement.classList.remove("fade-out");
                }, 500);
            }, 2500);
        });
    </script>


</section>
