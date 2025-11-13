
<button type="submit" class="btn btn-primary">فلتر</button>
<a href="javascript:void(0)" onclick="resetFilters()" class="btn btn-secondary">إعادة ضبط</a>
@section('js')
    <script>
        function resetFilters() {
            window.location.href = window.location.pathname;
        }
    </script>
@stop
