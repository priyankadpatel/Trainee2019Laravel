@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
      <div class="col-lg-12">
        {{-- @foreach ($projectimage as $projectimages)
        <div class="text-center">
            <h1 class="title">{{ $projectimages->project_name }}</h1>

        </div>
        @endforeach --}}

        <div class="row justify-content-center">
          {{-- @foreach ($projectimage as $projectimages) --}}
          <div class="col-md-4">
                
            
            <div class="card" style="width:250px;margin:15px">
                <img class="card-img-top" src="images/project/{{ $projectimages->image }}" alt="Card image" style="width:100%">     
            </div>
            
              
              {{-- <div class="card-body">      
                  <a href="project/project_description/{{ $projectimages->id }}" class="card-link">{{ $projectimages->project_name }}</a>
              </div> --}}
          </div>
          {{-- @endforeach --}}
      </div>

      </div>
    </div>
</div>

@endsection