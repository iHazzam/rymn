@extends('template')

@section('title', 'homepage')

@section('banner')
<script>
   $('.navbar-lower').affix({
      offset: {top: 50}
   });
</script>
    <div class="divide-nav">
        <div class="container">
            <p class="divide-text">Find a teacher in the North Yorkshire area</p>
        </div>
    </div>
    <nav class="navbar navbar-default navbar-lower permalock" role="findingstuff">
        <div class="container">
            <div>
                <div class="flash-message">
                    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                        @if(Session::has('alert-' . $msg))

                            <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                        @endif
                    @endforeach
                </div> <!-- end .flash-message -->
                <form class="navbar-form navbar-left form-inline"  id="teachdbform" method="post" action="/learn/teachers">
                    {!! csrf_field() !!}
                    <label>Instrument
                        <select id="cband" name="instrument" class="form-control">
                            @foreach(array_combine($rows, $values) as $row => $value)
                                <option value={{$value}}>{{$row}}</option>"}}
                            @endforeach
                        </select>
                    </label>
                    <label>Age
                        <input type="number" class="form-control" name="age" id="age" placeholder="0"  min="0" step="1">
                    </label>
                    <label>Teaching Location
                        <select id="location" name="location" class="form-control">
                            <option value="">-</option>
                            <option value="teach_at_own_home">Teaches at own home</option>
                            <option value="teach_at_school">Teaches at school</option>
                            <option value="teach_at_pupil_home">Teaches at pupil home</option>
                            <option value="teach_online">Teaches online</option>
                        </select>
                    </label>
                    <label>Subject
                        <select id="cband" name="subject" class="form-control">
                            <option value="">-</option>
                            <option value="aural">Aural</option>
                            <option value="composition">Composition</option>
                            <option value="theory">Theory</option>
                        </select>
                    </label>
                    {{--<label>Student Level--}}
                        {{--<select class="form-control" name="level" id="instrument_1_select">--}}
                            {{--<option value="">-</option>--}}
                            {{--<option value="grade1">Grade 1</option>--}}
                            {{--<option value="grade2">Grade 2</option>--}}
                            {{--<option value="grade3">Grade 3</option>--}}
                            {{--<option value="grade4">Grade 4</option>--}}
                            {{--<option value="grade5">Grade 5</option>--}}
                            {{--<option value="grade6">Grade 6</option>--}}
                            {{--<option value="grade7">Grade 7</option>--}}
                            {{--<option value="grade8">Grade 8</option>--}}
                            {{--<option value="diploma">Diploma</option>--}}
                            {{--<option value="concert_soloist">Concert Soloist</option>--}}
                        {{--</select>--}}
                    {{--</label>--}}
                    <label>Search by name
                    <input type="text" class="form-control" placeholder="Name" name="name" id="name">
                    </label>
                    <label>Search by town
                    <input type="text" class="form-control" placeholder="Town" name="town" id="town">
                    </label>
                    <button type="submit" class="btn btn-primary">Search</button>
                </form>
            </div>
        </div>
    </nav>
@endsection

@section('body')

    @foreach($teachers as $teacher)
        <?php
        if(is_array($teacher)) $teacher=$teacher[0];
        ?>

        <a id="teacherpanellink">
    <div class="col-lg-3 col-sm-4 col-xs-8 panel panel-default teacherpanel">
        <div class="panel-body">
            <a href="#modal{{$teacher->id}}" role="button" data-toggle="modal" >
            <div id="minheight">
                <img src="{{isset($teacher->thumbnail_img) ? '/'.$teacher->thumbnail_img : '/upload/default2.png'}}" alt="leftimg" class="teachercard_img" />
                <br>
                <p class="idcard">Name: <span class="userinput">{{$teacher->first_name . ' ' . $teacher->last_name}}</span></p>
                <p class="idcard">Location: <span class="userinput">{{$teacher->city}}</span></p>
            </div>
            <div id="minheight2">
                <p class="blackheader">Primary Instruments</p>
                <p class="idcard">
                    <?php
                        for($id = 1; $id<4; $id++)
                        {
                            $fieldPlayed = 'instruments_played'.$id;
                            if($teacher->$fieldPlayed != null)
                            {
                                $played = $teacher->$fieldPlayed;
                                $played = str_replace('_',' ',$played); //replace all underscores with spaces
                                $min = 'level_min_instrument'.$id;
                                $fieldMin = $teacher->$min;

                                if($fieldMin=="concert_soloist")
                                {
                                    $fieldMin = "Concert Soloist";
                                }
                                elseif($fieldMin =="diploma")
                                {
                                    $fieldMin = "Diploma";
                                }
                                else{
                                    $fieldMin = chunk_split($fieldMin, 5, ' ');
                                    $fieldMin = ucfirst($fieldMin);
                                }

                                $max = 'level_max_instrument'.$id;
                                $fieldMax = $teacher->$max;

                                if($fieldMax=="concert_soloist")
                                {
                                    $fieldMax = "Concert Soloist";
                                }
                                elseif($fieldMax =="diploma")
                                {
                                    $fieldMax = "Diploma";
                                }
                                else{
                                    $fieldMax = chunk_split($fieldMax, 5, ' ');
                                    $fieldMax = ucfirst($fieldMax);
                                }
                                $string = '<span class="userinput"><i class="fa fa-bullseye" aria-hidden="true"></i>&nbsp;'.$played.' ('.$fieldMin .' to ' .$fieldMax . ')</span><br><br>';
                                echo($string);
                            }
                        }




                    ?>


                </p>
            </div>
        <div class="icons"> <span id="home"><i class="fa fa-home" title="Teach at pupil home" aria-hidden="true"></i>
            <?php
                if($teacher->teach_at_pupil_home)
                {
                    echo('<i class="fa fa-check" id="good" aria-hidden="true"></i> &nbsp;|&nbsp;');
                }
                else{
                    echo('<i class="fa fa-times" id="bad" aria-hidden="true"></i> &nbsp;|&nbsp;');
                }
            ?>
            </span>
            <span id="work">
                <i class="fa fa-briefcase" title="Teach at teacher home" aria-hidden="true"></i>
                <?php
                if($teacher->teach_at_own_home)
                {
                    echo('<i class="fa fa-check" id="good" aria-hidden="true"></i> &nbsp;|&nbsp;');
                }
                else{
                    echo('<i class="fa fa-times" id="bad" aria-hidden="true"></i> &nbsp;|&nbsp;');
                }
                ?>
            </span>
            <span id="online">
               <i class="fa fa-laptop" title="Teach Online" aria-hidden="true"></i>
                <?php
                if($teacher->teach_online)
                {
                    echo('<i class="fa fa-check" id="good" aria-hidden="true"></i> &nbsp;|&nbsp;');
                }
                else{
                    echo('<i class="fa fa-times" id="bad" aria-hidden="true"></i> &nbsp;|&nbsp;');
                }
                ?>
            </span>
            <span id="online">
               <i class="fa fa-graduation-cap" title="Teach at schools" aria-hidden="true"></i>
                <?php
                if($teacher->teach_at_school)
                {
                    echo('<i class="fa fa-check" id="good" aria-hidden="true"></i> ');
                }
                else{
                    echo('<i class="fa fa-times" id="bad" aria-hidden="true"></i> ');
                }
                ?>
            </span>


        </div>
        </a>
        </div>
        <div class="bottom-line-ban" id="teacher_modal{{$teacher->id}}"><button type="button" class="btn btn-link white_" data-toggle="modal" data-target="#modal{{$teacher->id}}">To find out more, click here &nbsp; <i class="fa fa-angle-double-down" aria-hidden="true"></i> </button></div>
    </div>
        </a>

    <div id="modal{{$teacher->id}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;  </button>
                    <h4 class="modal-title" id="myModalLabel">{{$teacher->first_name . " " . $teacher->last_name . " - Music Teacher"}}</h4>
                </div>
                <div class="modal-body">
                    <img src="{{isset($teacher->thumbnail_img) ? '/'.$teacher->thumbnail_img : '/upload/default2.png'}}" alt="leftimg" class="teachercard_full_img" />
                    <p id="city">From: {{$teacher->city}}</p>
                    <p id="ages">Teaches ages: {{$teacher->min_age_taught}} to {{$teacher->max_age_taught}}</p>
                    <p id="main_instruments">Main instruments:
                        <br>
                        <?php
                        $main_instruments = [];
                        for($id = 1; $id<4; $id++)
                        {
                        $fieldPlayed = 'instruments_played'.$id;
                        if($teacher->$fieldPlayed != null)
                        {
                            $played = $teacher->$fieldPlayed;
                            $played = str_replace('_',' ',$played); //replace all underscores with spaces
                            $main_instruments[] = $played;

                            $min = 'level_min_instrument'.$id;
                            $fieldMin = $teacher->$min;

                            if($fieldMin=="concert_soloist")
                            {
                                $fieldMin = "Concert Soloist";
                            }
                            elseif($fieldMin =="diploma")
                            {
                                $fieldMin = "Diploma";
                            }
                            else{
                                $fieldMin = chunk_split($fieldMin, 5, ' ');
                                $fieldMin = ucfirst($fieldMin);
                            }

                            $max = 'level_max_instrument'.$id;
                            $fieldMax = $teacher->$max;

                            if($fieldMax=="concert_soloist")
                            {
                                $fieldMax = "Concert Soloist";
                            }
                            elseif($fieldMax =="diploma")
                            {
                                $fieldMax =  "Diploma";
                            }
                            else{
                                $fieldMax = chunk_split($fieldMax, 5, ' ');
                                $fieldMax = ucfirst($fieldMax);
                            }

                                $string = '<span class="userinput"><i class="fa fa-bullseye" aria-hidden="true"></i>&nbsp;'.$played.' ('.$fieldMin .' to ' .$fieldMax. ')</span><br>';
                                echo($string);
                            }
                        }
                        ?>
                    </p>
                    <p id="other_instruments">

                        {{$teacher->first_name}} also teaches:
                    <ul class="list-left">
                        <?php
                            $instruments = App\Instruments_Taught::find($teacher->id)->getAttributes();
                            array_shift($instruments);
                            array_shift($instruments);

                            foreach($instruments as $key=>$i)
                            {
                                $key = ucfirst(str_replace('_',' ',$key)); //replace all underscores with spaces and capitalise
                               if(($i == 1) && (!in_array($key, $main_instruments))){
                                   echo('<li >'.$key.'</li>');
                               }
                            }

                        ?>
                    </ul>
                    </p>
                    <p id="bio"> <i class="fa fa-quote-left" aria-hidden="true"></i> {{$teacher->biography}} <i class="fa fa-quote-right" aria-hidden="true"></i></p>
                    <p id="teaching_exp"><b>Teaching experience: </b> <br> {{$teacher->teaching_experience}} </p>
                    <p id="teaching_exp"><b>Performing experience: </b> <br> {{$teacher->performing_experience}} </p>
                    <p id="teaching_exp"><b>Level of Qualification: </b> <br> {{$teacher->qualification}} </p>
                    @if($teacher->website != null)
                        <p id="website"> <a href="{{$teacher->website}}">Click to access teacher's website </a> </p>
                    @endif
                    @if($teacher->facebook != null)
                        <p id="website"> <a href="{{$teacher->facebook}}">Click to access teacher's facebook page </a> </p>
                    @endif
                </div>
                <div class="modal-footer">
                    <button id="{{$teacher->id}}" name="{{$teacher->first_name}}" class="btn btn-warning" onclick="openModalTeacher(this.id,this.name)">Request contact details!</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>



    </div>

    @endforeach


@endsection

@section('js')
    <script src="{{url('js/teacherdb.js')}}"></script>
    <script src="{{url('js/teacherdetails.js')}}"></script>

@endsection