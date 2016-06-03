@extends('template')

@section('title', 'homepage')
@section('banner')
    <div class="row banner no-gutters">
        <div class="col-md-3  col-sm-6 col-xs-6">
            <a href="learn">
                <img class="banner-img" src="imgs/placeholder.png">
            </a>
        </div>
        <div class="col-md-3  col-sm-6 col-xs-6">
            <a href="teach">
                <img class="banner-img" src="imgs/placeholder.png">
            </a>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-6">
            <a href="play">
                <img class="banner-img" src="imgs/placeholder.png">
            </a>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-6">
            <a href="discover">
                <img class="banner-img" src="imgs/placeholder.png">
            </a>
        </div>
    </div>
@endsection
@section('body')

    <h1 class="fix-middle">this is the learn page of the site. Test!</h1>


@endsection