@extends('admin_layout')
@section('admin_content')
<link rel="shortcut icon" href="frontend/images/ico/favicon.ico">
<link rel="apple-touch-icon" href="frontend/images/ico/apple-touch-icon">
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Cập nhật danh mục
                        </header>
                        <div class="panel-body">
                            @foreach($edit_category_data as $key => $edit_value)
                            <div class="position-center">
                                <form role="form" action="{{URL::to('admin/update_category_product/'.$edit_value->category_id)}}" method="post">
                                    {{csrf_field()}}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên danh mục</label>
                                    <input type="text" class="form-control" value="{{$edit_value->category_name}}" name="category_name" placeholder="Tên danh mục">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả sản phẩm</label>
                                    <textarea style="resize: none" rows="5"  placeholder="Nhập mô tả..." class="form-control" name="category_desc"><?php echo $edit_value->category_desc; ?></textarea>
                                </div>
                                    <div class="form-group">
                                         <label for="exampleInputFile">Tình trạng</label>
                                <select class="form-control m-bot15" name="category_status">
                                    <option value="1">Hiển thị</option>
                                    <option value="0">Ẩn</option>
                                </select>
                                    </div>
                                    <div class="form-group">
                                       @if(session()->has('cata_noti'))
                                        <div class = "success">
                                        <strong>Thông báo: </strong>
                                        <?php
                                        $noti = Session::get('cata_noti');
                                        if ($noti) {
                                        echo $noti;
                                        Session::put('cata_noti',null);
                                        } 
                                        ?>
                                        </div>
                                        @endif
                                    </div>
                                    <div class="form-group"><button type="submit" class="btn btn-info">Submit</button></div>
                            </form>
                            </div>
                        @endforeach
                        </div>
                    </section>
            </div>
</div>
@endsection