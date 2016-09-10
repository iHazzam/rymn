@extends('template')

@section('title', 'homepage')

@section('body')
    <article class="content">
        <section class="pull-left">
            <div class="container">
                <div class="ssd col-xs-12">
                    <br>
                    <h2 class="set-left"><span class="htb6">Free Resources for Teachers</span></h2>
                    <h3 class="set-left"><span class="htb3">Want to access our resources? </span></h3>
                    <p>
                          Our Resources are currently hosted on DropBox - Please <a href="https://www.dropbox.com/sh/ffbwkdqkx0zzafe/AAAKSJTebmqX4dai_E3XfJwba?dl=0">click here</a> to access them!
                    </p>
                    <p>
                          Want to contribute? Please send a link or attach the file to an email and contact us at <a href="mailto:mail@riponyouthmusic.net">mail@riponyouthmusic.net</a> and we'll add your file to the folder!
                    </p>
                </div>
                </div>
            </section>
    </article>
@endsection
@section('js')
    <script src="{{url('js/teacherdetails.js')}}"></script>
@endsection