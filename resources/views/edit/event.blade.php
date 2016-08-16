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
                    <h3 class="panel-title">Edit Events</h3>
                </div>
                <div class="panel-body">
                    <div class="col-xs-12 col-sm-offset-1 col-sm-10 col-md-offset-2 col-md-8">
                        <h2 class="set-left nonewline"><span class="htb3">Future events for group: {{$group}}</span></h2>

                        <ul class="accompanist_list list-group">
                            @if(sizeof($events) > 0)
                                @foreach($events as $k => $event)
                                    <li class="list-group-item">
                                        <table class="listgrouptable">
                                            <tr> <!-- name date id -->
                                                <td>
                                                    <h4 class="list-group-item-heading nonewline">{{$event['name']}}</h4>
                                                </td>
                                                <td>
                                                    <span class="list-group-item-text">Date: {{$dates[$k]}}</span>
                                                </td>
                                                <td>
                                                    <a class="btn btn-warning" href="{{url('/edit/group/event/'.$event['id'])}}">Edit</a>
                                                </td>
                                            </tr>
                                        </table>
                                    </li>
                                @endforeach
                            @else
                                <p>Apologies, there are no events for this group in RYMN's database</p>
                            @endif

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('js')
    {{--<script src="{{url('/js/formfunction.js')}}"></script>--}}
@endsection

