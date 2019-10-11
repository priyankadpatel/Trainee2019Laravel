@extends('layouts.app')

@section('content')
<div class="container">
    <a href="/team/teaminsert" class="btn btn-success btn-lg active" role="button" aria-pressed="true">Add Team Member</a>
    <div class="row mt-3">
        @foreach($data as $team)
        <div class="col-sm-6 col-md-4 col-lg-3 mb-3">
            <div class="card">
                <div class="card-img"  style="width:200px; height:200px; margin:0 auto; text-align:center; overflow:hidden;">
                    <img class="card-img-top" src="/images/team_image/{{$team->image}}" alt="Team Member">
                </div>
                <div class="card-body text-center">
                    <h5 class="card-title">{{$team->name}}</h5>
                    <p class="card-text">{{$team->designation}}</p>
                    <a href="{{url('/team/teammember/'.$team->id)}}" class="btn btn-primary">Read More</a>
                </div>
            </div>
        </div>
        @endforeach

    </div>
</div>
@endsection