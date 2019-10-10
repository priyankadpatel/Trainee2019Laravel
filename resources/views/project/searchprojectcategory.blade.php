@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="text-center">
            <h1 class="title">Projects</h1>
        </div>
      </div>
    </div>
</div>

<div class="container">
       
    @if (Route::has('login'))
        <div class="top-right links">     

            @guest
            @if (Route::has('login'))
            {{-- <a href="{{ url('/blog') }}"  class="nav-link text-right"><button type="button"class="btn btn-success " style="width: 100px;" disabled="disabled">Create Blog</button></a> --}}
            @endif  
      
            @else
            <a href="/project/project_edit"  class="nav-link text-right"><button type="button" style="width: 120px;" class="btn btn-success">Create Project</button></a>
            
          @endguest
        </div>
    @endif

    <nav class="navbar navbar-expand-sm bg-light justify-content-center">
        <ul class="navbar-nav">

            <li class="nav-item">
            <a class="nav-link" href="/project_home">All</a>
            </li>
           
                   
                    @foreach ($projectcategorys as $projectcategory)
                   
                        <a class="nav-link" href="/project_home/{{ $projectcategory->category_name}}">{{ $projectcategory->category_name}}</a>
                        
                       @endforeach 
                          
        </ul>
                 
         
    </nav>

    <div class="row justify-content-center">
            @foreach ($projectimage as $projectimages)
        <div class="col-md-4">
              
            <div class="card" style="width:250px;margin:15px;height: 250px">
                <img class="card-img-top" src="/images/project/{{ $projectimages->projectimage[0]->image }}" alt="Card image" style="width:100%">     
            </div>
            
            <div class="card-body">      
                <a href="project/project_description/{{ $projectimages->id }}" class="card-link">{{ $projectimages->project_name }}</a>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection



@if (session('alert'))
    <div class="alert alert-danger">
        {{ session('alert') }}
    </div>
@endif
    
    