@extends('template')

@section('title', 'homepage')

@section('body')
    <article class="content">
        <section class="pull-left">
            <div class="container">
                <div class="ssd col-xs-12">
                    <br>
                    <h2 class="set-left"><span class="htb6">Accompanists on RYMN</span></h2>
                    <h3 class="set-left"><span class="htb3">Why would you need an accompanist</span></h3>
                    <p>
                        Playing some instruments alone can be rewarding and challenging, but much of the classical music repetoire is centered around a solo instrument and an accompanying part. Frequently this is intended to be an orchestra, however most students will not get the oppotunity to play with an orchestra until they are much further along in their musical development. Instead, the piano or organ is can be an exceptional replacement to learn to play with others and to
                        embellish your playing in a small concert or in exams (indeed, an accompanist is required for most music exams).
                    </p>
                    <p>
                        The skill of accompanying requires a pianist well practiced in keeping time with others, adjusting along with the solo player and compensating for any small changes in speed (Tempo) or volumne (Dynamics). Someone well versed in accompanying can really bring out the best in a young musician. Skills to look for in an accompanist include previous experience, high level of piano skill and patience. Below, is listed anyone who has indicated to RYMN that they accompany students, and the level they accompany.
                    </p>
                </div>
                <div class="col-xs-12 col-sm-offset-1 col-sm-10 col-md-offset-2 col-md-8">
                    <h2 class="set-left"><span class="htb4">Accompanists</span></h2>
                    <ul class="accompanist_list list-group">
                 @if(sizeof($accomp) > 0)
                     @foreach($accomp as $k => $a)
                        <li class="list-group-item">
                            <table class="listgrouptable">
                                <tr>
                                    <td>
                                        <h4 class="list-group-item-heading nonewline">{{$a['name']}}</h4>
                                    </td>
                                    <td>
                                        <span class="list-group-item-text">Max Level accompanied: {{$a['level']}}</span>
                                    </td>
                                    <td>
                                        <button id="{{$a['id']}}" name="{{$a['name']}}" class="btn btn-warning" onclick="openModal(this.id,this.name)">Contact Details (click to reveal)*</button>

                                        <div id="target"></div>
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