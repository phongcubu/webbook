@extends('admin_layout')
@section('admin_content')
    <div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Liệt kê bài viết
    </div>

    <div class="table-responsive">
                
      <table class="table table-striped b-t b-light" id="#table1">
        <thead>
          <tr>
            <th style="width:20px;">
              <label class="i-checks m-b-none">
                <input type="checkbox"><i></i>
              </label>
            </th>
            <th>Tên bài viết</th>
            <th>Hình ảnh</th>
          
            <th>Mô tả bài viết</th>
            <th>Danh mục bài viết</th>
            <th>Hiển thị</th>
           <th>
               Quản lý 
           </th>
            
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
          @foreach($all_post as $key => $post)
          <tr>
            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
            <td>{{ $post->post_title }}</td>
            <td><img src="{{asset('public/uploads/post/'.$post->post_image)}}" height="100" width="100"></td>
    
            <td>{!! $post->post_desc !!}</td>
          
            <td>{{ $post->category_post->category_post_name }}</td>
            <td>
              @if($post->post_status==1)
                Hiển thị
              @else 
                Ẩn
              @endif
            </td>

            <td>
              <a href="{{URL::to('edit-post/'.$post->post_id)}}" class="active styling-edit" ui-toggle-class="">
                <i class="fa fa-pencil-square-o text-success text-active"></i></a>
              <a onclick="return confirm('Bạn có chắc là muốn xóa bài viết này ko?')" href="{{URL::to('delete-post/'.$post->post_id)}}" class="active styling-edit" ui-toggle-class="">
                <i class="fa fa-times text-danger text"></i>
              </a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
 <footer class="panel-footer">
      <div class="row">
        
        <div class="col-sm-5 text-center">
       
        </div>
        <div class="col-sm-7 text-right text-center-xs">                
          <ul class="pagination pagination-sm m-t-none m-b-none">
            {!!$all_post->links()!!}
          </ul>
        </div>
      </div>
    </footer> 
  </div>
</div>
@endsection