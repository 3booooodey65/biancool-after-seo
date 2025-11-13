@extends('website.layouts.main')

@section('title', "تواصل معنا -بيان للصيانة")

@section('page_header')
    <section class="page-header bg-gradient text-white py-5">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h1 class="display-4 fw-bold">تواصل معنا</h1>
                    <p class="lead">نحن هنا للإجابة على استفساراتكم</p>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('content')
    <section class="py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-5">
                    <div class="card h-100 shadow">
                        <div class="card-body p-4">
                            <h3 class="fw-bold text-primary mb-4">معلومات التواصل</h3>

                            <div class="contact-item mb-4">
                                <div class="d-flex align-items-center">
                                    <div class="icon-circle bg-primary text-white rounded-circle d-flex align-items-center justify-content-center me-3">
                                        <i class="fas fa-phone fa-lg"></i>
                                    </div>
                                    <div>
                                        <h6 class="fw-bold mb-1">رقم الهاتف</h6>
                                        <p class="mb-0 text-muted" style="direction: ltr;">+966 57 446 7922</p>
                                    </div>
                                </div>
                            </div>

                            <div class="contact-item mb-4">
                                <div class="d-flex align-items-center">
                                    <div class="icon-circle bg-primary text-white rounded-circle d-flex align-items-center justify-content-center me-3">
                                        <i class="fas fa-clock fa-lg"></i>
                                    </div>
                                    <div>
                                        <h6 class="fw-bold mb-1">ساعات العمل</h6>
                                        <p class="mb-0 text-muted">السبت - الخميس: 8:00 ص - 10:00 م</p>
                                        <p class="mb-0 text-muted">الجمعة: 2:00 م - 10:00 م</p>
                                    </div>
                                </div>
                            </div>

                            <div class="contact-item mb-4">
                                <div class="d-flex align-items-center">
                                    <div class="icon-circle bg-primary text-white rounded-circle d-flex align-items-center justify-content-center me-3">
                                        <i class="fab fa-whatsapp fa-lg"></i>
                                    </div>
                                    <div>
                                        <h6 class="fw-bold mb-1">واتساب</h6>
                                        <a href="https://wa.me/966574467922" target="_blank" rel="noopener"
                                        class="text-decoration-none"
                                        style="direction:ltr; unicode-bidi:bidi-override;">
                                            +966 57 446 7922
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="alert alert-info">
                                <i class="fas fa-info-circle me-2"></i>
                                <strong>خدمة سريعة:</strong> نستجيب لجميع الطلبات خلال 24 ساعة
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-7">
                    <div class="card shadow">
                        <div class="card-body p-4">
                            <h3 class="fw-bold text-primary mb-4">أرسل لنا رسالة</h3>

                    @if(session('success'))
                        <div id="successAlert" class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                            <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="إغلاق"></button>
                        </div>
                    @endif


                            <form id="contactForm" method="POST" action="{{ route('contact_us.store') }}">
                                @csrf

                                <div class="mb-3">
                                    <label for="name" class="form-label fw-bold">الاسم <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('name') is-invalid @elseif(old('name')) is-valid @enderror"
                                        id="name" name="name" value="{{ old('name') }}">
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @else
                                        @if(old('name'))
                                            <div class="valid-feedback">تم إدخال الاسم بشكل صحيح</div>
                                        @endif
                                    @enderror
                                </div>

<div class="mb-3">
                                <label for="phoneNumber" class="form-label fw-bold">رقم الجوال <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-text">🇸🇦 +966</span>
                                    <input type="tel"
                                           class="form-control @error('phone_number') is-invalid @elseif(old('phone_number')) is-valid @enderror"
                                           id="phoneNumber"
                                           name="phone_number"
                                           value="{{ old('phone_number') }}"
                                           placeholder="5xxxxxxxx"
                                           maxlength="9"
                                           title="يجب أن يبدأ الرقم بـ 5 ويتكون من 9 أرقام"
                                           oninput="validateSaudiPhone(this)">
                                    @error('phone_number')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @else
                                        @if(old('phone_number'))
                                            <div class="valid-feedback">تم إدخال رقم الجوال بشكل صحيح</div>
                                        @endif
                                    @enderror
                                </div>
                                <div id="phoneValidationMessage" class="mt-1"></div>

                                @if(!old('phone_number') && !$errors->has('phone_number'))
                                    <div class="form-text">
                                        <i class="fas fa-info-circle text-primary"></i>
                                        الرقم يجب أن يبدأ بـ 5 ويتكون من 9 أرقام (مثال: 501234567)
                                    </div>
                                @endif
                            </div>


                                <div class="mb-4">
                                    <label for="message" class="form-label fw-bold">الرسالة <span class="text-danger">*</span></label>
                                    <textarea class="form-control @error('message') is-invalid @elseif(old('message')) is-valid @enderror"
                                            id="message" name="message" rows="5" placeholder="اكتب رسالتك هنا...">{{ old('message') }}</textarea>
                                    @error('message')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @else
                                        @if(old('message'))
                                            <div class="valid-feedback">تم إدخال الرسالة بشكل صحيح</div>
                                        @endif
                                    @enderror
                                </div>

                                <div class="d-grid">
                                    <button type="submit" class="btn btn-primary btn-lg">
                                        <i class="fas fa-envelope me-2"></i>
                                        إرسال الرسالة
                                    </button>
                                </div>
                            </form>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js')
<script>
    function validateSaudiPhone(input) {
    const phoneNumber = input.value;
    const messageDiv = document.getElementById('phoneValidationMessage');

    input.value = phoneNumber.replace(/[^0-9]/g, '');
    const cleanNumber = input.value;

    const saudiPhonePattern = /^5[0-9]{8}$/;

    if (cleanNumber === '') {
        messageDiv.innerHTML = '';
        input.classList.remove('is-valid', 'is-invalid');
        return;
    }

    if (cleanNumber.length < 9) {
        if (cleanNumber.length > 0 && !cleanNumber.startsWith('5')) {
            messageDiv.innerHTML = '<small class="text-danger"><i class="fas fa-times"></i> الرقم يجب أن يبدأ بـ 5</small>';
        } else {
            messageDiv.innerHTML = '<small class="text-warning"><i class="fas fa-exclamation-triangle"></i> الرقم قصير جداً (يجب 9 أرقام)</small>';
        }
        input.classList.remove('is-valid');
        input.classList.add('is-invalid');
        return;
    }

    if (cleanNumber.length > 9) {
        input.value = cleanNumber.substring(0, 9);
        validateSaudiPhone(input);
        return;
    }

    if (!cleanNumber.startsWith('5')) {
        messageDiv.innerHTML = '<small class="text-danger"><i class="fas fa-times"></i> الرقم يجب أن يبدأ بـ 5</small>';
        input.classList.remove('is-valid');
        input.classList.add('is-invalid');
        return;
    }

    if (saudiPhonePattern.test(cleanNumber)) {
        messageDiv.innerHTML = '<small class="text-success"><i class="fas fa-check"></i> رقم صحيح - +966' + cleanNumber + '</small>';
        input.classList.remove('is-invalid');
        input.classList.add('is-valid');
    } else {
        messageDiv.innerHTML = '<small class="text-danger"><i class="fas fa-times"></i> رقم غير صحيح</small>';
        input.classList.remove('is-valid');
        input.classList.add('is-invalid');
    }
}
    document.addEventListener('DOMContentLoaded', function () {
    let successAlert = document.getElementById('successAlert');
    if (successAlert) {
        setTimeout(() => {
            let alert = new bootstrap.Alert(successAlert);
            alert.close();
        }, 3000);
    }
});
</script>
@endsection

