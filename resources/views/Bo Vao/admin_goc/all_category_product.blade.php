@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
    <div class="panel panel-default">
        <div class="panel-heading">Liệt kê danh mục sản phẩm</div>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Tên danh mục</th>
                        <th>Slug</th>
                        <th>Hiển thị</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($all_category_product as $key => $cate_pro)
                    <tr>
                        <td>{{ $cate_pro->category_name }}</td>
                        <td>{{ $cate_pro->slug_category_product }}</td>
                        <td>
                            @if($cate_pro->category_status == 1)
                            <span>Hiển thị</span>
                            @else
                            <span>Ẩn</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{URL::to('/edit-category-product/'.$cate_pro->category_id)}}" class="btn btn-primary">Sửa</a>
                            <a href="{{URL::to('/delete-category-product/'.$cate_pro->category_id)}}" onclick="return confirm('Bạn có chắc muốn xóa?')" class="btn btn-danger">Xóa</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
