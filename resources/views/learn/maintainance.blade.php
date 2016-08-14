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
                <div class="col-xs-12 col-sm-offset-1 col-sm-10 col-md-offset-2 col-md-8">
                    <h2 class="set-left nonewline"><span class="htb3">Instrument Repairers</span></h2>
                    <a  class="btn btn-info" role="button" href="{{url('learn/repairers')}}">Register as a repairer</a>

                    <ul class="accompanist_list list-group">
                     @if(sizeof($repair) > 0)
                         @foreach($repair as $k => $a)
                            <li class="list-group-item">
                                <table class="listgrouptable">
                                    <tr>
                                        <td>
                                            <h4 class="list-group-item-heading nonewline">{{$a['name']}}</h4>
                                        </td>
                                        <td>
                                            <span class="list-group-item-text">Instruments repaired: {{$a['repaired']}}</span>
                                        </td>
                                        <td>
                                            <button id="{{$a['id']}}" name="{{$a['name']}}" class="btn btn-warning" onclick="openModal(this.id,this.name)">Contact Details (click to reveal)*</button>
                                        </td>
                                    </tr>
                                </table>
                            </li>
                         @endforeach
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