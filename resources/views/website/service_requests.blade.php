@extends('website.layouts.main')

@section('title', "طلب خدمة - بيان للصيانة")

@section('page_header')
<section class="page-header bg-gradient text-white py-5">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h1 class="display-4 fw-bold">طلب خدمة</h1>
                <p class="lead">املأ النموذج وسنتواصل معك في أقرب وقت</p>
            </div>
        </div>
    </div>
</section>
@endsection

@section('content')
<section class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card shadow-lg">
                    <div class="card-header bg-primary text-white text-center">
                        <h3 class="mb-0">نموذج طلب الخدمة</h3>
                    </div>

                    @if(session('success'))
                        <div id="successAlert" class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                            <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="إغلاق"></button>
                        </div>
                    @endif


                    <div class="card-body p-4">
                        <form id="serviceRequestForm" action="{{ route('service_request.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="mb-3">
                                <label for="fullName" class="form-label fw-bold">الاسم الكامل <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('full_name') is-invalid @elseif(old('full_name')) is-valid @enderror"
                                    id="fullName" name="full_name" value="{{ old('full_name') }}">
                                @error('full_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @else
                                    @if(old('full_name'))
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

                            <div class="mb-3">
                                <label for="address" class="form-label fw-bold">العنوان <span class="text-danger">*</span></label>
                                <textarea class="form-control @error('address') is-invalid @elseif(old('address')) is-valid @enderror"
                                          id="address" name="address" rows="3"
                                          placeholder="المدينة، الحي، الشارع...">{{ old('address') }}</textarea>
                                @error('address')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @else
                                    @if(old('address'))
                                        <div class="valid-feedback">تم إدخال العنوان بشكل صحيح</div>
                                    @endif
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="deviceType" class="form-label fw-bold">نوع الجهاز <span class="text-danger">*</span></label>
                                <select class="form-select @error('device_type') is-invalid @elseif(old('device_type')) is-valid @enderror"
                                        id="deviceType" name="device_type">
                                    <option value="">اختر نوع الجهاز</option>
                                    @foreach($deviceTypes as $key => $value)
                                        <option value="{{ $key }}" {{ old('device_type') == $key ? 'selected' : '' }}>
                                            {{ $value }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('device_type')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @else
                                    @if(old('device_type'))
                                        <div class="valid-feedback">تم اختيار نوع الجهاز بشكل صحيح</div>
                                    @endif
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="problemDescription" class="form-label fw-bold">وصف المشكلة <span class="text-danger">*</span></label>
                                <textarea class="form-control @error('problem_description') is-invalid @elseif(old('problem_description')) is-valid @enderror"
                                          id="problemDescription" name="problem_description" rows="4"
                                          placeholder="اشرح المشكلة بالتفصيل...">{{ old('problem_description') }}</textarea>
                                @error('problem_description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @else
                                    @if(old('problem_description'))
                                        <div class="valid-feedback">تم إدخال وصف المشكلة بشكل صحيح</div>
                                    @endif
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="deviceImage" class="form-label fw-bold">صورة الجهاز (اختياري)</label>
                                <input type="file" class="form-control @error('image') is-invalid @elseif(old('image')) is-valid @enderror"
                                       id="deviceImage" name="image" accept="image/*" onchange="previewImage(this)">
                                <div class="form-text">يمكنك رفع صورة للجهاز لمساعدتنا في تشخيص المشكلة</div>
                                @error('image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @else
                                    @if(old('image'))
                                        <div class="valid-feedback">تم رفع الصورة بشكل صحيح</div>
                                    @endif
                                @enderror
                            </div>

                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary btn-lg" id="submitBtn">
                                    <i class="fas fa-paper-plane me-2"></i> إرسال الطلب
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
function validateSaudiPhone(input) {
    let phoneNumber = input.value;

    // مسح أي رموز غير أرقام
    phoneNumber = phoneNumber.replace(/[^0-9]/g, '');

    // لو الرقم بيبدأ بـ 0 نمسحه
    if (phoneNumber.startsWith("0")) {
        phoneNumber = phoneNumber.substring(1);
    }

    // لو أكتر من 9 أرقام نقصه
    if (phoneNumber.length > 9) {
        phoneNumber = phoneNumber.substring(0, 9);
    }

    input.value = phoneNumber;

    const messageDiv = document.getElementById('phoneValidationMessage');
    const saudiPhonePattern = /^5[0-9]{8}$/;

    if (phoneNumber === '') {
        messageDiv.innerHTML = '';
        input.classList.remove('is-valid', 'is-invalid');
        return;
    }

    if (phoneNumber.length < 9) {
        if (phoneNumber.length > 0 && !phoneNumber.startsWith('5')) {
            messageDiv.innerHTML = '<small class="text-danger"><i class="fas fa-times"></i> الرقم يجب أن يبدأ بـ 5</small>';
        } else {
            messageDiv.innerHTML = '<small class="text-warning"><i class="fas fa-exclamation-triangle"></i> الرقم قصير جداً (يجب 9 أرقام)</small>';
        }
        input.classList.remove('is-valid');
        input.classList.add('is-invalid');
        return;
    }

    if (!phoneNumber.startsWith('5')) {
        messageDiv.innerHTML = '<small class="text-danger"><i class="fas fa-times"></i> الرقم يجب أن يبدأ بـ 5</small>';
        input.classList.remove('is-valid');
        input.classList.add('is-invalid');
        return;
    }

    if (saudiPhonePattern.test(phoneNumber)) {
        messageDiv.innerHTML = '<small class="text-success"><i class="fas fa-check"></i> رقم صحيح - +966' + phoneNumber + '</small>';
        input.classList.remove('is-invalid');
        input.classList.add('is-valid');
    } else {
        messageDiv.innerHTML = '<small class="text-danger"><i class="fas fa-times"></i> رقم غير صحيح</small>';
        input.classList.remove('is-valid');
        input.classList.add('is-invalid');
    }
}

document.addEventListener('DOMContentLoaded', function() {
    const phoneInput = document.getElementById('phoneNumber');

    if (phoneInput.value) {
        validateSaudiPhone(phoneInput);
    }

    // منع أي كتابة غير أرقام
    phoneInput.addEventListener('keypress', function(e) {
        if (!/[0-9]/.test(e.key) && !['Backspace', 'Delete', 'Tab', 'Escape', 'Enter', 'ArrowLeft', 'ArrowRight'].includes(e.key)) {
            e.preventDefault();
        }
    });

    // عند اللصق يتأكد برضه
    phoneInput.addEventListener('paste', function() {
        setTimeout(function() {
            validateSaudiPhone(phoneInput);
        }, 10);
    });
});

document.getElementById('serviceRequestForm').addEventListener('submit', function(e) {
    const phoneInput = document.getElementById('phoneNumber');
    const phoneNumber = phoneInput.value;
    const saudiPhonePattern = /^5[0-9]{8}$/;

    if (!saudiPhonePattern.test(phoneNumber)) {
        e.preventDefault();
        phoneInput.focus();

        phoneInput.classList.add('is-invalid');

        const messageDiv = document.getElementById('phoneValidationMessage');
        messageDiv.innerHTML = '<small class="text-danger"><i class="fas fa-times"></i> يرجى إدخال رقم جوال سعودي صحيح</small>';

        phoneInput.scrollIntoView({ behavior: 'smooth', block: 'center' });
        return false;
    }

    const submitBtn = document.getElementById('submitBtn');
    const originalText = submitBtn.innerHTML;
    submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i> جارِ الإرسال...';
    submitBtn.disabled = true;

    setTimeout(function() {
        submitBtn.innerHTML = originalText;
        submitBtn.disabled = false;
    }, 10000);
});

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
