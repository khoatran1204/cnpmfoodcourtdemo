@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Cập nhật sản phẩm
                        </header>
                        <div class="panel-body">
                            @foreach($edit_product_manager as $key => $temp)
                            <div class="position-center">
                                <form role="form" action="{{URL::to('admin/update_product/'.$temp->product_id)}}" method="post" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên sản phẩm</label>
                                    <input type="text" class="form-control" value="{{$temp->product_name}}" name="product_name" placeholder="Tên sản phẩm">
                                </div>
                                
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Giá sản phẩm</label>
                                    <input type="text" class="form-control" value="{{$temp->product_price}}" name="product_price" placeholder="50.000 ...">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả sản phẩm</label>
                                    <textarea style="resize: none" rows="5" placeholder="Nhập mô tả..." class="form-control" name="product_desc"><?php echo $temp->product_desc; ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Nội dung sản phẩm</label>
                                    <textarea style="resize: none" rows="5" placeholder="Nhập nội dung..." class="form-control" name="product_content"><?php echo $temp->product_content; ?></textarea>
                                </div>
                                    <div class="form-group">
                                @endforeach       
                                        <label for="exampleInputPassword1">Danh mục</label>
                                <select class="form-control m-bot15" name="category_id">
                                    @foreach($edit_product_manager as $key => $temp2)
                                    @foreach($cate_product as $key => $temp)
                                    @if($temp->category_id == $temp2->category_id) <option selected value="{{$temp2->category_id}}">{{$temp->category_name}}</option>
                                    @else <option value="{{$temp->category_id}}">{{$temp->category_name}}</option>
                                    @endif
                                    @endforeach
                                    @endforeach
                                    
                                </select>
                                        
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Thương hiệu</label>
                                <select class="form-control m-bot15" name="brand_id">
                                    @foreach($edit_product_manager as $key => $temp2)
                                    @foreach($brand_product as $key => $temp)
                                    @if($temp->brand_id == $temp2->brand_id) <option selected value="{{$temp2->brand_id}}">{{$temp->brand_name}}</option>
                                    @else <option value="{{$temp->brand_id}}">{{$temp->brand_name}}</option>
                                    @endif
                                    @endforeach
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
                                        @foreach($edit_product_manager as $key => $temp)
                                <div class="form-group">
                                    <label for="exampleInputFile">Hình ảnh</label>
                                    <input type="file" id="exampleInputFile" name = "product_image">
                                </div>
                                    <div class="form-group">
                                        <img src="../../upload/product/{{$temp->product_image}}" height="100px" width="100px">
                                        @endforeach

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