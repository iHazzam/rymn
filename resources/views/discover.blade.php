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
    <div class="col-sm-6 col-md-4 foundation ">
        <a href="http://rymn.dev/discover/map"><section class="ht-box brder3"><div><span class="helper"></span><img src="/imgs/banners/googlemaps_500.png"></div></section>
            <h3 class="htb3">Find our events on google maps</h3></a>
    </div>
    <div class="col-sm-6 col-md-4 foundation">
        <a href="https://www.facebook.com/youth.music.network/?fref=ts"><section class="ht-box  brder2"><div><span class="helper"></span><img src="/imgs/banners/facebook_500.png"></div></section>
            <h3 class="htb2">Check our facebook page<br></h3></a>
    </div>
    <div class="col-sm-6 col-md-4 foundation  ">
        <a href="http://www.stcticketing.org/index.php?p=concert"><section class="ht-box brder4"><div><span class="helper"></span><img src="/imgs/banners/eventsdiary_500.png"></div></section>
            <h3 class="htb4">Or check the North Yorkshire Music and Arts Events Diary!</h3></a>
    </div>




@endsection