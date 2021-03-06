<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('icons/apple-icon-57x57.png') }}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('icons/apple-icon-60x60.png') }}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('icons/apple-icon-72x72.png') }}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('icons/apple-icon-76x76.png') }}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('icons/apple-icon-114x114.png') }}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('icons/apple-icon-120x120.png') }}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('icons/apple-icon-144x144.png') }}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('icons/apple-icon-152x152.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('icons/apple-icon-180x180.png') }}">
    <link rel="icon" type="image/png" sizes="192x192"  href="{{ asset('icons/android-icon-192x192.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('icons/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('icons/favicon-96x96.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('icons/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('icons/manifest.json') }}">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="{{ asset('ms-icon-144x144.png') }}">
    <meta name="theme-color" content="#ffffff">
    <title>Ripon Youth Music Network | @yield('title')</title>

    <!-- Bootstrap Core CSS -->
    @yield('css')
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap3-dialog/1.34.7/css/bootstrap-dialog.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{url('css/rymn.css')}}" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
{{--jquery at top to fix banner?--}}
    <script src="{{url('/js/jquery.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/1.5.12/clipboard.min.js"></script>
    <script src="{{url('js/bootstrap.min.js')}}"></script>

</head>

<body>
<meta name="viewport" content="width=device-width, initial-scale=1">
<div id="fb-root"></div>
<script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.6&appId=918966724895981";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
<!-- Navigation -->

@section('stickynav')
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/">
                    <img src="{{url('imgs/logo.png')}}" class="logo" alt="logo">
                </a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse pull-right" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li class="dropdown">
                        <a href="/learn" class="dropdown-toggle" data-toggle="dropdown">Learn <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="/learn"><i class=""></i>Learn Dashboard</a>
                            </li>
                            <li role="separator" class="divider"></li>
                            <li>
                                <a href="/learn/instruments"><i class=""></i> Learn an instrument</a>
                            </li>
                            <li>
                                <a href="/learn/teachers"><i class=""></i> Find a teacher</a>
                            </li>
                            <li>
                                <a href="/learn/teacherdb"><i class=""></i> Teacher Database</a>
                            </li>
                            <li>
                                <a href="/learn/purchase"><i class=""></i> Buy and Repair</a>
                            </li>
                            <li role="separator" class="divider"></li>
                            <li>
                                <a href="/learn/accompanists"><i class=""></i>Accompanists</a>
                            </li>
                            <li>
                                <a href="/learn/maintainance"><i class=""></i>Instrument Repairers</a>
                            </li>
                            <li>
                                <a href="/learn/exams"><i class=""></i>Exams</a>
                            </li>
                            <li>
                                <a href="/learn/practice"><i class=""></i>Practice</a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="/teach" class="dropdown-toggle" data-toggle="dropdown">Teach <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="/teach"><i class=""></i>Teach Dashboard</a>
                            </li>
                            <li role="separator" class="divider"></li>
                            <li>
                                <a href="/teach/register"><i class=""></i>Register as a teacher</a>
                            </li>
                            <li>
                                <a href="/teach/resources"><i class=""></i>Resources for teachers</a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="/play" class="dropdown-toggle" data-toggle="dropdown">Play <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="/play"><i class=""></i>Play Dashboard</a>
                            </li>
                            <li role="separator" class="divider"></li>
                            <li>
                                <a href="/play/groups"><i class=""></i>Benifits of group playing</a>
                            </li>
                            <li>
                                <a href="/play/join"><i class=""></i>Join an ensemble</a>
                            </li>
                            <li>
                                <a href="/play/join"><i class=""></i>Organisations for Youth Music</a>
                            </li>
                            <li>
                                <a href="/play/advertise"><i class=""></i> Add your ensemble or group</a>
                            </li>
                            <li>
                                <a href="/play/advertise"><i class=""></i> Add your organisation to RYMN</a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="/discover" class="dropdown-toggle" data-toggle="dropdown">Discover <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="/discover"><i class=""></i>Discover Dashboard</a>
                            </li>
                            <li role="separator" class="divider"></li>
                            <li>
                                <a href="/discover/calendar"><i class=""></i>Events Calendar</a>
                            </li>
                            <li>
                                <a href="/discover/map"><i class=""></i>Events Map</a>
                            </li>
                            <li>
                                <a href="/discover/social"><i class=""></i>RYMN Social Feed</a>
                            </li>
                            <li>
                                <a href="/discover/about"><i class=""></i>About RYMN</a>
                            </li>
                        </ul>
                    </li>

                    @if (Auth::check())
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                @if(Auth::user()->isAdmin())
                                <li><a href="{{ url('admin/dashboard') }}"><i class="fa fa-btn fa-tachometer"></i> Admin Panel</a></li>
                                @endif
                                @if(Auth::user()->isTeacher())
                                   <li><a href="{{ url('edit/teacher') }}"><i class="fa fa-btn fa-tachometer"></i>Edit Teacher Details</a></li>
                                @endif
                                @if(Auth::user()->isRepairer())
                                    <li><a href="{{ url('edit/repairer') }}"><i class="fa fa-btn fa-tachometer"></i>Edit Repairer Details</a></li>
                                @endif
                                @if(Auth::user()->isGroup())
                                        <li><a href="{{ url('edit/group') }}"><i class="fa fa-btn fa-tachometer"></i>Edit Group Details</a></li>
                                        <li><a href="{{ url('edit/group/event') }}"><i class="fa fa-btn fa-tachometer"></i>Edit Group Events</a></li>
                                        <li><a href="{{ url('discover/add') }}"><i class="fa fa-btn fa-plus-square-o"></i>Add New Event</a></li>
                                @endif
                                <li><a href="{{ url('logout') }}"><i class="fa fa-btn fa-sign-out"></i> Logout</a></li>
                            </ul>
                        </li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                Login/Register <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="/login" >Log In</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="{{ url('teach/register') }}">Register as a Teacher</a></li>
                                <li><a href="{{ url('learn/repairers') }}">Register as a Repairer</a></li>
                                <li><a href="{{ url('play/advertise') }}">Add your Group</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
@show

<!-- Page Content -->
@if(!array_key_exists('facebook', $_COOKIE))
<div class="facebook-advert">
    <div class="facebook-inner">

        <span id='close-fb' onclick='this.parentNode.parentNode.parentNode.removeChild(this.parentNode.parentNode); document.cookie = "facebook=true"; return false;'><i class="fa fa-times-circle" aria-hidden="true"></i></span>
    <p class="facebook-text"><a href="https://www.facebook.com/youth.music.network/"><span class="facebook-header"> Please visit and “like” our Facebook Page</span>
        <div class="fb_iframe_widget">
            <div class="fb-like" data-href="https://www.facebook.com/youth.music.network/" data-layout="box_count" data-action="like" data-size="large" data-show-faces="true" data-share="false"></div>
        </div>
        </a>

    </div>
</div>
@endif
<div class="fullwidth">
    @yield('banner')
    <div class="container">
        @yield('body')

    </div>
</div>
@if(!array_key_exists('banner', $_COOKIE))
<div class="stick">
    <div class="col-md-offset-3 col-md-6 subscribe">
        <span id='close-fb' onclick='this.parentNode.parentNode.parentNode.removeChild(this.parentNode.parentNode); document.cookie = "banner=true"; return false;'><i class="fa fa-times-circle" aria-hidden="true"></i></span>
        <form class="form-inline mailform" id="mailform" role="form" action="{{url('newsletter/subscribe_chimp')}}" method="post">
            {{ csrf_field() }}
            <div class="form-group">
                <label  for="subscribe-email"><span class="sub_text">Sign-up for news and information: </span></label>
                <input type="text" name="email" placeholder="Enter your email..." class="subscribe-email form-control" id="subscribe-email">
            </div>
            <button class="btn btn-warning" type="submit" value="Subscribe">Subscribe</button>
        </form>

        <div class="success-message"></div>
        <div class="error-message"></div>
    </div>
</div>
@endif
<footer>

    <div class="col-lg-12">
        <p>
            <a href="{{ url('privacy') }}">Privacy Policy</a> &nbsp;
            <a href="{{ url('sitemap') }}">Sitemap</a> &nbsp;
            <a href="{{ url('cookies') }}">Cookies Policy</a> &nbsp;
            Copyright &copy; Ripon Youth Music Network {{date("Y")}}&nbsp
            <a href="mailto:mail@riponyouthmusic.net">Contact - mail@riponyouthmusic.net</a>
        </p>

    </div>
</footer>
<!-- /.container -->


<!-- jQuery -->
    <script src="{{url('/js/rymn.js')}}"></script>
<!-- Bootstrap Core JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap3-dialog/1.34.7/js/bootstrap-dialog.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/3.51/jquery.form.min.js"></script>
@yield('js')
</body>

</html>