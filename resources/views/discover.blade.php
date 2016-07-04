@extends('template')

@section('title', 'homepage')
@section('banner')
    <div class="row banner no-gutters">
        <div class="col-md-3  col-sm-6 col-xs-6">
            <a href="discover/calendar">
                <img class="banner-img" src="imgs/banners/discover_1.png">
            </a>
        </div>
        <div class="col-md-3  col-sm-6 col-xs-6">
            <a href="discover/map">
                <img class="banner-img" src="imgs/banners/discover_2.png">
            </a>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-6">
            <a href="discover/newsletter">
                <img class="banner-img" src="imgs/banners/discover_3.png">
            </a>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-6">
            <a href="discover/social">
                <img class="banner-img" src="imgs/banners/discover_4.png">
            </a>
        </div>
    </div>
@endsection
@section('body')
    <div class="flash-message">
        @foreach (['danger', 'warning', 'success', 'info'] as $msg)
            @if(Session::has('alert-' . $msg))

                <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
            @endif
        @endforeach
    </div> <!-- end .flash-message -->
    <h1 class="fix-middle">this is the discover page of the site. Test!</h1>


@endsection