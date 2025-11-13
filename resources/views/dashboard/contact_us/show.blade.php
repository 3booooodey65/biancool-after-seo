    @extends('dashboard.layout')


@section('title', 'عرض الرسالة')

@section('content')
<div class="card">
    <div class="card-header bg-info text-white">
        <h3 class="card-title">تفاصيل الرسالة - #{{ $contact_u->id }}</h3>
    </div>
    <div class="card-body">
        <table class="table table-bordered">
            <tr>
                <th>الاسم</th>
                <td>{{ $contact_u->name }}</td>
            </tr>
            <tr>
                <th>رقم الجوال</th>
                <td>+966{{ $contact_u->phone_number }}</td>
            </tr>
            <tr>
                <th>الرسالة</th>
                <td>{{ $contact_u->message }}</td>
            </tr>
            <tr>
                <th>الحالة</th>
                <td>{{ $contact_u->is_read ? 'تمت القراءة' : 'لم تُقرأ' }}</td>
            </tr>
            <tr>
                <th>تاريخ الإنشاء</th>
                <td>{{ $contact_u->created_at->format('Y-m-d H:i') }}</td>
            </tr>
            <tr>
                <th>تاريخ التحديث</th>
                <td>{{ $contact_u->updated_at->format('Y-m-d H:i') }}</td>
            </tr>
        </table>

        <div class="mt-3">
    <a href="{{ route('dashboard.contact_us.index') }}" class="btn btn-secondary">عودة للجدول</a>

    <form action="{{ route('dashboard.contact_us.toggleRead', $contact_u->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('PATCH')
        <button type="submit" class="btn btn-{{ $contact_u->is_read ? 'danger' : 'success' }}">
            {{ $contact_u->is_read ? 'تعيين كغير مقروء' : 'تعيين كمقروء' }}
        </button>
    </form>
</div>

    </div>
</div>
@endsection
