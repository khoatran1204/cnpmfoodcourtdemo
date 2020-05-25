@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Thêm danh mục sản phẩm
                        </header>
                        <div class="panel-body">
                            <div class="position-center">
                                <form role="form" action="{{URL::to('admin/save_category')}}" method="post">
                                    {{csrf_field()}}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên danh mục</label>
                                    <input type="text" class="form-control" name="category_name" placeholder="Tên danh mục">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả sản phẩm</label>
                                    <textarea style="resize: none" rows="5" placeholder="Nhập mô tả..." class="form-control" name="category_desc"></textarea>
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

                        </div>
                    </section>
            </div>
</div>
@endsection