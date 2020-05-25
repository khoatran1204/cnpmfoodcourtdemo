@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Thêm sản phẩm
                        </header>
                        <div class="panel-body">
                            <div class="position-center">
                                <form role="form" action="{{URL::to('admin/save_product')}}" method="post" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên sản phẩm</label>
                                    <input type="text" class="form-control" name="product_name" placeholder="Tên sản phẩm">
                                </div>
                                
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Giá sản phẩm</label>
                                    <input type="text" class="form-control" name="product_price" placeholder="50.000 ...">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả sản phẩm</label>
                                    <textarea style="resize: none" rows="5" placeholder="Nhập mô tả..." class="form-control" name="product_desc"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Nội dung sản phẩm</label>
                                    <textarea style="resize: none" rows="5" placeholder="Nhập nội dung..." class="form-control" name="product_content"></textarea>
                                </div>
                                    <div class="form-group">
                                        
                                        <label for="exampleInputPassword1">Danh mục</label>
                                <select class="form-control m-bot15" name="category_id">
                                    @foreach($cate_product as $key => $temp)
                                    <option value="{{$temp->category_id}}">{{$temp->category_name}}</option>
                                    @endforeach
                                </select>
                                        
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Thương hiệu</label>
                                <select class="form-control m-bot15" name="brand_id">
                                    @foreach($brand_product as $key => $temp)
                                    <option value="{{$temp->brand_id}}">{{$temp->brand_name}}</option>
                                    @endforeach
                                </select>
                                    </div>

                                        <div class="form-group">
                                            <label for="exampleInputFile">Tình trạng</label>
                                <select class="form-control m-bot15" name="product_status">
                                    <option value="1">Hiển thị</option>
                                    <option value="0">Ẩn</option>
                                </select>
                                        </div>

                                <div class="form-group">
                                    <label for="exampleInputFile">Hình ảnh</label>
                                    <input type="file" id="exampleInputFile" name = "product_image">
                                </div>
                                    <div class="form-group">
                                       @if(session()->has('product_noti'))
                                        <div class = "success">
                                        <strong>Thông báo: </strong>
                                        <?php
                                        $noti = Session::get('product_noti');
                                        if ($noti) {
                                        echo $noti;
                                        Session::put('product_noti',null);
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