@extends('website.layouts.main')

@section('title', "صيانة التكييف والتبريد | بيان كوول (biancool) | مكيفات وثلاجات")

@section('page_header')
    <!-- Page Header -->
    <section class="page-header bg-gradient text-white py-5">
        <div class="container text-center">
            <h1 class="display-4 fw-bold">صيانة التكييف والتبريد</h1>
            <p class="lead">نوفر لك بيئة منعشة وطعامًا محفوظًا بأمان عبر خدمات صيانة متكاملة للمكيفات والثلاجات</p>
        </div>
    </section>
@endsection

@section('content')
    <!-- AC Service Details Section -->
    <section class="py-5">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6">
                    <img src="{{ asset('images/ac.jpeg') }}" class="img-fluid rounded shadow-lg" alt="فني يقوم بصيانة مكيف سبليت">
                </div>
                <div class="col-lg-6">
                    <h2 class="fw-bold text-primary mb-3">صيانة المكيفات (سبليت، شباك، مركزي)</h2>
                    <p>للتغلب على حرارة الصيف، نضمن لك أن مكيفك يعمل بأعلى كفاءة. نقدم خدمات شاملة لجميع أنواع المكيفات.</p>
                    <ul class="list-unstyled">
                        <li class="mb-2"><i class="fas fa-check text-success me-2"></i><strong>تنظيف شامل:</strong> غسيل الوحدات الداخلية والخارجية لتحسين جودة الهواء وأداء التبريد.</li>
                        <li class="mb-2"><i class="fas fa-check text-success me-2"></i><strong>شحن الفريون:</strong> الكشف عن تسريبات الفريون وإعادة شحن النظام بالكمية المناسبة.</li>
                        <li class="mb-2"><i class="fas fa-check text-success me-2"></i><strong>إصلاح الأعطال:</strong> حل مشاكل ضعف التبريد، تسريب المياه، والأعطال الكهربائية.</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Refrigerators Service Details Section -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row g-5 align-items-center flex-row-reverse">
                <div class="d-flex gap-3 col-lg-6">
                    <img src="{{ asset('images/fridge1.jpeg') }}" class="img-fluid rounded shadow-lg" alt="إصلاح ثلاجة منزلية حديثة">
                    <img src="{{ asset('images/fridge.jpeg') }}" class="img-fluid rounded shadow-lg" alt="إصلاح ثلاجة منزلية حديثة">
                </div>
                <div class="col-lg-6">
                    <h2 class="fw-bold text-primary mb-3">صيانة الثلاجات والفريزر</h2>
                    <p>الثلاجة هي قلب المطبخ. فريقنا متخصص في تشخيص وإصلاح كافة أعطال الثلاجات والفريزر بسرعة وكفاءة للحفاظ على طعامك طازجًا.</p>
                     <ul class="list-unstyled">
                        <li class="mb-2"><i class="fas fa-check text-success me-2"></i><strong>إصلاح مشاكل التبريد:</strong> حل أعطال ضعف التبريد أو توقفه تمامًا.</li>
                        <li class="mb-2"><i class="fas fa-check text-success me-2"></i><strong>صيانة الموتور:</strong> فحص وإصلاح ضاغط (موتور) الثلاجة أو استبداله.</li>
                        <li class="mb-2"><i class="fas fa-check text-success me-2"></i><strong>معالجة تسريب المياه:</strong> حل مشاكل تراكم المياه داخل الثلاجة أو أسفلها.</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-5 bg-primary text-white">
        <div class="container text-center">
            <h3 class="fw-bold mb-3">هل تواجه مشكلة في التبريد؟</h3>
            <p class="lead mb-4">لا تدع الحر أو أعطال الثلاجة تزعجك. اتصل بنا الآن لخدمة سريعة وموثوقة.</p>
            <a href="{{ route('service_request.index') }}" class="btn btn-light btn-lg px-5">اطلب خدمة الآن</a>
        </div>
    </section>
@endsection
