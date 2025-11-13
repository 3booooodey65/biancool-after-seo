@extends('website.layouts.main')

@section('title', "صيانة وتركيب غرف التبريد | بيان كوول (biancool) | مخازن ومصانع")

@section('page_header')
    <!-- Page Header -->
    <section class="page-header bg-gradient text-white py-5">
        <div class="container text-center">
            <h1 class="display-4 fw-bold">صيانة غرف التبريد</h1>
            <p class="lead">حلول تبريد صناعية متكاملة للمخازن، المصانع، والأسواق المركزية</p>
        </div>
    </section>
@endsection

@section('content')
    <!-- Service Details Section -->
    <section class="py-5">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6">
                    <img src="{{ asset('images/coldroom.jpeg') }}" class="img-fluid rounded shadow-lg" alt="فني يقوم بصيانة وحدة تبريد في غرفة تبريد صناعية">
                </div>
                <div class="col-lg-6">
                    <h2 class="fw-bold text-primary mb-3">تركيب وصيانة غرف التبريد والتجميد</h2>
                    <p>ندرك في "بيان كوول" أن استمرارية سلسلة التبريد هي شريان الحياة لعملك. لذلك، نقدم خدمات متخصصة في تصميم، تركيب، وصيانة غرف التبريد والتجميد لضمان الحفاظ على جودة منتجاتك وسلامتها.</p>
                    <ul class="list-unstyled">
                        <li class="mb-2"><i class="fas fa-check text-success me-2"></i><strong>تركيب وتصميم مخصص:</strong> تصميم وبناء غرف تبريد تناسب مساحتك واحتياجات التخزين الخاصة بك.</li>
                        <li class="mb-2"><i class="fas fa-check text-success me-2"></i><strong>صيانة دورية وقائية:</strong> عقود صيانة منتظمة لفحص وحدات التبريد، العزل، والأبواب لمنع الأعطال المفاجئة.</li>
                        <li class="mb-2"><i class="fas fa-check text-success me-2"></i><strong>إصلاح الأعطال الطارئة:</strong> خدمة استجابة سريعة لإصلاح أعطال وحدات التبريد (الكمبروسر) والمكثفات.</li>
                        <li class="mb-2"><i class="fas fa-check text-success me-2"></i><strong>فحص العزل والتسريب:</strong> معالجة ضعف العزل والكشف عن تسريب غاز الفريون وإصلاحه.</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Tips Section -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold">نصائح للحفاظ على كفاءة غرف التبريد</h2>
                <p class="text-muted">إرشادات أساسية لضمان أفضل أداء وتقليل استهلاك الطاقة.</p>
            </div>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card h-100 text-center p-3">
                        <div class="card-body">
                           <h5 class="fw-bold text-primary">مراقبة درجة الحرارة</h5>
                           <p>استخدم أنظمة مراقبة دقيقة وتأكد من أن درجة الحرارة ثابتة ومطابقة للمواصفات المطلوبة لمنتجاتك.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card h-100 text-center p-3">
                        <div class="card-body">
                            <h5 class="fw-bold text-primary">الحفاظ على نظافة الوحدات</h5>
                            <p>تأكد من نظافة المكثفات والمبخرات من الغبار والثلج لضمان تدفق هواء جيد وكفاءة تبريد عالية.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card h-100 text-center p-3">
                        <div class="card-body">
                            <h5 class="fw-bold text-primary">التأكد من إغلاق الأبواب</h5>
                            <p>افحص أختام الأبواب بشكل دوري وتأكد من إغلاقها بإحكام لمنع تسرب الهواء الدافئ وهدر الطاقة.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-5 bg-primary text-white">
        <div class="container text-center">
            <h3 class="fw-bold mb-3">هل تحتاج إلى حلول تبريد صناعية؟</h3>
            <p class="lead mb-4">سواء كنت تحتاج إلى تركيب جديد أو صيانة طارئة، فريقنا جاهز لخدمتك. اتصل بنا الآن.</p>
            <a href="{{ route('service_request.index') }}" class="btn btn-light btn-lg px-5">اطلب خدمة الآن</a>
        </div>
    </section>

@endsection
