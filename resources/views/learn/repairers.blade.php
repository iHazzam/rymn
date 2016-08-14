@extends('template')

@section('title', 'repairers')

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
                    <h3 class="panel-title">Instrument Repairer? Want to add your details to the site? Enter below!</h3>
                </div>
                <div class="panel-body">
                    <div class="alert alert-warning alert-dismissible hidden" id="incomplete" role="alert">Please complete all starred fields to continue</div>
                    <form name="basicform" id="basicform" method="post" action="/learn/repairers/post" enctype="multipart/form-data">
                        {!! csrf_field() !!}
                        <div id="sf1" class="frm">
                            <fieldset name="one">
                                <legend>Step 1 of 4 - Personal Details</legend>
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
                                <legend>Step 2 of 4 - Contact Details</legend>

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
                                <legend>Step 3 of 4 - Instruments Repaired</legend>
                                <span>What instruments would you like to advertise that you repair? ( Expand (>) and tick all that apply. )</span>
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
                                <legend>Step 4 of 4 - Final Details</legend>

                                <div class="form-group">
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
                                        <button class="btn btn-warning back4" type="button"><span class="fa fa-arrow-left"></span> Back</button>
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
    <script src="{{url('/js/formfunction2.js')}}"></script>
@endsection

