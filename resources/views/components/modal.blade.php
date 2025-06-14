<div class="modal fade" id="projectModal" tabindex="-1" aria-labelledby="projectModalLabel" aria-hidden="true" dir="rtl">

    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content bg-white rounded-4 " style="width: 75%; margin: 0px 50px 0px ;">
            <div class="m-2">
                <button type="button" class="btn-close border rounded-pill me-2 mt-2" style="font-size: 10px" data-bs-dismiss="modal" aria-label="Close"></button>
                <h5 class="modal-title me-5 mt-3" style="color: #1d0948" id="projectModalLabel">ابدأ مشروعك (تواصل معنا)</h5>
            </div>

            <div class="modal-body">
                <form id="projectForm"  method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label text-secondary ">الأسم</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="مثال: احمد سعيد" required>
                    </div>

                    <div class="mb-3">
                        <label for="phone" class="form-label text-secondary">رقم الجوال</label>

                        <input id="phone" type="tel" class="form-control"  name="phone" required>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label text-secondary">البريد الالكتروني</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="مثال: ahmed@gmail.com" required>
                    </div>

                    <div class="mb-3">
                        <label for="message" class="form-label text-secondary">وصف المشروع</label>
                        <textarea class="form-control" id="message" name="message" rows="3" placeholder="تفاصيل المشروع..."></textarea>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-light rounded-pill px-4 py-2 text-white"  style="background-color: #0A2463 ">
                            <img src="{{ asset('images/Vector.svg') }}" alt="Send icon" width="15" class="me-2">
                            ارسال
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
