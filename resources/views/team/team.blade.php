@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row" id="card">

        <div class="col-sm-6 col-md-4 col-lg-3 mb-3">
            <div class="card">
                <img class="card-img-top" src="/images/team_image/1.jpeg" alt="Card image cap">
                <div class="card-body text-center">
                    <h5 class="card-title">Nahid Rizvi</h5>
                    <p class="card-text">Lead Developer</p>
                    <a href="view.php?id=${element.id}" class="btn btn-primary">Read More</a>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-md-4 col-lg-3 mb-3">
            <div class="card">
                <img class="card-img-top" src="/images/team_image/2.jpeg" alt="Card image cap">
                <div class="card-body text-center">
                    <h5 class="card-title">Himu Sharkar</h5>
                    <p class="card-text">Programmer</p>
                    <a href="view.php?id=${element.id}" class="btn btn-primary">Read More</a>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection