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
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="panel-body">
                    <p>Adding details of your group allows you to advertise for members, add events to the calendar and reach a large number of potential audience members via our newsletter</p>
                    <form name="basicform" id="groupform" method="post" action="/postensemble" enctype="multipart/form-data">
                        {!! csrf_field() !!}
                        <div id="sf1" class="frm">
                            <fieldset>
                                <div class="alert alert-warning alert-dismissible hidden" id="incomplete" role="alert">Please complete all fields to continue</div>
                                <legend>Group information</legend>
                                <div class="form-group">
                                    <div class="form-group">
                                        <label for="group_name" class="control-label">Group Name</label>

                                        <input type="text" class="form-control" id="group_name"  name="group_name" placeholder="" required="">


                                    </div>
                                    <div class="form-group">
                                        <label for="grouptown" class="control-label">Town group is based in (Please select closest) </label>
                                        <select class="form-control" id="grouptown" name="grouptown" required>
                                            <option value="">-</option>
                                            <option value="ripon">Ripon</option>
                                            <option value="thirsk">Thirsk</option>
                                            <option value="easingwold">Easingwold</option>
                                            <option value="boroughbridge">Boroughbridge</option>
                                            <option value="harrogate">Harrogate</option>
                                            <option value="knaresborough">Knaresborough</option>
                                            <option value="northallerton">Northallerton</option>
                                            <option value="pately_bridge">Pately Bridge</option>
                                            <option value="ripley">Ripley</option>
                                            <option value="masham">Masham</option>
                                            <option value="richmond">Richmond</option>
                                            <option value="skipton">Skipton</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="typeofgroup" class="control-label">Type of group: </label>
                                        <select class="form-control" id="typeofgroup" name="typeofgroup" required>
                                            <option value="">-</option>
                                            <option value="brass_band">Brass Band</option>
                                            <option value="choir">Choir</option>
                                            <option value="community_group">Community Group </option>
                                            <option value="orchestra">Orchestra </option>
                                            <option value="percussion_ensemble">Percussion Ensemble</option>
                                            <option value="pop/rock_band">Pop/Rock group</option>
                                            <option value="string_chamber_group">String Chamber Group</option>
                                            <option value="string_group">String Group</option>
                                            <option value="wind_band">Wind Band</option>
                                            <option value="wind_chamber_group">Wind Chamber Group</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="description" class="control-label">Paragraph about the group:</label>

                                        <textarea class="form-control" id="biography" name="biography" required></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="groupname" class="control-label">Contact email</label>
                                        <span id="helpemail"   class="hidden">- Email must be correct format and include an @ symbol</span>
                                        <input type="email" class="form-control" name="email" id="email" placeholder="" required>


                                    </div>
                                    <div class="form-group">
                                        <label for="thumbnail" class="control-label">Thumbnail image for group(optional)</label>
                                        {!! Form::file('thumbnail') !!}

                                    </div>
                                    <div class="form-group">
                                        <label for="thumbnail" class="control-label">One other group photo (optional)</label>
                                        {!! Form::file('images') !!}

                                    </div>
                                    <div class="form-group">
                                        <label for="website" class="control-label">Please enter your website or webpage(Optional) <br> URL must contain http://</label>
                                        <input type="url" class="website" id="website" name="website"   placeholder="http://www.yoursitehere.com">
                                    </div>
                                    <div class="form-group">
                                        <label for="facebook" class="control-label">Please enter your facebook page URL(Optional) <br> URL must contain http://</label>
                                        <input type="url" class="facebook" id="facebook" name="facebook"   placeholder="http://www.facebook.com/youth.music.network/">
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


                                    <div class="clearfix" style="height: 10px;clear: both;"></div>

                                    <div class="form-group">
                                        <div class="col-lg-10 col-lg-offset-2">
                                            <button class="btn btn-primary open1" id="group_next" type="button">Next <span class="fa fa-arrow-right"></span></button>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                        <div id="sf2" class="frm" style="display: none;">
                            <fieldset>
                                <legend>Recruiting details:</legend>

                                <div class="form-group">
                                    <div class="form-group">
                                        <div class="form-group" id="acc">
                                            <label for="instrument_1_select">Minimum standard required to join:</label>
                                            <select class="form-control" id="standard" name="standard">
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
                                            <label><input type="checkbox" id="audition"  name="audition" value="audition">Will there be an audition for new members?</label>
                                        </div>
                                    </div>

                                    <span>Please enter any further details you would like to be displayed to potential new members that are not covered above </span>
                                    <div class="form-group">
                                        <label for="biography" class="control-label">Further details for potential members:</label>

                                        <textarea class="form-control" id="recruit_details" name="recruit_details"></textarea>
                                    </div>

                                </div>

                                <div class="clearfix" style="height: 10px;clear: both;"></div>
                                <div class="clearfix" style="height: 10px;clear: both;"></div>

                                <div class="form-group">
                                    <div class="col-lg-10 col-lg-offset-2">
                                        <button class="btn btn-primary back2" type="button"><span class="fa fa-arrow-left"></span> Back</button>
                                        <button type="submit" id="group_sub" class="btn btn-warning"><span class="fa fa-paper-plane"></span> Submit </button>
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

