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
                    <h3 class="panel-title">Edit Groups</h3>
                </div>
                <div class="panel-body">
                    <form name="basicform" id="groupform" method="post" action="/editensemble" enctype="multipart/form-data">
                        {!! csrf_field() !!}
                        <div id="sf1" class="frm">
                            <fieldset>
                                <div class="alert alert-warning alert-dismissible hidden" id="incomplete" role="alert">Please complete all fields to continue - URLs must contain http://</div>
                                <legend>Group information</legend>
                                <div class="form-group">
                                    <div class="form-group">
                                        <label for="group_name" class="control-label">Group Name</label>

                                        <input type="text" class="form-control" id="group_name"  name="group_name" value="{{$data->group_name}}"  readonly placeholder="" required="">

                                    </div>
                                    <div class="form-group">
                                        <label for="grouptown" class="control-label">Town group is based in (Please select closest) </label>
                                        <select class="form-control" id="grouptown" name="grouptown" required>
                                            <option value="">-</option>
                                            <option value="ripon" @if($data->group_town == "ripon") selected @endif>Ripon</option>
                                            <option value="thirsk" @if($data->group_town == "thirsk") selected @endif>Thirsk</option>
                                            <option value="easingwold" @if($data->group_town == "easingwold") selected @endif>Easingwold</option>
                                            <option value="boroughbridge" @if($data->group_town == "boroughbridge") selected @endif>Boroughbridge</option>
                                            <option value="harrogate" @if($data->group_town == "harrogate") selected @endif>Harrogate</option>
                                            <option value="knaresborough" @if($data->group_town == "knaresborough") selected @endif>Knaresborough</option>
                                            <option value="northallerton" @if($data->group_town == "northallerton") selected @endif>Northallerton</option>
                                            <option value="pately_bridge" @if($data->group_town == "pately_bridge") selected @endif>Pately Bridge</option>
                                            <option value="ripley" @if($data->group_town == "ripley") selected @endif>Ripley</option>
                                            <option value="masham" @if($data->group_town == "masham") selected @endif>Masham</option>
                                            <option value="richmond" @if($data->group_town == "richmond") selected @endif>Richmond</option>
                                            <option value="skipton" @if($data->group_town == "skipton") selected @endif>Skipton</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="typeofgroup" class="control-label">Type of group: </label>
                                        <select class="form-control" id="typeofgroup" name="typeofgroup" required>
                                            <option value="">-</option>
                                            <option value="brass_band" @if($data->ensemble_type == "brass_band") selected @endif>Brass Band</option>
                                            <option value="choir" @if($data->ensemble_type == "choir") selected @endif>Choir</option>
                                            <option value="community_group" @if($data->ensemble_type == "community_group") selected @endif>Community Group </option>
                                            <option value="orchestra" @if($data->ensemble_type == "orchestra") selected @endif>Orchestra </option>
                                            <option value="percussion_ensemble" @if($data->ensemble_type == "percussion_ensemble") selected @endif>Percussion Ensemble</option>
                                            <option value="string_chamber_group" @if($data->ensemble_type == "string_chamber_group") selected @endif>String Chamber Ensemble</option>
                                            <option value="wind_chamber_group" @if($data->ensemble_type == "wind_chamber_group") selected @endif>Wind Chamber Ensemble</option>
                                            <option value="brass_chamber_group" @if($data->ensemble_type == "brass_chamber_group") selected @endif>Brass Chamber Ensemble</option>
                                            <option value="string_group" @if($data->ensemble_type == "string_group") selected @endif>String Group</option>
                                            <option value="wind_band" @if($data->ensemble_type == "wind_band") selected @endif>Wind Band</option>
                                            <option value="other" @if($data->ensemble_type == "other") selected @endif>Other</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="description" class="control-label">Paragraph about the group:</label>

                                        <textarea class="form-control" id="biography" name="biography" required>{{$data->group_description}}</textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="groupname" class="control-label">Contact email</label>
                                        <span id="helpemail"   class="hidden">- Email must be correct format and include an @ symbol</span>
                                        <input type="email" class="form-control" name="email" id="email" placeholder="" value="{{$data->contact_email}}" required>


                                    </div>
                                    <div class="form-group">
                                        <label for="website" class="control-label">Please enter your website or webpage(Optional) <br> URL must contain http://</label>
                                        <input type="url" class="website" id="website" name="website" value="@if($data->website != ""){{$data->website}}   @endif" placeholder="http://www.yoursitehere.com">
                                    </div>
                                    <div class="form-group">
                                        <label for="facebook" class="control-label">Please enter your facebook page URL(Optional) <br> URL must contain http://</label>
                                        <input type="url" class="facebook" id="facebook" name="facebook" value="@if($data->facebook != ""){{$data->facebook}}   @endif" placeholder="https://www.facebook.com/youth.music.network/">
                                    </div>
                                    <div class="form-group">
                                        <label for="thumbnail" class="control-label">Thumbnail image for group(optional)</label>@if($data->thumbnail_image_path)&nbsp;&nbsp;&nbsp;Currently: <img style="max-width: 70px; max-height:70px;" src={{url($data->thumbnail_image_path)}}>@endif
                                        {!! Form::file('thumbnail') !!}

                                    </div>
                                    <div class="form-group">
                                        <label for="thumbnail" class="control-label">One other group photo (optional)</label>@if($data->image1_path)&nbsp;&nbsp;&nbsp;Currently: <img style="width: 70px; max-height: 70px;" src={{url($data->image1_path)}}>@endif
                                        {!! Form::file('images') !!}
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
                                                <option value="grade1" @if($data->minimum_level == "grade1") selected @endif>Grade 1</option>
                                                <option value="grade2" @if($data->minimum_level == "grade2") selected @endif>Grade 2</option>
                                                <option value="grade3" @if($data->minimum_level == "grade3") selected @endif>Grade 3</option>
                                                <option value="grade4" @if($data->minimum_level == "grade4") selected @endif>Grade 4</option>
                                                <option value="grade5" @if($data->minimum_level == "grade5") selected @endif>Grade 5</option>
                                                <option value="grade6" @if($data->minimum_level == "grade6") selected @endif>Grade 6</option>
                                                <option value="grade7" @if($data->minimum_level == "grade7") selected @endif>Grade 7</option>
                                                <option value="grade8" @if($data->minimum_level == "grade8") selected @endif>Grade 8</option>
                                                <option value="diploma" @if($data->minimum_level == "diploma") selected @endif>Diploma</option>
                                                <option value="concert_soloist" @if($data->minimum_level == "concert_soloist") selected @endif>Concert Soloist</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class=form-group>
                                        <div class="checkbox" >
                                            <label><input type="checkbox" id="audition"  name="audition" value="audition" @if($data->audition == "audition") checked @endif>Will there be an audition for new members?</label>
                                        </div>
                                    </div>

                                    <span>Please enter any further details you would like to be displayed to potential new members that are not covered above </span>
                                    <div class="form-group">
                                        <label for="recruit_details" class="control-label">Further details for potential members:</label>

                                        <textarea class="form-control" id="recruit_details" name="recruit_details">{{$data->recruit_details}}</textarea>
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

