@extends('layouts.app')

@section('content')

<div class="container">
        {{-- @include('home.sidebar') --}}

        <aside class="sidebar">
                <form class="navbar-form navbar-left" action="{{ URL::to('search') }}" method="POST">
                        {{ csrf_field() }}
                      <div class="input-group">
                            <input type="text" id="search" name="search" class="form-control" placeholder="Search Blog">
                            <span class="input-group-btn">
                                <button type="submit" class="btn btn-default">
                                 <span class="glyphicon glyphicon-search">search</span>
                                 </button>
                          </span>
                      </div>
                    </form>
                
                <div class="vertical-menu">
                <h4 style="margin-top: 35px;">Categorys</h4>
                        @if (count($Categorys) > 0)
                        @foreach ($Categorys as $Category)
                       
                            <a href="/Category-blog/{{ $Category->category_name}}">{{ $Category->category_name}}</a>
                            
                           @endforeach 
                           @else
        
            <h6>No Results Found</h6>
                        @endif
                  </div>
                   </aside>
        <div class="wrap">
                
                <section class="content"> 

    <div class="row justify-content-center">
        <div class="col-md-8">
   
                    
                    <a href="{{ url('/blog') }}"  class="nav-link text-right"><button type="button"  class="btn btn-success " >Create Blog</button></a>
          
                    @if (count($blog) > 0)
                    @foreach ($blog as $blog)
                    <img src="images/blog_image/{{ $blog->blog_image[0]->image}}" width="500px" alt="">
                  
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
