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
            @auth
                <td><a href ='project/project_form'><button type="button" class="btn btn-outline-primary">Add Project</button></a></td>
            @else
               
            @endauth
        </div>
    @endif
    <div class="row justify-content-center">
        @foreach ($projectimage as $projectimages)
        <div class="col-md-4">
              
            <div class="card" style="width:250px;margin:15px">
                <img class="card-img-top" src="images/project/{{ $projectimages->projectimage[0]->image }}" alt="Card image" style="width:100%">     
            </div>
            
            <div class="card-body">      
                <a href="project/project_description/{{ $projectimages->id }}" class="card-link">{{ $projectimages->project_name }}</a>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection