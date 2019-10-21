@extends('layouts.app')

@section('content')

<div class="container">
    

       @include('home.newscategorysidebar')
       
    <div class="wrap">
                
                <section class="content"> 

    <div class="row justify-content-center">
        <div class="col-md-8">
   
                    
                    <a href="{{ url('/news') }}"  class="nav-link text-right"><button type="button"  class="btn btn-success " >Create news</button></a>
          
                    @if (count($news_result) > 0)

                    @foreach ($news_result as $news)
                    <?php //    echo"<pre>"; print_r($news->news_image[0]->image); exit; ?>
                    @if(!empty($news->news_image[0]->image))
                    <img src="/images/news_image/{{ $news->news_image[0]->image}}" width="500px" alt="">
                    @endif
                   <h2>{{ $news->news_title}}</h2>

                   
                <span class="blog">
                    <ul style="list-style-type: none; overflow: hidden; margin: 10px; padding:;">
                        <li style=" float: left;margin-right:50px; color:darkgreen; ">{{ $news->user_name}}</li>
                        <li class="leftspan" style="color:darkblack; float: left;" >{{ date('d-M-Y', strtotime($news->created_at)) }}</li>
                    </ul>
                </span>
               
                     
                  <span >{!! str_limit($news->description, 250) !!}</span> 
                   <a href="/news/details/{{$news->id}}" style="font-size: 20px;" class="nav-link ">Read More....</a>
                    <hr>
                    @endforeach
                    {{ $news_result->links()}}
                    @else

                    <h2>No Results Found</h2>
                                    @endif

                
                                    
        </div>
    </div>

                </section>
            </div>
            

</div>
@endsection
