@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Liệt kê danh mục sản phẩm
    </div>
    
    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th style="width:20px;">
              STT
            </th>
            <th>Tên danh mục</th>
            <th>Mô tả</th>
            <th>Hiển thị</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
          <?php $number = 1; ?>
          @foreach($brand_data as $key => $brand)
          <tr>
            <td><?php echo $number++; ?></td>
            <td>{{$brand->brand_name}}</td>
            <td>{{$brand->brand_desc}}</td>
            <td>
                <?php 
                    if ($brand->brand_status) {
                ?>
                <a href="{{URL::to('/admin/change_brand_status/'.$brand->brand_id)}}"><i class="fa_eye_style fa fa-eye"></i>
                <?php 
                    } 
                    else {
                ?> 
                <a href="{{URL::to('/admin/change_brand_status/'.$brand->brand_id)}}"><i class="fa_eye_style fa fa-eye-slash"></i>
                <?php } ?>
            </td>
            <td>
              <a href="{{URL::to('admin/edit_brand_product/'.$brand->brand_id)}}" ui-toggle-class=""><i class="fa_style fa fa-pencil-square-o text-success text-active"></i></a>
              <a onclick="return confirm('Are you sure ?')" href="{{URL::to('admin/delete_brand_product/'.$brand->brand_id)}}" ui-toggle-class=""><i class="fa_style fa fa-times text-danger text"></i></a>
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