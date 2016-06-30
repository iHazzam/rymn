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
            <p class="divide-text">Find a teacher in the Ripon area</p>
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
        <a id="teacherpanellink">
    <div class="col-lg-3 col-sm-4 col-xs-8 panel panel-default teacherpanel" data-toggle="modal" data-target="#myModal">
        <div class="panel-body">
            <img src="http://placehold.it/100x100" alt="leftimg" class="teachercard_img" />
            <p>This card will have a summary of each teacher as well as a profile picture</p>
            <p>Clicking on the card will bring up an expanded view</p>
        </div>
    </div>
        </a>


    @endforeach


@endsection