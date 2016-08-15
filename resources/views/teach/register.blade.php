@extends('template')

@section('title', 'homepage')

@section('body')

    <div class="row">
        <br>
        <br>
        <div class="flash-message">
            @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                @if(Session::has('alert-' . $msg))

                    <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                @endif
            @endforeach
        </div> <!-- end .flash-message -->
        <div class="col-lg-offset-2 col-lg-8">
            <div class="panel panel-default" id="multistep-panel" >
                <div class="panel-heading cent">
                    <h3 class="panel-title">Teacher? Want to add your details to the site? Enter below!</h3>
                </div>
                <div class="panel-body">
                    <div class="alert alert-warning alert-dismissible hidden" id="incomplete" role="alert">Please complete all starred fields to continue</div>
                    <form name="basicform" id="basicform" method="post" action="/teach/register/post" enctype="multipart/form-data">
                        {!! csrf_field() !!}
                        <div id="sf1" class="frm">
                            <fieldset name="one">
                                <legend>Step 1 of 6 - Personal Details</legend>
                                    <div class="form-group">
                                        <label for="firstname" class="control-label"><i class="fa fa-star" aria-hidden="true"></i>First Name</label>

                                        <input type="text" class="form-control" id="firstname" name="firstname" placeholder="" value="{{ old('firstname') }}" required="">


                                    </div>
                                    <div class="form-group">
                                        <label for="lastname" class="control-label"><i class="fa fa-star" aria-hidden="true"></i>Last Name</label>

                                        <input type="text" class="form-control" id="lastname" name="lastname" placeholder="" value="{{ old('lastname') }}" required="">


                                    </div>
                                    <div class="form-group">
                                        <label for="addr1" class="control-label"><i class="fa fa-star" aria-hidden="true"></i>Address Line 1</label>

                                        <input type="text" class="form-control" id="addr1" name="addr1" placeholder="" value="{{ old('addr1') }}" required="">


                                    </div>
                                    <div class="form-group">
                                        <label for="addr2" class="control-label">Address Line 2</label>

                                        <input type="text" class="form-control" id="addr2" name="addr2"  value="{{ old('addr2') }}" placeholder="" >


                                    </div>
                                    <div class="form-group">
                                        <label for="city" class="control-label"><i class="fa fa-star" aria-hidden="true"></i>City</label>

                                        <input type="text" class="form-control" id="city" name="city"  value="{{ old('city') }}" placeholder="" required="">


                                    </div>
                                    <div class="form-group">
                                        <label for="postcode" class="control-label"><i class="fa fa-star" aria-hidden="true"></i>Postcode</label>

                                        <input type="text" class="form-control" id="postcode" name="postcode" value="{{ old('postcode') }}" placeholder="" required="">


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

                                        <input type="email" class="form-control" id="email" value="{{ old('email') }}" name="email" placeholder="" required="">


                                    </div>
                                    <div class="form-group">
                                        <label for="phone" class="control-label">Phone Number</label>

                                        <input type="tel" class="form-control" id="phone" name="phone" value="{{ old('phone') }}" placeholder="">
                                        <p class="help-block">Optional</p>

                                    </div>

                                    <div class="form-group">
                                        <label for="mobile" class="control-label">Mobile Number</label>

                                        <input type="tel" class="form-control" id="mobile" value="{{ old('mobile') }}" name="mobile" placeholder="">
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
                                <legend>Step 3 of 6 - Experience</legend>
                                <span>Please name the principle instruments you teach, and the min/max levels you teach them (Limit 4)</span>
                                <button type="button" class="btn btn-primary" value="+" onclick="addInput('dynamicInput');"><i class="fa fa-plus-circle" aria-hidden="true"></i></button>
                                <button type="button" class="btn btn-primary" value="-" onclick="removeInput('dynamicInput');"><i class="fa fa-minus-circle" aria-hidden="true"></i></button>
                                <div class="form-group">
                                    <div class="form-group" id="dynamicInput">
                                        <div class="form-inline">
                                            <div class="form-group">
                                                <label for="instrument_1" class="control-label"><i class="fa fa-star" aria-hidden="true"></i>Instrument 1</label>
                                                <select class="instrumentSelect" id="instrument_1" name="instrument_1"  required>
                                                    <option value="">-</option>
                                                    <optgroup label="String Instruments">
                                                        <option value="Violin" @if(old('instrument_1') == "Violin") selected @endif >Violin</option>
                                                        <option value="Viola" @if(old('instrument_1') == "Viola") selected @endif>Viola</option>
                                                        <option value="Cello"  @if(old('instrument_1') == "Cello") selected @endif>Cello</option>
                                                        <option value="Double_Bass" @if(old('instrument_1') == "Double_Bass") selected @endif>Double Bass</option>
                                                        <option value="Harp" @if(old('instrument_1') == "Harp") selected @endif>Harp</option>
                                                        <option value="Guitar" @if(old('instrument_1') == "Guitar") selected @endif>Guitar</option>
                                                    </optgroup>
                                                    <optgroup label="Wind Instruments">
                                                        <option value="Flute" @if(old('instrument_1') == "Flute") selected @endif>Flute</option>
                                                        <option value="Oboe" @if(old('instrument_1') == "Oboe") selected @endif>Oboe</option>
                                                        <option value="Clarinet" @if(old('instrument_1') == "Clarinet") selected @endif>Clarinet</option>
                                                        <option value="Bassoon" @if(old('instrument_1') == "Bassoon") selected @endif>Bassoon</option>
                                                        <option value="Recorder" @if(old('instrument_1') == "Recorder") selected @endif>Recorder</option>
                                                    </optgroup>
                                                    <optgroup label="Brass Instruments">
                                                        <option value="Horn" @if(old('instrument_1') == "Horn") selected @endif>(French) Horn</option>
                                                        <option value="Trumpet" @if(old('instrument_1') == "Trumpet") selected @endif>Trumpet</option>
                                                        <option value="Trombone" @if(old('instrument_1') == "Trombone") selected @endif>Trombone</option>
                                                        <option value="Tuba" @if(old('instrument_1') == "Tuba") selected @endif>Tuba</option>
                                                    </optgroup>
                                                    <optgroup label="Percussion Instruments">
                                                        <option value="Timpani" @if(old('instrument_1') == "Timpani") selected @endif>Timpani</option>
                                                        <option value="Orchestral_Percussion" @if(old('instrument_1') == "Orchestral_Percussion") selected @endif>Orchestral Percussion</option>
                                                        <option value="Tuned_Percussion" @if(old('instrument_1') == "Tuned_Percussion") selected @endif>Tuned Percussion</option>
                                                        <option value="Drum_Kit" @if(old('instrument_1') == "Drum_Kit") selected @endif>Drum Kit</option>
                                                    </optgroup>
                                                    <optgroup label="Keyboard/Piano">
                                                        <option value="Piano" @if(old('instrument_1') == "Piano") selected @endif>Piano</option>
                                                        <option value="Organ" @if(old('instrument_1') == "Organ") selected @endif>Organ</option>
                                                    </optgroup>
                                                    <optgroup label="Singing">
                                                        <option value="Male_Singing" @if(old('instrument_1') == "Male") selected @endif>Male</option>
                                                        <option value="Female_Singing" @if(old('instrument_1') == "Female") selected @endif>Female</option>
                                                    </optgroup>
                                                </select>
                                            </div>
                                            <br><br>
                                            <div class="form-group">
                                                <label for="instrument_1_select_min"><i class="fa fa-star" aria-hidden="true"></i>Minimum Level:</label>
                                                <select  id="instrument_1_select_min" name="instrument_1_select_min" required>
                                                    <option value="">-</option>
                                                    <option value="grade1" @if(old('instrument_1_select_min') == "grade1") selected @endif>Grade 1</option>
                                                    <option value="grade2" @if(old('instrument_1_select_min') == "grade2") selected @endif>Grade 2</option>
                                                    <option value="grade3" @if(old('instrument_1_select_min') == "grade3") selected @endif>Grade 3</option>
                                                    <option value="grade4" @if(old('instrument_1_select_min') == "grade4") selected @endif>Grade 4</option>
                                                    <option value="grade5" @if(old('instrument_1_select_min') == "grade5") selected @endif>Grade 5</option>
                                                    <option value="grade6" @if(old('instrument_1_select_min') == "grade6") selected @endif>Grade 6</option>
                                                    <option value="grade7" @if(old('instrument_1_select_min') == "grade7") selected @endif>Grade 7</option>
                                                    <option value="grade8" @if(old('instrument_1_select_min') == "grade8") selected @endif>Grade 8</option>
                                                    <option value="diploma" @if(old('instrument_1_select_min') == "diploma") selected @endif>Diploma</option>
                                                    <option value="concert_soloist" @if(old('instrument_1_select_min') == "concert_soloist") selected @endif>Concert Soloist</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="instrument_1_select_max"><i class="fa fa-star" aria-hidden="true"></i>Maximum Level:</label>
                                                <select  id="instrument_1_select_max" name="instrument_1_select_max" required>
                                                    <option value="">-</option>
                                                    <option value="grade1" @if(old('instrument_1_select_max') == "grade1") selected @endif>Grade 1</option>
                                                    <option value="grade2" @if(old('instrument_1_select_max') == "grade2") selected @endif>Grade 2</option>
                                                    <option value="grade3" @if(old('instrument_1_select_max') == "grade3") selected @endif>Grade 3</option>
                                                    <option value="grade4" @if(old('instrument_1_select_max') == "grade4") selected @endif>Grade 4</option>
                                                    <option value="grade5" @if(old('instrument_1_select_max') == "grade5") selected @endif>Grade 5</option>
                                                    <option value="grade6" @if(old('instrument_1_select_max') == "grade6") selected @endif>Grade 6</option>
                                                    <option value="grade7" @if(old('instrument_1_select_max') == "grade7") selected @endif>Grade 7</option>
                                                    <option value="grade8" @if(old('instrument_1_select_max') == "grade8") selected @endif>Grade 8</option>
                                                    <option value="diploma" @if(old('instrument_1_select_max') == "diploma") selected @endif>Diploma</option>
                                                    <option value="concert_soloist" @if(old('instrument_1_select_max') == "concert_soloist") selected @endif>Concert Soloist</option>
                                                </select>
                                            </div>
                                            </br>
                                        </div>
                                    </div>
                                    <div class="form-group hidden" id="dynamicInput2">
                                        <div class="form-inline">
                                            <div class="form-group">
                                                <label for="instrument_2" class="control-label">Instrument 2</label>
                                                <select class="instrumentSelect" id="instrument_2" name="instrument_2" >
                                                    <option value="">-</option>
                                                    <optgroup label="String Instruments">
                                                        <option value="Violin" @if(old('instrument_2') == "Violin") selected @endif >Violin</option>
                                                        <option value="Viola" @if(old('instrument_2') == "Viola") selected @endif>Viola</option>
                                                        <option value="Cello"  @if(old('instrument_2') == "Cello") selected @endif>Cello</option>
                                                        <option value="Double_Bass" @if(old('instrument_2') == "Double_Bass") selected @endif>Double Bass</option>
                                                        <option value="Harp" @if(old('instrument_2') == "Harp") selected @endif>Harp</option>
                                                        <option value="Guitar" @if(old('instrument_2') == "Guitar") selected @endif>Guitar</option>
                                                    </optgroup>
                                                    <optgroup label="Wind Instruments">
                                                        <option value="Flute" @if(old('instrument_2') == "Flute") selected @endif>Flute</option>
                                                        <option value="Oboe" @if(old('instrument_2') == "Oboe") selected @endif>Oboe</option>
                                                        <option value="Clarinet" @if(old('instrument_2') == "Clarinet") selected @endif>Clarinet</option>
                                                        <option value="Bassoon" @if(old('instrument_2') == "Bassoon") selected @endif>Bassoon</option>
                                                        <option value="Recorder" @if(old('instrument_2') == "Recorder") selected @endif>Recorder</option>
                                                    </optgroup>
                                                    <optgroup label="Brass Instruments">
                                                        <option value="Horn" @if(old('instrument_2') == "Horn") selected @endif>(French) Horn</option>
                                                        <option value="Trumpet" @if(old('instrument_2') == "Trumpet") selected @endif>Trumpet</option>
                                                        <option value="Trombone" @if(old('instrument_2') == "Trombone") selected @endif>Trombone</option>
                                                        <option value="Tuba" @if(old('instrument_2') == "Tuba") selected @endif>Tuba</option>
                                                    </optgroup>
                                                    <optgroup label="Percussion Instruments">
                                                        <option value="Timpani" @if(old('instrument_2') == "Timpani") selected @endif>Timpani</option>
                                                        <option value="Orchestral_Percussion" @if(old('instrument_2') == "Orchestral_Percussion") selected @endif>Orchestral Percussion</option>
                                                        <option value="Tuned_Percussion" @if(old('instrument_2') == "Tuned_Percussion") selected @endif>Tuned Percussion</option>
                                                        <option value="Drum_Kit" @if(old('instrument_2') == "Drum_Kit") selected @endif>Drum Kit</option>
                                                    </optgroup>
                                                    <optgroup label="Keyboard/Piano">
                                                        <option value="Piano" @if(old('instrument_2') == "Piano") selected @endif>Piano</option>
                                                        <option value="Organ" @if(old('instrument_2') == "Organ") selected @endif>Organ</option>
                                                    </optgroup>
                                                    <optgroup label="Singing">
                                                        <option value="Male_Singing" @if(old('instrument_2') == "Male") selected @endif>Male</option>
                                                        <option value="Female_Singing" @if(old('instrument_2') == "Female") selected @endif>Female</option>
                                                    </optgroup>
                                                </select>
                                            </div>
                                            <br><br>
                                            <div class="form-group">
                                                <label for="instrument_2_select_min">Minimum Level:</label>
                                                <select  id="instrument_2_select_min" name="instrument_2_select_min" >
                                                    <option value="">-</option>
                                                    <option value="grade1" @if(old('instrument_2_select_min') == "grade1") selected @endif>Grade 1</option>
                                                    <option value="grade2" @if(old('instrument_2_select_min') == "grade2") selected @endif>Grade 2</option>
                                                    <option value="grade3" @if(old('instrument_2_select_min') == "grade3") selected @endif>Grade 3</option>
                                                    <option value="grade4" @if(old('instrument_2_select_min') == "grade4") selected @endif>Grade 4</option>
                                                    <option value="grade5" @if(old('instrument_2_select_min') == "grade5") selected @endif>Grade 5</option>
                                                    <option value="grade6" @if(old('instrument_2_select_min') == "grade6") selected @endif>Grade 6</option>
                                                    <option value="grade7" @if(old('instrument_2_select_min') == "grade7") selected @endif>Grade 7</option>
                                                    <option value="grade8" @if(old('instrument_2_select_min') == "grade8") selected @endif>Grade 8</option>
                                                    <option value="diploma" @if(old('instrument_2_select_min') == "diploma") selected @endif>Diploma</option>
                                                    <option value="concert_soloist" @if(old('instrument_2_select_min') == "concert_soloist") selected @endif>Concert Soloist</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="instrument_2_select_max">Maximum Level:</label>
                                                <select  id="instrument_2_select_max" name="instrument_2_select_max">
                                                    <option value="">-</option>
                                                    <option value="grade1" @if(old('instrument_2_select_max') == "grade1") selected @endif>Grade 1</option>
                                                    <option value="grade2" @if(old('instrument_2_select_max') == "grade2") selected @endif>Grade 2</option>
                                                    <option value="grade3" @if(old('instrument_2_select_max') == "grade3") selected @endif>Grade 3</option>
                                                    <option value="grade4" @if(old('instrument_2_select_max') == "grade4") selected @endif>Grade 4</option>
                                                    <option value="grade5" @if(old('instrument_2_select_max') == "grade5") selected @endif>Grade 5</option>
                                                    <option value="grade6" @if(old('instrument_2_select_max') == "grade6") selected @endif>Grade 6</option>
                                                    <option value="grade7" @if(old('instrument_2_select_max') == "grade7") selected @endif>Grade 7</option>
                                                    <option value="grade8" @if(old('instrument_2_select_max') == "grade8") selected @endif>Grade 8</option>
                                                    <option value="diploma" @if(old('instrument_2_select_max') == "diploma") selected @endif>Diploma</option>
                                                    <option value="concert_soloist" @if(old('instrument_2_select_max') == "concert_soloist") selected @endif>Concert Soloist</option>
                                                </select>
                                            </div>
                                            </br>
                                        </div>
                                    </div>
                                    <div class="form-group hidden" id="dynamicInput3">
                                        <div class="form-inline">
                                            <div class="form-group">
                                                <label for="instrument_3" class="control-label">Instrument 3</label>
                                                <select class="instrumentSelect" id="instrument_3" name="instrument_3" >
                                                    <option value="">-</option>
                                                    <optgroup label="String Instruments">
                                                        <option value="Violin" @if(old('instrument_3') == "Violin") selected @endif >Violin</option>
                                                        <option value="Viola" @if(old('instrument_3') == "Viola") selected @endif>Viola</option>
                                                        <option value="Cello"  @if(old('instrument_3') == "Cello") selected @endif>Cello</option>
                                                        <option value="Double_Bass" @if(old('instrument_3') == "Double_Bass") selected @endif>Double Bass</option>
                                                        <option value="Harp" @if(old('instrument_3') == "Harp") selected @endif>Harp</option>
                                                        <option value="Guitar" @if(old('instrument_3') == "Guitar") selected @endif>Guitar</option>
                                                    </optgroup>
                                                    <optgroup label="Wind Instruments">
                                                        <option value="Flute" @if(old('instrument_3') == "Flute") selected @endif>Flute</option>
                                                        <option value="Oboe" @if(old('instrument_3') == "Oboe") selected @endif>Oboe</option>
                                                        <option value="Clarinet" @if(old('instrument_3') == "Clarinet") selected @endif>Clarinet</option>
                                                        <option value="Bassoon" @if(old('instrument_3') == "Bassoon") selected @endif>Bassoon</option>
                                                        <option value="Recorder" @if(old('instrument_3') == "Recorder") selected @endif>Recorder</option>
                                                    </optgroup>
                                                    <optgroup label="Brass Instruments">
                                                        <option value="Horn" @if(old('instrument_3') == "Horn") selected @endif>(French) Horn</option>
                                                        <option value="Trumpet" @if(old('instrument_3') == "Trumpet") selected @endif>Trumpet</option>
                                                        <option value="Trombone" @if(old('instrument_3') == "Trombone") selected @endif>Trombone</option>
                                                        <option value="Tuba" @if(old('instrument_3') == "Tuba") selected @endif>Tuba</option>
                                                    </optgroup>
                                                    <optgroup label="Percussion Instruments">
                                                        <option value="Timpani" @if(old('instrument_3') == "Timpani") selected @endif>Timpani</option>
                                                        <option value="Orchestral_Percussion" @if(old('instrument_3') == "Orchestral_Percussion") selected @endif>Orchestral Percussion</option>
                                                        <option value="Tuned_Percussion" @if(old('instrument_3') == "Tuned_Percussion") selected @endif>Tuned Percussion</option>
                                                        <option value="Drum_Kit" @if(old('instrument_3') == "Drum_Kit") selected @endif>Drum Kit</option>
                                                    </optgroup>
                                                    <optgroup label="Keyboard/Piano">
                                                        <option value="Piano" @if(old('instrument_3') == "Piano") selected @endif>Piano</option>
                                                        <option value="Organ" @if(old('instrument_3') == "Organ") selected @endif>Organ</option>
                                                    </optgroup>
                                                    <optgroup label="Singing">
                                                        <option value="Male_Singing" @if(old('instrument_3') == "Male") selected @endif>Male</option>
                                                        <option value="Female_Singing" @if(old('instrument_3') == "Female") selected @endif>Female</option>
                                                    </optgroup>
                                                </select>
                                            </div>
                                            <br><br>
                                            <div class="form-group">
                                                <label for="instrument_3_select_min">Minimum Level:</label>
                                                <select  id="instrument_3_select_min" name="instrument_3_select_min" >
                                                    <option value="">-</option>
                                                    <option value="grade1" @if(old('instrument_3_select_min') == "grade1") selected @endif>Grade 1</option>
                                                    <option value="grade2" @if(old('instrument_3_select_min') == "grade2") selected @endif>Grade 2</option>
                                                    <option value="grade3" @if(old('instrument_3_select_min') == "grade3") selected @endif>Grade 3</option>
                                                    <option value="grade4" @if(old('instrument_3_select_min') == "grade4") selected @endif>Grade 4</option>
                                                    <option value="grade5" @if(old('instrument_3_select_min') == "grade5") selected @endif>Grade 5</option>
                                                    <option value="grade6" @if(old('instrument_3_select_min') == "grade6") selected @endif>Grade 6</option>
                                                    <option value="grade7" @if(old('instrument_3_select_min') == "grade7") selected @endif>Grade 7</option>
                                                    <option value="grade8" @if(old('instrument_3_select_min') == "grade8") selected @endif>Grade 8</option>
                                                    <option value="diploma" @if(old('instrument_3_select_min') == "diploma") selected @endif>Diploma</option>
                                                    <option value="concert_soloist" @if(old('instrument_3_select_min') == "concert_soloist") selected @endif>Concert Soloist</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="instrument_3_select_max">Maximum Level:</label>
                                                <select  id="instrument_3_select_max" name="instrument_3_select_max">
                                                    <option value="">-</option>
                                                    <option value="grade1" @if(old('instrument_3_select_max') == "grade1") selected @endif>Grade 1</option>
                                                    <option value="grade2" @if(old('instrument_3_select_max') == "grade2") selected @endif>Grade 2</option>
                                                    <option value="grade3" @if(old('instrument_3_select_max') == "grade3") selected @endif>Grade 3</option>
                                                    <option value="grade4" @if(old('instrument_3_select_max') == "grade4") selected @endif>Grade 4</option>
                                                    <option value="grade5" @if(old('instrument_3_select_max') == "grade5") selected @endif>Grade 5</option>
                                                    <option value="grade6" @if(old('instrument_3_select_max') == "grade6") selected @endif>Grade 6</option>
                                                    <option value="grade7" @if(old('instrument_3_select_max') == "grade7") selected @endif>Grade 7</option>
                                                    <option value="grade8" @if(old('instrument_3_select_max') == "grade8") selected @endif>Grade 8</option>
                                                    <option value="diploma" @if(old('instrument_3_select_max') == "diploma") selected @endif>Diploma</option>
                                                    <option value="concert_soloist" @if(old('instrument_3_select_max') == "concert_soloist") selected @endif>Concert Soloist</option>
                                                </select>
                                            </div>
                                            </br>
                                        </div>
                                    </div>
                                    <div class="form-group hidden" id="dynamicInput4">
                                        <div class="form-inline">
                                            <div class="form-group">
                                                <label for="instrument_4" class="control-label">Instrument 4</label>
                                                <select class="instrumentSelect" id="instrument_4" name="instrument_4" >
                                                    <option value="">-</option>
                                                    <optgroup label="String Instruments">
                                                        <option value="Violin" @if(old('instrument_4') == "Violin") selected @endif >Violin</option>
                                                        <option value="Viola" @if(old('instrument_4') == "Viola") selected @endif>Viola</option>
                                                        <option value="Cello"  @if(old('instrument_4') == "Cello") selected @endif>Cello</option>
                                                        <option value="Double_Bass" @if(old('instrument_4') == "Double_Bass") selected @endif>Double Bass</option>
                                                        <option value="Harp" @if(old('instrument_4') == "Harp") selected @endif>Harp</option>
                                                        <option value="Guitar" @if(old('instrument_4') == "Guitar") selected @endif>Guitar</option>
                                                    </optgroup>
                                                    <optgroup label="Wind Instruments">
                                                        <option value="Flute" @if(old('instrument_4') == "Flute") selected @endif>Flute</option>
                                                        <option value="Oboe" @if(old('instrument_4') == "Oboe") selected @endif>Oboe</option>
                                                        <option value="Clarinet" @if(old('instrument_4') == "Clarinet") selected @endif>Clarinet</option>
                                                        <option value="Bassoon" @if(old('instrument_4') == "Bassoon") selected @endif>Bassoon</option>
                                                        <option value="Recorder" @if(old('instrument_4') == "Recorder") selected @endif>Recorder</option>
                                                    </optgroup>
                                                    <optgroup label="Brass Instruments">
                                                        <option value="Horn" @if(old('instrument_4') == "Horn") selected @endif>(French) Horn</option>
                                                        <option value="Trumpet" @if(old('instrument_4') == "Trumpet") selected @endif>Trumpet</option>
                                                        <option value="Trombone" @if(old('instrument_4') == "Trombone") selected @endif>Trombone</option>
                                                        <option value="Tuba" @if(old('instrument_4') == "Tuba") selected @endif>Tuba</option>
                                                    </optgroup>
                                                    <optgroup label="Percussion Instruments">
                                                        <option value="Timpani" @if(old('instrument_4') == "Timpani") selected @endif>Timpani</option>
                                                        <option value="Orchestral_Percussion" @if(old('instrument_4') == "Orchestral_Percussion") selected @endif>Orchestral Percussion</option>
                                                        <option value="Tuned_Percussion" @if(old('instrument_4') == "Tuned_Percussion") selected @endif>Tuned Percussion</option>
                                                        <option value="Drum_Kit" @if(old('instrument_4') == "Drum_Kit") selected @endif>Drum Kit</option>
                                                    </optgroup>
                                                    <optgroup label="Keyboard/Piano">
                                                        <option value="Piano" @if(old('instrument_4') == "Piano") selected @endif>Piano</option>
                                                        <option value="Organ" @if(old('instrument_4') == "Organ") selected @endif>Organ</option>
                                                    </optgroup>
                                                    <optgroup label="Singing">
                                                        <option value="Male_Singing" @if(old('instrument_4') == "Male") selected @endif>Male</option>
                                                        <option value="Female_Singing" @if(old('instrument_4') == "Female") selected @endif>Female</option>
                                                    </optgroup>
                                                </select>
                                            </div>
                                            <br><br>
                                            <div class="form-group">
                                                <label for="instrument_4_select_min">Minimum Level:</label>
                                                <select  id="instrument_4_select_min" name="instrument_4_select_min" >
                                                    <option value="">-</option>
                                                    <option value="grade1" @if(old('instrument_4_select_min') == "grade1") selected @endif>Grade 1</option>
                                                    <option value="grade2" @if(old('instrument_4_select_min') == "grade2") selected @endif>Grade 2</option>
                                                    <option value="grade3" @if(old('instrument_4_select_min') == "grade3") selected @endif>Grade 3</option>
                                                    <option value="grade4" @if(old('instrument_4_select_min') == "grade4") selected @endif>Grade 4</option>
                                                    <option value="grade5" @if(old('instrument_4_select_min') == "grade5") selected @endif>Grade 5</option>
                                                    <option value="grade6" @if(old('instrument_4_select_min') == "grade6") selected @endif>Grade 6</option>
                                                    <option value="grade7" @if(old('instrument_4_select_min') == "grade7") selected @endif>Grade 7</option>
                                                    <option value="grade8" @if(old('instrument_4_select_min') == "grade8") selected @endif>Grade 8</option>
                                                    <option value="diploma" @if(old('instrument_4_select_min') == "diploma") selected @endif>Diploma</option>
                                                    <option value="concert_soloist" @if(old('instrument_4_select_min') == "concert_soloist") selected @endif>Concert Soloist</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="instrument_4_select_max">Maximum Level:</label>
                                                <select  id="instrument_4_select_max" name="instrument_4_select_max">
                                                    <option value="">-</option>
                                                    <option value="grade1" @if(old('instrument_4_select_max') == "grade1") selected @endif>Grade 1</option>
                                                    <option value="grade2" @if(old('instrument_4_select_max') == "grade2") selected @endif>Grade 2</option>
                                                    <option value="grade3" @if(old('instrument_4_select_max') == "grade3") selected @endif>Grade 3</option>
                                                    <option value="grade4" @if(old('instrument_4_select_max') == "grade4") selected @endif>Grade 4</option>
                                                    <option value="grade5" @if(old('instrument_4_select_max') == "grade5") selected @endif>Grade 5</option>
                                                    <option value="grade6" @if(old('instrument_4_select_max') == "grade6") selected @endif>Grade 6</option>
                                                    <option value="grade7" @if(old('instrument_4_select_max') == "grade7") selected @endif>Grade 7</option>
                                                    <option value="grade8" @if(old('instrument_4_select_max') == "grade8") selected @endif>Grade 8</option>
                                                    <option value="diploma" @if(old('instrument_4_select_max') == "diploma") selected @endif>Diploma</option>
                                                    <option value="concert_soloist" @if(old('instrument_4_select_max') == "concert_soloist") selected @endif>Concert Soloist</option>
                                                </select>
                                            </div>
                                            </br>
                                        </div>
                                    </div>
                                    <span>Please enter your highest level of qualification</span>

                                        <div class="form-group">
                                            <label for="qualification" class="control-label"><i class="fa fa-star" aria-hidden="true"></i>Qualification (E.G BA Music)</label>

                                            <input type="text" class="form-control" id="Qualification" name="Qualification" value="{{ old('Qualification') }}" placeholder="" required>


                                        </div>
                                    <span>Please enter details of your experience: </span>
                                        <div class="form-group">
                                            <label for="performing_experience" class="control-label"><i class="fa fa-star" aria-hidden="true"></i>Performing Experience</label>

                                            <textarea class="form-control" id="performing_experience"  name="performing_experience"  required>{{ old('performing_experience') }}</textarea>


                                        </div>
                                    <div class="form-group">
                                        <label for="teaching_experience" class="control-label"><i class="fa fa-star" aria-hidden="true"></i>Teaching Experience</label>

                                        <textarea class="form-control" id="teaching_experience" name="teaching_experience" required>{{ old('teaching_experience') }}</textarea>


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

                            </fieldset>
                        </div>
                        <div id="sf4" class="frm" style="display: none;">
                            <fieldset name="four">
                                <legend>Step 4 of 6 - Instruments Taught</legend>
                                <span>which other instruments can you teach at any level? ( Expand (>) and tick all that apply. )</span>
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
                                                            <input type="checkbox" value="Violin" id="Violin" name="Violin" @if(old('Violin')) checked @endif>
                                                            Violin
                                                        </label>
                                                        </br>
                                                        <label>
                                                            <input type="checkbox" value="Viola" id="Viola" name="Viola" @if(old('Viola')) checked @endif>
                                                            Viola
                                                        </label>
                                                        </br>
                                                        <label>
                                                            <input type="checkbox" value="Cello" id="Cello" name="Cello" @if(old('Cello')) checked @endif>
                                                            Cello
                                                        </label>
                                                        </br>
                                                        <label>
                                                            <input type="checkbox" value="Double_Bass" id="Double_Bass" name="Double_Bass" @if(old('Double_Bass')) checked @endif>
                                                            Double Bass
                                                        </label>
                                                        </br>
                                                        <label>
                                                            <input type="checkbox" value="Harp" id="Harp" name="Harp" @if(old('Harp')) checked @endif>
                                                            Harp
                                                        </label>
                                                        </br>
                                                        <label>
                                                            <input type="checkbox" value="Classical_Guitar" id="Classical_Guitar" name="Classical_Guitar" @if(old('Classical_Guitar')) checked @endif>
                                                            Guitar (Classical)
                                                        </label>
                                                        </br>
                                                        <span class="smaller">Other Instruments:</span> </br>
                                                        <label class="smaller">
                                                            <input class="smaller" type="checkbox" value="Electric_Guitar" id="Electric_Guitar" name="Electric_Guitar" @if(old('Electric_Guitar')) checked @endif>
                                                            Electric Guitar
                                                        </label>
                                                        </br>
                                                        <label class="smaller">
                                                            <input class="smaller" type="checkbox" value="Bass_Guitar" id="Bass_Guitar" name="Bass_Guitar" @if(old('Bass_Guitar')) checked @endif>
                                                            Bass Guitar
                                                        </label>
                                                        </br>
                                                        <label class="smaller">
                                                            <input class="smaller" type="checkbox" value="Banjo" id="Banjo" name="Banjo" @if(old('Banjo')) checked @endif>
                                                            Banjo
                                                        </label>
                                                        </br>
                                                        <label class="smaller">
                                                            <input class="smaller" type="checkbox" value="Ukelele" id="Ukelele" name="Ukelele" @if(old('Ukelele')) checked @endif>
                                                            Ukelele
                                                        </label>
                                                        </br>
                                                        <label class="smaller">
                                                            <input class="smaller" type="checkbox" value="Sitar" id="Sitar" name="Sitar" @if(old('Sitar')) checked @endif>
                                                            Sitar
                                                        </label>
                                                        </br>
                                                        <label class="smaller">
                                                            <input class="smaller" type="checkbox" value="Balalaika" id="Balalaika" name="Balalaika" @if(old('Balalaika')) checked @endif>
                                                            Balalaika
                                                        </label>
                                                        </br>
                                                        <label class="smaller">
                                                            <input class="smaller" type="checkbox" value="Mandolin" id="Mandolin" name="Mandolin" @if(old('Mandolin')) checked @endif>
                                                            Mandolin
                                                        </label>
                                                        </br>
                                                        <label class="smaller">
                                                            <input class="smaller" type="checkbox" value="Zither" id="Zither" name="Zither" @if(old('Zither')) checked @endif>
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
                                                            <input type="checkbox" value="Flute" id="Flute" name="Flute" @if(old('Flute')) checked @endif>
                                                            Flute
                                                        </label>
                                                        </br>
                                                        <label>
                                                            <input type="checkbox" value="Clarinet" id="Clarinet" name="Clarinet" @if(old('Clarinet')) checked @endif>
                                                            Clarinet
                                                        </label>
                                                        </br>
                                                        <label>
                                                            <input type="checkbox" value="Oboe" id="Oboe" name="Oboe" @if(old('Oboe')) checked @endif>
                                                            Oboe
                                                        </label>
                                                        </br>
                                                        <label>
                                                            <input type="checkbox" value="Bassoon" id="Bassoon" name="Bassoon" @if(old('Bassoon')) checked @endif>
                                                            Bassoon
                                                        </label>
                                                        </br>
                                                        <label>
                                                            <input type="checkbox" value="Recorder" id="Recorder" name="Recorder" @if(old('Recorder')) checked @endif>
                                                            Recorder
                                                        </label>
                                                        </br>
                                                        <span class="smaller">Other Instruments:</span></br>
                                                        <label class="smaller">
                                                            <input class="smaller" type="checkbox" value="Piccolo" id="Piccolo" name="Piccolo" @if(old('Piccolo')) checked @endif>
                                                            Piccolo
                                                        </label>
                                                        </br>
                                                        <label class="smaller">
                                                            <input class="smaller" type="checkbox" value="Saxophone" id="Saxophone" name="Saxophone" @if(old('Saxophone')) checked @endif>
                                                            Saxophone
                                                        </label>
                                                        </br>
                                                        <label class="smaller">
                                                            <input class="smaller" type="checkbox" value="Cor_Anglais" id="Cor_Anglais" name="Cor_Anglais" @if(old('Cor_Anglais')) checked @endif>
                                                            Cor Anglais
                                                        </label>
                                                        </br>
                                                        <label class="smaller">
                                                            <input class="smaller" type="checkbox" value="Basset_Horn" id="Basset_Horn" name="Basset_Horn" @if(old('Basset_Horn')) checked @endif>
                                                            Basset Horn
                                                        </label>
                                                        </br>
                                                        <label class="smaller">
                                                            <input class="smaller" type="checkbox" value="Bass_Clarinet" id="Bass_Clarinet" name="Bass_Clarinet" @if(old('Bass_Clarinet')) checked @endif>
                                                            Bass Clarinet
                                                        </label>
                                                        </br>
                                                        <label class="smaller">
                                                            <input class="smaller" type="checkbox" value="Contra_Bassoon" id="Contra_Bassoon" name="Contra_Bassoon" @if(old('Contra_Bassoon')) checked @endif>
                                                            Contra Bassoon
                                                        </label>
                                                        </br>
                                                        <label class="smaller">
                                                            <input class="smaller" type="checkbox" value="Bagpipes" id="Bagpipes" name="Bagpipes" @if(old('Bagpipes')) checked @endif>
                                                            Bagpipes
                                                        </label>
                                                        </br>
                                                        <label class="smaller">
                                                            <input class="smaller" type="checkbox" value="Ocarina" id="Ocarina" name="Ocarina" @if(old('Ocarina')) checked @endif>
                                                            Ocarina
                                                        </label>
                                                        </br>
                                                        <label class="smaller">
                                                            <input class="smaller" type="checkbox" value="Mouth_Organ" id="Mouth_Organ" name="Mouth_Organ" @if(old('Mouth_Organ')) checked @endif>
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
                                                            <input type="checkbox" value="Horn" id="Horn" name="Horn" @if(old('Horn')) checked @endif>
                                                            (French) Horn
                                                        </label>
                                                        </br>
                                                        <label>
                                                            <input type="checkbox" value="Trumpet" id="Trumpet" name="Trumpet" @if(old('Trumpet')) checked @endif>
                                                            Trumpet
                                                        </label>
                                                        </br>
                                                        <label>
                                                            <input type="checkbox" value="Trombone" id="Trombone" name="Trombone" @if(old('Trombone')) checked @endif>
                                                            Trombone
                                                        </label>
                                                        </br>
                                                        <label>
                                                            <input type="checkbox" value="Tuba" id="Tuba" name="Tuba" @if(old('Tuba')) checked @endif>
                                                            Tuba
                                                        </label>
                                                        </br>
                                                        <span class="smaller">Other Instruments:</span></br>
                                                        <label class="smaller" >
                                                            <input class="smaller" type="checkbox" value="Cornet" id="Cornet" name="Cornet" @if(old('Cornet')) checked @endif>
                                                            Cornet
                                                        </label>
                                                        </br>
                                                        <label class="smaller" >
                                                            <input class="smaller" type="checkbox" value="Flugel_Horn" id="Flugel_Horn" name="Flugel_Horn"  @if(old('Flugel_Horn')) checked @endif>
                                                            Flugel Horn
                                                        </label>
                                                        </br>
                                                        <label class="smaller" >
                                                            <input class="smaller" type="checkbox" value="Tenor_Horn" id="Tenor_Horn" name="Tenor_Horn"  @if(old('Tenor_Horn')) checked @endif>
                                                            Tenor Horn
                                                        </label>
                                                        </br>
                                                        <label class="smaller" >
                                                            <input class="smaller" type="checkbox" value="Baritone" id="Baritone" name="Baritone"  @if(old('Baritone')) checked @endif>
                                                            Baritone
                                                        </label>
                                                        </br>
                                                        <label class="smaller" >
                                                            <input class="smaller" type="checkbox" value="Euphonium" id="Euphonium" name="Euphonium"  @if(old('Euphonium')) checked @endif>
                                                            Euphonium
                                                        </label>
                                                        </br>
                                                        <label class="smaller" >
                                                            <input class="smaller" type="checkbox" value="Ophicleide" id="Ophicleide" name="Ophicleide"  @if(old('Ophicleide')) checked @endif>
                                                            Ophicleide
                                                        </label>
                                                        </br>
                                                        <label class="smaller" >
                                                            <input class="smaller" type="checkbox" value="Sackbutt" id="Sackbutt" name="Sackbutt"  @if(old('Sackbutt')) checked @endif>
                                                            Sackbutt
                                                        </label>
                                                        </br>
                                                        <label class="smaller" >
                                                            <input class="smaller" type="checkbox" value="Cornette" id="Cornette" name="Cornette"  @if(old('Cornette')) checked @endif>
                                                            Cornette
                                                        </label>
                                                        </br>
                                                        <label class="smaller" >
                                                            <input class="smaller" type="checkbox" value="Serpent" id="Serpent" name="Serpent"  @if(old('Serpent')) checked @endif>
                                                            Serpent
                                                        </label>
                                                        </br>
                                                        <label class="smaller" >
                                                            <input class="smaller" type="checkbox" value="Didgeridoo" id="Didgeridoo" name="Didgeridoo"  @if(old('Didgeridoo')) checked @endif>
                                                            Digeridoo
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
                                                            <input type="checkbox" value="Timpani" id="Timpani" name="Timpani"  @if(old('Timpani')) checked @endif>
                                                            Timpani
                                                        </label>
                                                        </br>
                                                        <label>
                                                            <input type="checkbox" value="Orchestral_Percussion" id="Orchestral_Percussion" name="Orchestral_Percussion"  @if(old('Orchestral_Percussion')) checked @endif>
                                                            Orchestral Percussion
                                                        </label>
                                                        </br>
                                                        <label>
                                                            <input type="checkbox" value="Tuned_Percussion" id="Tuned_Percussion" name="Tuned_Percussion"  @if(old('Tuned_Percussion')) checked @endif>
                                                            Tuned Percussion
                                                        </label>
                                                        </br>
                                                        <label>
                                                            <input type="checkbox" value="Drum_Kit" id="Drum_Kit" name="Drum_Kit"  @if(old('Drum_Kit')) checked @endif>
                                                            Drum Kit
                                                        </label>
                                                        </br>
                                                        <span class="smaller">Other Instruments:</span></br>
                                                        <label class="smaller">
                                                            <input class="smaller" type="checkbox" value="xylophone" id="xylophone" name="xylophone"  @if(old('xylophone')) checked @endif>
                                                            xylophone
                                                        </label>
                                                        </br>
                                                        <label class="smaller">
                                                            <input class="smaller" type="checkbox" value="Marimba" id="Marimba" name="Marimba"  @if(old('Marimba')) checked @endif>
                                                            Marimba
                                                        </label>
                                                        </br>

                                                        <label class="smaller">
                                                            <input class="smaller" type="checkbox" value="Vibraphone" id="Vibraphone" name="Vibraphone"  @if(old('Vibraphone')) checked @endif>
                                                            Vibraphone
                                                        </label>
                                                        </br>

                                                        <label class="smaller">
                                                            <input class="smaller" type="checkbox" value="Glockenspiel" id="Glockenspiel" name="Glockenspiel"  @if(old('Glockenspiel')) checked @endif>
                                                            Glockenspiel
                                                        </label>
                                                        </br>

                                                        <label class="smaller">
                                                            <input class="smaller" type="checkbox" value="Cembalom" id="Cembalom" name="Cembalom"  @if(old('Cembalom')) checked @endif>
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
                                                        <input type="checkbox" value="Piano" id="Piano" name="Piano"  @if(old('Piano')) checked @endif>
                                                        Piano
                                                    </label>
                                                    </br>
                                                    <label>
                                                        <input type="checkbox" value="Organ" id="Organ" name="Organ"  @if(old('Organ')) checked @endif>
                                                        Organ
                                                    </label>
                                                    </br>
                                                    <span class="smaller">Other Instruments:</span></br>
                                                    <label class="smaller">
                                                        <input class="smaller" type="checkbox" value="Keyboard" id="Keyboard" name="Keyboard"  @if(old('Keyboard')) checked @endif>
                                                        Keyboard
                                                    </label>
                                                    </br>
                                                    <label class="smaller">
                                                        <input class="smaller" type="checkbox" value="Harpsichord" id="Harpsichord" name="Harpsichord"  @if(old('Harpsichord')) checked @endif>
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
                                                                <input type="checkbox" value="Male_Singing" id="Male_Singing" name="Male_Singing"  @if(old('Male_Singing')) checked @endif>
                                                                Male
                                                            </label>
                                                            <br>
                                                            <label>
                                                                <input type="checkbox" value="Female_Singing" id="Female_Singing" name="Female_Singing"  @if(old('Female_Singing')) checked @endif>
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
                                            <button class="btn btn-warning back4" type="button"><span class="fa fa-arrow-left"></span> Back</button>
                                            <button class="btn btn-primary open4" type="button">Next <span class="fa fa-arrow-right"></span></button>
                                        </div>
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

                                        <input type="number" class="form-control" id="minage"  name="minage" required="" value="{{ old('minage') }}" min="0" step="1">


                                    </div>
                                    <div class="form-group col-xs-4">
                                            <label for="maxage" class="control-label"><i class="fa fa-star" aria-hidden="true"></i>Maximum age taught</label>

                                            <input type="number" class="form-control" id="maxage" name="maxage"  required="" value="{{ old('maxage') }}" min="0" step="1">
                                     </div>
                                    <br>
                                </div>
                                </br>
                                <span>I... (Check all that apply)</span>
                                <div class="form-group">
                                    <div class="checkbox">
                                        <label><input type="checkbox" name="teach_at_pupil_home" value="teach_at_pupil_home" @if(old('teach_at_pupil_home')) checked @endif>Teach at pupil's home</label>
                                    </div>
                                    <div class="checkbox">
                                        <label><input type="checkbox" name="teach_at_own_home" value="teach_at_own_home" @if(old('teach_at_own_home')) checked @endif>Teach at own home</label>
                                    </div>
                                    <div class="checkbox">
                                        <label><input type="checkbox" name="teach_online" value="teach_online" @if(old('teach_online')) checked @endif>Teach online</label>
                                    </div>
                                    <div class="checkbox">
                                        <label><input type="checkbox" name="teach_at_school" value="teach_at_school" @if(old('teach_at_school')) checked @endif>Teach at school</label>
                                    </div>
                                    <div class="checkbox">
                                        <label><input type="checkbox" id="tmt-cb" name="tmt_cb" value="teach_theory" onchange="valueChangedTmt();" @if(old('teach_theory')) checked @endif>Teach Music Theory</label>
                                    </div>
                                    <div class="form-group hidden" id="tmt">
                                        <label for="level_musictheory">Max Level:</label>
                                        <select  id="level_musictheory" name="level_musictheory">
                                            <option value="">-</option>
                                            <option value="grade1 " @if(old('level_musictheory') == "grade1") selected @endif>Grade 1</option>
                                            <option value="grade2" @if(old('level_musictheory') == "grade2") selected @endif>Grade 2</option>
                                            <option value="grade3" @if(old('level_musictheory') == "grade3") selected @endif>Grade 3</option>
                                            <option value="grade4" @if(old('level_musictheory') == "grade4") selected @endif>Grade 4</option>
                                            <option value="grade5" @if(old('level_musictheory') == "grade5") selected @endif>Grade 5</option>
                                            <option value="grade6" @if(old('level_musictheory') == "grade6") selected @endif>Grade 6</option>
                                            <option value="grade7" @if(old('level_musictheory') == "grade7") selected @endif>Grade 7</option>
                                            <option value="grade8" @if(old('level_musictheory') == "grade8") selected @endif>Grade 8</option>
                                            <option value="diploma" @if(old('level_musictheory') == "diploma") selected @endif>Diploma</option>
                                            <option value="concert_soloist" @if(old('level_musictheory') == "concert_soloist") selected @endif>Concert Soloist</option>
                                        </select>
                                    </div>
                                    <div class="checkbox" >
                                        <label><input type="checkbox" id="ta-cb" name="ta_cb" value="teach_aural" onchange="valueChangedTa();" @if(old('teach_aural') == "teach_aural") selected @endif>Teach Aural</label>
                                    </div>
                                    <div class="form-group hidden" id="ta">
                                        <label for="level_aural">Max Level:</label>
                                        <select  id="level_aural" name="level_aural">
                                            <option value="">-</option>
                                            <option value="grade1 " @if(old('level_aural') == "grade1") selected @endif>Grade 1</option>
                                            <option value="grade2" @if(old('level_aural') == "grade2") selected @endif>Grade 2</option>
                                            <option value="grade3" @if(old('level_aural') == "grade3") selected @endif>Grade 3</option>
                                            <option value="grade4" @if(old('level_aural') == "grade4") selected @endif>Grade 4</option>
                                            <option value="grade5" @if(old('level_aural') == "grade5") selected @endif>Grade 5</option>
                                            <option value="grade6" @if(old('level_aural') == "grade6") selected @endif>Grade 6</option>
                                            <option value="grade7" @if(old('level_aural') == "grade7") selected @endif>Grade 7</option>
                                            <option value="grade8" @if(old('level_aural') == "grade8") selected @endif>Grade 8</option>
                                            <option value="diploma" @if(old('level_aural') == "diploma") selected @endif>Diploma</option>
                                            <option value="concert_soloist" @if(old('level_aural') == "concert_soloist") selected @endif>Concert Soloist</option>
                                        </select>
                                    </div>
                                    <div class="checkbox" >
                                        <label><input type="checkbox" id="tc-cb" name="tc_cb"value="teach_composition" onchange="valueChangedTc();">Teach Composition</label>
                                    </div>
                                    <div class="form-group hidden" id="tc">
                                        <label for="level_composition">Max Level:</label>
                                        <select  id="level_composition" name="level_composition">
                                            <option value="">-</option>
                                            <option value="grade1 " @if(old('level_composition') == "grade1") selected @endif>Grade 1</option>
                                            <option value="grade2" @if(old('level_composition') == "grade2") selected @endif>Grade 2</option>
                                            <option value="grade3" @if(old('level_composition') == "grade3") selected @endif>Grade 3</option>
                                            <option value="grade4" @if(old('level_composition') == "grade4") selected @endif>Grade 4</option>
                                            <option value="grade5" @if(old('level_composition') == "grade5") selected @endif>Grade 5</option>
                                            <option value="grade6" @if(old('level_composition') == "grade6") selected @endif>Grade 6</option>
                                            <option value="grade7" @if(old('level_composition') == "grade7") selected @endif>Grade 7</option>
                                            <option value="grade8" @if(old('level_composition') == "grade8") selected @endif>Grade 8</option>
                                            <option value="diploma" @if(old('level_composition') == "diploma") selected @endif>Diploma</option>
                                            <option value="concert_soloist" @if(old('level_composition') == "concert_soloist") selected @endif>Concert Soloist</option>
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
                                                <label><input type="checkbox" id="cb-acc" name="cb_acc"  value="accompanies"  @if(old('cb_acc')) checked @endif onchange="valueChangedAcc();">Do you accompany students?</label>
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
                                                <label><input type="checkbox" id="crb" name="crb" @if(old('crb')) checked @endif value="crb">Are you CRB checked?</label>
                                            </div>
                                        </div>
                                    <div class=form-group>
                                        <div class="checkbox" >
                                            <label><input type="checkbox" id="repair" name="repair" value="repair" @if(old('repair')) checked @endif onchange="valueChangedRepair();">Do you repair instruments?</label>
                                        </div>
                                    </div>
                                    <div class="form-group hidden" id="repair_inst">
                                        <label for="repair_inst" class="control-label">Please enter the name of any instruments you repair below</label>

                                        <input type="text"  name="repair_instruments" value="{{ old('repair_instruments') }}" placeholder="">


                                    </div>
                                    <span>Please enter any further details you would like to be displayed to potential students that are not covered above </span>
                                    <div class="form-group">
                                        <label for="biography" class="control-label">Further biographical details:</label>

                                        <textarea class="form-control" id="biography" name="biography">{{ old('biography') }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="thumbnail_image" class="control-label">Add an image to be used for your profile (optional)</label>
                                        {!! Form::file('thumbnail_image') !!}

                                    </div>
                                    <span> Please enter a password to allow you to log in and edit the information you are entering.
                                    Please note, if you have entered an email address which is already registered on the site (As a teacher, group or repairer) please use <b>the same</b> password here</span>
                                    <div class="form-group">
                                        <label for="password" class="control-label">Please enter a password</label>
                                        <input type="password" class="form-control" id="password" name="password" required placeholder="">

                                    </div>
                                    <div class="form-group">
                                        <label for="password2" class="control-label">Please re-enter the password to confirm they match:</label>
                                        <input type="password" class="form-control" id="password2" name="password2" required placeholder="">

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

