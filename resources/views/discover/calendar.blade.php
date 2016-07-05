@extends('template')

@section('title', 'homepage')

@section('body')

    <h3 class="fix-middle">Please feel free to browse the RYMN Events calendar, or, add an event! &nbsp; <a class="btn btn-warning" role="button" id="add_event" href="{{url('discover/add')}}"><i class="fa fa-plus-square" aria-hidden="true"></i>&nbsp;Add Event to RYMN</a></h3><br>
    <div class="col-lg-12" id="centerme123_div">

        <iframe src="https://calendar.google.com/calendar/embed?showPrint=0&amp;height=600&amp;wkst=1&amp;bgcolor=%233366ff&amp;src=iemim1pip3o5hha070tjvt5q70%40group.calendar.google.com&amp;color=%236B3304&amp;ctz=Europe%2FLondon" style="border:solid 1px #777" width="800" height="600" frameborder="0" scrolling="no" id="centerme123"></iframe>

    </div>
@endsection