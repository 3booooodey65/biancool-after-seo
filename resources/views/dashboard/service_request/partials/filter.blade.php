<div class="card card-body mb-4">
    <form action="{{ route('dashboard.service_request.index') }}" method="GET">
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="full_name">اسم العميل</label>
                    <input
                        type="text"
                        name="full_name"
                        id="full_name"
                        class="form-control"
                        placeholder="ابحث بالاسم"
                        value="{{ request('full_name') }}">
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
                    <label for="id">رقم المعرف</label>
                    <input
                        type="text"
                        name="id"
                        id="id"
                        class="form-control"
                        placeholder="ابحث برقم المعرف"
                        value="{{ request('id') }}">
                </div>
            </div>

            <div class="col-md-12 text-end mt-3">
                @include('dashboard.partials.filter-actions')
            </div>
        </div>
    </form>
</div>
