
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
  <img class="w3-image" src="/w3images/architect.jpg" alt="laravel logo" width="1500" height="800">
  <div class="w3-display-middle w3-margin-top w3-center">
    <h1 class="w3-xxlarge w3-text-white"><span class="w3-hide-small w3-text-light-grey">Laravel</span></h1>
  </div>
</header>

<!-- Page content -->
<div class="w3-content w3-padding" style="max-width:1564px">

  <!-- Project Section -->
  <div class="w3-container w3-padding-32" id="projects">
    <h3 class="w3-border-bottom w3-border-light-grey w3-padding-16">Projects</h3>
  </div>

  @foreach ($project as $projects)
        <div class="col-md-4">   
            <div class="card" style="width:250px;margin:15px;height: 250px">
                <img class="card-img-top" src="images/project/{{ $projects->projectimage[0]->image }}" alt="Card image" style="width:100%">     
            </div>
            
            <div class="card-body">      
                <a href="project/project_description/{{ $projects->id }}" class="card-link">{{ $projects->project_name }}</a>
            </div>
        </div>
  @endforeach
  {{ $project->links() }}

  <!-- Blog Section -->
  @foreach ($blog as $blogs)
  <div class="col-md-4">   
      <div class="card" style="width:250px;margin:15px;height: 250px">
          <img class="card-img-top" src="images/project/{{ $blogs->blog_image[0]->image }}" alt="Card image" style="width:100%">     
      </div>
      
      <div class="card-body">      
          <a href="project/project_description/{{ $blogs->id }}" class="card-link">{{ $blogs->blog_name }}</a>
      </div>
  </div>
  @endforeach
  {{ $blog->links() }}

  <!-- About Section -->
  <div class="w3-container w3-padding-32" id="about">
    <h3 class="w3-border-bottom w3-border-light-grey w3-padding-16">About</h3>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Excepteur sint
      occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
      laboris nisi ut aliquip ex ea commodo consequat.
    </p>
  </div>

  <div class="w3-row-padding w3-grayscale">
    <div class="w3-col l3 m6 w3-margin-bottom">
      <img src="/w3images/team2.jpg" alt="John" style="width:100%">
      <h3>John Doe</h3>
      <p class="w3-opacity">CEO & Founder</p>
      <p>Phasellus eget enim eu lectus faucibus vestibulum. Suspendisse sodales pellentesque elementum.</p>
    </div>
  </div>
  
<!-- Image of location/map -->
<div class="w3-container">
  <img src="/w3images/map.jpg" class="w3-image" style="width:100%">
</div>

<!-- Footer -->
<footer class="w3-center w3-black w3-padding-16">
        <p>Powered by <a href="https://www.w3schools.com/w3css/default.asp" title="W3.CSS" target="_blank" class="w3-hover-text-green">w3.css</a></p>
</footer>

</body>
</html>



@endsection 