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
    <nav class="navbar navbar-default navbar-lower" role="findingstuff">
        <div class="container">
            <div class="collapse navbar-collapse collapse-buttons">
                <form class="navbar-form navbar-left form-inline"  id="teachdbform" method="post" action="/teachdb">
                    {!! csrf_field() !!}
                    <label>Instrument
                        <select id="cband" class="form-control">
                            @foreach($rows as $row)
                                <option value={{$row}}>{{$row}}</option>"}}
                            @endforeach
                        </select>
                    </label>
                    <label>Age
                        <input type="number" class="form-control" name="age" id="age" placeholder="0"  min="0" step="1">
                    </label>
                    <label>Teaching Location
                        <select id="location" name="location" class="form-control">
                            <option value="">-</option>
                            <option value="own_home">Teaches at own home</option>
                            <option value="school">Teaches at school</option>
                            <option value="pupil_home">Teaches at pupil home</option>
                            <option value="online">Teaches online</option>
                        </select>
                    </label>
                    <label>Subject
                        <select id="cband" name="subject" class="form-control">
                            <option value="">-</option>
                            <option value="own_home">Instrument</option>
                            <option value="pupil_home">Aural</option>
                            <option value="online">Composition</option>
                            <option value="online">Theory</option>
                        </select>
                    </label>
                    <label>Student Level
                        <select class="form-control" name="level" id="instrument_1_select">
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
                    </label>
                    <label>Search by name</label>
                    <input type="text" class="form-control" placeholder="Name" name="name" id="name">
                    <label>Search by town</label>
                    <input type="text" class="form-control" placeholder="Town" name="town" id="town">
                    <button type="submit" class="btn btn-primary">Search</button>
                </form>
            </div>
        </div>
    </nav>
@endsection

@section('body')

    @foreach($teachers as $teacher)
        <a id="teacherpanellink">
    <div class="col-lg-3 panel panel-default teacherpanel" data-toggle="modal" data-target="#myModal">
        <div class="panel-body">
            <img src="http://placehold.it/100x100" alt="leftimg" class="teachercard_img" />
            <p>This card will have a summary of each teacher as well as a profile picture</p>
            <br>
            <br>
            <p>Clicking on the card will bring up an expanded view</p>
        </div>
    </div>
        </a>


    @endforeach


@endsection