<script src="{{ asset('admin/layer/layer.js') }}" ></script>
@if(\Illuminate\Support\Facades\Session::get('success'))
        <script>
            layer.alert('添加成功')
        </script>
@endif

@if(\Illuminate\Support\Facades\Session::get('success_edit'))
    <script>
        layer.alert('修改成功')
    </script>
@endif