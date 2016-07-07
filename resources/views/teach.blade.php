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
    <h3 class="fix-middle" id="underline">Calling all music teachers!</h3>
    <div class="row info-row col-md-offset-1 col-md-10">
        <h4><strong>How can RYMN help you, and how can you help RYMN?</strong></h4>
        <p>Welcome to the Teachers section of RYMN. This will allow you to register for the site, to indicate if you teach, what you teach and allow you to find potential new students as well as network with other teachers</p>
        <p>By signing up, you agree to have your personal information stored on our server. This can be requested by users at the click of the button. Any secure data (Email and Phone numbers) will not be stored in plain-text anywhere on the site.</p>
        <p>By signing up, you add your name to a growing network of professionals and allow RYMN to contact you with helpful news and events. You can unsubscribe from emails at any time, and the service will always be free to use.</p>
    </div>
@endsection