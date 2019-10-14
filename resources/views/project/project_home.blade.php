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
       
        <div class="top-right links" style="display: flow-root;" > 

                @guest
                @if (Route::has('login'))
                @endif  
          
                @else
                <a href="/project/project_edit" style="display: contents;"  class="nav-link"><button type="button" style="width: 150px;" class="btn btn-success">Create Project</button></a>
                
              @endguest
                <form class="navbar-form navbar-left" action="/search" style="float: right;" method="POST">
                        {{ csrf_field() }}
                      <div class="input-group" style="width: fit-content; ">
                            <input type="text" name="search" class="form-control" placeholder="Search Project">
                            <span class="input-group-btn">
                                <button type="submit" class="btn btn-default" style="background-color: black; color: antiquewhite; ">
                                 <span class="glyphicon glyphicon-search">search</span>
                                 </button>
                          </span>
                      </div>
                    </form>     
             
            
      
    </div>

    
    <nav class="navbar navbar-expand-sm bg-light justify-content-center">
        
        <ul class="navbar-nav">
            <li class="nav-item">
            <a class="nav-link" href="project_home">All</a>
            </li>        
           
                    @foreach ($projectcategorys as $projectcategory)
                        <a class="nav-link" href="/project_home/{{ $projectcategory->category_name}}">{{ $projectcategory->category_name}}</a>    
                    @endforeach 
            
        </ul>
       
    </nav>
   

    <div class="row justify-content-center">
        @if (count($projectimage) > 0)
        @foreach ($projectimage as $projectimages)
        <div class="col-md-4">   
            <div class="card" style="width:250px;margin:15px;height: 250px">
                <img class="card-img-top" src="images/project/{{ $projectimages->projectimage[0]->image }}" alt="Card image" style="width:100%; margin: auto; height: inherit;">     
            </div>
            
            <div class="card-body">      
                <a href="project/project_description/{{ $projectimages->id }}" class="card-link">{{ $projectimages->project_name }}</a>
            </div>
        </div>
        @endforeach
        
        @else
            <h6>No Results Found</h6>
        @endif
    </div>

    <div class="row" style="float: right;">
        {{ $projectimage->links() }}
    </div>
    
</div>

@endsection



@if (session('alert'))
    <div class="alert alert-danger">
        {{ session('alert') }}
    </div>
@endif
    
    