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
                                    <label>
                                        <input type="checkbox" value="strings" id="strings">
                                        Strings
                                    </label>
                                    <div class="form-group hidden" id="string-children">
                                        <label>
                                            <input type="checkbox" value="Violin" id="Violin">
                                            Violin
                                        </label>
                                        <label>
                                            <input type="checkbox" value="Viola" id="Viola">
                                            Viola
                                        </label>
                                        <label>
                                            <input type="checkbox" value="Cello" id="Cello">
                                            Cello
                                        </label>
                                        <label>
                                            <input type="checkbox" value="Double Bass" id="Double Bass">
                                            Double Bass
                                        </label>
                                        <label>
                                            <input type="checkbox" value="Harp" id="Harp">
                                            Harp
                                        </label>
                                        <label>
                                            <input type="checkbox" value="Guitar" id="Guitar">
                                            Guitar
                                        </label>
                                        <label>
                                            <input type="checkbox" value="Electric_Guitar" id="Electric_Guitar">
                                            Electric Guitar
                                        </label>
                                        <label>
                                            <input type="checkbox" value="Bass_Guitar" id="Bass_Guitar">
                                            Bass Guitar
                                        </label>
                                        <label>
                                            <input type="checkbox" value="Banjo" id="Banjo">
                                            Banjo/Ukelele
                                        </label>
                                        <label>
                                            <input type="checkbox" value="Other" id="Other">
                                            Other String Instrument
                                        </label>
                                    </div>


                                    <label>
                                        <input type="checkbox" value="wind" id="wind">
                                        Wind
                                    </label>


                                    <label>
                                        <input type="checkbox" value="brass" id="brass">
                                        Brass
                                    </label>


                                    <label>
                                        <input type="checkbox" value="percussion" id="percussion">
                                        Percussion
                                    </label>


                                    <label>
                                        <input type="checkbox" value="keys" id="keys">
                                        Keyboards/Piano
                                    </label>


                                    <label>
                                        <input type="checkbox" value="voice" id="voice">
                                        Singing/Voice
                                    </label>


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