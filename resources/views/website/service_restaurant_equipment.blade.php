@extends('website.layouts.main')

@section('title', "صيانة معدات مطاعم ومقاهي | بيان كوول (biancool) | أفران، مكائن قهوة")

@section('page_header')
    <!-- Page Header -->
    <section class="page-header bg-gradient text-white py-5">
        <div class="container text-center">
            <h1 class="display-4 fw-bold">صيانة معدات المطاعم والمقاهي</h1>
            <p class="lead">شريكك الموثوق لضمان استمرارية عملك وجودة إنتاجك</p>
        </div>
    </section>
@endsection

@section('content')
    <!-- Coffee & Ice Machines Section -->
    <section class="py-5">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6">
                    <img src="{{ asset('images/coffee.jpeg') }}" class="img-fluid rounded shadow-lg" alt="صيانة مكائن القهوة والثلج للمقاهي">
                </div>
                <div class="col-lg-6">
                    <h2 class="fw-bold text-primary mb-3">مكائن القهوة والثلج</h2>
                    <p>نعلم أن هذه الأجهزة هي قلب المقهى. نقدم خدمة صيانة سريعة ودقيقة لضمان عدم توقف خدمتك لعملائك.</p>
                    <ul class="list-unstyled">
                        <li class="mb-2"><i class="fas fa-check text-success me-2"></i>إصلاح أعطال مكائن الإسبريسو ومعايرتها.</li>
                        <li class="mb-2"><i class="fas fa-check text-success me-2"></i>حل مشاكل إنتاج الثلج وتنظيف وتعقيم الوحدات.</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Ovens & Pizza Ovens Section -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row g-5 align-items-center flex-row-reverse">
                <div class="col-lg-6">
                    <img src="{{ asset('images/oven.jpeg') }}" class="img-fluid rounded shadow-lg" alt="صيانة أفران المطاعم وأفران البيتزا">
                </div>
                <div class="col-lg-6">
                    <h2 class="fw-bold text-primary mb-3">الأفران وأفران البيتزا</h2>
                    <p>لضمان طهي مثالي وموحد، نقدم صيانة متخصصة لجميع أنواع الأفران التجارية، بما في ذلك أفران الكونفكشن، الدوارة، وأفران البيتزا.</p>
                     <ul class="list-unstyled">
                        <li class="mb-2"><i class="fas fa-check text-success me-2"></i>معالجة مشاكل توزيع الحرارة وأعطال الترموستات.</li>
                        <li class="mb-2"><i class="fas fa-check text-success me-2"></i>صيانة عناصر التسخين والمراوح والأنظمة الإلكترونية.</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Stoves & Grills Section -->
    <section class="py-5">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6">
                    <img src="{{ asset('images/gasstove.jpeg')}}" class="img-fluid rounded shadow-lg" alt="إصلاح بوتاجازات وجريل المطاعم">
                </div>
                <div class="col-lg-6">
                    <h2 class="fw-bold text-primary mb-3">البوتاجازات والجريل</h2>
                    <p>السلامة والكفاءة هما أولويتنا. نقدم خدمة صيانة آمنة للبوتاجازات والجريل لضمان لهب نقي وأداء موثوق.</p>
                    <ul class="list-unstyled">
                        <li class="mb-2"><i class="fas fa-check text-success me-2"></i>الكشف عن تسريب الغاز وإصلاحه فورًا.</li>
                        <li class="mb-2"><i class="fas fa-check text-success me-2"></i>إصلاح مشاكل ضعف الشعلات وأعطال الإشعال.</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Mixers Section -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row g-5 align-items-center flex-row-reverse">
                <div class="col-lg-6">
                    <img src="{{ asset('images/mixer.jpeg') }}" class="img-fluid rounded shadow-lg" alt="صيانة العجانات التجارية">
                </div>
                <div class="col-lg-6">
                    <h2 class="fw-bold text-primary mb-3">العجانات</h2>
                    <p>للحفاظ على إنتاجية مخبزك أو مطعمك، نعيد القوة الكاملة لعجانتك عبر حل مشاكل الموتور والتروس.</p>
                     <ul class="list-unstyled">
                        <li class="mb-2"><i class="fas fa-check text-success me-2"></i>صيانة الموتور وحل مشاكل ضعف الدوران.</li>
                        <li class="mb-2"><i class="fas fa-check text-success me-2"></i>فحص وتغيير التروس التالفة وتوفير قطع الغيار.</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-5 bg-primary text-white">
        <div class="container text-center">
            <h3 class="fw-bold mb-3">هل توقفت إحدى معداتك عن العمل؟</h3>
            <p class="lead mb-4">لا تدع عطلاً بسيطًا يوقف عملك. اتصل بنا الآن لخدمة صيانة طارئة وموثوقة.</p>
            <a href="{{ route('service_request.index') }}" class="btn btn-light btn-lg px-5">اطلب خدمة الآن</a>
        </div>
    </section>


@endsection
