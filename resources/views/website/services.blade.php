@extends('website.layouts.main')

@section('title', "الخدمات - بيان للصيانة")

@section('page_header')
    <section class="page-header bg-gradient text-white py-5">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h1 class="display-4 fw-bold">خدماتنا المتكاملة</h1>
                    <p class="lead">حلول صيانة احترافية لكل قطاع، من منزلك إلى مشروعك التجاري.</p>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('content')
    <section class="py-5">
        <div class="container">
            <div class="row services-grid">
                <!-- Card 1: Cooling and Refrigeration -->
                <div class="col-lg-6 col-md-6 mb-4">
                    <a href="{{ route('service.cooling') }}" class="card-link">
                        <div class="card h-100 shadow position-relative">
                            <img src="{{ asset('images/ac.jpeg') }}" class="card-img-top" alt="صورة تكييف وتبريد">
                            <div class="card-body text-center">
                                <h5 class="card-title fw-bold">صيانة التكييف والتبريد</h5>
                                <p class="card-text">خدمات متكاملة للمكيفات بجميع أنواعها والثلاجات والفريزر للمنازل والشركات.</p>
                                <span class="btn btn-outline-primary mt-3 stretched-link">عرض التفاصيل</span>
                            </div>
                        </div>
                    </a>
                </div>

                <!-- Card 2: Home Appliances -->
                <div class="col-lg-6 col-md-6 mb-4">
                    <a href="{{ route('service.home_appliances') }}" class="card-link">
                        <div class="card h-100 shadow position-relative">
                            <img src="{{ asset('images/home.jpeg') }}" class="card-img-top" alt="صورة أجهزة منزلية">
                            <div class="card-body text-center">
                                <h5 class="card-title fw-bold">صيانة الأجهزة المنزلية</h5>
                                <p class="card-text">إصلاح الغسالات، غسالات الصحون، السخانات، المكانس، وجميع معدات المطبخ.</p>
                                <span class="btn btn-outline-primary mt-3 stretched-link">عرض التفاصيل</span>
                            </div>
                        </div>
                    </a>
                </div>

                <!-- Card 3: Restaurant & Cafe Equipment -->
                <div class="col-lg-6 col-md-6 mb-4">
                    <a href="{{ route('service.restaurant_equipment') }}" class="card-link">
                        <div class="card h-100 shadow position-relative">
                            <img src="{{ asset('images/restequ.jpeg') }}" class="card-img-top" alt="صورة معدات مطاعم">
                            <div class="card-body text-center">
                                <h5 class="card-title fw-bold">صيانة معدات المطاعم والمقاهي</h5>
                                <p class="card-text">صيانة مكائن القهوة والثلج، الأفران، البوتاجازات، العجانات، والجريل.</p>
                                <span class="btn btn-outline-primary mt-3 stretched-link">عرض التفاصيل</span>
                            </div>
                        </div>
                    </a>
                </div>

                <!-- Card 4: Cold Rooms -->
                <div class="col-lg-6 col-md-6 mb-4">
                    <a href="{{ route('service.cold_rooms') }}" class="card-link">
                        <div class="card h-100 shadow position-relative">
                            <img src="{{ asset('images/coldroom2.jpeg') }}" class="card-img-top" alt="صورة غرف تبريد">
                            <div class="card-body text-center">
                                <h5 class="card-title fw-bold">صيانة غرف التبريد</h5>
                                <p class="card-text">تركيب وصيانة غرف التبريد والتجميد للمخازن والمصانع والأسواق المركزية.</p>
                                <span class="btn btn-outline-primary mt-3 stretched-link">عرض التفاصيل</span>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection
