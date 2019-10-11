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