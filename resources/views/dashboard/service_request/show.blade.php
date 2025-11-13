    @extends('dashboard.layout')


@section('title', 'تفاصيل طلب الخدمة')

@section('content')
<div class="card">
    <div class="card-header bg-primary text-white">
        <h3 class="card-title">تفاصيل طلب الخدمة - #{{ $serviceRequest->id }}</h3>
    </div>
    <div class="card-body">
        <table class="table table-bordered">
            <tr>
                <th>ID</th>
                <td>{{ $serviceRequest->id }}</td>
            </tr>
            <tr>
                <th>الاسم الكامل</th>
                <td>{{ $serviceRequest->full_name }}</td>
            </tr>
            <tr>
                <th>رقم الجوال</th>
                <td>+966{{ $serviceRequest->phone_number }}</td>
            </tr>
            <tr>
                <th>العنوان</th>
                <td>{{ $serviceRequest->address }}</td>
            </tr>
            <tr>
                <th>نوع الجهاز</th>
                <td>{{ $serviceRequest->device_type }}</td>
            </tr>
            <tr>
                <th>وصف المشكلة</th>
                <td>{{ $serviceRequest->problem_description }}</td>
            </tr>
            <tr>
                <th>صورة الجهاز</th>
                <td>
                    @if($serviceRequest->image)
                        <img src="{{ asset('storage/' . $serviceRequest->image) }}" alt="صورة الجهاز" style="max-width:300px; height:auto; border:1px solid #ccc; padding:5px;">
                    @else
                        لا توجد صورة
                    @endif
                </td>
            </tr>
            <tr>
                <th>تاريخ الإنشاء</th>
                <td>{{ $serviceRequest->created_at->format('Y-m-d H:i') }}</td>
            </tr>
            <tr>
                <th>آخر تحديث</th>
                <td>{{ $serviceRequest->updated_at->format('Y-m-d H:i') }}</td>
            </tr>
        </table>
        <a href="{{ route('dashboard.service_request.index') }}" class="btn btn-secondary mt-3">عودة للجدول</a>
    </div>
</div>
@endsection
