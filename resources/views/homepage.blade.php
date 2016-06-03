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
    <div class="row welcome">
        <h1 class="fix-middle">
           {{phpinfo()}};</h1>
    </div>



@endsection

