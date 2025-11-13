    @extends('dashboard.layout')


@section('title', 'طلبات التواصل')

@section('content_header')
    @include('dashboard.contact_us.partials.filter')
@stop

@section('content')
<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>الرقم</th>
            <th>الاسم</th>
            <th>رقم الجوال</th>
            <th>الرسالة</th>
            <th>الحالة</th>
            <th>تاريخ الإنشاء</th>
            <th>تاريخ التحديث</th>
            <th>الإجراءات</th>
        </tr>
    </thead>
    <tbody>
        @foreach($contacts as $contact)
            <tr>
                <td>{{ $contact->id }}</td>
                <td>{{ $contact->name }}</td>
                <td>+966{{ $contact->phone_number }}</td>
                <td>{{ Str::limit($contact->message, 50) }}</td>
                <td>
                    <span class="badge badge-{{ $contact->is_read ? 'success' : 'danger' }}">
                        {{ $contact->is_read ? 'تمت القراءة' : 'لم تُقرأ' }}
                    </span>
                </td>
                <td>{{ $contact->created_at->format('Y-m-d H:i') }}</td>
                <td>{{ $contact->updated_at->format('Y-m-d H:i') }}</td>
                <td>
    <div class="btn-group-vertical" role="group" style="width: 100%;">
        <a href="{{ route('dashboard.contact_us.show', $contact->id) }}"
           class="btn btn-info btn-sm mb-1"
           title="عرض التفاصيل">
            <i class="fas fa-eye"></i> عرض
        </a>

        <form action="{{ route('dashboard.contact_us.toggleRead', $contact->id) }}"
              method="POST"
              style="display:inline;">
            @csrf
            @method('PATCH')
            <button type="submit"
                    class="btn btn-{{ $contact->is_read ? 'warning' : 'success' }} btn-sm mb-1"
                    title="{{ $contact->is_read ? 'تعيين كغير مقروء' : 'تعيين كمقروء' }}">
                <i class="fas fa-{{ $contact->is_read ? 'eye-slash' : 'check' }}"></i>
                {{ $contact->is_read ? 'غير مقروء' : 'مقروء' }}
            </button>
        </form>

        <form method="POST"
              action="{{ route('dashboard.contact_us.destroy', $contact->id) }}"
              style="display: inline-block;"
              onsubmit="return confirm('هل أنت متأكد من حذف هذه الرسالة؟')">
            @csrf
            @method('DELETE')
            <button type="submit"
                    class="btn btn-danger btn-sm"
                    title="حذف الرسالة">
                <i class="fas fa-trash"></i> حذف
            </button>
        </form>
    </div>
</td>

            </tr>
        @endforeach
    </tbody>
</table>

<div class="mt-3">
    {{ $contacts->links() }}
</div>
@endsection
