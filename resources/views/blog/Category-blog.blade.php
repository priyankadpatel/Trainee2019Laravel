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
                @foreach ($blog as $blog)
                <img src="/images/blog_image/{{ $blog->blog_image[0]->image}}" width="500px" alt="">
              
               <h2>{{ $blog->blog_name}}</h2>

               
               <span class="blog">
                    <ul style="list-style-type: none; overflow: hidden; margin: 10px; padding: 0;">
                        <li style=" float: left;margin-right:50px; color:darkorange; ">{{ $blog->user_name}}</li>
                        <li class="leftspan" style="color:crimson; float: left;" >{{ date('d-M-Y', strtotime($blog->created_at)) }}</li>
                    </ul>
                </span>
                 
              <span >{{ str_limit($blog->description, 250) }}</span> 
               <a href="/blogdetails/{{$blog->id}}" style="font-size: 20px;" class="nav-link ">Read More....</a>
                <hr>
                @endforeach
     
         

            
     
    </div>
    @else

<h2>No Results Found</h2>
                @endif
                  

        </div>        
    </div>

                </section>
            </div>
            

</div>

@endsection
