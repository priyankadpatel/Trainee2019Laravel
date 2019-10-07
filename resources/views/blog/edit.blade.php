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
                @foreach ($blog as $blog)
                <form action = "/blogedit/{{ $blog->id}}" method = "post" enctype="multipart/form-data" class="needs-validation" novalidate>
                  @csrf
                  <input type="hidden" class="form-control" id="uname" placeholder="Enter username" value=" {{ Auth::user()->name }}" name="user_id" required>
                    <div class="form-group">
                        <label for="uname">Title:</label>
                        <input type="text" class="form-control" id="uname" placeholder="Enter username" value="{{ $blog->blog_name}}" name="blog_name" required>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Please fill out this field.</div>
                      </div>
                      <div class="form-group">
                        <label for="sel1">Category</label>
                        
                            
                        <select class="form-control" name="category_id" id="sel1">
                     
                          @foreach ($Categorys as $Category)
  
                                 <option value="{{ $Category->category_name}}" {{$blog->category_name==$Category->category_name?'selected="selected"':''}}>{{ $Category->category_name}}</option> 
                                             
                                @endforeach
                               
                         
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="uname">Image:</label>
                        {{ $blog->blog_image[0]->image}}
                        <input type="file" name="image[]"  class="form-control" id="uname" placeholder="Enter username" multiple required>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Please fill out this field.</div>
                      </div>

                      <div class="form-group">
                        <label for="uname">Description:</label>
                        <textarea class="form-control" id="uname" name="description">{{ $blog->description}}</textarea>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Please fill out this field.</div>
                      </div>
                 
                     
                     
                  
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
                  @endforeach
                </div>
                
                <script>
                // Disable form submissions if there are invalid fields
                (function() {
                  'use strict';
                  window.addEventListener('load', function() {
                    // Get the forms we want to add validation styles to
                    var forms = document.getElementsByClassName('needs-validation');
                    // Loop over them and prevent submission
                    var validation = Array.prototype.filter.call(forms, function(form) {
                      form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                          event.preventDefault();
                          event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                      }, false);
                    });
                  }, false);
                })();
                </script>
            </div>
        </div>
    </div>
</div>
@endsection
