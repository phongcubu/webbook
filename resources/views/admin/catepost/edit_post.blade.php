@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                           Cập nhật danh mục bài viết
                        </header>
                         <?php
                            $message = Session::get('message');
                            if($message){
                                echo '<span class="text-alert">'.$message.'</span>';
                                Session::put('message',null);
                            }
                            ?>
                        <div class="panel-body">
                   
                            <div class="position-center">
                                <form role="form" action="{{URL::to('update-category-post/'.$edit_category_post->category_post_id)}}" method="post">
                                    {{ csrf_field() }}
                              
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên danh mục</label>
                                    <input type="text" name="category_post_name" value="{{$edit_category_post->category_post_name}}" class="form-control" onkeyup="ChangeToSlug();" id="slug" placeholder="Tên danh mục">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Slug</label>
                                    <input type="text" name="category_post_slug" value="{{$edit_category_post->category_post_slug}}" class="form-control" id="convert_slug" placeholder="Slug">
                                </div>
                            
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả danh mục</label>
                                    <textarea style="resize: none" rows="8" class="form-control" name="category_post_desc" id="exampleInputPassword1" placeholder="Mô tả danh mục">{{$edit_category_post->category_post_desc}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Hiển thị</label>
                                      <select name="category_post_status" class="form-control input-sm m-bot15">
                                        @if($edit_category_post->category_post_status==1)
                                            <option selected value="1">Hiển thị</option>
                                            <option value="0">Ẩn</option>
                                        @else
                                             <option value="1">Hiển thị</option>
                                            <option selected value="0">Ẩn</option>
                                        @endif

                                            
                                    </select>
                                </div>
                               
                                <button type="submit" name="update_post_cate" class="btn btn-info">Cập nhật danh mục bài viết</button>
                                </form>
                            </div>
                    

                        </div>
                    </section>

            </div>
@endsection