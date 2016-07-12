@extends('template')

@section('title', 'homepage')

@section('body')
    <article class="content">
        <section class="pull-left">
            <div class="container">
                <div class="ssd col-xs-12">
                    <br>
                    <h2 class="set-left"><span class="htb6">Accompanists on RYMN</span></h2>
                    <h3 class="set-left"><span class="htb3">Why would you need an accompanist? </span></h3>
                    <p>
                        Playing an instrument on your own (solo) can be rewarding and challenging (especially the Piano, Organ or Harp) but, for most instruments, almost all the music written for them requires other players too.  Much of the repertoire involves a solo instrument with an accompanying part. Often, this will be written for Piano but sometimes it is intended to be an orchestra.  However, but most students will not get the opportunity to play solos with an orchestra until they are much further along in their musical development so, instead, the piano is an obvious replacement. Playing with a piano helps you to learn to play with others and enhances your playing in any small concerts, festivals or in exams (In fact, a piano accompanist is required for most music exams).
                    </p>
                    <p>
                        If you are a pianist yourself, accompanying can be great fun – and one of the best and most enjoyable ways to learn to accompany, to play with others and to improve your reading and rhythmic skills is to play piano duets, ideally with somebody who is better then you!
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