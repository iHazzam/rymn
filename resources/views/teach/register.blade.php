@extends('template')

@section('title', 'homepage')

@section('body')

    <div class="row">
        <br>
        <br>
        <div class="col-lg-offset-2 col-lg-8">
            <div class="panel panel-default" id="multistep-panel" >
                <div class="panel-heading cent">
                    <h3 class="panel-title">Teacher? Want to add your details to the site? Enter below!</h3>
                </div>
                <div class="panel-body">
                    <form name="basicform" id="basicform" method="post" action="/postmatch">
                        {!! csrf_field() !!}
                        <div id="sf1" class="frm">
                            <fieldset>
                                <legend>Step 1 of 6 - Personal Details</legend>
                                <div class="form-group">
                                    <div class="form-group">
                                        <label for="firstname" class="control-label">First Name</label>

                                        <input type="text" class="form-control" id="firstname" placeholder="" required="">


                                    </div>
                                    <div class="form-group">
                                        <label for="lastname" class="control-label">Last Name</label>

                                        <input type="text" class="form-control" id="lastname" placeholder="" required="">


                                    </div>
                                    <div class="form-group">
                                        <label for="addr1" class="control-label">Address Line 1</label>

                                        <input type="text" class="form-control" id="addr1" placeholder="" required="">


                                    </div>
                                    <div class="form-group">
                                        <label for="addr2" class="control-label">Address Line 2</label>

                                        <input type="text" class="form-control" id="addr2" placeholder="" required="">


                                    </div>
                                    <div class="form-group">
                                        <label for="city" class="control-label">City</label>

                                        <input type="text" class="form-control" id="city" placeholder="" required="">


                                    </div>
                                    <div class="form-group">
                                        <label for="postcode" class="control-label">Postcode</label>

                                        <input type="text" class="form-control" id="postcode" placeholder="" required="">


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
                                <legend>Step 2 of 6 - Contact Details</legend>

                                <div class="form-group">
                                    <div class="form-group">
                                        <label for="email" class="control-label">Email</label>

                                        <input type="email" class="form-control" id="email" placeholder="" required="">


                                    </div>
                                    <div class="form-group">
                                        <label for="phone" class="control-label">Phone Number</label>

                                        <input type="tel" class="form-control" id="phone" placeholder="">
                                        <p class="help-block">Optional</p>

                                    </div>

                                    <div class="form-group">
                                        <label for="phone" class="control-label">Mobile Number</label>

                                        <input type="tel" class="form-control" id="phone" placeholder="">
                                        <p class="help-block">Optional</p>

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
                                <legend>Step 3 of 6 - Instruments Taught</legend>
                                <span>Which of the following do you teach (check all that apply)</span>
                                <div class="form-group">
                                    <div class="panel-group" id="accordion">
                                        <div class="panel panel-default" id="panel1">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    <a data-toggle="collapse" data-target="#collapseOne" href="#collapseOne " class="collapsed">
                                                        Collapsible Group Item #1
                                                    </a>
                                                </h4>

                                            </div>
                                            <div id="collapseOne" class="panel-collapse collapse">
                                                <div class="panel-body">


                                                </div>
                                            </div>
                                       </div>
                                        <div class="panel panel-default" id="panel2">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    <a data-toggle="collapse" data-target="#collapseTwo" href="#collapseTwo" class="collapsed">
                                                        Collapsible Group Item #2
                                                    </a>
                                                </h4>

                                            </div>
                                            <div id="collapseTwo" class="panel-collapse collapse">
                                                <div class="panel-body">


                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel panel-default" id="panel3">
                                            <div class="panel-heading" class="collapsed">
                                                <h4 class="panel-title">
                                                    <a data-toggle="collapse" data-target="#collapseThree" href="#collapseThree" class="collapsed">
                                                        Collapsible Group Item #3
                                                    </a>
                                                </h4>

                                            </div>
                                            <div id="collapseThree" class="panel-collapse collapse">
                                                <div class="panel-body">


                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel panel-default" id="panel4">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    <a data-toggle="collapse" data-target="#collapseFour"
                                                       href="#collapseFour" class="collapsed">
                                                        Collapsible Group Item #4
                                                    </a>
                                                </h4>

                                            </div>
                                            <div id="collapseFour" class="panel-collapse collapse">
                                                <div class="panel-body">


                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel panel-default" id="panel5">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    <a data-toggle="collapse" data-target="#collapseFive" href="#collapseFive" class="collapsed">
                                                        Collapsible Group Item #5
                                                    </a>
                                                </h4>

                                            </div>
                                            <div id="collapseFive" class="panel-collapse collapse">
                                                <div class="panel-body">


                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel panel-default" id="panel6">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    <a data-toggle="collapse" data-target="#collapseSix" href="#collapseSix" class="collapsed">
                                                        Collapsible Group Item #6
                                                    </a>
                                                </h4>

                                            </div>
                                            <div id="collapseSix" class="panel-collapse collapse">
                                                <div class="panel-body">


                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <div class="form-group">
                                    <label>
                                        <input type="checkbox" value="strings" id="strings">
                                        Strings
                                    </label>
                                    </br>
                                    <div class="form-group" style="display:none" id="string-children">
                                        <label>
                                            <input type="checkbox" value="Violin" id="Violin">
                                            Violin
                                        </label>
                                        </br>
                                        <label>
                                            <input type="checkbox" value="Viola" id="Viola">
                                            Viola
                                        </label>
                                        </br>
                                        <label>
                                            <input type="checkbox" value="Cello" id="Cello">
                                            Cello
                                        </label>
                                        </br>
                                        <label>
                                            <input type="checkbox" value="Double Bass" id="Double Bass">
                                            Double Bass
                                        </label>
                                        </br>
                                        <label>
                                            <input type="checkbox" value="Harp" id="Harp">
                                            Harp`.
                                        </label>
                                        </br>
                                        <label>
                                            <input type="checkbox" value="Guitar" id="Guitar">
                                            Guitar
                                        </label>
                                        </br>
                                        <label>
                                            <input type="checkbox" value="Electric_Guitar" id="Electric_Guitar">
                                            Electric Guitar
                                        </label>
                                        </br>
                                        <label>
                                            <input type="checkbox" value="Bass_Guitar" id="Bass_Guitar">
                                            Bass Guitar
                                        </label>
                                        </br>
                                        <label>
                                            <input type="checkbox" value="Banjo" id="Banjo">
                                            Banjo/Ukelele
                                        </label>
                                        </br>
                                        <label>
                                            <input type="checkbox" value="Other" id="Other">
                                            Other String Instrument
                                        </label>
                                        </br>
                                    </div>


                                    <label>
                                        <input type="checkbox" value="wind" id="wind">
                                        Wind
                                    </label>
                                    </br>

                                    <label>
                                        <input type="checkbox" value="brass" id="brass">
                                        Brass
                                    </label>
                                    </br>

                                    <label>
                                        <input type="checkbox" value="percussion" id="percussion">
                                        Percussion
                                    </label>
                                    </br>

                                    <label>
                                        <input type="checkbox" value="keys" id="keys">
                                        Keyboards/Piano
                                    </label>
                                    </br>

                                    <label>
                                        <input type="checkbox" value="voice" id="voice">
                                        Singing/Voice
                                    </label>
                                    </br>

                                </div>


                                <div class="clearfix" style="height: 10px;clear: both;"></div>
                                <div class="clearfix" style="height: 10px;clear: both;"></div>

                                <div class="form-group">
                                    <div class="col-lg-10 col-lg-offset-2">
                                        <button class="btn btn-warning back2" type="button"><span class="fa fa-arrow-left"></span> Back</button>
                                        <button class="btn btn-primary open2" type="button">Next <span class="fa fa-arrow-right"></span></button>
                                    </div>
                                </div>
                            </div>
                            </fieldset>
                        </div>
                        <div id="sf3" class="frm" style="display: none;">
                            <fieldset>
                                <legend>Step 3 of 3</legend>

                                <legend>Matches</legend>
                                <div class="form-group">

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
@section('js')
    <script src="{{url('/js/formfunction.js')}}"></script>
@endsection