
        @extends('layouts.app')

        @section('content')
        {{-- <div class="container">
        <img src="images/cover.png" class="img-fluid" width="100%"  alt="Responsive image">
        </div> --}}
        
        
<!DOCTYPE html>
<html>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<body>


<!-- Header -->
<header class="w3-display-container w3-content w3-wide" style="max-width:1500px;" id="home">
  <img class="w3-image" src="/images/website_logo.jpg" alt="laravel logo" width="1500" height="800">
</header>

<!-- Page content -->
<div class="w3-content w3-padding" style="max-width:1564px; ">
{{-- background-image:url(/images/bg8.jpg);background-attachment: fixed; background-repeat: no-repeat;background-size: cover; --}}

  <!-- Project Section -->
  <div class="w3-container w3-padding-32" id="projects">
    <h2 class="w3-border-bottom w3-border-light-grey w3-padding-16 text-center">Projects</h2>
  </div>

  <div class="row justify-content-center ">
@if (count($project) > 0)
  @foreach ($project as $projects)
        <div class="col-md-4">   
            <div class="card" style="width:250px;margin:15px;height: 250px">
                <img class="card-img-top" src="images/project/{{ $projects->projectimage[0]->image }}" alt="Card image" style="width:100%;margin: auto; height: inherit;">     
            </div>
            
            <div class="card-body">      
                <a href="project/project_description/{{ $projects->id }}" class="card-link" style="text-decoration: underline;">{{ $projects->project_name }}</a>
            </div>
        </div>
  @endforeach
  {{-- {{ $project->links() }} --}}
  @else
  <h6>No Results Found</h6>
@endif
</div>
  <!-- Blog Section -->
   
   <div class="w3-container w3-padding-32" id="projects">
      <h2 class="w3-border-bottom w3-border-light-grey w3-padding-16 text-center" >Blogs</h2>
   </div>

   <div class="row justify-content-center">
      @if (count($blog) > 0)
  @foreach ($blog as $blogs)
  <div class="col-md-4">   
      <div class="card" style="width:250px;margin:15px;height: 250px">
          <img class="card-img-top" src="images/blog_image/{{ $blogs->blog_image[0]->image }}" alt="Card image" style="width:100%;margin: auto; height: inherit;">     
      </div>
      
      <div class="card-body">  
          
          <a href="/blogdetails/{{$blogs->id}}" class="card-link" style="text-decoration: underline;">{{ $blogs->blog_name }}</a>
      </div>
  </div>
  @endforeach
 
  @else
  <h6>No Results Found</h6>
@endif
</div>

  <!-- Team Section -->
  <div class="w3-container w3-padding-32" id="projects">
      <h2 class="w3-border-bottom w3-border-light-grey w3-padding-16 text-center">Teams</h2>
    </div>
  
    <div class="row justify-content-center">
  @if (count($team) > 0)
    @foreach ($team as $teams)
          <div class="col-md-4">   
              <div class="card" style="width:250px;margin:15px;height: 250px">
                  <img class="card-img-top" src="images/team_image/{{$teams->image}}" alt="Card image" style="width:100%;margin: auto; height: inherit;">     
              </div>
              
              <div class="card-body">      
                  <a href="team/teammember/{{$teams->id}}" class="card-link">{{$teams->name}}</a>
              </div>
          </div>
    @endforeach
    {{-- {{ $project->links() }} --}}
    @else
    <h6>No Results Found</h6>
  @endif
  </div>
  
<!-- Image of location/map -->
<div class="mapouter">
  <div class="gmap_canvas">
    <iframe width="100%" height="400" id="gmap_canvas" src="https://maps.google.com/maps?q=byteparity&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
  </div>
</div>

<!-- Footer -->
<footer class="w3-center w3-black w3-padding-16">
        <p>Powered by <a href="https://laravel.com" title="laravel" target="_blank" class="w3-hover-text-green">Bytepariy Traniee</a></p>
</footer>

</body>
</html>



@endsection 