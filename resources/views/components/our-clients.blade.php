<section id="clients" class="py-5" style="background-color: #F4F4F4;">
    <div class="container py-4">
        <h1 class="display-4 fw-bold mb-5" style="color: #571170" data-aos="fade-left">عملاؤنا</h1>
        <div class="container text-center">
            <h2 class="fw-bold mb-4">عملاؤنا</h2>
            <p class="text-muted mb-5">نفخر بالتعامل مع نخبة من الشركات والمؤسسات الرائدة</p>

            <div id="clientsCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    @foreach ($clients->chunk(4) as $index => $clientGroup)
                        <div class="carousel-item {{ $index == 0 ? 'active' : '' }}" data-bs-interval="3000">
                            <div class="row justify-content-center g-4">
                                @foreach ($clientGroup as $client)
                                    <div
                                        class="col-6 col-sm-4 col-md-3 col-lg-2 d-flex justify-content-center align-items-center">
                                        <div class="client-logo-card shadow-sm bg-white p-3 rounded-3 position-relative"
                                            style="transition: transform .3s;">
                                            <a href="{{ $client->link_of_location ?? '#' }}" target="_blank"
                                                class="d-block text-decoration-none text-center">
                                                <img src="{{ asset('storage/' . $client->logo) }}"
                                                    alt="{{ $client->client_name }}" class="img-fluid"
                                                    style="max-height: 80px; object-fit: contain;">
                                            </a>
                                            <div class="client-info mt-2">
                                                <h6 class="fw-semibold mb-0">{{ $client->client_name }}</h6>
                                                @if ($client->location)
                                                    <small class="text-muted">{{ $client->location }}</small>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- أزرار التحكم -->
                <button class="carousel-control-prev" type="button" data-bs-target="#clientsCarousel"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">السابق</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#clientsCarousel"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">التالي</span>
                </button>
            </div>
        </div>
    </div>

    <style>
      .client-logo-card {
    border-radius: 12px;
    transition: all .3s ease;
}

.client-logo-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 6px 15px rgba(0, 0, 0, 0.15);
}


        #clients img {
            filter: none;
            opacity: 1;
            transition: all .3s ease;
        }


        #clients img:hover {
            filter: grayscale(0%);
            opacity: 1;
        }

        /* تحسين السلايدر */
        #clientsCarousel .carousel-item {
            transition: transform 0.8s ease, opacity 0.8s ease;
        }
    </style>
</section>
