@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                @if (count($errors) > 0)
                <div class="alert alert-danger">
                 
                  <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                  </ul>
                </div>
                @endif 
                <form action = "news/create" method = "post" enctype="multipart/form-data" class="needs-validation" novalidate>
                  @csrf
                  <input type="hidden" class="form-control" id="uname" placeholder="Enter username" value="{{ Auth::user()->name }}" name="user_id" required>
                    <div class="form-group">
                        <label for="news_title">Title:</label>
                        <input type="text" class="form-control" id="news_title" placeholder="Enter News Title" name="news_title" required>
                       
                      </div>
                  
                      <div class="form-group">
                        <label for="sel1">Category</label>
                        <select class="form-control" name="category_id" id="sel1">
                            <option>Select Category </option>
                            @foreach ($Categorys as $Category)
                                <option value="{{ $Category->category_name}}">{{ $Category->category_name}}</option>
                               
                                 
                                @endforeach
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="uname">Image:</label>
                        <input type="file" name="image[]"  class="form-control" id="uname" placeholder="Enter username" multiple required>
                     
                      </div>
                   
                    
                     
                      <div class="form-group">
                        <label for="uname">Description:</label>
                        <textarea class="form-control" id="editor" name="description"></textarea>
                        
                      </div> 
                 
                      <script>
                        CKEDITOR.replace( 'description' );
                        </script>




                  
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
                </div>
            
            </div>
        </div>
    </div>
</div>
@endsection

