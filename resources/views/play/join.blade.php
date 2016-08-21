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
            <p class="divide-text">Groups on RYMN</p>
        </div>
    </div>
    <nav class="navbar navbar-default navbar-lower permalock" role="findingstuff">
        <div class="col-md-offset-3 col-md-6 col-xs-offset-1 col-xs-10">
            <form class="navbar-form navbar-left form-inline"  id="teachdbform" method="post" action="{{ action('playController@search') }}">
                {!! csrf_field() !!}
                <label>Group type
                    <select id="type" name="type" class="form-control">
                        <option value="">-</option>
                        @foreach($types as $key=>$type)
                            <option value="{{$key}}">{{$type}}</option>
                        @endforeach
                    </select>
                </label>
                <label>Group Town
                    <select id="location" name="location" class="form-control">
                        <option value="">-</option>
                        @foreach($cities as $key=>$type)
                            <option value="{{$key}}">{{$type}}</option>
                        @endforeach
                    </select>
                </label>
                <label><input type="checkbox" name="recruiting" value="recruiting">Looking for members</label>
                <button type="submit" class="btn btn-primary">Search</button>
            </form>
        </div>
    </nav>
@endsection


@section('body')
    <div class="container">
        <div>
            <div class="flash-message">
                @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                    @if(Session::has('alert-' . $msg))

                        <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                    @endif
                @endforeach
            </div> <!-- end .flash-message -->
        </div>
    </div>


        <br>
        <table class="table table-bordered table-responsive table-striped" id="table" data-search="true" data-show-columns="true" data-pagination="true" data-height="250">
            <thead>
                <tr>
                    <th data-field="image" data-sortable="true" >Thumbnail</th>
                    <th data-field="name" data-sortable="true" width="10%" >Group Name</th>
                    <th data-field="group-type" data-sortable="true"  width="10%" >Group Type</th>
                    <th data-field="town" data-sortable="true">Group Town</th>
                    <th data-field="description" data-sortable="true">Group Description</th>
                    <th data-field="recruiting" data-sortable="true" width="10%">Recruiting?</th>
                </tr>
            </thead>
            <tbody>


            @foreach($groups as $group)
                @if(is_array($group))  <?php $group=$group[0]; ?> @endif
                @if($group->recruiting == 1)
                    <div id="modal{{$group->id}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;  </button>
                                    <h4 class="modal-title" id="myModalLabel">{{$group->group_name . " - Groups on RYMN"}}</h4>
                                </div>
                                <div class="modal-body">
                                    <h3 class="htb1">Group Recruitment Factsheet</h3>
                                    <p><span class="htb4">Group name:</span> {{$group->group_name}}</p>
                                    <p><span class="htb4">Group location:</span>
                                        <?php
                                        $temp = $group->group_town;
                                        $temp = str_replace('_', ' ', $temp);
                                        $temp = ucwords($temp);
                                        echo($temp);
                                        ?>
                                    </p>
                                    <p><span class="htb4">Minimum level:</span>
                                        <?php
                                            $fieldMin = $group->minimum_level;
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
                                        echo($fieldMin);
                                        ?>
                                    </p>
                                    <p><span class="htb4">Audition?</span> @if($group->audition == 1)  <i class="fa fa-check htb3" aria-hidden="true"></i>  @else <i class="fa fa-times htb5"  aria-hidden="true"></i>@endif</p>
                                    <p><span class="htb4">Details:</span> {{$group->recruit_details}}</p>
                                    @if($group->website != null)
                                        <p id="website"> <a href="{{$group->website}}">Click to access group's website </a> </p>
                                    @endif
                                    @if($group->facebook != null)
                                        <p id="website"> <a href="{{$group->facebook}}">Click to access group's facebook page </a> </p>
                                    @endif
                                    <button type="button" id="{{$group->id}}" name="{{$group->name}}" class="btn btn-default" onclick="openModal(this.id,this.name)" >Get Group Contact Email Address</button>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>



                    </div>
                @endif


                <tr>
                    <td><img style="max-width: 100px; max-height:100px;" src={{url($group->thumbnail_image_path)}}></td>
                    <td>{{$group->group_name}}</td>
                    <td>
                        <?php
                                $temp = $group->ensemble_type;
                                $temp = str_replace('_', ' ', $temp);
                                $temp = ucwords($temp);
                        echo($temp);
                        ?>
                    </td>
                    <td>
                        <?php
                        $temp = $group->group_town;
                        $temp = str_replace('_', ' ', $temp);
                        $temp = ucwords($temp);
                        echo($temp);
                        ?></td>
                    <td>{{$group->group_description}}</td>
                    <td>@if($group->recruiting == 1) <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal{{$group->id}}"> Click to see recruiting details! </button> @else <i class="fa fa-times htb5"  aria-hidden="true"></i> @endif</td>
                </tr>


            @endforeach
            </tbody>
        </table>

@endsection

@section('js')
    <script src="{{url('js/joingroups.js')}}"></script>

@endsection