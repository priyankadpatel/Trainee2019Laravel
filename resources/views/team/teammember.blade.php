@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <img src="/images/team_image/{{$data[0]->image}}" width="25%" alt="{{$data[0]->image}}not found">
        </div>
        <div class="col-12 mt-3">
            <h5>Name: {{$data[0]->name}}</h5>
            <p>Designation: {{$data[0]->designation}}</p>
            <p>Description: {{$data[0]->description}}</p>
        </div>
        <div class="col-12 m-4">
            @guest
                @if (Route::has('login'))
                @endif  
                
            @else
                <a href="/team/teamedit/{{$data[0]->id}}" title='Edit Record' data-toggle='tooltip'><span class="fa fa-edit fa-2x" aria-hidden="true"></span></a>
                <a href="/team/teamremove/{{$data[0]->id}}" title='Remove Record' data-toggle='tooltip'><span class="fa fa-trash fa-2x" aria-hidden="true"></span></a>
            @endguest
        </div>
    </div>
</div>
@endsection

@if (session('alert'))
    <div class="alert alert-danger">
        {{ session('alert') }}
    </div>
@endif