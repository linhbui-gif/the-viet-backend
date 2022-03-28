@php
$link = '';
$src = '';
   if($isblog){
       $link = route('new.newDetail',['slug'=>$data->slug]);
       $src =  $data->url_picture;
   }
  else{
      $link = "#";
      $src =  $data->picture;
  }
@endphp

<div class="blog-wrapper mb-30 news-item">
    <div class="blog-img">
        <a href="{{  $link  }}">
<<<<<<< HEAD
            <img width="100%" class="lazy" data-src="{{  $src }}" alt="{{$data->name}}">
=======
            <img width="100%" src="{{  $src }}" alt="{{$data->name}}">
>>>>>>> a6161ca74c792b711484149921340ca40ec1ec76
        </a>
        <p class="category-news">
          {{@$data->category->name}}
        </p>
    </div>
    <div class="blog-text">
        <h4><a href="{{  $link  }}">{{$data->name}}</a></h4>
        <p>{!! $data->description !!}</p>
        <a href="{{  $link  }}">Đọc tiếp <i class="ri-arrow-right-line"></i></a>
        <div class="blog-meta">
            <span> <i class="las la-calendar"></i> {{date_format($data->updated_at,'d/m/Y')}}</span>

        </div>
    </div>
</div>
