@extends('template')

@section('title', 'homepage')

@section('body')
    <article class="content">
        <section class="pull-left">
            <div class="container">
                <div class="ssd col-xs-12">
                    <br>
                    <h2 class="set-left"><span class="htb6">Maintainance and repairs</span></h2>
                    <h3 class="set-left"><span class="htb3">What to do when something breaks!</span></h3>
                    <p>
                        Accidents will happen!  In any case, all instruments will need occasional repairs and overhauls, especially if you want to sell them.
                    </p>
                    <p>
                        The skill of maintaining and repairing instruments is something that requires a specialist touch and can be tricky. It is worth using a professional, to avoid further damage to the instrument. Below, is listed anyone who has indicated to RYMN that they can repair instruments, and the instruments they repair.
                    </p>
                </div>
                <div class="col-xs-12">
                    <h2 class="set-left nonewline"><span class="htb3">Instrument Repairers</span></h2>
                    <a  class="btn btn-info pull-right" role="button" href="{{url('learn/repairers')}}">Register as a repairer</a>

                    <br>
                    <br>
                    <ul class="accompanist_list list-group">
                     @if(sizeof($repair) > 0)

                        <table class="listgrouptable table">
                            <tr>
                                <th data-field="image" data-sortable="true"  >Thumbnail</th>
                                <th data-field="name" data-sortable="true"  >Name</th>
                                <th data-field="group-type" data-sortable="true" >Instruments Repaired</th>
                                <th data-field="town" data-sortable="true" >Location</th>
                                <th data-field="recruiting" data-sortable="true" >Get Contact Details</th>
                            </tr>
                         @foreach($repair as $k => $a)
                                    <tr>
                                        <td>
                                            <img style="max-width: 100px;" src="{{$a['img']}}">
                                        </td>
                                        <td>
                                            <span class="list-group-item-heading">{{$a['name']}}</span>
                                        </td>
                                        <td>
                                            <span class="list-group-item-text">{{$a['repaired']}}</span>
                                        </td>
                                        <td>
                                            <span class="list-group-item-text"> {{$a['town']}}</span>
                                        </td>
                                        <td>
                                            <button id="{{$a['id']}}" name="{{$a['name']}}" class="btn btn-warning" onclick="openModalRepairer(this.id,this.name)"><span class="smaller2">View Contact Details</span></button>
                                        </td>
                                    </tr>

                            @endforeach
                        </table>
                     @else
                         <p>Apologies, there are no instrument repairers currently in RYMN's database</p>
                     @endif

                    </ul>
                </div>
                <div class="col-sm-offset-2 col-sm-8">
                    <p style="font-size: 9px">* - The click to reveal protects the sensitive information of the teachers from bots and scrapers</p>
                </div>
            </div>
        </section>
    </article>

@endsection
@section('js')
    <script src="{{url('js/teacherdetails.js')}}"></script>
@endsection