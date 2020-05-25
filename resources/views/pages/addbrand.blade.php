@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Thêm thương hiệu sản phẩn
                        </header>
                        <div class="panel-body">
                            <div class="position-center">
                                <form role="form" action="{{URL::to('admin/save_brand')}}" method="post">
                                    {{csrf_field()}}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên thương hiệu</label>
                                    <input type="text" class="form-control" name="brand_name" placeholder="Tên thương hiệu">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả</label>
                                    <textarea style="resize: none" rows="5" placeholder="Nhập mô tả..." class="form-control" name="brand_desc"></textarea>
                                </div>
                                    <div class="form-group">
                                         <label for="exampleInputFile">Tình trạng</label>
                                <select class="form-control m-bot15" name="brand_status">
                                    <option value="1">Hiển thị</option>
                                    <option value="0">Ẩn</option>
                                </select>
                                    </div>
                                    <div class="form-group">
                                       @if(session()->has('brand_noti'))
                                        <div class = "success">
                                        <strong>Thông báo: </strong>
                                        <?php
                                        $noti = Session::get('brand_noti');
                                        if ($noti) {
                                        echo $noti;
                                        Session::put('brand_noti',null);
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