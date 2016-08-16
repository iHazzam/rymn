@extends('admin_template')

@section('title', 'homepage')
@section('admin-title','- Submit Resource')
@section('body')
    <div class="ssd col-xs-12">
        <br>
        <h2 class="set-left"><span class="htb6">File Upload</span></h2>

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

        <form name="basicform" id="groupform" method="post" action="/admin/dashboard/submit/post" enctype="multipart/form-data">
            {!! csrf_field() !!}
            <div id="sf1" class="frm">
                <fieldset>
                    <div class="alert alert-warning alert-dismissible hidden" id="incomplete" role="alert">Please complete all fields to continue</div>
                    <legend>Upload files of type PDF, DOC(X), XLS(X), PPT(X) or images only. If newsletter, only PDF</legend>
                    <div class="form-group">
                        <label for="file_upload" class="control-label">File upload: </label>
                        {!! Form::file('file_upload') !!}
                    </div>
                    <div class="form-group">
                        <label for="type" class="control-label">File upload: </label> <br>
                        <input type="radio" name="type" value="news"> Newsletter<br>
                        <input type="radio" name="type" value="voice"> Resource - Voice<br>
                        <input type="radio" name="type" value="keyboard"> Resource - Keyboard<br>
                        <input type="radio" name="type" value="strings"> Resource - Strings<br>
                        <input type="radio" name="type" value="woodwind"> Resource - Woodwind<br>
                        <input type="radio" name="type" value="brass"> Resource - Brass<br>
                        <input type="radio" name="type" value="percussion"> Resource - Percussion<br>
                        <input type="radio" name="type" value="guitar"> Resource - Guitar<br>
                        <input type="radio" name="type" value="harp"> Resource - Harp<br>
                        <input type="radio" name="type" value="other"> Resource - Other<br>

                    </div>

                    <div class="clearfix" style="height: 10px;clear: both;"></div>
                    <div class="clearfix" style="height: 10px;clear: both;"></div>

                    <div class="form-group">
                        <div class="col-lg-10 col-lg-offset-2">
                            <button type="submit" id="group_sub" class="btn btn-warning"><span class="fa fa-paper-plane"></span> Submit </button>
                        </div>
                    </div>

                </fieldset>
            </div>
        </form>
        </p>

    </div>


@endsection