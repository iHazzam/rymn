@extends('template')

@section('title', 'homepage')
@section('banner')
    <div class="row banner no-gutters">
        <div class="col-md-3  col-sm-6 col-xs-6">
            <a href="play/join">
                <img class="banner-img" src="imgs/banners/play_1.png">
            </a>
        </div>
        <div class="col-md-3  col-sm-6 col-xs-6">
            <a href="play/groups">
                <img class="banner-img" src="imgs/banners/play_2.png">
            </a>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-6">
            <a href="play/advertise">
                <img class="banner-img" src="imgs/banners/play_3.png">
            </a>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-6">
            <a href="discover/about">
                <img class="banner-img" src="imgs/banners/play_4.png">
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
    <h1 class="fix-middle">this is the learn page of the site. Test!</h1>



@endsection