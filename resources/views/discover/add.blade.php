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
                    <h3 class="panel-title">RYMN events!</h3>
                </div>
                <div class="panel-body">
                    <div class="alert alert-warning alert-dismissible hidden" id="incomplete" role="alert">Please complete all starred fields to continue</div>
                    <form name="basicform" id="basicform" method="post" action="/discover/add/post" enctype="multipart/form-data" >
                        {!! csrf_field() !!}
                        <div id="sf1" class="frm">
                            <fieldset name="one">
                                <legend>Add an event to RYMN</legend>
                                <p>Events and concerts are the lifeblood of a musical community. Add events that your ensemble or one you enjoy watching has coming up, and allow others to find out what you know!<br> If the group you are adding an event for is not listed, please go <a href="/play/advertise">here</a> to add your group to the site</p>
                                <label><i class="fa fa-star" aria-hidden="true"></i>Group holding the event
                                    <select id="cband" name="group" class="form-control">
                                        @foreach(array_combine($groups, $ids) as $row => $value)
                                            <option value={{$value}}>{{$row}}</option>"}}
                                        @endforeach
                                    </select>
                                </label>
                                <label><i class="fa fa-star" aria-hidden="true"></i>Date of event
                                    <input type="date" class="form-control" name="date" id="date" >
                                </label>
                                <label><i class="fa fa-star" aria-hidden="true"></i>Time of event
                                    <input type="time" class="form-control" name="time" id="time" >
                                </label>
                                <div class="form-group">
                                    <label for="addr1" class="control-label"><i class="fa fa-star" aria-hidden="true"></i>Venue Address Line 1</label>

                                    <input type="text" class="form-control" id="addr1" name="addr1" placeholder="" required="">


                                </div>
                                <div class="form-group">
                                    <label for="addr2" class="control-label">Venue Address Line 2</label>

                                    <input type="text" class="form-control" id="addr2" name="addr2" placeholder="" >


                                </div>
                                <div class="form-group">
                                    <label for="city" class="control-label"><i class="fa fa-star" aria-hidden="true"></i>Venue City</label>

                                    <input type="text" class="form-control" id="city" name="city" placeholder="" required="">


                                </div>
                                <div class="form-group">
                                    <label for="postcode" class="control-label"><i class="fa fa-star" aria-hidden="true"></i>Venue Postcode</label>

                                    <input type="text" class="form-control" id="postcode" name="postcode" placeholder="" required="">


                                </div>
                                <div class="form-group">
                                    <label for="ticket_price" class="control-label">Ticket price (£)</label>

                                    <input type="number" id="ticket_price" name="ticket_price" min="0.01" step="0.01" max="2500">
                                </div>
                                <div class="form-group">
                                    <label for="programnotes" class="control-label">Concert Information / Program</label>
                                    <textarea class="form-control" id="programnotes" name="programnotes" placeholder="Please add any relevant information about tickets office, program or anything else here"></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="thumbnail_image" class="control-label">Add a thumbnail image for the concert (Optional)</label>
                                    {!! Form::file('thumbnail_image') !!}

                                </div>
                                <div class="clearfix" style="height: 10px;clear: both;"></div>

                                <div class="form-group">
                                    <div class="col-lg-10 col-lg-offset-2">
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

