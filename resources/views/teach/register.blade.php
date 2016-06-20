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
                                <span>Which of the following do you teach (Expand and check any that apply)</span>
                                <div class="form-group">
                                    <div class="panel-group" id="accordion">
                                        <div class="panel panel-default" id="panel1">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    <a data-toggle="collapse" data-target="#collapseOne" href="#collapseOne " class="collapsed">
                                                        Strings
                                                    </a>
                                                </h4>

                                            </div>
                                            <div id="collapseOne" class="panel-collapse collapse">
                                                <div class="panel-body">
                                                    <div class="form-group" id="string-children">
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
                                                            <input type="checkbox" value="Double_Bass" id="Double_Bass">
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
                                                            <input type="checkbox" value="OtherString" id="OtherString">
                                                            Other String Instrument
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                       </div>
                                        <div class="panel panel-default" id="panel2">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    <a data-toggle="collapse" data-target="#collapseTwo" href="#collapseTwo" class="collapsed">
                                                        Wind
                                                    </a>
                                                </h4>

                                            </div>
                                            <div id="collapseTwo" class="panel-collapse collapse">
                                                <div class="panel-body">
                                                    <div class="form-group" id="wind-children">
                                                        <label>
                                                            <input type="checkbox" value="Recorder" id="Recorder">
                                                            Recorder
                                                        </label>
                                                        </br>
                                                        <label>
                                                            <input type="checkbox" value="Flute" id="Flute">
                                                            Flute
                                                        </label>
                                                        </br>
                                                        <label>
                                                            <input type="checkbox" value="Piccolo" id="Piccolo">
                                                            Piccolo
                                                        </label>
                                                        </br>
                                                        <label>
                                                            <input type="checkbox" value="Clarinet" id="Clarinet">
                                                            Clarinet
                                                        </label>
                                                        </br>
                                                        <label>
                                                            <input type="checkbox" value="Oboe" id="Oboe">
                                                            Oboe
                                                        </label>
                                                        </br>
                                                        <label>
                                                            <input type="checkbox" value="Bassoon" id="Bassoon">
                                                            Bassoon
                                                        </label>
                                                        </br>
                                                        <label>
                                                            <input type="checkbox" value="Saxophone" id="Saxophone">
                                                            Saxophone
                                                        </label>
                                                        </br>
                                                        <label>
                                                            <input type="checkbox" value="OtherWind" id="OtherWind">
                                                            Other Wind Instrument
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel panel-default" id="panel3">
                                            <div class="panel-heading" class="collapsed">
                                                <h4 class="panel-title">
                                                    <a data-toggle="collapse" data-target="#collapseThree" href="#collapseThree" class="collapsed">
                                                        Brass
                                                    </a>
                                                </h4>

                                            </div>
                                            <div id="collapseThree" class="panel-collapse collapse">
                                                <div class="panel-body">
                                                    <div class="form-group" id="brass-children">
                                                        <label>
                                                            <input type="checkbox" value="Cornet" id="Cornet">
                                                            Cornet
                                                        </label>
                                                        </br>
                                                        <label>
                                                            <input type="checkbox" value="Trumpet" id="Trumpet">
                                                            Trumpet
                                                        </label>
                                                        </br>
                                                        <label>
                                                            <input type="checkbox" value="Tenor_Horn" id="Tenor_Horn">
                                                            Tenor Horn
                                                        </label>
                                                        </br>
                                                        <label>
                                                            <input type="checkbox" value="Euphonium" id="Euphonium">
                                                            Euphonium
                                                        </label>
                                                        </br>
                                                        <label>
                                                            <input type="checkbox" value="Trombone" id="Trombone">
                                                            Trombone
                                                        </label>
                                                        </br>
                                                        <label>
                                                            <input type="checkbox" value="French_Horn" id="French_Horn">
                                                            French Horn
                                                        </label>
                                                        </br>
                                                        <label>
                                                            <input type="checkbox" value="Tuba" id="Tuba">
                                                            Tuba
                                                        </label>
                                                        </br>
                                                        <label>
                                                            <input type="checkbox" value="OtherBrass" id="OtherBrass">
                                                            Other Brass Instrument
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel panel-default" id="panel4">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    <a data-toggle="collapse" data-target="#collapseFour"
                                                       href="#collapseFour" class="collapsed">
                                                        Percussion
                                                    </a>
                                                </h4>

                                            </div>
                                            <div id="collapseFour" class="panel-collapse collapse">
                                                <div class="panel-body">
                                                    <div class="form-group" id="percussion-children">
                                                        <label>
                                                            <input type="checkbox" value="Xylaphone" id="Xylaphone">
                                                            Xylaphone
                                                        </label>
                                                        </br>
                                                        <label>
                                                            <input type="checkbox" value="Marimba" id="Marimba">
                                                            Marimba
                                                        </label>
                                                        </br>
                                                        <label>
                                                            <input type="checkbox" value="Drum_Kit" id="Drum_Kit">
                                                            Drum Kit
                                                        </label>
                                                        </br>
                                                        <label>
                                                            <input type="checkbox" value="Timpani" id="Timpani">
                                                            Timpani
                                                        </label>
                                                        </br>
                                                        <label>
                                                            <input type="checkbox" value="OtherPercussion" id="OtherPercussion">
                                                            Other Percussion Instrument
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel panel-default" id="panel5">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    <a data-toggle="collapse" data-target="#collapseFive" href="#collapseFive" class="collapsed">
                                                        Keyboards/Piano
                                                    </a>
                                                </h4>

                                            </div>
                                            <div id="collapseFive" class="panel-collapse collapse">
                                                <div class="panel-body">
                                                    <label>
                                                        <input type="checkbox" value="Piano" id="Piano">
                                                        Piano
                                                    </label>
                                                    </br>
                                                    <label>
                                                        <input type="checkbox" value="Harpsichord" id="Harpsichord">
                                                        Harpsichord
                                                    </label>
                                                    </br>
                                                    <label>
                                                        <input type="checkbox" value="Organ" id="Organ">
                                                        Organ
                                                    </label>
                                                    </br>
                                                    <label>
                                                        <input type="checkbox" value="Keyboard" id="Keyboard">
                                                        Keyboard
                                                    </label>
                                                    </br>
                                                    <label>
                                                        <input type="checkbox" value="OtherPercussion" id="OtherPercussion">
                                                        Other Percussion Instrument
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel panel-default" id="panel6">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    <a data-toggle="collapse" data-target="#collapseSix" href="#collapseSix" class="collapsed">
                                                        Singing/Voice
                                                    </a>
                                                </h4>

                                            </div>
                                            <div id="collapseSix" class="panel-collapse collapse">
                                                <div class="panel-body">
                                                    <div class="form-group" id="keys-children">
                                                        <div class="form-group" id="singing-children">
                                                            <label>
                                                                <input type="checkbox" value="Classical_Singing" id="Classical_Singing">
                                                                Classical Singing
                                                            </label>
                                                            </br>
                                                            <label>
                                                                <input type="checkbox" value="Musical_Theatre_Singing" id="Musical_Theatre_Singing">
                                                                Musical Theatre Singing
                                                            </label>
                                                            </br>
                                                            <label>
                                                                <input type="checkbox" value="Jazz_Singing" id="Jazz_Singing">
                                                                Jazz Singing
                                                            </label>
                                                            </br>
                                                            <label>
                                                                <input type="checkbox" value="Pop_Singing" id="Pop_Singing">
                                                                Pop Singing
                                                            </label>
                                                            <br>
                                                            <label>
                                                                <input type="checkbox" value="Opera_Singing" id="Opera_Singing">
                                                                Opera Singing
                                                            </label>
                                                            <br>
                                                            <label>
                                                                <input type="checkbox" value="OtherSinging" id="OtherSinging">
                                                                Other Singing
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                <div class="clearfix" style="height: 10px;clear: both;"></div>
                                <div class="clearfix" style="height: 10px;clear: both;"></div>

                                <div class="form-group">
                                    <div class="col-lg-10 col-lg-offset-2">
                                        <button class="btn btn-warning back3" type="button"><span class="fa fa-arrow-left"></span> Back</button>
                                        <button class="btn btn-primary open3" type="button">Next <span class="fa fa-arrow-right"></span></button>
                                    </div>
                                </div>
                            </div>
                            </fieldset>
                        </div>
                        <div id="sf4" class="frm" style="display: none;">
                            <fieldset>
                                <legend>Step 4 of 6 - Experience</legend>
                                <span>Please name the instruments you play, and the level at which you play (Max - 4)</span>
                                <button type="button" class="btn btn-primary" value="+" onclick="addInput('dynamicInput');"><i class="fa fa-plus-circle" aria-hidden="true"></i></button>
                                <div class="form-group">
                                    <div class="form-group" id="dynamicInput">
                                        <div class="form-inline">
                                            <div class="form-group">
                                                <label for="instrument1" class="control-label">Instrument 1</label>

                                                <input type="text" class="form-control" id="instrument_1" placeholder="" required="">
                                            </div>

                                            <div class="form-group">
                                                <label for="sel1">Level:</label>
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
                                            </br>
                                        </div>
                                    </div>
                                    <span>Please enter your highest level of qualification</span>

                                        <div class="form-group">
                                            <label for="qualification" class="control-label">Qualification (E.G BA Music)</label>

                                            <input type="text" class="form-control" id="Qualification" placeholder="" required="">


                                        </div>
                                    <span>Please enter details of your experience: </span>
                                        <div class="form-group">
                                            <label for="performing_experience" class="control-label">Performing Experience</label>

                                            <textarea class="form-control" id="performing_experience" ></textarea>


                                        </div>
                                    <div class="form-group">
                                        <label for="teaching_experience" class="control-label">Teaching Experience</label>

                                        <textarea class="form-control" id="teaching_experience" ></textarea>


                                    </div>

                                </div>

                                <div class="clearfix" style="height: 10px;clear: both;"></div>
                                <div class="clearfix" style="height: 10px;clear: both;"></div>

                                <div class="form-group">
                                    <div class="col-lg-10 col-lg-offset-2">
                                        <button class="btn btn-warning back4" type="button"><span class="fa fa-arrow-left"></span> Back</button>
                                        <button class="btn btn-primary open4" type="button">Next <span class="fa fa-arrow-right"></span></button>
                                    </div>
                                </div>

                            </fieldset>
                        </div>
                        <div id="sf5" class="frm" style="display: none;">
                            <fieldset>
                                <legend>Step 5 of 6 - Teaching Details</legend>

                                <span>Please answer the following questions to build up a teacher profile</span>
                                <div class="form-group">
                                    <div class="form-group">
                                        <label for="minage" class="control-label">Minimum age taught - if no minimum, enter 0</label>

                                        <input type="number" class="form-control" id="minage" placeholder="0" required="true"  min="0" step="1">


                                    </div>
                                    <div class="form-group">
                                        <label for="minage" class="control-label">Maximum age taught - if no maximum, enter 100</label>

                                        <input type="number" class="form-control" id="maxage" placeholder="100" required="true" min="0" step="1">


                                    </div>
                                </div>
                                <span>I... (Check all that apply)</span>
                                <div class="form-group">
                                    <div class="checkbox">
                                        <label><input type="checkbox" value="teach_at_pupil_home">Teach at pupil's home</label>
                                    </div>
                                    <div class="checkbox">
                                        <label><input type="checkbox" value="teach_at_own_home">Teach at own home</label>
                                    </div>
                                    <div class="checkbox">
                                        <label><input type="checkbox" value="teach_online">Teach online</label>
                                    </div>
                                    <div class="checkbox">
                                        <label><input type="checkbox" id="tmt-cb" value="teach_theory" onchange="valueChangedTmt();">Teach Music Theory</label>
                                    </div>
                                    <div class="form-group hidden" id="tmt">
                                        <label for="sel1">Level:</label>
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
                                    <div class="checkbox" >
                                        <label><input type="checkbox" id="ta-cb" value="teach_aural" onchange="valueChangedTa();">Teach Aural</label>
                                    </div>
                                    <div class="form-group hidden" id="ta">
                                        <label for="sel1">Level:</label>
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
                                    <div class="checkbox" >
                                        <label><input type="checkbox" id="tc-cb" value="teach_composition" onchange="valueChangedTc();">Teach Composition</label>
                                    </div>
                                    <div class="form-group hidden" id="tc">
                                        <label for="sel1">Level:</label>
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


                                <div class="clearfix" style="height: 10px;clear: both;"></div>
                                <div class="clearfix" style="height: 10px;clear: both;"></div>

                                <div class="form-group">
                                    <div class="col-lg-10 col-lg-offset-2">
                                        <button class="btn btn-warning back5" type="button"><span class="fa fa-arrow-left"></span> Back</button>
                                        <button class="btn btn-primary open5" type="button">Next <span class="fa fa-arrow-right"></span></button>
                                    </div>
                                </div>

                            </fieldset>
                        </div>
                        <div id="sf6" class="frm" style="display: none;">
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
                                            <label><input type="checkbox" id="repair" value="repair" onchange="valueChangedRepair();">Do you repair instruments?</label>
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
    <script src="{{url('/js/formfunction.js')}}"></script>
@endsection

