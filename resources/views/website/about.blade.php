@extends('website.layouts.main')

@section('title', "من نحن - بيان للصيانة")

@section('page_header')
    <section class="page-header bg-gradient text-white py-5">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h1 class="display-4 fw-bold">من نحن</h1>
                    <p class="lead">تعرف على شركة الروّاد للصيانة</p>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('content')
    <!-- About Content -->
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <div class="card shadow-lg">
                        <div class="card-body p-5">
                            <h2 class="fw-bold text-primary mb-4">نبذة عن الشركة</h2>
                            <p class="lead">
                                شركة الروّاد للصيانة (rwadcool) هي شركة متخصصة في تقديم خدمات الصيانة الاحترافية لجميع الأجهزة المنزلية. نحن نفخر بتقديم خدمات عالية الجودة مع ضمان رضا العملاء.
                            </p>
                            <p>
                                تأسست شركتنا على أسس قوية من الخبرة والمهنية، حيث نضم فريقاً من أمهر الفنيين المتخصصين في صيانة وإصلاح جميع أنواع الأجهزة المنزلية. نحن نؤمن بأن كل عميل يستحق أفضل خدمة ممكنة.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Vision & Mission -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row g-4">
                <div class="col-md-6">
                    <div class="card h-100 shadow">
                        <div class="card-body text-center p-4">
                            <i class="fas fa-eye fa-3x text-primary mb-3"></i>
                            <h4 class="fw-bold text-primary">رؤيتنا</h4>
                            <p>أن نكون الشركة الرائدة في مجال صيانة الأجهزة المنزلية في المملكة العربية السعودية، ونقدم خدمات متميزة تلبي احتياجات عملائنا وتفوق توقعاتهم.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card h-100 shadow">
                        <div class="card-body text-center p-4">
                            <i class="fas fa-bullseye fa-3x text-primary mb-3"></i>
                            <h4 class="fw-bold text-primary">رسالتنا</h4>
                            <p>تقديم خدمات صيانة احترافية وموثوقة لجميع الأجهزة المنزلية، مع الالتزام بأعلى معايير الجودة والسرعة في الخدمة، وبناء علاقات طويلة الأمد مع عملائنا.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Experience & Team -->
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center mb-5">
                    <h2 class="fw-bold">خبرتنا وفريق العمل</h2>
                </div>
            </div>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="text-center">
                        <div class="feature-icon bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3">
                            <i class="fas fa-medal fa-2x"></i>
                        </div>
                        <h5 class="fw-bold">خبرة واسعة</h5>
                        <p>أكثر من 10 سنوات من الخبرة في مجال صيانة الأجهزة المنزلية</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="text-center">
                        <div class="feature-icon bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3">
                            <i class="fas fa-users fa-2x"></i>
                        </div>
                        <h5 class="fw-bold">فريق متخصص</h5>
                        <p>فنيون مدربون ومؤهلون للتعامل مع جميع أنواع الأجهزة</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="text-center">
                        <div class="feature-icon bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3">
                            <i class="fas fa-clock fa-2x"></i>
                        </div>
                        <h5 class="fw-bold">خدمة سريعة</h5>
                        <p>استجابة سريعة وحلول فعالة في أقل وقت ممكن</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Overview -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center mb-4">
                    <h3 class="fw-bold">الأجهزة التي نخدمها</h3>
                </div>
            </div>
            <div class="row g-3">
                <div class="col-md-6 col-lg-4">
                    <div class="d-flex align-items-center p-3 bg-white rounded shadow-sm">
                        <i class="fas fa-coffee fa-2x text-primary me-3"></i>
                        <span>مكائن القهوة</span>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="d-flex align-items-center p-3 bg-white rounded shadow-sm">
                        <i class="fas fa-cube fa-2x text-primary me-3"></i>
                        <span>مكائن الثلج</span>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="d-flex align-items-center p-3 bg-white rounded shadow-sm">
                        <i class="fas fa-snowflake fa-2x text-primary me-3"></i>
                        <span>المكيفات والتبريد</span>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="d-flex align-items-center p-3 bg-white rounded shadow-sm">
                        <i class="fas fa-tshirt fa-2x text-primary me-3"></i>
                        <span>الغسالات</span>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="d-flex align-items-center p-3 bg-white rounded shadow-sm">
                        <i class="fas fa-utensils fa-2x text-primary me-3"></i>
                        <span>غسالات الصحون</span>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="d-flex align-items-center p-3 bg-white rounded shadow-sm">
                        <i class="fas fa-fire fa-2x text-primary me-3"></i>
                        <span>الأفران والبوتاجازات</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
