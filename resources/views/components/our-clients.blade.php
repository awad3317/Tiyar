<section id="clients" class="py-5" style="background-color: #F4F4F4;">
    <div class="container py-4">
        <div class="container">
            <h2 class="text-center fw-bold mb-5" style="color:#571170;">عملاؤنا</h2>

            @php
                // تكرار العملاء تلقائياً إذا كان عددهم قليل لضمان ملء السلايدر
                $clientsToShow = $clients->count() < 2 ? $clients->merge($clients) : $clients;
            @endphp

            <div id="clientsCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
                <div class="carousel-inner">

                    @foreach ($clientsToShow->chunk(4) as $index => $clientGroup)
                        <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                            <div class="row justify-content-center g-4">
                                @foreach ($clientGroup as $client)
                                    <div class="col-md-3 d-flex justify-content-center align-items-center">
                                        <div class="client-logo-card bg-white p-3 rounded-3 d-flex justify-content-center align-items-center"
                                            style="height: 120px;">
                                            <a href="{{ $client->link_of_location ?? '#home' }}" >
                                                <img src="{{ asset('storage/' . $client->logo) }}"
                                                    alt="{{ $client->client_name }}" class="img-fluid"
                                                    style="max-height: 80px; object-fit: contain;">
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach

                </div>

                <!-- نقاط التحكم -->
                <div class="carousel-indicators position-static mt-4">
                    @foreach ($clientsToShow->chunk(4) as $index => $group)
                        <button type="button" data-bs-target="#clientsCarousel" data-bs-slide-to="{{ $index }}"
                            class="{{ $index == 0 ? 'active' : '' }}" aria-current="true"
                            aria-label="Slide {{ $index + 1 }}"></button>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <style>
        /* تصميم نقاط Bootstrap ليظهر مثل WordPress */
        #clients .carousel-indicators [data-bs-target] {
            width: 12px;
            height: 12px;
            background-color: #bbb;
            border-radius: 50%;
            margin: 0 5px;
            opacity: 0.6;
            transition: 0.3s;
            border: none;
        }

        #clients .carousel-indicators .active {
            background-color: #571170;
            opacity: 1;
            transform: scale(1.2);
        }

        /* تأثير البطاقات */
        .client-logo-card {
            transition: 0.3s;
        }

        .client-logo-card:hover {
            transform: scale(1.05);
        }
    </style>
</section>
