@extends('dashboard.layout')

@section('title', 'طلبات الخدمة')

@section('content_header')
    @include('dashboard.service_request.partials.filter')
@stop

@section('content')
<div class="card mb-3">
    <div class="card-header">
        <h5 class="mb-0">تصدير البيانات</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('dashboard.export.excel') }}" method="GET" id="exportForm">

            <div style="display: flex; flex-wrap: wrap; gap: 15px; align-items: end;">

                <div style="flex: 1; min-width: 200px;">
                    <label for="export_type" style="display: block; font-weight: bold; margin-bottom: 5px;">نوع التصدير:</label>
                    <select name="export_type" id="export_type" class="form-control" required onchange="showDateFields()">
                        <option value="">اختر نوع التصدير</option>
                        <option value="all">جميع البيانات</option>
                        <option value="today">اليوم</option>
                        <option value="this_week">هذا الأسبوع</option>
                        <option value="this_month">هذا الشهر</option>
                        <option value="this_year">هذه السنة</option>
                        <option value="specific_date">يوم محدد</option>
                        <option value="date_range">فترة زمنية</option>
                    </select>
                </div>

                <div id="specific_date_field" style="display: none; flex: 1; min-width: 200px;">
                    <label for="date" style="display: block; font-weight: bold; margin-bottom: 5px;">التاريخ المحدد:</label>
                    <input type="date" name="date" id="date" class="form-control">
                </div>

                <div id="start_date_field" style="display: none; flex: 1; min-width: 200px;">
                    <label for="start_date" style="display: block; font-weight: bold; margin-bottom: 5px;">من تاريخ:</label>
                    <input type="date" name="start_date" id="start_date" class="form-control">
                </div>

                <div id="end_date_field" style="display: none; flex: 1; min-width: 200px;">
                    <label for="end_date" style="display: block; font-weight: bold; margin-bottom: 5px;">إلى تاريخ:</label>
                    <input type="date" name="end_date" id="end_date" class="form-control">
                </div>

                <div style="flex: 0 0 auto;">
                    <button type="submit" class="btn btn-success" style="padding: 8px 20px;">
                        <i class="fas fa-download"></i> تصدير Excel
                    </button>
                </div>

            </div>
        </form>
    </div>
</div>

<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>رقم المعرف</th>
            <th>الاسم الكامل</th>
            <th>رقم الجوال</th>
            <th>العنوان</th>
            <th>وصف المشكلة</th>
            <th>نوع الجهاز</th>
            <th>صورة الجهاز</th>
            <th>تاريخ الإنشاء</th>
            <th>تاريخ التحديث</th>
            <th>الإجراءات</th>
        </tr>
    </thead>
    <tbody>
        @foreach($serviceRequests as $request)
        <tr>
            <td>{{ $request->id }}</td>
            <td>{{ $request->full_name }}</td>
            <td>+966{{ $request->phone_number }}</td>
            <td>{{ $request->address }}</td>
            <td>{{ $request->problem_description }}</td>
            <td>{{ $request->device_type }}</td>
            <td>
                @dd(asset('storage/' . $request->image))
                @if($request->image)
                    <img src="{{ asset('storage/' . $request->image) }}" alt="صورة الجهاز" style="max-width:100px; height:auto; border:1px solid #ccc; padding:2px;">
                @else
                    لا توجد صورة
                @endif
            </td>
            <td>{{ $request->created_at->format('Y-m-d H:i') }}</td>
            <td>{{ $request->updated_at->format('Y-m-d H:i') }}</td>
            <td>
    <a href="{{ route('dashboard.service_request.show', $request->id) }}"
       class="btn btn-info btn-sm"
       title="عرض التفاصيل">
        <i class="fas fa-eye"></i> عرض
    </a>

    <form method="POST"
          action="{{ route('dashboard.service_request.destroy', $request->id) }}"
          style="display: inline-block;"
          onsubmit="return confirm('هل أنت متأكد من حذف هذا الطلب؟')">
        @csrf
        @method('DELETE')
        <button type="submit"
                class="btn btn-danger btn-sm"
                title="حذف الطلب">
            <i class="fas fa-trash"></i> حذف
        </button>
    </form>
</td>
        </tr>
        @endforeach
    </tbody>
</table>

<div class="mt-3">
    {{ $serviceRequests->links() }}
</div>

<script>
function showDateFields() {
    var exportType = document.getElementById('export_type').value;

    document.getElementById('specific_date_field').style.display = 'none';
    document.getElementById('start_date_field').style.display = 'none';
    document.getElementById('end_date_field').style.display = 'none';

    document.getElementById('date').removeAttribute('required');
    document.getElementById('start_date').removeAttribute('required');
    document.getElementById('end_date').removeAttribute('required');

    if (exportType === 'specific_date') {
        document.getElementById('specific_date_field').style.display = 'block';
        document.getElementById('date').setAttribute('required', 'required');
    } else if (exportType === 'date_range') {
        document.getElementById('start_date_field').style.display = 'block';
        document.getElementById('end_date_field').style.display = 'block';
        document.getElementById('start_date').setAttribute('required', 'required');
        document.getElementById('end_date').setAttribute('required', 'required');
    }
}

document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('start_date').addEventListener('change', function() {
        var endDate = document.getElementById('end_date');
        endDate.setAttribute('min', this.value);
        if (endDate.value && endDate.value < this.value) {
            endDate.value = this.value;
        }
    });

    document.getElementById('exportForm').addEventListener('submit', function(e) {
        var exportType = document.getElementById('export_type').value;

        if (!exportType) {
            e.preventDefault();
            alert('يرجى اختيار نوع التصدير');
            return false;
        }

        if (exportType === 'specific_date' && !document.getElementById('date').value) {
            e.preventDefault();
            alert('يرجى اختيار التاريخ المحدد');
            return false;
        }

        if (exportType === 'date_range') {
            if (!document.getElementById('start_date').value) {
                e.preventDefault();
                alert('يرجى اختيار تاريخ البداية');
                return false;
            }
            if (!document.getElementById('end_date').value) {
                e.preventDefault();
                alert('يرجى اختيار تاريخ النهاية');
                return false;
            }
        }
    });
});
</script>

<style>
@media (max-width: 768px) {
    div[style*="display: flex"] {
        flex-direction: column !important;
    }

    div[style*="flex: 1"] {
        flex: none !important;
        width: 100% !important;
        margin-bottom: 15px;
    }
}
</style>
@endsection
