@extends('website.layouts.main')

@section('title', "صيانة أجهزة منزلية فورية | بيان كوول (biancool) | غسالات، سخانات، مكانس")

@section('page_header')
    <!-- Page Header -->
    <section class="page-header bg-gradient text-white py-5">
        <div class="container text-center">
            <h1 class="display-4 fw-bold">صيانة الأجهزة المنزلية</h1>
            <p class="lead">حلول متكاملة لجميع أجهزتك المنزلية لضمان راحتك وراحة أسرتك</p>
        </div>
    </section>
@endsection

@section('content')
    <!-- Washing Machines Service Section -->
    <section class="py-5">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6">
                    <img src="{{ asset('images/washingmachine.jpeg') }}" class="img-fluid rounded shadow-lg" alt="فني صيانة غسالات ملابس">
                </div>
                <div class="col-lg-6">
                    <h2 class="fw-bold text-primary mb-3">صيانة غسالات الملابس</h2>
                    <p>هل الغسالة لا تعمل أو لا تصرف المياه؟ نوفر فنيين متخصصين قادرين على التعامل مع كافة أعطال الغسالات، سواء كانت تحميل أمامي أو علوي، لتعود ملابسك نظيفة ومنعشة.</p>
                    <ul class="list-unstyled">
                        <li class="mb-2"><i class="fas fa-check text-success me-2"></i>إصلاح مشاكل الدوران والتصريف.</li>
                        <li class="mb-2"><i class="fas fa-check text-success me-2"></i>معالجة تسريب المياه والأعطال الإلكترونية.</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Dishwashers Service Section -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row g-5 align-items-center flex-row-reverse">
                <div class="col-lg-6">
                    <img src="{{ asset('images/dishwasher.jpeg') }}" class="img-fluid rounded shadow-lg" alt="تصليح غسالات الصحون">
                </div>
                <div class="col-lg-6">
                    <h2 class="fw-bold text-primary mb-3">صيانة غسالات الصحون</h2>
                    <p>لأطباق لامعة ونظيفة دائمًا، نقدم حلولاً سريعة لمشاكل غسالة الصحون مثل ضعف التنظيف، عدم تصريف المياه، أو ترك بقع على الأواني.</p>
                     <ul class="list-unstyled">
                        <li class="mb-2"><i class="fas fa-check text-success me-2"></i>فحص وإصلاح أذرع الرش ومضخة المياه.</li>
                        <li class="mb-2"><i class="fas fa-check text-success me-2"></i>تنظيف الفلاتر وحل جميع مشاكل الانسداد.</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Heaters Service Section -->
    <section class="py-5">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6">
                    <img src="{{ asset('images/waterheater.jpeg') }}" class="img-fluid rounded shadow-lg" alt="إصلاح سخان مياه فوري">
                </div>
                <div class="col-lg-6">
                    <h2 class="fw-bold text-primary mb-3">صيانة السخانات</h2>
                    <p>للحصول على مياه ساخنة بشكل مستمر وآمن، نقدم خدمة صيانة لجميع أنواع السخانات الكهربائية والغاز، سواء كانت فورية أو مركزية.</p>
                    <ul class="list-unstyled">
                        <li class="mb-2"><i class="fas fa-check text-success me-2"></i>إصلاح أو استبدال عناصر التسخين (Heaters) والترموستات.</li>
                        <li class="mb-2"><i class="fas fa-check text-success me-2"></i>معالجة تسريب المياه وفحص صمامات الأمان.</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Vacuum Cleaners Service Section -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row g-5 align-items-center flex-row-reverse">
                <div class="col-lg-6">
                    <img src="{{ asset('images/vacuum.jpeg') }}" class="img-fluid rounded shadow-lg" alt="صيانة وإصلاح المكانس الكهربائية">
                </div>
                <div class="col-lg-6">
                    <h2 class="fw-bold text-primary mb-3">صيانة المكانس الكهربائية</h2>
                    <p>للحفاظ على نظافة منزلك، نعيد القوة الكاملة لمكنستك الكهربائية عبر حل مشاكل ضعف الشفط، أعطال الموتور، أو انقطاع السلك.</p>
                     <ul class="list-unstyled">
                        <li class="mb-2"><i class="fas fa-check text-success me-2"></i>صيانة المحرك وإصلاح الأصوات غير الطبيعية.</li>
                        <li class="mb-2"><i class="fas fa-check text-success me-2"></i>تنظيف وفحص الخراطيم والفلاتر لتحسين قوة الشفط.</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-5 bg-primary text-white">
        <div class="container text-center">
            <h3 class="fw-bold mb-3">هل أحد أجهزتك المنزلية بحاجة إلى صيانة؟</h3>
            <p class="lead mb-4">اتصل بنا الآن واستمتع بخدمة سريعة وموثوقة تعيد الهدوء والراحة لمنزلك.</p>
            <a href="{{ route('service_request.index') }}" class="btn btn-light btn-lg px-5">اطلب خدمة الآن</a>
        </div>
    </section>

@endsection
