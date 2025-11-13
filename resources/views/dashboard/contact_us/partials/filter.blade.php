<div class="card card-body mb-4">
    <form action="{{ route('dashboard.contact_us.index') }}" method="GET">
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="name">اسم المرسل</label>
                    <input
                        type="text"
                        name="name"
                        id="name"
                        class="form-control"
                        placeholder="ابحث بالاسم"
                        value="{{ request('name') }}">
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label for="phone_number">رقم الجوال</label>
                    <input
                        type="text"
                        name="phone_number"
                        id="phone_number"
                        class="form-control"
                        placeholder="ابحث برقم الجوال"
                        value="{{ request('phone_number') }}">
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label for="is_read">الحالة</label>
                    <select name="is_read" id="is_read" class="form-control">
                        <option value="">الكل</option>
                        <option value="0" {{ request('is_read') === '0' ? 'selected' : '' }}>لم تُقرأ</option>
                        <option value="1" {{ request('is_read') === '1' ? 'selected' : '' }}>تمت القراءة</option>
                    </select>
                </div>
            </div>

            <div class="col-md-12 text-end mt-3">
                @include('dashboard.partials.filter-actions')
            </div>
        </div>
    </form>
</div>
