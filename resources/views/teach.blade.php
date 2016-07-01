@extends('template')

@section('title', 'homepage')
@section('banner')
    <div class="row banner no-gutters">
        <div class="col-md-6  col-sm-12 col-xs-12">
            <a href="teach/register">
                <img class="banner-img" src="imgs/banners/teach_1.png">
            </a>
        </div>
        <div class="col-md-6  col-sm-12 col-xs-12">
            <a href="teach/resources">
                <img class="banner-img" src="imgs/banners/teach_2.png">
            </a>
        </div>
    </div>
@endsection
@section('body')

    <h1 class="fix-middle">this is the teach page of the site. Test!</h1>


@endsection