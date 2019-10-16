@extends('layouts.app')

@section('content')
<div class="container">

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    
    <form method="POST" action="/team/teamedit" enctype="multipart/form-data">
        {{ csrf_field() }}
        <input type="hidden" name="team_id" value="{{$data[0]->id}}">
        <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">Name:</label>
            <div class="col-sm-6">
            <input type="text" class="form-control" value="{{$data[0]->name}}" name="name" id="name" placeholder="Name">
            </div>
        </div>

        <div class="form-group row">
            <label for="designation" class="col-sm-2 col-form-label">Designation:</label>
            <div class="col-sm-6">
            <input type="text" class="form-control" value="{{$data[0]->designation}}" name="designation" id="designation" placeholder="Designation">
            </div>
        </div>
        
        <div class="form-group row">
            <label for="image" class="col-sm-2 col-form-label">Image:</label>
            <div class="col-sm-6">
            <input type="file" class="form-control" value="/images/team_image/{{$data[0]->image}}" name="image" id="image" placeholder="Image">
            <img src="/images/team_image/{{$data[0]->image}}" name="image" style="height:100px; width:100px" alt="img not found">
            </div>
        </div>
        
        <div class="form-group row">
            <label for="description" class="col-sm-2 col-form-label">Description:</label>
            <div class="col-sm-6">
            <textarea id="description" type="description" name="description">{{$data[0]->description}}</textarea>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-2">
            <input type="submit" class="btn btn-info btn-lg active" value="Update" name="submit" id="submit">
            </div>
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
@endsection