<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Ripon Youth Music Network | @yield('title')</title>

    <!-- Bootstrap Core CSS -->
    @yield('css')
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{url('css/rymn.css')}}" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
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
                                <a href="/learn/parents"><i class=""></i> Information for parents</a>
                            </li>
                            <li>
                                <a href="/learn/kids"><i class=""></i>Information for kids</a>
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
                                <a href="/play/groups"><i class=""></i>Join an ensemble</a>
                            </li>
                            <li>
                                <a href="/play/groups"><i class=""></i>Benifits of group playing</a>
                            </li>
                            <li>
                                <a href="/play/advertise"><i class=""></i> Add your ensemble to RYMN</a>
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
                                <a href="/discover/newsletter"><i class=""></i>The RYMN newsletter</a>
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
                                <li><a href="{{ url('admin/dashboard') }}"><i class="fa fa-btn fa-tachometer"></i> Admin Panel</a></li>
                                <li><a href="{{ url('admin/logout') }}"><i class="fa fa-btn fa-sign-out"></i> Logout</a></li>
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
<div class="facebook-advert">
    <div class="facebook-inner">

        <span id='close-fb' onclick='this.parentNode.parentNode.parentNode.removeChild(this.parentNode.parentNode); return false;'><i class="fa fa-times-circle" aria-hidden="true"></i></span>
    <p class="facebook-text"><a href="https://www.facebook.com/youth.music.network/"><span class="facebook-header"> Please visit and “like” our Facebook Page</span>
        <div class="fb_iframe_widget">
            <div class="fb-like" data-href="https://www.facebook.com/youth.music.network/" data-layout="box_count" data-action="like" data-size="large" data-show-faces="true" data-share="false"></div>
        </div>
        </a>

    </div>
</div>
<div class="fullwidth">
    @yield('banner')
    <div class="container">
        @yield('body')

    </div>
</div>
<div class="stick">
    <div class="col-md-offset-3 col-md-6 subscribe">
        <form class="form-inline mailform" role="form" action="{{url('newsletter/subscribe_chimp')}}" method="post">
            <div class="form-group">
                <label  for="subscribe-email"><span class="sub_text">Sign-up for news and information: </span></label>
                <input type="text" name="email" placeholder="Enter your email..." class="subscribe-email form-control" id="subscribe-email">
            </div>
            <button type="submit" class="btn btn-default">Subscribe</button>
        </form>

        <div class="success-message"></div>
        <div class="error-message"></div>
    </div>
</div>
<footer>

    <div class="col-lg-12">
        <p>Copyright &copy; Ripon Youth Music Network {{date("Y")}}</p>
    </div>
</footer>
<!-- /.container -->


<!-- jQuery -->
<script src="{{url('/js/jquery.js')}}"></script>
    <script src="{{url('/js/rymn.js')}}"></script>
<!-- Bootstrap Core JavaScript -->
<script src="{{url('js/bootstrap.min.js')}}"></script>
@yield('js')
</body>

</html>