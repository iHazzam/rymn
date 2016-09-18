@extends('template')

@section('title', 'homepage')

@section('banner')
    <div class="row banner no-gutters">
        <div class="col-md-3  col-sm-6 col-xs-6">
            <a href="learn">
                <img class="banner-img" src="imgs/banners/home_1.png">
            </a>
        </div>
        <div class="col-md-3  col-sm-6 col-xs-6">
            <a href="teach">
                <img class="banner-img" src="imgs/banners/home_2.png">
            </a>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-6">
            <a href="play">
                <img class="banner-img" src="imgs/banners/home_3.png">
            </a>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-6">
            <a href="discover">
                <img class="banner-img" src="imgs/banners/home_4.png">
            </a>
        </div>
    </div>
@endsection
@section('body')
    <div class="background_home">
    <div class="row welcome">
        <h1 class="fix-middle">
           Welcome to our Youth Music Network</h1>
    </div>
    <div class="row info-row col-md-offset-1 col-md-10">
        <p>
            The main purpose of this website is to provide as much help, encouragement, advice and information as possible for young people and parents across North Yorkshire about anything and everything to do with music and music education.</p>
        <h4 class="blackheader" >What is this site for?</h4>
        <p> You can find information, resources and invaluable advice from professionals in the local area. Just some of the topics that can be found on the site are: (click on the bullet point for more details)</p>
        <ul>
            <li><a href="learn">The importance and educational value of learning to play an instrument and to sing.</a></li>
            <li><a href="learn/instruments">How to choose the best instruments to learn.</a></li>
            <li><a href="learn/teachers">How to find good teachers.</a></li>
            <li><a href="learn/teacherdb">A database of teachers across the county</a></li>
            <li><a href="play/groups">Where to find opportunities to play with others – orchestras, ensembles, bands, choirs etc.</a></li>
            <li><a href="play/groups">As well as a list of groups recruiting players in the area</a></li>
            <li><a href="play/groups">“Find out about organisations offering opportunities and experience for young musicians.”</a></li>
            <li><a href="learn/purchase">Where to buy, rent or borrow an instrument.</a></li>
            <li><a href="learn/maintainace">Where to get an instrument repaired.</a></li>
            <li><a href="learn/exams">About the different exam boards and what exams are available and when.</a></li>
            <li><a href="learn/practice">How to practice effectively</a></li>
            <li><a href="learn/accompanists">How to find an accompanist.</a></li>
            <li><a href="discover/calendar">Check out and add to our own diary of musical events, activities and opportunities for young musicians.</a></li>
            <li><a href="discover/map">Or our interactive map of events in the area.</a></li>
            <li><a href="http://www.stcticketing.org/index.php?p=concert">Check out the North Yorkshire Music & Arts Events Diary, used by more than 70 different organisations to publicise concerts and other events in the region.</a></li>
            <li><a href="https://www.facebook.com/youth.music.network/?fref=ts">the RYMN Facebook Feed - a live page to get help, advice and much much more</a></li>


        </ul>
    </div>

    </div>
@endsection

@section('background-color','#e6f7ff')