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
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
        </div> <!-- end .flash-message -->
        <div class="col-lg-offset-2 col-lg-8">
            <div class="panel panel-default" id="multistep-panel" >
                <div class="panel-heading cent">
                    <h3 class="panel-title">Edit Teachers</h3>
                </div>
                <div class="panel-body">
                    <form name="basicform" id="basicform" method="post" action="/teach/edit/post" enctype="multipart/form-data">
                        {!! csrf_field() !!}

                        <div id="sf1" class="frm">
                            <fieldset name="one">
                                <legend>Step 1 of 6 - Personal Details</legend>
                                <div class="form-group">
                                    <label for="firstname" class="control-label"><i class="fa fa-star" aria-hidden="true"></i>First Name</label>

                                    <input type="text" class="form-control" id="firstname" name="firstname" placeholder="" value="{{ $data->first_name}}" required="">


                                </div>
                                <div class="form-group">
                                    <label for="lastname" class="control-label"><i class="fa fa-star" aria-hidden="true"></i>Last Name</label>

                                    <input type="text" class="form-control" id="lastname" name="lastname" placeholder="" value="{{ $data->last_name}}" required="">


                                </div>
                                <div class="form-group">
                                    <label for="addr1" class="control-label"><i class="fa fa-star" aria-hidden="true"></i>Address Line 1</label>

                                    <input type="text" class="form-control" id="addr1" name="addr1" placeholder="" value="{{ $data->address_line1 }}" required="">


                                </div>
                                <div class="form-group">
                                    <label for="addr2" class="control-label">Address Line 2</label>

                                    <input type="text" class="form-control" id="addr2" name="addr2"  value="{{ $data->address_line2 }}" placeholder="" >


                                </div>
                                <div class="form-group">
                                    <label for="city" class="control-label"><i class="fa fa-star" aria-hidden="true"></i>City</label>

                                    <input type="text" class="form-control" id="city" name="city"  value="{{ $data->city }}" placeholder="" required="">


                                </div>
                                <div class="form-group">
                                    <label for="postcode" class="control-label"><i class="fa fa-star" aria-hidden="true"></i>Postcode</label>

                                    <input type="text" class="form-control" id="postcode" name="postcode" value="{{ $data->postcode }}" placeholder="" required="">


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

                                        <input type="email" class="form-control" id="email" value="{{ $data->email }}" name="email" placeholder="" required="">


                                    </div>
                                    <div class="form-group">
                                        <label for="phone" class="control-label">Phone Number</label>

                                        <input type="tel" class="form-control" id="phone" name="phone" value="{{ $data->phone }}" placeholder="">
                                        <p class="help-block">Optional</p>

                                    </div>

                                    <div class="form-group">
                                        <label for="mobile" class="control-label">Mobile Number</label>

                                        <input type="tel" class="form-control" id="mobile" value="{{ $data->mobile }}" name="mobile" placeholder="">
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
                                                        <option value="Violin" @if( $data->instruments_played1 == "Violin") selected @endif >Violin</option>
                                                        <option value="Viola" @if( $data->instruments_played1 == "Viola") selected @endif>Viola</option>
                                                        <option value="Cello"  @if( $data->instruments_played1 == "Cello") selected @endif>Cello</option>
                                                        <option value="Double_Bass" @if( $data->instruments_played1 == "Double_Bass") selected @endif>Double Bass</option>
                                                        <option value="Harp" @if( $data->instruments_played1 == "Harp") selected @endif>Harp</option>
                                                        <option value="Guitar" @if( $data->instruments_played1 == "Guitar") selected @endif>Guitar</option>
                                                    </optgroup>
                                                    <optgroup label="Wind Instruments">
                                                        <option value="Flute" @if( $data->instruments_played1 == "Flute") selected @endif>Flute</option>
                                                        <option value="Oboe" @if( $data->instruments_played1 == "Oboe") selected @endif>Oboe</option>
                                                        <option value="Clarinet" @if( $data->instruments_played1 == "Clarinet") selected @endif>Clarinet</option>
                                                        <option value="Bassoon" @if( $data->instruments_played1 == "Bassoon") selected @endif>Bassoon</option>
                                                        <option value="Recorder" @if( $data->instruments_played1 == "Recorder") selected @endif>Recorder</option>
                                                    </optgroup>
                                                    <optgroup label="Brass Instruments">
                                                        <option value="Horn" @if( $data->instruments_played1 == "Horn") selected @endif>(French) Horn</option>
                                                        <option value="Trumpet" @if( $data->instruments_played1 == "Trumpet") selected @endif>Trumpet</option>
                                                        <option value="Trombone" @if( $data->instruments_played1 == "Trombone") selected @endif>Trombone</option>
                                                        <option value="Tuba" @if( $data->instruments_played1 == "Tuba") selected @endif>Tuba</option>
                                                    </optgroup>
                                                    <optgroup label="Percussion Instruments">
                                                        <option value="Timpani" @if( $data->instruments_played1 == "Timpani") selected @endif>Timpani</option>
                                                        <option value="Orchestral_Percussion" @if( $data->instruments_played1 == "Orchestral_Percussion") selected @endif>Orchestral Percussion</option>
                                                        <option value="Tuned_Percussion" @if( $data->instruments_played1 == "Tuned_Percussion") selected @endif>Tuned Percussion</option>
                                                        <option value="Drum_Kit" @if( $data->instruments_played1 == "Drum_Kit") selected @endif>Drum Kit</option>
                                                    </optgroup>
                                                    <optgroup label="Keyboard/Piano">
                                                        <option value="Piano" @if( $data->instruments_played1 == "Piano") selected @endif>Piano</option>
                                                        <option value="Organ" @if( $data->instruments_played1 == "Organ") selected @endif>Organ</option>
                                                    </optgroup>
                                                    <optgroup label="Singing">
                                                        <option value="Male_Singing" @if( $data->instruments_played1 == "Male") selected @endif>Male</option>
                                                        <option value="Female_Singing" @if( $data->instruments_played1 == "Female") selected @endif>Female</option>
                                                    </optgroup>
                                                </select>
                                            </div>
                                            <br><br>
                                            <div class="form-group">
                                                <label for="instrument_1_select_min"><i class="fa fa-star" aria-hidden="true"></i>Minimum Level:</label>
                                                <select  id="instrument_1_select_min" name="instrument_1_select_min" required>
                                                    <option value="">-</option>
                                                    <option value="grade1" @if(  $data->level_min_instrument1 == "grade1") selected @endif>Grade 1</option>
                                                    <option value="grade2" @if(  $data->level_min_instrument1 == "grade2") selected @endif>Grade 2</option>
                                                    <option value="grade3" @if(  $data->level_min_instrument1 == "grade3") selected @endif>Grade 3</option>
                                                    <option value="grade4" @if(  $data->level_min_instrument1 == "grade4") selected @endif>Grade 4</option>
                                                    <option value="grade5" @if(  $data->level_min_instrument1 == "grade5") selected @endif>Grade 5</option>
                                                    <option value="grade6" @if(  $data->level_min_instrument1 == "grade6") selected @endif>Grade 6</option>
                                                    <option value="grade7" @if(  $data->level_min_instrument1 == "grade7") selected @endif>Grade 7</option>
                                                    <option value="grade8" @if(  $data->level_min_instrument1 == "grade8") selected @endif>Grade 8</option>
                                                    <option value="diploma" @if(  $data->level_min_instrument1 == "diploma") selected @endif>Diploma</option>
                                                    <option value="concert_soloist" @if(  $data->level_min_instrument1 == "concert_soloist") selected @endif>Concert Soloist</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="instrument_1_select_max"><i class="fa fa-star" aria-hidden="true"></i>Maximum Level:</label>
                                                <select  id="instrument_1_select_max" name="instrument_1_select_max" required>
                                                    <option value="">-</option>
                                                    <option value="grade1" @if(  $data->level_max_instrument1 == "grade1") selected @endif>Grade 1</option>
                                                    <option value="grade2" @if(  $data->level_max_instrument1 == "grade2") selected @endif>Grade 2</option>
                                                    <option value="grade3" @if(  $data->level_max_instrument1 == "grade3") selected @endif>Grade 3</option>
                                                    <option value="grade4" @if(  $data->level_max_instrument1 == "grade4") selected @endif>Grade 4</option>
                                                    <option value="grade5" @if(  $data->level_max_instrument1 == "grade5") selected @endif>Grade 5</option>
                                                    <option value="grade6" @if(  $data->level_max_instrument1 == "grade6") selected @endif>Grade 6</option>
                                                    <option value="grade7" @if(  $data->level_max_instrument1 == "grade7") selected @endif>Grade 7</option>
                                                    <option value="grade8" @if(  $data->level_max_instrument1 == "grade8") selected @endif>Grade 8</option>
                                                    <option value="diploma" @if(  $data->level_max_instrument1 == "diploma") selected @endif>Diploma</option>
                                                    <option value="concert_soloist" @if(  $data->level_max_instrument1 == "concert_soloist") selected @endif>Concert Soloist</option>
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
                                                        <option value="Violin" @if( $data->instruments_played2 == "Violin") selected @endif >Violin</option>
                                                        <option value="Viola" @if( $data->instruments_played2 == "Viola") selected @endif>Viola</option>
                                                        <option value="Cello"  @if( $data->instruments_played2 == "Cello") selected @endif>Cello</option>
                                                        <option value="Double_Bass" @if( $data->instruments_played2 == "Double_Bass") selected @endif>Double Bass</option>
                                                        <option value="Harp" @if( $data->instruments_played2 == "Harp") selected @endif>Harp</option>
                                                        <option value="Guitar" @if( $data->instruments_played2 == "Guitar") selected @endif>Guitar</option>
                                                    </optgroup>
                                                    <optgroup label="Wind Instruments">
                                                        <option value="Flute" @if( $data->instruments_played2 == "Flute") selected @endif>Flute</option>
                                                        <option value="Oboe" @if( $data->instruments_played2 == "Oboe") selected @endif>Oboe</option>
                                                        <option value="Clarinet" @if( $data->instruments_played2 == "Clarinet") selected @endif>Clarinet</option>
                                                        <option value="Bassoon" @if( $data->instruments_played2 == "Bassoon") selected @endif>Bassoon</option>
                                                        <option value="Recorder" @if( $data->instruments_played2 == "Recorder") selected @endif>Recorder</option>
                                                    </optgroup>
                                                    <optgroup label="Brass Instruments">
                                                        <option value="Horn" @if( $data->instruments_played2 == "Horn") selected @endif>(French) Horn</option>
                                                        <option value="Trumpet" @if( $data->instruments_played2 == "Trumpet") selected @endif>Trumpet</option>
                                                        <option value="Trombone" @if( $data->instruments_played2 == "Trombone") selected @endif>Trombone</option>
                                                        <option value="Tuba" @if( $data->instruments_played2 == "Tuba") selected @endif>Tuba</option>
                                                    </optgroup>
                                                    <optgroup label="Percussion Instruments">
                                                        <option value="Timpani" @if( $data->instruments_played2 == "Timpani") selected @endif>Timpani</option>
                                                        <option value="Orchestral_Percussion" @if( $data->instruments_played2 == "Orchestral_Percussion") selected @endif>Orchestral Percussion</option>
                                                        <option value="Tuned_Percussion" @if( $data->instruments_played2 == "Tuned_Percussion") selected @endif>Tuned Percussion</option>
                                                        <option value="Drum_Kit" @if( $data->instruments_played2 == "Drum_Kit") selected @endif>Drum Kit</option>
                                                    </optgroup>
                                                    <optgroup label="Keyboard/Piano">
                                                        <option value="Piano" @if( $data->instruments_played2 == "Piano") selected @endif>Piano</option>
                                                        <option value="Organ" @if( $data->instruments_played2 == "Organ") selected @endif>Organ</option>
                                                    </optgroup>
                                                    <optgroup label="Singing">
                                                        <option value="Male_Singing" @if( $data->instruments_played2 == "Male") selected @endif>Male</option>
                                                        <option value="Female_Singing" @if( $data->instruments_played2 == "Female") selected @endif>Female</option>
                                                    </optgroup>
                                                </select>
                                            </div>
                                            <br><br>
                                            <div class="form-group">
                                                <label for="instrument_2_select_min">Minimum Level:</label>
                                                <select  id="instrument_2_select_min" name="instrument_2_select_min" >
                                                    <option value="">-</option>
                                                    <option value="grade1" @if(  $data->level_min_instrument2 == "grade1") selected @endif>Grade 1</option>
                                                    <option value="grade2" @if(  $data->level_min_instrument2 == "grade2") selected @endif>Grade 2</option>
                                                    <option value="grade3" @if(  $data->level_min_instrument2 == "grade3") selected @endif>Grade 3</option>
                                                    <option value="grade4" @if(  $data->level_min_instrument2 == "grade4") selected @endif>Grade 4</option>
                                                    <option value="grade5" @if(  $data->level_min_instrument2 == "grade5") selected @endif>Grade 5</option>
                                                    <option value="grade6" @if(  $data->level_min_instrument2 == "grade6") selected @endif>Grade 6</option>
                                                    <option value="grade7" @if(  $data->level_min_instrument2 == "grade7") selected @endif>Grade 7</option>
                                                    <option value="grade8" @if(  $data->level_min_instrument2 == "grade8") selected @endif>Grade 8</option>
                                                    <option value="diploma" @if(  $data->level_min_instrument2 == "diploma") selected @endif>Diploma</option>
                                                    <option value="concert_soloist" @if(  $data->level_min_instrument2 == "concert_soloist") selected @endif>Concert Soloist</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="instrument_2_select_max">Maximum Level:</label>
                                                <select  id="instrument_2_select_max" name="instrument_2_select_max">
                                                    <option value="">-</option>
                                                    <option value="grade1" @if(  $data->level_max_instrument2 == "grade1") selected @endif>Grade 1</option>
                                                    <option value="grade2" @if(  $data->level_max_instrument2 == "grade2") selected @endif>Grade 2</option>
                                                    <option value="grade3" @if(  $data->level_max_instrument2 == "grade3") selected @endif>Grade 3</option>
                                                    <option value="grade4" @if(  $data->level_max_instrument2 == "grade4") selected @endif>Grade 4</option>
                                                    <option value="grade5" @if(  $data->level_max_instrument2 == "grade5") selected @endif>Grade 5</option>
                                                    <option value="grade6" @if(  $data->level_max_instrument2 == "grade6") selected @endif>Grade 6</option>
                                                    <option value="grade7" @if(  $data->level_max_instrument2 == "grade7") selected @endif>Grade 7</option>
                                                    <option value="grade8" @if(  $data->level_max_instrument2 == "grade8") selected @endif>Grade 8</option>
                                                    <option value="diploma" @if(  $data->level_max_instrument2 == "diploma") selected @endif>Diploma</option>
                                                    <option value="concert_soloist" @if(  $data->level_max_instrument2 == "concert_soloist") selected @endif>Concert Soloist</option>
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
                                                        <option value="Violin" @if( $data->instruments_played3 == "Violin") selected @endif >Violin</option>
                                                        <option value="Viola" @if( $data->instruments_played3 == "Viola") selected @endif>Viola</option>
                                                        <option value="Cello"  @if( $data->instruments_played3 == "Cello") selected @endif>Cello</option>
                                                        <option value="Double_Bass" @if( $data->instruments_played3 == "Double_Bass") selected @endif>Double Bass</option>
                                                        <option value="Harp" @if( $data->instruments_played3 == "Harp") selected @endif>Harp</option>
                                                        <option value="Guitar" @if( $data->instruments_played3 == "Guitar") selected @endif>Guitar</option>
                                                    </optgroup>
                                                    <optgroup label="Wind Instruments">
                                                        <option value="Flute" @if( $data->instruments_played3 == "Flute") selected @endif>Flute</option>
                                                        <option value="Oboe" @if( $data->instruments_played3 == "Oboe") selected @endif>Oboe</option>
                                                        <option value="Clarinet" @if( $data->instruments_played3 == "Clarinet") selected @endif>Clarinet</option>
                                                        <option value="Bassoon" @if( $data->instruments_played3 == "Bassoon") selected @endif>Bassoon</option>
                                                        <option value="Recorder" @if( $data->instruments_played3 == "Recorder") selected @endif>Recorder</option>
                                                    </optgroup>
                                                    <optgroup label="Brass Instruments">
                                                        <option value="Horn" @if( $data->instruments_played3 == "Horn") selected @endif>(French) Horn</option>
                                                        <option value="Trumpet" @if( $data->instruments_played3 == "Trumpet") selected @endif>Trumpet</option>
                                                        <option value="Trombone" @if( $data->instruments_played3 == "Trombone") selected @endif>Trombone</option>
                                                        <option value="Tuba" @if( $data->instruments_played3 == "Tuba") selected @endif>Tuba</option>
                                                    </optgroup>
                                                    <optgroup label="Percussion Instruments">
                                                        <option value="Timpani" @if( $data->instruments_played3 == "Timpani") selected @endif>Timpani</option>
                                                        <option value="Orchestral_Percussion" @if( $data->instruments_played3 == "Orchestral_Percussion") selected @endif>Orchestral Percussion</option>
                                                        <option value="Tuned_Percussion" @if( $data->instruments_played3 == "Tuned_Percussion") selected @endif>Tuned Percussion</option>
                                                        <option value="Drum_Kit" @if( $data->instruments_played3 == "Drum_Kit") selected @endif>Drum Kit</option>
                                                    </optgroup>
                                                    <optgroup label="Keyboard/Piano">
                                                        <option value="Piano" @if( $data->instruments_played3 == "Piano") selected @endif>Piano</option>
                                                        <option value="Organ" @if( $data->instruments_played3 == "Organ") selected @endif>Organ</option>
                                                    </optgroup>
                                                    <optgroup label="Singing">
                                                        <option value="Male_Singing" @if( $data->instruments_played3 == "Male") selected @endif>Male</option>
                                                        <option value="Female_Singing" @if( $data->instruments_played3 == "Female") selected @endif>Female</option>
                                                    </optgroup>
                                                </select>
                                            </div>
                                            <br><br>
                                            <div class="form-group">
                                                <label for="instrument_3_select_min">Minimum Level:</label>
                                                <select  id="instrument_3_select_min" name="instrument_3_select_min" >
                                                    <option value="">-</option>
                                                    <option value="grade1" @if(  $data->level_min_instrument3 == "grade1") selected @endif>Grade 1</option>
                                                    <option value="grade2" @if(  $data->level_min_instrument3 == "grade2") selected @endif>Grade 2</option>
                                                    <option value="grade3" @if(  $data->level_min_instrument3 == "grade3") selected @endif>Grade 3</option>
                                                    <option value="grade4" @if(  $data->level_min_instrument3 == "grade4") selected @endif>Grade 4</option>
                                                    <option value="grade5" @if(  $data->level_min_instrument3 == "grade5") selected @endif>Grade 5</option>
                                                    <option value="grade6" @if(  $data->level_min_instrument3 == "grade6") selected @endif>Grade 6</option>
                                                    <option value="grade7" @if(  $data->level_min_instrument3 == "grade7") selected @endif>Grade 7</option>
                                                    <option value="grade8" @if(  $data->level_min_instrument3 == "grade8") selected @endif>Grade 8</option>
                                                    <option value="diploma" @if(  $data->level_min_instrument3 == "diploma") selected @endif>Diploma</option>
                                                    <option value="concert_soloist" @if(  $data->level_min_instrument3 == "concert_soloist") selected @endif>Concert Soloist</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="instrument_3_select_max">Maximum Level:</label>
                                                <select  id="instrument_3_select_max" name="instrument_3_select_max">
                                                    <option value="">-</option>
                                                    <option value="grade1" @if(  $data->level_max_instrument3 == "grade1") selected @endif>Grade 1</option>
                                                    <option value="grade2" @if(  $data->level_max_instrument3 == "grade2") selected @endif>Grade 2</option>
                                                    <option value="grade3" @if(  $data->level_max_instrument3 == "grade3") selected @endif>Grade 3</option>
                                                    <option value="grade4" @if(  $data->level_max_instrument3 == "grade4") selected @endif>Grade 4</option>
                                                    <option value="grade5" @if(  $data->level_max_instrument3 == "grade5") selected @endif>Grade 5</option>
                                                    <option value="grade6" @if(  $data->level_max_instrument3 == "grade6") selected @endif>Grade 6</option>
                                                    <option value="grade7" @if(  $data->level_max_instrument3 == "grade7") selected @endif>Grade 7</option>
                                                    <option value="grade8" @if(  $data->level_max_instrument3 == "grade8") selected @endif>Grade 8</option>
                                                    <option value="diploma" @if(  $data->level_max_instrument3 == "diploma") selected @endif>Diploma</option>
                                                    <option value="concert_soloist" @if(  $data->level_max_instrument3 == "concert_soloist") selected @endif>Concert Soloist</option>
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
                                                        <option value="Violin" @if( $data->instruments_played4 == "Violin") selected @endif >Violin</option>
                                                        <option value="Viola" @if( $data->instruments_played4 == "Viola") selected @endif>Viola</option>
                                                        <option value="Cello"  @if( $data->instruments_played4 == "Cello") selected @endif>Cello</option>
                                                        <option value="Double_Bass" @if( $data->instruments_played4 == "Double_Bass") selected @endif>Double Bass</option>
                                                        <option value="Harp" @if( $data->instruments_played4 == "Harp") selected @endif>Harp</option>
                                                        <option value="Guitar" @if( $data->instruments_played4 == "Guitar") selected @endif>Guitar</option>
                                                    </optgroup>
                                                    <optgroup label="Wind Instruments">
                                                        <option value="Flute" @if( $data->instruments_played4 == "Flute") selected @endif>Flute</option>
                                                        <option value="Oboe" @if( $data->instruments_played4 == "Oboe") selected @endif>Oboe</option>
                                                        <option value="Clarinet" @if( $data->instruments_played4 == "Clarinet") selected @endif>Clarinet</option>
                                                        <option value="Bassoon" @if( $data->instruments_played4 == "Bassoon") selected @endif>Bassoon</option>
                                                        <option value="Recorder" @if( $data->instruments_played4 == "Recorder") selected @endif>Recorder</option>
                                                    </optgroup>
                                                    <optgroup label="Brass Instruments">
                                                        <option value="Horn" @if( $data->instruments_played4 == "Horn") selected @endif>(French) Horn</option>
                                                        <option value="Trumpet" @if( $data->instruments_played4 == "Trumpet") selected @endif>Trumpet</option>
                                                        <option value="Trombone" @if( $data->instruments_played4 == "Trombone") selected @endif>Trombone</option>
                                                        <option value="Tuba" @if( $data->instruments_played4 == "Tuba") selected @endif>Tuba</option>
                                                    </optgroup>
                                                    <optgroup label="Percussion Instruments">
                                                        <option value="Timpani" @if( $data->instruments_played4 == "Timpani") selected @endif>Timpani</option>
                                                        <option value="Orchestral_Percussion" @if( $data->instruments_played4 == "Orchestral_Percussion") selected @endif>Orchestral Percussion</option>
                                                        <option value="Tuned_Percussion" @if( $data->instruments_played4 == "Tuned_Percussion") selected @endif>Tuned Percussion</option>
                                                        <option value="Drum_Kit" @if( $data->instruments_played4 == "Drum_Kit") selected @endif>Drum Kit</option>
                                                    </optgroup>
                                                    <optgroup label="Keyboard/Piano">
                                                        <option value="Piano" @if( $data->instruments_played4 == "Piano") selected @endif>Piano</option>
                                                        <option value="Organ" @if( $data->instruments_played4 == "Organ") selected @endif>Organ</option>
                                                    </optgroup>
                                                    <optgroup label="Singing">
                                                        <option value="Male_Singing" @if( $data->instruments_played4 == "Male") selected @endif>Male</option>
                                                        <option value="Female_Singing" @if( $data->instruments_played4 == "Female") selected @endif>Female</option>
                                                    </optgroup>
                                                </select>
                                            </div>
                                            <br><br>
                                            <div class="form-group">
                                                <label for="instrument_4_select_min">Minimum Level:</label>
                                                <select  id="instrument_4_select_min" name="instrument_4_select_min" >
                                                    <option value="">-</option>
                                                    <option value="grade1" @if(  $data->level_min_instrument4 == "grade1") selected @endif>Grade 1</option>
                                                    <option value="grade2" @if(  $data->level_min_instrument4 == "grade2") selected @endif>Grade 2</option>
                                                    <option value="grade3" @if(  $data->level_min_instrument4 == "grade3") selected @endif>Grade 3</option>
                                                    <option value="grade4" @if(  $data->level_min_instrument4 == "grade4") selected @endif>Grade 4</option>
                                                    <option value="grade5" @if(  $data->level_min_instrument4 == "grade5") selected @endif>Grade 5</option>
                                                    <option value="grade6" @if(  $data->level_min_instrument4 == "grade6") selected @endif>Grade 6</option>
                                                    <option value="grade7" @if(  $data->level_min_instrument4 == "grade7") selected @endif>Grade 7</option>
                                                    <option value="grade8" @if(  $data->level_min_instrument4 == "grade8") selected @endif>Grade 8</option>
                                                    <option value="diploma" @if(  $data->level_min_instrument4 == "diploma") selected @endif>Diploma</option>
                                                    <option value="concert_soloist" @if(  $data->level_min_instrument4 == "concert_soloist") selected @endif>Concert Soloist</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="instrument_4_select_max">Maximum Level:</label>
                                                <select  id="instrument_4_select_max" name="instrument_4_select_max">
                                                    <option value="">-</option>
                                                    <option value="grade1" @if(  $data->level_max_instrument4 == "grade1") selected @endif>Grade 1</option>
                                                    <option value="grade2" @if(  $data->level_max_instrument4 == "grade2") selected @endif>Grade 2</option>
                                                    <option value="grade3" @if(  $data->level_max_instrument4 == "grade3") selected @endif>Grade 3</option>
                                                    <option value="grade4" @if(  $data->level_max_instrument4 == "grade4") selected @endif>Grade 4</option>
                                                    <option value="grade5" @if(  $data->level_max_instrument4 == "grade5") selected @endif>Grade 5</option>
                                                    <option value="grade6" @if(  $data->level_max_instrument4 == "grade6") selected @endif>Grade 6</option>
                                                    <option value="grade7" @if(  $data->level_max_instrument4 == "grade7") selected @endif>Grade 7</option>
                                                    <option value="grade8" @if(  $data->level_max_instrument4 == "grade8") selected @endif>Grade 8</option>
                                                    <option value="diploma" @if(  $data->level_max_instrument4 == "diploma") selected @endif>Diploma</option>
                                                    <option value="concert_soloist" @if(  $data->level_max_instrument4 == "concert_soloist") selected @endif>Concert Soloist</option>
                                                </select>
                                            </div>
                                            </br>
                                        </div>
                                    </div>
                                    <span>Please enter your highest level of qualification</span>

                                    <div class="form-group">
                                        <label for="qualification" class="control-label"><i class="fa fa-star" aria-hidden="true"></i>Qualification (E.G BA Music)</label>

                                        <input type="text" class="form-control" id="Qualification" name="Qualification" value="{{ $data->qualification }}" placeholder="" required>


                                    </div>
                                    <span>Please enter details of your experience: </span>
                                    <div class="form-group">
                                        <label for="performing_experience" class="control-label"><i class="fa fa-star" aria-hidden="true"></i>Performing Experience</label>

                                        <textarea class="form-control" id="performing_experience"  name="performing_experience"  required>{{ $data->performing_experience }}</textarea>


                                    </div>
                                    <div class="form-group">
                                        <label for="teaching_experience" class="control-label"><i class="fa fa-star" aria-hidden="true"></i>Teaching Experience</label>

                                        <textarea class="form-control" id="teaching_experience" name="teaching_experience" required>{{ $data->teaching_experience }}</textarea>


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
                                <span>Which other instruments can you teach at any level? ( Expand (>) and tick all that apply. )</span>
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
                                                            <input type="checkbox" value="Violin" id="Violin" name="Violin" @if($data2->violin) checked @endif>
                                                            Violin
                                                        </label>
                                                        </br>
                                                        <label>
                                                            <input type="checkbox" value="Viola" id="Viola" name="Viola" @if($data2->viola) checked @endif>
                                                            Viola
                                                        </label>
                                                        </br>
                                                        <label>
                                                            <input type="checkbox" value="Cello" id="Cello" name="Cello" @if($data2->cello) checked @endif>
                                                            Cello
                                                        </label>
                                                        </br>
                                                        <label>
                                                            <input type="checkbox" value="Double_Bass" id="Double_Bass" name="Double_Bass" @if($data2->double_bass) checked @endif>
                                                            Double Bass
                                                        </label>
                                                        </br>
                                                        <label>
                                                            <input type="checkbox" value="Harp" id="Harp" name="Harp" @if($data2->harp) checked @endif>
                                                            Harp
                                                        </label>
                                                        </br>
                                                        <label>
                                                            <input type="checkbox" value="Classical_Guitar" id="Classical_Guitar" name="Classical_Guitar" @if($data2->guitar) checked @endif>
                                                            Guitar (Classical)
                                                        </label>
                                                        </br>
                                                        <span class="smaller">Other Instruments:</span> </br>
                                                        <label class="smaller">
                                                            <input class="smaller" type="checkbox" value="Electric_Guitar" id="Electric_Guitar" name="Electric_Guitar" @if($data2->electric_guitar) checked @endif>
                                                            Electric Guitar
                                                        </label>
                                                        </br>
                                                        <label class="smaller">
                                                            <input class="smaller" type="checkbox" value="Bass_Guitar" id="Bass_Guitar" name="Bass_Guitar" @if($data2->bass_guitar) checked @endif>
                                                            Bass Guitar
                                                        </label>
                                                        </br>
                                                        <label class="smaller">
                                                            <input class="smaller" type="checkbox" value="Banjo" id="Banjo" name="Banjo" @if($data2->banjo) checked @endif>
                                                            Banjo
                                                        </label>
                                                        </br>
                                                        <label class="smaller">
                                                            <input class="smaller" type="checkbox" value="Ukelele" id="Ukelele" name="Ukelele" @if($data2->ukelele) checked @endif>
                                                            Ukelele
                                                        </label>
                                                        </br>
                                                        <label class="smaller">
                                                            <input class="smaller" type="checkbox" value="Sitar" id="Sitar" name="Sitar" @if($data2->sitar) checked @endif>
                                                            Sitar
                                                        </label>
                                                        </br>
                                                        <label class="smaller">
                                                            <input class="smaller" type="checkbox" value="Balalaika" id="Balalaika" name="Balalaika" @if($data2->balalaika) checked @endif>
                                                            Balalaika
                                                        </label>
                                                        </br>
                                                        <label class="smaller">
                                                            <input class="smaller" type="checkbox" value="Mandolin" id="Mandolin" name="Mandolin" @if($data2->mandolin) checked @endif>
                                                            Mandolin
                                                        </label>
                                                        </br>
                                                        <label class="smaller">
                                                            <input class="smaller" type="checkbox" value="Zither" id="Zither" name="Zither" @if($data2->zither) checked @endif>
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
                                                            <input type="checkbox" value="Flute" id="Flute" name="Flute" @if($data2->flute) checked @endif>
                                                            Flute
                                                        </label>
                                                        </br>
                                                        <label>
                                                            <input type="checkbox" value="Clarinet" id="Clarinet" name="Clarinet" @if($data2->clarinet) checked @endif>
                                                            Clarinet
                                                        </label>
                                                        </br>
                                                        <label>
                                                            <input type="checkbox" value="Oboe" id="Oboe" name="Oboe" @if($data2->oboe) checked @endif>
                                                            Oboe
                                                        </label>
                                                        </br>
                                                        <label>
                                                            <input type="checkbox" value="Bassoon" id="Bassoon" name="Bassoon" @if($data2->bassoon) checked @endif>
                                                            Bassoon
                                                        </label>
                                                        </br>
                                                        <label>
                                                            <input type="checkbox" value="Recorder" id="Recorder" name="Recorder" @if($data2->recorder) checked @endif>
                                                            Recorder
                                                        </label>
                                                        </br>
                                                        <span class="smaller">Other Instruments:</span></br>
                                                        <label class="smaller">
                                                            <input class="smaller" type="checkbox" value="Piccolo" id="Piccolo" name="Piccolo" @if($data2->piccolo) checked @endif>
                                                            Piccolo
                                                        </label>
                                                        </br>
                                                        <label class="smaller">
                                                            <input class="smaller" type="checkbox" value="Saxophone" id="Saxophone" name="Saxophone" @if($data2->saxophone) checked @endif>
                                                            Saxophone
                                                        </label>
                                                        </br>
                                                        <label class="smaller">
                                                            <input class="smaller" type="checkbox" value="Cor_Anglais" id="Cor_Anglais" name="Cor_Anglais" @if($data2->cor_anglais) checked @endif>
                                                            Cor Anglais
                                                        </label>
                                                        </br>
                                                        <label class="smaller">
                                                            <input class="smaller" type="checkbox" value="Basset_Horn" id="Basset_Horn" name="Basset_Horn" @if($data2->basset_horn) checked @endif>
                                                            Basset Horn
                                                        </label>
                                                        </br>
                                                        <label class="smaller">
                                                            <input class="smaller" type="checkbox" value="Bass_Clarinet" id="Bass_Clarinet" name="Bass_Clarinet" @if($data2->bass_clarinet) checked @endif>
                                                            Bass Clarinet
                                                        </label>
                                                        </br>
                                                        <label class="smaller">
                                                            <input class="smaller" type="checkbox" value="Contra_Bassoon" id="Contra_Bassoon" name="Contra_Bassoon" @if($data2->contra_bassoon) checked @endif>
                                                            Contra Bassoon
                                                        </label>
                                                        </br>
                                                        <label class="smaller">
                                                            <input class="smaller" type="checkbox" value="Bagpipes" id="Bagpipes" name="Bagpipes" @if($data2->bagpipes) checked @endif>
                                                            Bagpipes
                                                        </label>
                                                        </br>
                                                        <label class="smaller">
                                                            <input class="smaller" type="checkbox" value="Ocarina" id="Ocarina" name="Ocarina" @if($data2->ocarina) checked @endif>
                                                            Ocarina
                                                        </label>
                                                        </br>
                                                        <label class="smaller">
                                                            <input class="smaller" type="checkbox" value="Mouth_Organ" id="Mouth_Organ" name="Mouth_Organ" @if($data2->mouth_organ) checked @endif>
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
                                                            <input type="checkbox" value="Horn" id="Horn" name="Horn" @if($data2->french_horn) checked @endif>
                                                            (French) Horn
                                                        </label>
                                                        </br>
                                                        <label>
                                                            <input type="checkbox" value="Trumpet" id="Trumpet" name="Trumpet" @if($data2->trumpet) checked @endif>
                                                            Trumpet
                                                        </label>
                                                        </br>
                                                        <label>
                                                            <input type="checkbox" value="Trombone" id="Trombone" name="Trombone" @if($data2->trombone) checked @endif>
                                                            Trombone
                                                        </label>
                                                        </br>
                                                        <label>
                                                            <input type="checkbox" value="Tuba" id="Tuba" name="Tuba" @if($data2->tuba) checked @endif>
                                                            Tuba
                                                        </label>
                                                        </br>
                                                        <span class="smaller">Other Instruments:</span></br>
                                                        <label class="smaller" >
                                                            <input class="smaller" type="checkbox" value="Cornet" id="Cornet" name="Cornet" @if($data2->cornet) checked @endif>
                                                            Cornet
                                                        </label>
                                                        </br>
                                                        <label class="smaller" >
                                                            <input class="smaller" type="checkbox" value="Flugel_Horn" id="Flugel_Horn" name="Flugel_Horn"  @if($data2->flugel_horn) checked @endif>
                                                            Flugel Horn
                                                        </label>
                                                        </br>
                                                        <label class="smaller" >
                                                            <input class="smaller" type="checkbox" value="Tenor_Horn" id="Tenor_Horn" name="Tenor_Horn"  @if($data2->tenor_horn) checked @endif>
                                                            Tenor Horn
                                                        </label>
                                                        </br>
                                                        <label class="smaller" >
                                                            <input class="smaller" type="checkbox" value="Baritone" id="Baritone" name="Baritone"  @if($data2->baritone) checked @endif>
                                                            Baritone
                                                        </label>
                                                        </br>
                                                        <label class="smaller" >
                                                            <input class="smaller" type="checkbox" value="Euphonium" id="Euphonium" name="Euphonium"  @if($data2->euphonium) checked @endif>
                                                            Euphonium
                                                        </label>
                                                        </br>
                                                        <label class="smaller" >
                                                            <input class="smaller" type="checkbox" value="Ophicleide" id="Ophicleide" name="Ophicleide"  @if($data2->ophicleide) checked @endif>
                                                            Ophicleide
                                                        </label>
                                                        </br>
                                                        <label class="smaller" >
                                                            <input class="smaller" type="checkbox" value="Sackbutt" id="Sackbutt" name="Sackbutt"  @if($data2->sackbutt) checked @endif>
                                                            Sackbutt
                                                        </label>
                                                        </br>
                                                        <label class="smaller" >
                                                            <input class="smaller" type="checkbox" value="Cornette" id="Cornette" name="Cornette"  @if($data2->cornette) checked @endif>
                                                            Cornette
                                                        </label>
                                                        </br>
                                                        <label class="smaller" >
                                                            <input class="smaller" type="checkbox" value="Serpent" id="Serpent" name="Serpent"  @if($data2->serpent) checked @endif>
                                                            Serpent
                                                        </label>
                                                        </br>
                                                        <label class="smaller" >
                                                            <input class="smaller" type="checkbox" value="Didgeridoo" id="Didgeridoo" name="Didgeridoo"  @if($data2->didgeridoo) checked @endif>
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
                                                            <input type="checkbox" value="Timpani" id="Timpani" name="Timpani"  @if($data2->timpani) checked @endif>
                                                            Timpani
                                                        </label>
                                                        </br>
                                                        <label>
                                                            <input type="checkbox" value="Orchestral_Percussion" id="Orchestral_Percussion" name="Orchestral_Percussion"  @if($data2->orchestral_percussion) checked @endif>
                                                            Orchestral Percussion
                                                        </label>
                                                        </br>
                                                        <label>
                                                            <input type="checkbox" value="Tuned_Percussion" id="Tuned_Percussion" name="Tuned_Percussion"  @if($data2->tuned_percussion) checked @endif>
                                                            Tuned Percussion
                                                        </label>
                                                        </br>
                                                        <label>
                                                            <input type="checkbox" value="Drum_Kit" id="Drum_Kit" name="Drum_Kit"  @if($data2->drum_kit) checked @endif>
                                                            Drum Kit
                                                        </label>
                                                        </br>
                                                        <span class="smaller">Other Instruments:</span></br>
                                                        <label class="smaller">
                                                            <input class="smaller" type="checkbox" value="xylophone" id="xylophone" name="xylophone"  @if($data2->xylophone) checked @endif>
                                                            xylophone
                                                        </label>
                                                        </br>
                                                        <label class="smaller">
                                                            <input class="smaller" type="checkbox" value="Marimba" id="Marimba" name="Marimba"  @if($data2->marimba) checked @endif>
                                                            Marimba
                                                        </label>
                                                        </br>

                                                        <label class="smaller">
                                                            <input class="smaller" type="checkbox" value="Vibraphone" id="Vibraphone" name="Vibraphone"  @if($data2->vibraphone) checked @endif>
                                                            Vibraphone
                                                        </label>
                                                        </br>

                                                        <label class="smaller">
                                                            <input class="smaller" type="checkbox" value="Glockenspiel" id="Glockenspiel" name="Glockenspiel"  @if($data2->glockenspiel) checked @endif>
                                                            Glockenspiel
                                                        </label>
                                                        </br>

                                                        <label class="smaller">
                                                            <input class="smaller" type="checkbox" value="Cembalom" id="Cembalom" name="Cembalom"  @if($data2->cembalom) checked @endif>
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
                                                        <input type="checkbox" value="Piano" id="Piano" name="Piano"  @if($data2->piano) checked @endif>
                                                        Piano
                                                    </label>
                                                    </br>
                                                    <label>
                                                        <input type="checkbox" value="Organ" id="Organ" name="Organ"  @if($data2->organ) checked @endif>
                                                        Organ
                                                    </label>
                                                    </br>
                                                    <span class="smaller">Other Instruments:</span></br>
                                                    <label class="smaller">
                                                        <input class="smaller" type="checkbox" value="Keyboard" id="Keyboard" name="Keyboard"  @if($data2->keyboard) checked @endif>
                                                        Keyboard
                                                    </label>
                                                    </br>
                                                    <label class="smaller">
                                                        <input class="smaller" type="checkbox" value="Harpsichord" id="Harpsichord" name="Harpsichord"  @if($data2->harpsichord) checked @endif>
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
                                                                <input type="checkbox" value="Male_Singing" id="Male_Singing" name="Male_Singing"  @if($data2->male_singing) checked @endif>
                                                                Male
                                                            </label>
                                                            <br>
                                                            <label>
                                                                <input type="checkbox" value="Female_Singing" id="Female_Singing" name="Female_Singing"  @if($data2->female_singing) checked @endif>
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

                                        <input type="number" class="form-control" id="minage"  name="minage" required="" value="{{ $data->min_age_taught }}" min="0" step="1">


                                    </div>
                                    <div class="form-group col-xs-4">
                                        <label for="maxage" class="control-label"><i class="fa fa-star" aria-hidden="true"></i>Maximum age taught</label>

                                        <input type="number" class="form-control" id="maxage" name="maxage"  required="" value="{{ $data->max_age_taught }}" min="0" step="1">
                                    </div>
                                    <br>
                                </div>
                                </br>
                                <span>I... (Check all that apply)</span>
                                <div class="form-group">
                                    <div class="checkbox">
                                        <label><input type="checkbox" name="teach_at_pupil_home" value="teach_at_pupil_home" @if($data->teach_at_pupil_home) checked @endif>Teach at pupil's home</label>
                                    </div>
                                    <div class="checkbox">
                                        <label><input type="checkbox" name="teach_at_own_home" value="teach_at_own_home" @if($data->teach_at_own_home) checked @endif>Teach at own home</label>
                                    </div>
                                    <div class="checkbox">
                                        <label><input type="checkbox" name="teach_online" value="teach_online" @if($data->teach_online) checked @endif>Teach online</label>
                                    </div>
                                    <div class="checkbox">
                                        <label><input type="checkbox" name="teach_at_school" value="teach_at_school" @if($data->teach_at_school) checked @endif>Teach at school</label>
                                    </div>
                                    <div class="checkbox">
                                        <label><input type="checkbox" id="tmt-cb" name="tmt_cb" value="teach_theory" onchange="valueChangedTmt();" @if($data->teach_theory) checked @endif>Teach Music Theory</label>
                                    </div>
                                    <div class="form-group hidden" id="tmt">
                                        <label for="level_theory">Max Level:</label>
                                        <select  id="level_theory" name="level_theory">
                                            <option value="">-</option>
                                            <option value="grade1 " @if($data->theory_level == "grade1") selected @endif>Grade 1</option>
                                            <option value="grade2" @if($data->theory_level == "grade2") selected @endif>Grade 2</option>
                                            <option value="grade3" @if($data->theory_level == "grade3") selected @endif>Grade 3</option>
                                            <option value="grade4" @if($data->theory_level == "grade4") selected @endif>Grade 4</option>
                                            <option value="grade5" @if($data->theory_level == "grade5") selected @endif>Grade 5</option>
                                            <option value="grade6" @if($data->theory_level == "grade6") selected @endif>Grade 6</option>
                                            <option value="grade7" @if($data->theory_level == "grade7") selected @endif>Grade 7</option>
                                            <option value="grade8" @if($data->theory_level == "grade8") selected @endif>Grade 8</option>
                                            <option value="diploma" @if($data->theory_level == "diploma") selected @endif>Diploma</option>
                                            <option value="concert_soloist" @if($data->theory_level == "concert_soloist") selected @endif>Concert Soloist</option>
                                        </select>
                                    </div>
                                    <div class="checkbox" >
                                        <label><input type="checkbox" id="ta-cb" name="ta_cb" value="teach_aural" onchange="valueChangedTa();" @if($data->teach_aural) checked @endif>Teach Aural</label>
                                    </div>
                                    <div class="form-group hidden" id="ta">
                                        <label for="level_aural">Max Level:</label>
                                        <select  id="level_aural" name="level_aural">
                                            <option value="">-</option>
                                            <option value="grade1 " @if($data->aural_level == "grade1") selected @endif>Grade 1</option>
                                            <option value="grade2" @if($data->aural_level == "grade2") selected @endif>Grade 2</option>
                                            <option value="grade3" @if($data->aural_level == "grade3") selected @endif>Grade 3</option>
                                            <option value="grade4" @if($data->aural_level == "grade4") selected @endif>Grade 4</option>
                                            <option value="grade5" @if($data->aural_level == "grade5") selected @endif>Grade 5</option>
                                            <option value="grade6" @if($data->aural_level == "grade6") selected @endif>Grade 6</option>
                                            <option value="grade7" @if($data->aural_level == "grade7") selected @endif>Grade 7</option>
                                            <option value="grade8" @if($data->aural_level == "grade8") selected @endif>Grade 8</option>
                                            <option value="diploma" @if($data->aural_level == "diploma") selected @endif>Diploma</option>
                                            <option value="concert_soloist" @if($data->level_aural == "concert_soloist") selected @endif>Concert Soloist</option>
                                        </select>
                                    </div>
                                    <div class="checkbox" >
                                        <label><input type="checkbox" id="tc-cb" name="tc_cb"value="teach_composition" onchange="valueChangedTc();">Teach Composition</label>
                                    </div>
                                    <div class="form-group hidden" id="tc">
                                        <label for="level_composition">Max Level:</label>
                                        <select  id="level_composition" name="level_composition">
                                            <option value="">-</option>
                                            <option value="grade1 " @if($data->composition_level == "grade1") selected @endif>Grade 1</option>
                                            <option value="grade2" @if($data->composition_level == "grade2") selected @endif>Grade 2</option>
                                            <option value="grade3" @if($data->composition_level == "grade3") selected @endif>Grade 3</option>
                                            <option value="grade4" @if($data->composition_level == "grade4") selected @endif>Grade 4</option>
                                            <option value="grade5" @if($data->composition_level == "grade5") selected @endif>Grade 5</option>
                                            <option value="grade6" @if($data->composition_level == "grade6") selected @endif>Grade 6</option>
                                            <option value="grade7" @if($data->composition_level == "grade7") selected @endif>Grade 7</option>
                                            <option value="grade8" @if($data->composition_level == "grade8") selected @endif>Grade 8</option>
                                            <option value="diploma" @if($data->composition_level == "diploma") selected @endif>Diploma</option>
                                            <option value="concert_soloist" @if($data->level_composition == "concert_soloist") selected @endif>Concert Soloist</option>
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
                                            <label><input type="checkbox" id="cb-acc" name="cb_acc"  value="accompanies"  @if($data->cb_acc) checked @endif onchange="valueChangedAcc();">Do you accompany students?</label>
                                        </div>
                                        <div class="form-group hidden" id="acc">
                                            <label for="level_accompanied">Maximum level accompanied:</label>
                                            <select id="level_accompanied" name="level_accompanied">
                                                <option value="">-</option>
                                                <option value="grade1" @if($data->level_accompanied == "grade1") selected @endif>Grade 1</option>
                                                <option value="grade2" @if($data->level_accompanied == "grade2") selected @endif>Grade 2</option>
                                                <option value="grade3" @if($data->level_accompanied == "grade3") selected @endif>Grade 3</option>
                                                <option value="grade4" @if($data->level_accompanied == "grade4") selected @endif>Grade 4</option>
                                                <option value="grade5" @if($data->level_accompanied == "grade5") selected @endif>Grade 5</option>
                                                <option value="grade6" @if($data->level_accompanied == "grade6") selected @endif>Grade 6</option>
                                                <option value="grade7" @if($data->level_accompanied == "grade7") selected @endif>Grade 7</option>
                                                <option value="grade8" @if($data->level_accompanied == "grade8") selected @endif>Grade 8</option>
                                                <option value="diploma" @if($data->level_accompanied == "diploma") selected @endif>Diploma</option>
                                                <option value="concert_soloist" @if($data->level_accompanied == "concert_soloist") selected @endif>Concert Soloist</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class=form-group>
                                        <div class="checkbox" >
                                            <label><input type="checkbox" id="crb" name="crb" @if($data->crb_checked) checked @endif value="crb">Are you CRB checked?</label>
                                        </div>
                                    </div>
                                    <div class=form-group hidden>
                                        <div class="checkbox" >
                                            <label><input type="checkbox" id="repair" name="repair" value="repair" @if($data->is_instrument_repairer) checked @endif onchange="valueChangedRepair();">Do you repair instruments?</label>
                                        </div>
                                    </div>
                                    <div class="form-group hidden" id="repair_inst">
                                        <label for="repair_inst" class="control-label">Please enter the name of any instruments you repair below</label>

                                        <input type="text"  name="repair_instruments" value="{{ $data->instruments_repaired }}" placeholder="">


                                    </div>
                                    <span>Please enter any further details you would like to be displayed to potential students that are not covered above </span>
                                    <div class="form-group">
                                        <label for="biography" class="control-label">Further biographical details:</label>

                                        <textarea class="form-control" id="biography" name="biography">{{ $data->biography }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="thumbnail_image" class="control-label">Add an image to be used for your profile (optional)</label>
                                        {!! Form::file('thumbnail_image')!!}

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
    <script src="{{url('js/formfunction.js')}}"></script>
@endsection

