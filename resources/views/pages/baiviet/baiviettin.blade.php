@extends('welcome')
@section('content')

<div class="features_items">
<h2 style="margin:0;position: inherit;font-size: 22px" class="title text-center">{{$meta_title}}</h2>
   
    <div class="product-image-wrapper" style="border: none;">
    @foreach($post_by_id as $key => $p)
        <div class="single-products" style="margin:10px 0;padding: 2px">
                {!!$p->post_content!!}
                
        </div>
        <div class="clearfix"></div>
    @endforeach
    </div>

</div><!--features_items-->
<h2 style="margin:0;font-size: 22px" class="title text-center">Bài viết liên quan</h2>
<style type="text/css">
ul.post_relate li {
    list-style-type: disc;
    font-size: 16px;
    padding: 6px;
}
ul.post_relate li a {
    color: #000;
}
ul.post_relate li a:hover {
    color: #FE980F;
}
</style>
<ul class="post_relate">
@foreach($related as $key => $post_relate)
    <li><a href="{{url('bai-viet/'.$post_relate->post_slug)}}">{{$post_relate->post_title}}</a></li>
@endforeach

</ul>   
@endsection