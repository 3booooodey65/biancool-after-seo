@extends('website.layouts.main')

@section('title', "بيان للصيانة - rwadcool")

@push('hero_content')
    <section class="hero-section bg-gradient text-white py-5">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-6">
            <h1 class="display-4 fw-bold mb-4">
              مرحباً بكم في بيان كوول
            </h1>
            <p class="lead mb-4">
              نحن نقدم خدمات صيانة احترافية لجميع الأجهزة المنزلية والتجارية بأعلى جودة
              وأسرع وقت في جدة. فريق متخصص وخبرة واسعة في مجال الصيانة.
            </p>
            <a href="{{ route('service_request.index') }}" class="btn btn-light btn-lg px-5 py-3"
              >اطلب الخدمة الآن</a
            >
          </div>
          <div class="col-lg-6 text-center">
            <div class="hero-icon">
              <i class="fas fa-tools fa-10x text-white-50"></i>
            </div>
          </div>
        </div>
      </div>
    </section>
@endpush

@section('content')
    <!-- Services Preview -->
    <section class="py-5">
      <div class="container">
        <div class="row">
          <div class="col-12 text-center mb-5">
            <h2 class="fw-bold">خدماتنا الرئيسية في جدة</h2>
            <p class="text-muted">
              حلول صيانة متكاملة تلبي جميع احتياجاتك
            </p>
          </div>
        </div>
        <div class="row g-4">
          <!-- Card 1: Restaurant Equipment -->
          <div class="col-md-4">
            <a href="{{ route('service.restaurant_equipment') }}" class="card-link">
              <div class="card h-100 shadow-sm">
                <div class="card-body text-center">
                  <i class="fas fa-utensils fa-3x text-primary mb-3"></i>
                  <h5 class="card-title fw-bold">معدات المطاعم والمقاهي</h5>
                  <p class="card-text">صيانة الأفران، مكائن القهوة، العجانات، والجريل.</p>
                </div>
              </div>
            </a>
          </div>
          <!-- Card 2: Cooling & Refrigeration -->
          <div class="col-md-4">
            <a href="{{ route('service.cooling') }}" class="card-link">
              <div class="card h-100 shadow-sm">
                <div class="card-body text-center">
                  <i class="fas fa-snowflake fa-3x text-primary mb-3"></i>
                  <h5 class="card-title fw-bold">التبريد والتكييف</h5>
                  <p class="card-text">صيانة المكيفات، الثلاجات، والفريزر بجميع أنواعها.</p>
                </div>
              </div>
            </a>
          </div>
          <!-- Card 3: Home Appliances -->
          <div class="col-md-4">
            <a href="{{ route('service.home_appliances') }}" class="card-link">
              <div class="card h-100 shadow-sm">
                <div class="card-body text-center">
                  <i class="fas fa-tshirt fa-3x text-primary mb-3"></i>
                  <h5 class="card-title fw-bold">الأجهزة المنزلية</h5>
                  <p class="card-text">إصلاح الغسالات، السخانات، المكانس، ومعدات المطبخ.</p>
                </div>
              </div>
            </a>
          </div>
        </div>
        <div class="text-center mt-5">
          <a href="{{ route('service') }}" class="btn btn-primary btn-lg">عرض جميع أقسام الخدمات</a>
        </div>
      </div>
    </section>

    <!-- Contact CTA -->
    <section class="bg-light py-5">
      <div class="container text-center">
        <h3 class="fw-bold mb-3">هل تحتاج لخدماتنا في جدة؟</h3>
        <p class="mb-4">اتصل بنا الآن أو اطلب الخدمة عبر الموقع</p>
        <div class="d-flex justify-content-center gap-3 flex-wrap">
          <a href="tel:+966574467922" class="btn btn-primary btn-lg d-inline-block d-lg-none">
                    <i class="fas fa-phone me-2"></i>
                    اتصل الآن
                </a>
          <a href="{{ route('service_request.index') }}" class="btn btn-outline-primary btn-lg">
            <i class="fas fa-wrench me-2"></i>
            اطلب خدمة
          </a>
        </div>
      </div>
    </section>

@endsection
