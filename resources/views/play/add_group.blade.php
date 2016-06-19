@extends('template')

@section('title', 'homepage')

@section('body')

    @extends('template')

@section('title', 'homepage')

@section('body')

    <div class="row">
        <br>
        <br>
        <div class="col-lg-offset-2 col-lg-8">
            <div class="panel panel-default" id="multistep-panel" >
                <div class="panel-heading cent">
                    <h3 class="panel-title">Add your ensemble to RYNM's site!</h3>
                </div>
                <div class="panel-body">
                    <p>Adding details of your group allows you to advertise for members, add events to the calendar and reach a large number of potential audience members via our newsletter</p>
                    <form name="basicform" id="basicform" method="post" action="/postensemble">
                        {!! csrf_field() !!}
                        <div id="sf1" class="frm">
                            <fieldset>
                                <legend>Headline</legend>
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
                                <legend>Step 6 of 6 - Final Details</legend>

                                <div class="form-group">
                                    <div class="form-group">
                                        <div class="checkbox" >
                                            <label><input type="checkbox" id="cb-acc" value="accompanies" onchange="valueChangedAcc();">Do you accompany students?</label>
                                        </div>
                                        <div class="form-group hidden" id="acc">
                                            <label for="instrument_1_select">Maximum level accompanied:</label>
                                            <select class="form-control" id="instrument_1_select">
                                                <option value="">-</option>
                                                <option value="grade1">Grade 1</option>
                                                <option value="grade2">Grade 2</option>
                                                <option value="grade3">Grade 3</option>
                                                <option value="grade4">Grade 4</option>
                                                <option value="grade5">Grade 5</option>
                                                <option value="grade6">Grade 6</option>
                                                <option value="grade7">Grade 7</option>
                                                <option value="grade8">Grade 8</option>
                                                <option value="diploma">Diploma</option>
                                                <option value="concert_soloist">Concert Soloist</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class=form-group>
                                        <div class="checkbox" >
                                            <label><input type="checkbox" id="crb" value="crb">Are you CRB checked?</label>
                                        </div>
                                    </div>
                                    <div class=form-group>
                                        <div class="checkbox" >
                                            <label><input type="checkbox" id="repair" value="repair" onchange="valueChangedRepair()">Do you repair instruments?</label>
                                        </div>
                                    </div>
                                    <div class="form-group hidden" id="repair_inst">
                                        <label for="repair_inst" class="control-label">Please enter the name of any instruments you repair below</label>

                                        <input type="text" class="form-control" placeholder="" required="">


                                    </div>
                                    <span>Please enter any further details you would like to be displayed to potential students that are not covered above </span>
                                    <div class="form-group">
                                        <label for="biography" class="control-label">Further biographical details:</label>

                                        <textarea class="form-control" id="biography" ></textarea>
                                    </div>

                                </div>

                                <div class="clearfix" style="height: 10px;clear: both;"></div>
                                <div class="clearfix" style="height: 10px;clear: both;"></div>

                                <div class="form-group">
                                    <div class="col-lg-10 col-lg-offset-2">
                                        <button class="btn btn-warning back6" type="button"><span class="fa fa-arrow-left"></span> Back</button>
                                        <button type="submit" class="btn btn-primary">Submit</button>
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
    <script src="{{url('/js/addgroup.js')}}"></script>
@endsection




@endsection