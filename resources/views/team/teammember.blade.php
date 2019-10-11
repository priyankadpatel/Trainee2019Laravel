@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <img src="/images/team_image/{{$data[0]->image}}" width="25%" alt="Team Member">
        </div>
        <div class="col-12 mt-3">
            <h5>Name: {{$data[0]->name}}</h5>
            <p>Designation: {{$data[0]->designation}}</p>
            <p>Description: {{$data[0]->description}}</p>
        </div>
    </div>
</div>
@endsection