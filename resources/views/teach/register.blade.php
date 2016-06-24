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
                    <div class="alert alert-warning alert-dismissible hidden" id="incomplete" role="alert">Please complete all starred fields to continue</div>
                    <form name="basicform" id="basicform" method="post" action="/teach/register/post">
                        {!! csrf_field() !!}
                        <div id="sf1" class="frm">
                            <fieldset name="one">
                                <legend>Step 1 of 6 - Personal Details</legend>
                                    <div class="form-group">
                                        <label for="firstname" class="control-label"><i class="fa fa-star" aria-hidden="true"></i>First Name</label>

                                        <input type="text" class="form-control" id="firstname" name="firstname" placeholder="" required="">


                                    </div>
                                    <div class="form-group">
                                        <label for="lastname" class="control-label"><i class="fa fa-star" aria-hidden="true"></i>Last Name</label>

                                        <input type="text" class="form-control" id="lastname" name="lastname" placeholder="" required="">


                                    </div>
                                    <div class="form-group">
                                        <label for="addr1" class="control-label"><i class="fa fa-star" aria-hidden="true"></i>Address Line 1</label>

                                        <input type="text" class="form-control" id="addr1" name="addr1" placeholder="" required="">


                                    </div>
                                    <div class="form-group">
                                        <label for="addr2" class="control-label">Address Line 2</label>

                                        <input type="text" class="form-control" id="addr2" name="addr2" placeholder="" required="">


                                    </div>
                                    <div class="form-group">
                                        <label for="city" class="control-label"><i class="fa fa-star" aria-hidden="true"></i>City</label>

                                        <input type="text" class="form-control" id="city" name="city" placeholder="" required="">


                                    </div>
                                    <div class="form-group">
                                        <label for="postcode" class="control-label"><i class="fa fa-star" aria-hidden="true"></i>Postcode</label>

                                        <input type="text" class="form-control" id="postcode" name="postcode" placeholder="" required="">


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
                            <fieldset name="two">
                                <legend>Step 2 of 6 - Contact Details</legend>

                                <div class="form-group">
                                    <div class="form-group">
                                        <label for="email" class="control-label"><i class="fa fa-star" aria-hidden="true"></i>Email</label>
                                        <span id="helpemail"   class="hidden">- Email must be correct format and include an @ symbol</span>

                                        <input type="email" class="form-control" id="email" name="email" placeholder="" required="">


                                    </div>
                                    <div class="form-group">
                                        <label for="phone" class="control-label">Phone Number</label>

                                        <input type="tel" class="form-control" id="phone" name="phone" placeholder="">
                                        <p class="help-block">Optional</p>

                                    </div>

                                    <div class="form-group">
                                        <label for="mobile" class="control-label">Mobile Number</label>

                                        <input type="tel" class="form-control" id="mobile" name="mobile" placeholder="">
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
                            <fieldset name="three">
                                <legend>Step 3 of 6 - Instruments Taught</legend>
                                <span>Which of the following do you teach ( Expand (>) and tick all that apply. )</span>
                                <span id="helpcheckbox"   class="hidden">- At least one checkbox must be checked!</span>
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
                                                        <span class="header">Main Instruments:</span> </br>
                                                        <label>
                                                            <input type="checkbox" value="Violin" id="Violin" name="Violin">
                                                            Violin
                                                        </label>
                                                        </br>
                                                        <label>
                                                            <input type="checkbox" value="Viola" id="Viola" name="Viola">
                                                            Viola
                                                        </label>
                                                        </br>
                                                        <label>
                                                            <input type="checkbox" value="Cello" id="Cello" name="Cello">
                                                            Cello
                                                        </label>
                                                        </br>
                                                        <label>
                                                            <input type="checkbox" value="Double_Bass" id="Double_Bass" name="Double_Bass">
                                                            Double Bass
                                                        </label>
                                                        </br>
                                                        <label>
                                                            <input type="checkbox" value="Harp" id="Harp" name="Harp">
                                                            Harp
                                                        </label>
                                                        </br>
                                                        <label>
                                                            <input type="checkbox" value="Classical_Guitar" id="Classical_Guitar" name="Classical_Guitar">
                                                            Guitar (Classical)
                                                        </label>
                                                        </br>
                                                        <span class="smaller">Other Instruments:</span> </br>
                                                        <label class="smaller">
                                                            <input class="smaller" type="checkbox" value="Electric_Guitar" id="Electric_Guitar" name="Electric_Guitar">
                                                            Electric Guitar
                                                        </label>
                                                        </br>
                                                        <label class="smaller">
                                                            <input class="smaller" type="checkbox" value="Bass_Guitar" id="Bass_Guitar" name="Bass_Guitar">
                                                            Bass Guitar
                                                        </label>
                                                        </br>
                                                        <label class="smaller">
                                                            <input class="smaller" type="checkbox" value="Banjo" id="Banjo" name="Banjo">
                                                            Banjo
                                                        </label>
                                                        </br>
                                                        <label class="smaller">
                                                            <input class="smaller" type="checkbox" value="Ukelele" id="Ukelele" name="Ukelele">
                                                            Ukelele
                                                        </label>
                                                        </br>
                                                        <label class="smaller">
                                                            <input class="smaller" type="checkbox" value="Sitar" id="Sitar" name="Sitar">
                                                            Sitar
                                                        </label>
                                                        </br>
                                                        <label class="smaller">
                                                            <input class="smaller" type="checkbox" value="Balalaika" id="Balalaika" name="Balalaika">
                                                            Balalaika
                                                        </label>
                                                        </br>
                                                        <label class="smaller">
                                                            <input class="smaller" type="checkbox" value="Mandolin" id="Mandolin" name="Mandolin">
                                                            Mandolin
                                                        </label>
                                                        </br>
                                                        <label class="smaller">
                                                            <input class="smaller" type="checkbox" value="Zither" id="Zither" name="Zither">
                                                            Zither
                                                        </label>
                                                        </br>
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
                                                        <span class="header">Main Instruments:</span></br>
                                                        <label>
                                                            <input type="checkbox" value="Flute" id="Flute" name="Flute">
                                                            Flute
                                                        </label>
                                                        </br>
                                                        <label>
                                                            <input type="checkbox" value="Clarinet" id="Clarinet" name="Clarinet">
                                                            Clarinet
                                                        </label>
                                                        </br>
                                                        <label>
                                                            <input type="checkbox" value="Oboe" id="Oboe" name="Oboe">
                                                            Oboe
                                                        </label>
                                                        </br>
                                                        <label>
                                                            <input type="checkbox" value="Bassoon" id="Bassoon" name="Bassoon">
                                                            Bassoon
                                                        </label>
                                                        </br>
                                                        <label>
                                                            <input type="checkbox" value="Recorder" id="Recorder" name="Recorder">
                                                            Recorder
                                                        </label>
                                                        </br>
                                                        <span class="smaller">Other Instruments:</span></br>
                                                        <label class="smaller">
                                                            <input class="smaller" type="checkbox" value="Piccolo" id="Piccolo" name="Piccolo">
                                                            Piccolo
                                                        </label>
                                                        </br>
                                                        <label class="smaller">
                                                            <input class="smaller" type="checkbox" value="Saxophone" id="Saxophone" name="Saxophone">
                                                            Saxophone
                                                        </label>
                                                        </br>
                                                        <label class="smaller">
                                                            <input class="smaller" type="checkbox" value="Cor_Anglais" id="Cor_Anglais" name="Cor_Anglais">
                                                            Cor Anglais
                                                        </label>
                                                        </br>
                                                        <label class="smaller">
                                                            <input class="smaller" type="checkbox" value="Basset_Horn" id="Basset_Horn" name="Basset_Horn">
                                                            Basset Horn
                                                        </label>
                                                        </br>
                                                        <label class="smaller">
                                                            <input class="smaller" type="checkbox" value="Bass_Clarinet" id="Bass_Clarinet" name="Basset_Horn">
                                                            Bass Clarinet
                                                        </label>
                                                        </br>
                                                        <label class="smaller">
                                                            <input class="smaller" type="checkbox" value="Contra_Bassoon" id="Contra_Bassoon" name="Contra_Bassoon">
                                                            Contra Bassoon
                                                        </label>
                                                        </br>
                                                        <label class="smaller">
                                                            <input class="smaller" type="checkbox" value="Bagpipes" id="Bagpipes" name="Bagpipes">
                                                            Bagpipes
                                                        </label>
                                                        </br>
                                                        <label class="smaller">
                                                            <input class="smaller" type="checkbox" value="Ocarina" id="Ocarina" name="Ocarina">
                                                            Ocarina
                                                        </label>
                                                        </br>
                                                        <label class="smaller">
                                                            <input class="smaller" type="checkbox" value="Mouth_Organ" id="Mouth_Organ" name="Mouth_Organ">
                                                            Mouth Organ
                                                        </label>
                                                        </br>

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
                                                        <span class="header">Main Instruments:</span></br>
                                                        <br>
                                                        <label>
                                                            <input type="checkbox" value="Horn" id="Horn" name="Horn">
                                                            (French) Horn
                                                        </label>
                                                        </br>
                                                        <label>
                                                            <input type="checkbox" value="Trumpet" id="Trumpet" name="Trumpet">
                                                            Trumpet
                                                        </label>
                                                        </br>
                                                        <label>
                                                            <input type="checkbox" value="Trombone" id="Trombone" name="Trombone">
                                                            Trombone
                                                        </label>
                                                        </br>
                                                        <label>
                                                            <input type="checkbox" value="Tuba" id="Tuba" name="Tuba">
                                                            Tuba
                                                        </label>
                                                        </br>
                                                        <span class="smaller">Other Instruments:</span></br>
                                                        <label class="smaller" >
                                                            <input class="smaller" type="checkbox" value="Cornet" id="Cornet" name="Cornet">
                                                            Cornet
                                                        </label>
                                                        </br>
                                                        <label class="smaller" >
                                                            <input class="smaller" type="checkbox" value="Flugel_Horn" id="Flugel_Horn" name="Flugel_Horn">
                                                            Flugel Horn
                                                        </label>
                                                        </br>
                                                        <label class="smaller" >
                                                            <input class="smaller" type="checkbox" value="Tenor_Horn" id="Tenor_Horn" name="Tenor_Horn">
                                                            Tenor Horn
                                                        </label>
                                                        </br>
                                                        <label class="smaller" >
                                                            <input class="smaller" type="checkbox" value="Baritone" id="Baritone" name="Baritone">
                                                            Baritone
                                                        </label>
                                                        </br>
                                                        <label class="smaller" >
                                                            <input class="smaller" type="checkbox" value="Euphonium" id="Euphonium" name="Euphonium">
                                                            Euphonium
                                                        </label>
                                                        </br>
                                                        <label class="smaller" >
                                                            <input class="smaller" type="checkbox" value="Ophicleide" id="Ophicleide" name="Ophicleide">
                                                            Ophicleide
                                                        </label>
                                                        </br>
                                                        <label class="smaller" >
                                                            <input class="smaller" type="checkbox" value="Sackbutt" id="Sackbutt" name="Sackbutt">
                                                            Sackbutt
                                                        </label>
                                                        </br>
                                                        <label class="smaller" >
                                                            <input class="smaller" type="checkbox" value="Cornette" id="Cornette" name="Cornette">
                                                            Cornette
                                                        </label>
                                                        </br>
                                                        <label class="smaller" >
                                                            <input class="smaller" type="checkbox" value="Serpent" id="Serpent" name="Serpent">
                                                            Serpent
                                                        </label>
                                                        </br>
                                                        <label class="smaller" >
                                                            <input class="smaller" type="checkbox" value="Didgeridoo" id="Didgeridoo" name="Didgeridoo">
                                                            Didgeridoo
                                                        </label>
                                                        </br>
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

                                                        <span class="header">Main Instruments:</span></br>

                                                        <label>
                                                            <input type="checkbox" value="Timpani" id="Timpani" name="Timpani">
                                                            Timpani
                                                        </label>
                                                        </br>
                                                        <label>
                                                            <input type="checkbox" value="Orchestral_Percussion" id="Orchestral_Percussion" name="Orchestral_Percussion">
                                                            Orchestral Percussion
                                                        </label>
                                                        </br>
                                                        <label>
                                                            <input type="checkbox" value="Tuned_Percusion" id="Tuned_Percusion" name="Tuned_Percusion">
                                                            Tuned Percussion
                                                        </label>
                                                        </br>
                                                        <label>
                                                            <input type="checkbox" value="Drum_Kit" id="Drum_Kit" name="Drum_Kit">
                                                            Drum Kit
                                                        </label>
                                                        </br>
                                                        <span class="smaller">Other Instruments:</span></br>
                                                        <label class="smaller">
                                                            <input class="smaller" type="checkbox" value="Xylaphone" id="Xylaphone" name="Xylaphone">
                                                            Xylaphone
                                                        </label>
                                                        </br>
                                                        <label class="smaller">
                                                            <input class="smaller" type="checkbox" value="Marimba" id="Marimba" name="Marimba">
                                                            Marimba
                                                        </label>
                                                        </br>

                                                        <label class="smaller">
                                                            <input class="smaller" type="checkbox" value="Vibraphone" id="Vibraphone" name="Vibraphone">
                                                            Vibraphone
                                                        </label>
                                                        </br>

                                                        <label class="smaller">
                                                            <input class="smaller" type="checkbox" value="Glockenspiel" id="Glockenspiel" name="Glockenspiel">
                                                            Glockenspiel
                                                        </label>
                                                        </br>

                                                        <label class="smaller">
                                                            <input class="smaller" type="checkbox" value="Cembalom" id="Cembalom" name="Cembalom">
                                                            Cembalom
                                                        </label>
                                                        </br>
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

                                                    <span class="header">Main Instruments:</span></br>
                                                    <label>
                                                        <input type="checkbox" value="Piano" id="Piano" name="Piano">
                                                        Piano
                                                    </label>
                                                    </br>
                                                    <label>
                                                        <input type="checkbox" value="Organ" id="Organ" name="Organ">
                                                        Organ
                                                    </label>
                                                    </br>
                                                    <span class="smaller">Other Instruments:</span></br>
                                                    <label class="smaller">
                                                        <input class="smaller" type="checkbox" value="Keyboard" id="Keyboard" name="Keyboard">
                                                        Keyboard
                                                    </label>
                                                    </br>
                                                    <label class="smaller">
                                                        <input class="smaller" type="checkbox" value="Harpsichord" id="Harpsichord" name="Harpsichord">
                                                        Harpsichord
                                                    </label>
                                                    </br>
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
                                                                <input type="checkbox" value="Male" id="Male" name="Male">
                                                                Male
                                                            </label>
                                                            <br>
                                                            <label>
                                                                <input type="checkbox" value="Female" id="Female" name="Female">
                                                                Female
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
                            <fieldset name="four">
                                <legend>Step 4 of 6 - Experience</legend>
                                <span>Please name the principle instruments you teach, and the min/max levels you teach them (Limit 4)</span>
                                <button type="button" class="btn btn-primary" value="+" onclick="addInput('dynamicInput');"><i class="fa fa-plus-circle" aria-hidden="true"></i></button>
                                <div class="form-group">
                                    <div class="form-group" id="dynamicInput">
                                        <div class="form-inline">
                                            <div class="form-group">
                                                <label for="instrument_1" class="control-label"><i class="fa fa-star" aria-hidden="true"></i>Instrument 1</label>
                                                <select class="form-control" id="instrument_1" name="instrument_1" required>
                                                    <option value="">-</option>
                                                    <optgroup label="String Instruments">
                                                        <option value="Violin">Violin</option>
                                                        <option value="Viola">Viola</option>
                                                        <option value="Cello">Cello</option>
                                                        <option value="Double Bass">Double Bass</option>
                                                        <option value="Harp">Harp</option>
                                                        <option value="Guitar">Guitar</option>
                                                    </optgroup>
                                                    <optgroup label="Wind Instruments">
                                                        <option value="Flute">Flute</option>
                                                        <option value="Oboe">Oboe</option>
                                                        <option value="Clarinet">Clarinet</option>
                                                        <option value="Bassoon">Bassoon</option>
                                                        <option value="Recorder">Recorder</option>
                                                    </optgroup>
                                                    <optgroup label="Brass Instruments">
                                                        <option value="Horn">(French) Horn</option>
                                                        <option value="Trumpet">Trumpet</option>
                                                        <option value="Trombone">Trombone</option>
                                                        <option value="Tuba">Tuba</option>
                                                    </optgroup>
                                                    <optgroup label="Percussion Instruments">
                                                        <option value="Timpani">Timpani</option>
                                                        <option value="Orchestral_Percussion">Orchestral Percussion</option>
                                                        <option value="Tuned_Percussion">Tuned Percussion</option>
                                                        <option value="Drum_Kit">Drum Kit</option>
                                                    </optgroup>
                                                    <optgroup label="Keyboard/Piano">
                                                        <option value="Piano">Piano</option>
                                                        <option value="Organ">Organ</option>
                                                    </optgroup>
                                                    <optgroup label="Singing">
                                                        <option value="Male">Male</option>
                                                        <option value="Female">Female</option>
                                                    </optgroup>
                                                </select>
                                            </div>
                                            <br><br>
                                            <div class="form-group">
                                                <label for="instrument_1_select_min"><i class="fa fa-star" aria-hidden="true"></i>Minimum Level:</label>
                                                <select class="form-control" id="instrument_1_select_min" name="instrument_1_select_min" required>
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
                                            <div class="form-group">
                                                <label for="instrument_1_select_max"><i class="fa fa-star" aria-hidden="true"></i>Maximum Level:</label>
                                                <select class="form-control" id="instrument_1_select_max" name="instrument_1_select_max" required>
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

                                            <input type="text" class="form-control" id="Qualification" name="Qualification" placeholder="" required="">


                                        </div>
                                    <span>Please enter details of your experience: </span>
                                        <div class="form-group">
                                            <label for="performing_experience" class="control-label">Performing Experience</label>

                                            <textarea class="form-control" id="performing_experience"  name="performing_experience"></textarea>


                                        </div>
                                    <div class="form-group">
                                        <label for="teaching_experience" class="control-label">Teaching Experience</label>

                                        <textarea class="form-control" id="teaching_experience" name="teaching_experience"></textarea>


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
                            <fieldset name="five">
                                <legend>Step 5 of 6 - Teaching Details</legend>

                                <span>Please answer the following questions to build up a teacher profile</span>
                                <br>
                                <div class="col-xs-12">
                                    <div class="form-group col-xs-4">
                                        <label for="minage" class="control-label"><i class="fa fa-star" aria-hidden="true"></i>Minimum age taught</label>

                                        <input type="number" class="form-control" id="minage"  name="minage" required=""  min="0" step="1">


                                    </div>
                                    <div class="form-group col-xs-4">
                                            <label for="maxage" class="control-label"><i class="fa fa-star" aria-hidden="true"></i>Maximum age taught</label>

                                            <input type="number" class="form-control" id="maxage" name="maxage"  required="" min="0" step="1">
                                     </div>
                                    <br>
                                </div>
                                </br>
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
                                        <label><input type="checkbox" value="teach_at_school">Teach at school</label>
                                    </div>
                                    <div class="checkbox">
                                        <label><input type="checkbox" id="tmt-cb" name="tmt-cb" value="teach_theory" onchange="valueChangedTmt();">Teach Music Theory</label>
                                    </div>
                                    <div class="form-group hidden" id="tmt">
                                        <label for="level_musictheory">Max Level:</label>
                                        <select  id="level_musictheory" name="level_musictheory">
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
                                        <label><input type="checkbox" id="ta-cb" name="ta-cb" value="teach_aural" onchange="valueChangedTa();">Teach Aural</label>
                                    </div>
                                    <div class="form-group hidden" id="ta">
                                        <label for="level_aural">Max Level:</label>
                                        <select  id="level_aural" name="level_aural">
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
                                            <option value="concert_soloist">Concert Soloist</option>
                                        </select>
                                    </div>
                                    <div class="checkbox" >
                                        <label><input type="checkbox" id="tc-cb" name="tc-cb"value="teach_composition" onchange="valueChangedTc();">Teach Composition</label>
                                    </div>
                                    <div class="form-group hidden" id="tc">
                                        <label for="level_composition">Max Level:</label>
                                        <select  id="level_composition" name="level_composition">
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
                            <fieldset name="six">
                                <legend>Step 6 of 6 - Final Details</legend>

                                <div class="form-group">
                                        <div class="form-group">
                                            <div class="checkbox" >
                                                <label><input type="checkbox" id="cb-acc" name="cb-acc"  value="accompanies" onchange="valueChangedAcc();">Do you accompany students?</label>
                                            </div>
                                            <div class="form-group hidden" id="acc">
                                                <label for="level_accompanied">Maximum level accompanied:</label>
                                                <select id="level_accompanied" name="level_accompanied">
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
                                                <label><input type="checkbox" id="crb" name="crb" value="crb">Are you CRB checked?</label>
                                            </div>
                                        </div>
                                    <div class=form-group>
                                        <div class="checkbox" >
                                            <label><input type="checkbox" id="repair" name="repair" value="repair" onchange="valueChangedRepair();">Do you repair instruments?</label>
                                        </div>
                                    </div>
                                    <div class="form-group hidden" id="repair_inst">
                                        <label for="repair_inst" class="control-label">Please enter the name of any instruments you repair below</label>

                                        <input type="text"  placeholder="">


                                    </div>
                                    <span>Please enter any further details you would like to be displayed to potential students that are not covered above </span>
                                    <div class="form-group">
                                        <label for="biography" class="control-label">Further biographical details:</label>

                                        <textarea class="form-control" id="biography"  id="name"></textarea>
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

