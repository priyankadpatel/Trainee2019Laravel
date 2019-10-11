@extends('layouts.app')

@section('content')

<div class="container">
        {{-- @include('home.sidebar') --}}

       @include('home.sidebar')
       
    <div class="wrap">
                
                <section class="content"> 

    <div class="row justify-content-center">
        <div class="col-md-8">
   
                    
                    <a href="{{ url('/blog') }}"  class="nav-link text-right"><button type="button"  class="btn btn-success " >Create Blog</button></a>
          
                    @if (count($blog) > 0)

                    @foreach ($blog as $blogs)
                    <img src="images/blog_image/{{ $blogs->blog_image[0]->image}}" width="500px" alt="">
                  
                   <h2>{{ $blogs->blog_name}}</h2>

                   
                <span class="blog">
                    <ul style="list-style-type: none; overflow: hidden; margin: 10px; padding: 0;">
                        <li style=" float: left;margin-right:50px; color:darkorange; ">{{ $blogs->user_name}}</li>
                        <li class="leftspan" style="color:crimson; float: left;" >{{ date('d-M-Y', strtotime($blogs->created_at)) }}</li>
                    </ul>
                </span>
               
                     
                  <span >{!! str_limit($blogs->description, 250) !!}</span> 
                   <a href="/blogdetails/{{$blogs->id}}" style="font-size: 20px;" class="nav-link ">Read More....</a>
                    <hr>
                    @endforeach
                    {{ $blog->links() }}
                    @else

                    <h2>No Results Found</h2>
                                    @endif

                
                                    
        </div>
    </div>

                </section>
            </div>
            

</div>
@endsection
