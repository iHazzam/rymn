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
    <div class="col-sm-6 col-md-4 foundation ">
        <a href="/play/groups"><section class="ht-box brder3"><div><span class="helper"></span><img src="/imgs/singing.jpg"></div></section>
        <h3 class="htb3">Find out why you should join an ensemble</h3></a>
    </div>
    <div class="col-sm-6 col-md-4 foundation">
        <a href="/play/join"><section class="ht-box  brder2"><div><span class="helper"></span><img src="/imgs/piano.jpg"></div></section>
        <h3 class="htb2">Browse North Yorkshire Groups!<br></h3></a>
    </div>
    <div class="col-sm-6 col-md-4 foundation  ">
        <a href="/play/advertise"><section class="ht-box brder4"><div><span class="helper"></span><img src="/imgs/strings.jpg"></div></section>
        <h3 class="htb4">Add your own ensemble to our database!</h3></a>
    </div>



@endsection