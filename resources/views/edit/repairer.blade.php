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
                    <h3 class="panel-title">Edit Repairers</h3>
                </div>
                <div class="panel-body">
                    <form name="basicform" id="basicform" method="post" action="/edit/repairers/post" enctype="multipart/form-data">
                        {!! csrf_field() !!}
                        <div id="sf1" class="frm">
                            <fieldset name="one">
                                <legend>Step 1 of 4 - Personal Details</legend>
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
                                <legend>Step 2 of 4 - Contact Details</legend>

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
                                    <span>Please enter any further details you would like to be displayed to potential customers that are not covered above </span>
                                    <div class="form-group">
                                        <label for="biography" class="control-label">Further biographical details:</label>

                                        <textarea class="form-control" id="biography" name="biography">{{$data->biography}}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="thumbnail_image" class="control-label">Add an image to be used for your profile (optional)</label>
                                        {!! Form::file('thumbnail_image') !!}

                                    </div>
                                    <div class="form-group">
                                        <label for="website" class="control-label">Please enter your website or webpage(Optional) <br> URL must contain http://</label>
                                        <input type="url" class="website" id="website" name="website" value="@if($data->website != ""){{$data->website}}   @endif" placeholder="http://www.yoursitehere.com">
                                    </div>
                                    <div class="form-group">
                                        <label for="facebook" class="control-label">Please enter your facebook page URL(Optional) <br> URL must contain http://</label>
                                        <input type="url" class="facebook" id="facebook" name="facebook" value="@if($data->facebook != ""){{$data->facebook}}   @endif" placeholder="https://www.facebook.com/youth.music.network/">
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

