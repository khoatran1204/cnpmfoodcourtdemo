@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Liệt kê sản phẩm
    </div>
    
    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th style="width:20px;">
              STT
            </th>
            <th>Tên sản phẩm</th>
            <th>Hình ảnh</th>
            <th>Danh mục</th>
            <th>Giá</th>
            <th>Trạng thái</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
          <?php $number = 1; ?>
          @foreach($product_data as $key => $temp)
          <tr>
            <td><?php echo $number++; ?></td>
            <td>{{$temp->product_name}}</td>
            <td><img src="../upload/product/{{$temp->product_image}}" height="80px" width="80px"></td>
            <td>{{$temp->category_name}}</td>
            <td>{{$temp->brand_name}}</td>
            <td>
                <?php 
                    if ($temp->product_status) {
                ?>
                <a href="{{URL::to('/admin/change_product_status/'.$temp->product_id)}}"><i class="fa_eye_style fa fa-eye"></i>
                <?php 
                    } 
                    else {
                ?> 
                <a href="{{URL::to('/admin/change_product_status/'.$temp->product_id)}}"><i class="fa_eye_style fa fa-eye-slash"></i>
                <?php } ?>
            </td>
            <td>
              <a href="{{URL::to('admin/edit_product/'.$temp->product_id)}}" ui-toggle-class=""><i class="fa_style fa fa-pencil-square-o text-success text-active"></i></a>
              <a onclick="return confirm('Are you sure ?')" href="{{URL::to('admin/delete_product/'.$temp->product_id)}}" ui-toggle-class=""><i class="fa_style fa fa-times text-danger text"></i></a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <footer class="panel-footer">
      <div class="row">
        
        <div class="col-sm-5 text-center">
          <small class="text-muted inline m-t-sm m-b-sm"></small>
        </div>
        <div class="col-sm-7 text-right text-center-xs">                
          <ul class="pagination pagination-sm m-t-none m-b-none">
            <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
            <li><a href="">1</a></li>
            <li><a href="">2</a></li>
            <li><a href="">3</a></li>
            <li><a href="">4</a></li>
            <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
          </ul>
        </div>
      </div>
    </footer>
  </div>
</div>
@endsection