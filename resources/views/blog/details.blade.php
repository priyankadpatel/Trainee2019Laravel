@extends('layouts.app')

@section('content')

<div class="container">
   
  @include('home.sidebar')
        <div class="wrap">
                
                <section class="content"> 

    <div class="row justify-content-center">
        <div class="col-md-8">
   
                    @guest
                    @if (Route::has('login'))
                    {{-- <a href="{{ url('/blog') }}"  class="nav-link text-right"><button type="button"class="btn btn-success " style="width: 100px;" disabled="disabled">Create Blog</button></a> --}}
                    @endif  

                    @else
                    <a href="{{ url('/blog') }}"  class="nav-link text-right"><button type="button"  class="btn btn-success " >Create Blog</button></a>
                    @endguest
 
                    @foreach ($blog as $blogs)
             <div class="row">
                        @foreach ($blogs->blog_image as $image)
                        <div class="col-md-4">
                          <div class="thumbnail">
                            <a href="/images/blog_image/{{ $image->image}}" target="_blank">
                              <img src="/images/blog_image/{{ $image->image}}" alt="Lights" style="width:100%">
                            
                            </a>
                          </div>
                        </div>
                        @endforeach  
                      </div>
                      <h2 style="mar">{{ $blogs->blog_name}}</h2>
                  
            {{-- <img src="/images/blog_image/{{ $image->image}}" class="img-thumbnail" alt="Cinque Terre" width="304" height="236"> --}}

        
                   
    
            <span class="blog">
                <ul style="list-style-type: none; overflow: hidden; margin: 10px; padding: 0;">
                    <li style=" float: left;margin-right:50px; color:darkorange; ">{{ $blogs->user_name}}</li>
                    <li class="leftspan" style="color:crimson; float: left;" >{{ date('d-M-Y', strtotime($blogs->created_at)) }}</li>
                </ul>
            </span> 
                    {!!$blogs->description!!}
                    @guest
                    @if (Route::has('login'))
                    {{-- <a href="{{ url('/blog') }}"  class="nav-link text-right"><button type="button"class="btn btn-success " style="width: 100px;" disabled="disabled">Create Blog</button></a> --}}
                    @endif  

                    @elseif( Auth::user()->name == $blogs->user_name)
                    <a href="/blogedit/{{$blogs->id}}" style="font-size: 20px;" class="nav-link ">Edit</a>
                    <a href="/blogdelete/{{$blogs->id}}" style="font-size: 20px;" class="nav-link ">Delete</a>

                    
                    @endguest

                    
                  <hr>
                    <h4>comment</h4>
                    <hr>
                    @foreach ($blog_comment as $comments)
                   
                      @foreach ($comments->comment as $comment)
                     
                     
                   {{ $comment->comment}}
                   <span style="margin-left: 40px;">
                   <img src="/images/user.png" width="30px" alt="">
                   {{ $comment->name}}
                      </span> 
                      <hr>
                    @endforeach  
                    
                    @endforeach
                    <hr>
                     @endforeach    
                     </div>
                </div>
            
     </div>
</div>
</div>
</section>
<div class="container contact-form">
        @if (count($errors) > 0)
        <div class="alert alert-danger">
         
          <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
        @endif
    <form method="post" action="/comment">
            <h3>comments</h3>
            @csrf
       <div class="row">
            <div class="col-md-6">
                    <div class="form-group">
                            <input type="hidden" name="blog_id" class="form-control" placeholder="Your Name *" value="{{ $blogs->id}}"/>
                        </div>
                <div class="form-group">
                    <input type="text" name="name" class="form-control" placeholder="Your Name *" value="" />
                </div>
                <div class="form-group">
                    <input type="text" name="email" class="form-control" placeholder="Your Email *" value="" />
                </div>
                
                    <div class="form-group">
                        <textarea name="comment" class="form-control" placeholder="Your Message *" style="width: 100%; height: 150px;"></textarea>
                    </div>
                
                <div class="form-group">
                    <input type="submit" name="btnSubmit" class="btnContact" value="Send Message" />
                </div>
            </div>
           
        </div>
    </form>
</div>
@endsection
