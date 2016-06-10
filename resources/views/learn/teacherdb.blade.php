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
                <form class="navbar-form navbar-left form-inline" role="filter">
                    <label>Instrument
                        <select id="cband" class="form-control">
                            <option value="C15+">C15+</option>
                            <option value="C12-14">C12-14</option>
                            <option value="Other">Other</option>
                        </select>
                    </label>
                    <label>Age
                        <input type="number" class="form-control" id="age" placeholder="0" required="true"  min="0" step="1">
                    </label>
                    <label>Teaching Location
                        <select id="location" class="form-control">
                            <option value="own_home">Teaches at own home</option>
                            <option value="pupil_home">Teaches at pupil home</option>
                            <option value="online">Teaches online</option>
                        </select>
                    </label>
                    <label>Subject
                        <select id="cband" class="form-control">
                            <option value="own_home">Instrument</option>
                            <option value="pupil_home">Aural</option>
                            <option value="online">Composition</option>
                            <option value="online">Theory</option>
                        </select>
                    </label>
                    <label>Student Level
                        <select class="form-control" id="instrument_1_select">
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
                </form>
                <form class="navbar-form navbar-right" role="search">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search" name="srch-term" id="srch-term">
                        <div class="input-group-btn">
                            <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </nav>
@endsection

@section('body')

    <h1 class="fix-middle">this is the teacher db page of the site. Test!</h1>


@endsection