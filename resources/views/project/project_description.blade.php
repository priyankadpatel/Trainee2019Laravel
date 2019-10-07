@extends('layouts.app')

@section('content')

<div class="container">
   
    <div class="row justify-content-center">

        <div class="col-md-12">
          @guest
            @if (Route::has('login'))
            {{-- <a href="{{ url('/blog') }}"  class="nav-link text-right"><button type="button"class="btn btn-success " style="width: 100px;" disabled="disabled">Create Blog</button></a> --}}
            @endif  
      
            @else
            <a href="/project/project_edit"  class="nav-link text-right"><button type="button" style="width: 120px;" class="btn btn-success">Create Project</button></a>
          @endguest
        </div>

        <div class="col-md-12">
          
            @foreach ($project as $projects)
            {{-- id:{{ $projects->id}} --}}
           
        
        </div>
        
        <div class="col-md-12">
            <div class="row">
                    @foreach ($projects->projectimage as $image)
                    <div class="col-md-5">
                        <div class="thumbnail">
                        <a href="/images/project/{{ $image->image}}" target="_blank">
                            <img src="/images/project/{{ $image->image}}" alt="Lights" style="width:100%">
                        </a>
                        </div>
                    </div>
                    @endforeach  
            </div>
        </div>
        
        <div class="col-md-12">
            <span class="project">
                <h1>{{ $projects->project_name}}</h1>
            </span>
        </div>

        <div class="col-md-12">

          {{ $projects->description}}
        
        </div>
        
        <div class="detail" style="padding:100px">
          <div class="row">
            <div class="col-md-3">
              <h3>OWNER</h3>
              <h5> {{ $projects->owner}} </h5>
            </div>

            <div class="col-md-3">
              <h3>BUDGET</h3>
              <h5> {{ $projects->budget}} </h5>
            </div>

            <div class="col-md-3">
              <h3>START DATE</h3>
              <h5> {{ $projects->startdate}} </h5>
            </div>

            <div class="col-md-3">
              <h3>END DATE</h3>
              <h5> {{ $projects->enddate}} </h5>
            </div>
          </div>
        </div>
        
        <div class="col-md-12">
            @guest
            @if (Route::has('login'))
            {{-- <a href="{{ url('/blog') }}"  class="nav-link text-right"><button type="button"class="btn btn-success " style="width: 100px;" disabled="disabled">Create Blog</button></a> --}}
            @endif 
            @elseif(Auth::user()->id == $projects->user_id)
            <a href="/projectdelete/{{$projects->id}}" style="font-size: 20px;" class="nav-link ">Delete</a>
            @endguest
        </div>

    @endforeach  
        
     </div>
</div>
</div>
</section>
   
@endsection
