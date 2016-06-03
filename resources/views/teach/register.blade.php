@extends('template')

@section('title', 'homepage')

@section('body')

    <div class="row">
        <div class="col-lg-offset-2 col-lg-8">
            <div class="panel panel-default" >
                <div class="panel-heading" id="pink-panel">
                    <h3 class="panel-title">Enter match details here!</h3>
                </div>
                <div class="panel-body">
                    <form name="basicform" id="basicform" method="post" action="/postmatch">
                        {!! csrf_field() !!}
                        <div id="sf1" class="frm">
                            <fieldset>
                                <legend>Step 1 of 3</legend>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label" for="player1">On the blue team!</label>
                                    <div class="col-lg-7">
                                        <select placeholder="First player's name" id="player1" name="player1" class="form-control">

                                            @foreach($users as $user)
                                                <option value="{{$user->nickname}}">
                                                    {{$user->nickname}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <br />
                                <br />
                                <div class="form-group">
                                    <label class="col-lg-2 control-label" for="player2">On the orange team!</label>
                                    <div class="col-lg-7">
                                        <select placeholder="Second player's name" id="player2" name="player2" class="form-control">
                                            @foreach($users as $user)
                                                <option value="{{$user->nickname}}">
                                                    {{$user->nickname}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="clearfix" style="height: 10px;clear: both;"></div>

                                <div class="form-group">
                                    <div class="col-lg-10 col-lg-offset-2">
                                        <button class="btn btn-primary open1" type="button">Next <span class="fa fa-arrow-right"></span></button>
                                    </div>
                                </div>

                            </fieldset>
                        </div>

                        <div id="sf2" class="frm" style="display: none;">
                            <fieldset>
                                <legend>Step 2 of 3</legend>

                                <div class="form-group">
                                    <label class="col-lg-12 control-label" for="numberofmatches">How many matches did you play?</label>
                                    <div class="col-lg-6">
                                        <input type="number" min="1" max="9" placeholder="1" id="numberofmatches" name="numberofmatches" class="form-control">
                                    </div>
                                </div>

                                <div class="clearfix" style="height: 10px;clear: both;"></div>



                                <div class="clearfix" style="height: 10px;clear: both;"></div>

                                <div class="form-group">
                                    <div class="col-lg-10 col-lg-offset-2">
                                        <button class="btn btn-warning back2" type="button"><span class="fa fa-arrow-left"></span> Back</button>
                                        <button class="btn btn-primary open2" type="button">Next <span class="fa fa-arrow-right"></span></button>
                                    </div>
                                </div>

                            </fieldset>
                        </div>

                        <div id="sf3" class="frm" style="display: none;">
                            <fieldset>
                                <legend>Step 3 of 3</legend>

                                <legend>Matches</legend>
                                <div class="form-group">
                                    <label class="col-lg-12"> Please enter the scores of the matches below</label>
                                </div>

                                <br />
                                <div id="container" class="col-lg-12">

                                    <!-- this is where the games go -->


                                </div>

                                <div class="clearfix" style="height: 10px;clear: both;"></div>

                                <div class="form-group">
                                    <div class="col-lg-10 col-lg-offset-2">
                                        <button class="btn btn-warning back3" type="button"><span class="fa fa-arrow-left"></span> Back</button>
                                        <button class="btn btn-primary open3" type="submit">Submit </button>
                                        <img src="spinner.gif" alt="" id="loader" style="display: none">
                                    </div>
                                </div>

                            </fieldset>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection