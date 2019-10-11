@extends('layouts.app')

@section('content')
<div class="container">

    <form method="POST" action="/team/teaminsert" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">Name:</label>
            <div class="col-sm-6">
            <input type="text" class="form-control" id="name" name="name" placeholder="Name">
            </div>
        </div>
        
        <div class="form-group row">
            <label for="designation" class="col-sm-2 col-form-label">Designation:</label>
            <div class="col-sm-6">
            <input type="text" class="form-control" name="designation" id="designation" placeholder="Designation">
            </div>
        </div>
        
        <div class="form-group row">
            <label for="image" class="col-sm-2 col-form-label">Image:</label>
            <div class="col-sm-6">
            <input type="file" class="form-control" name="image" id="image" placeholder="Image">
            </div>
        </div>

        <div class="form-group row">
            <label for="description" class="col-sm-2 col-form-label">Description:</label>
            <div class="col-sm-6">
            <input type="text" class="form-control" name="descriptions" id="descriptions" placeholder="Description">
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-2">
            <input type="submit" class="btn btn-primary btn-lg active" value="Submit" name="submit" id="submit">
            </div>
        </div>
    </div>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

</div>
@endsection