@extends('template')

@section('title', 'homepage')

@section('body')

    <h3 class="fix-middle">Please feel free to browse the RYMN Events calendar or add an event! &nbsp; <a class="btn btn-warning" role="button" id="add_event" href="{{url('discover/add')}}"><i class="fa fa-plus-square" aria-hidden="true"></i>&nbsp;Add Event to RYMN</a></h3><br>
    <p>A few words of explanation. If you wish to publicise a formal concert, aiming at the general public and charging for tickets, then please register for and use the <a href="http://www.stcticketing.org/index.php?p=concert">North Yorkshire Music &amp;  Arts Events Diary . </a> This also serves as an “anti-clash” diary, so please refer to it when planning your events.
    </p>
    <p>
        This RYMN Events Diary is intended for publicising all sorts of other events, such as informal concerts and other performances, workshops, masterclasses, open rehearsals, play-days, competitions, festivals etc. In order to add events, you need to have <a href="{{url("play/advertise")}}">registered your group or organisation on this site. </a>
    </p>
    <div class="col-lg-12" id="centerme123_div">

        <iframe src="https://calendar.google.com/calendar/embed?showPrint=0&amp;height=600&amp;wkst=1&amp;bgcolor=%233366ff&amp;src=iemim1pip3o5hha070tjvt5q70%40group.calendar.google.com&amp;color=%236B3304&amp;ctz=Europe%2FLondon" style="border:solid 1px #777" width="800" height="600" frameborder="0" scrolling="no" id="centerme123"></iframe>

    </div>
@endsection