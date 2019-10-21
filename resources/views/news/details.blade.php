@extends('layouts.app')

@section('content')

<div class="container">
   
  @include('home.newscategorysidebar')
        <div class="wrap">
                
                <section class="content"> 

    <div class="row justify-content-center">
        <div class="col-md-8">
   
                    @guest
                    @if (Route::has('login'))
                    {{-- <a href="{{ url('/news') }}"  class="nav-link text-right"><button type="button"class="btn btn-success " style="width: 100px;" disabled="disabled">Create News</button></a> --}}
                    @endif  

                    @else
                    <a href="{{ url('/news') }}"  class="nav-link text-right"><button type="button"  class="btn btn-success " >Create News</button></a>
                    @endguest
 
                    @foreach ($news_detail as $news)
             <div class="row">
                        @foreach ($news->news_image as $image)
                        <div class="col-md-4">
                          <div class="thumbnail">
                            <a href="/images/news_image/{{ $image->image}}" target="_blank">
                              <img src="/images/news_image/{{ $image->image}}" alt="Lights" style="width:100%">
                            
                            </a>
                          </div>
                        </div>
                        @endforeach  
                      </div>
                      <h2 style="mar">{{ $news->news_title}}</h2>
                            
    
            <span class="blog">
                <ul style="list-style-type: none; overflow: hidden; margin: 10px; padding: 0;">
                    <li style=" float: left;margin-right:50px; color:darkorange; ">{{ $news->user_name}}</li>
                    <li class="leftspan" style="color:crimson; float: left;" >{{ date('d-M-Y', strtotime($news->created_at)) }}</li>
                </ul>
            </span> 
                    {!!$news->description!!}
                    @guest
                    @if (Route::has('login'))
                    {{-- <a href="{{ url('/news') }}"  class="nav-link text-right"><button type="button"class="btn btn-success " style="width: 100px;" disabled="disabled">Create Blog</button></a> --}}
                    @endif  

                    @elseif( Auth::user()->name == $news->user_name)
                    <a href="/news/edit/{{$news->id}}" style="font-size: 20px;" class="nav-link ">Edit</a>
                    <a href="/news/delete/{{$news->id}}" style="font-size: 20px;" class="nav-link ">Delete</a>

                    
                    @endguest

                    
                 
                     @endforeach    
                     </div>
                </div>
            
     </div>
</div>
</div>
</section>
@endsection
