@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">Thêm danh mục sản phẩm</header>
            <div class="panel-body">
                <form role="form" action="{{URL::to('/save-category-product')}}" method="post">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tên danh mục</label>
                        <input type="text" name="category_product_name" class="form-control" placeholder="Tên danh mục">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Slug</label>
                        <input type="text" name="slug_category_product" class="form-control" placeholder="Slug">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Mô tả danh mục</label>
                        <textarea style="resize: none" rows="5" class="form-control" name="category_product_desc" placeholder="Mô tả"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Hiển thị</label>
                        <select name="category_product_status" class="form-control">
                            <option value="1">Hiển thị</option>
                            <option value="0">Ẩn</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-info">Thêm danh mục</button>
                </form>
            </div>
        </section>
    </div>
</div>
@endsection
