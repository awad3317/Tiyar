
<div class="modal fade" id="projectModal" tabindex="-1" aria-labelledby="projectModalLabel" aria-hidden="true" dir="rtl">

    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content bg-white rounded-4 " style="width: 75%; margin: 0px 50px 0px ;">
            <div class="m-2">
                <button type="button" class="btn-close border rounded-pill me-2 mt-2" style="font-size: 10px" data-bs-dismiss="modal" aria-label="Close"></button>
                <h5 class="modal-title me-5 mt-3" style="color: #1d0948" id="projectModalLabel">ابدأ مشروعك (تواصل معنا)</h5>
            </div>

            <div class="modal-body">
                <form id="projectForm" method="POST" action="{{ route('order.store') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="customer_name" class="form-label text-secondary">الأسم</label>
                        <input type="text" class="form-control @error('customer_name') is-invalid @enderror"
                               id="customer_name" name="customer_name" placeholder="مثال: احمد سعيد"
                               value="{{ old('customer_name') }}" >
                        @error('customer_name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="service_id" class="form-label text-secondary">اختر الخدمه المناسبه</label>
                        <select class="form-control @error('service_id') is-invalid @enderror"
                                id="service_id" name="service_id" >
                            <option value="">-- اختر الخدمة --</option>
                            @foreach($services as $ser)
                                <option value="{{ $ser->id }}" {{ old('service_id') == $ser->id ? 'selected' : '' }}>
                                    {{ $ser->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('service_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="customer_phone" class="form-label text-secondary">رقم الجوال</label>
                        <input type="number" class="form-control text-end @error('customer_phone') is-invalid @enderror"
                               id="customer_phone" name="customer_phone"
                               value="{{ old('customer_phone') }}" >
                        @error('customer_phone')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="notes" class="form-label text-secondary">وصف المشروع</label>
                        <textarea class="form-control @error('notes') is-invalid @enderror"
                                  id="notes" name="notes" rows="3"
                                  placeholder="تفاصيل المشروع...">{{ old('notes') }}</textarea>
                        @error('notes')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label  class="form-label text-secondary">تواصل مباشرة</label><br>
                        <a href="https://wa.me/967779522898?text=مرحبا%20كيف يمكنني %20مساعدتك" target="_blank" class="btn btn-success w-100">
                            تواصل عبر واتساب
                        </a>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-light rounded-pill px-4 py-2 text-white" style="background-color: #571170 ">
                            <img src="{{ asset('images/Vector.svg') }}" alt="Send icon" width="15" class="me-2">
                            ارسال
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        @if ($errors->any())
        var myModal = new bootstrap.Modal(document.getElementById('projectModal'));
        myModal.show();
        @endif
    });
</script>
