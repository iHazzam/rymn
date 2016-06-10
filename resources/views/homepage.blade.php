@extends('template')

@section('title', 'homepage')

@section('banner')
    <div class="row banner no-gutters">
        <div class="col-md-3  col-sm-6 col-xs-6">
            <a href="learn">
                <img class="banner-img" src="imgs/placeholder.png">
            </a>
        </div>
        <div class="col-md-3  col-sm-6 col-xs-6">
            <a href="teach">
                <img class="banner-img" src="imgs/placeholder.png">
            </a>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-6">
            <a href="play">
                <img class="banner-img" src="imgs/placeholder.png">
            </a>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-6">
            <a href="discover">
                <img class="banner-img" src="imgs/placeholder.png">
            </a>
        </div>
    </div>
@endsection
@section('body')
    <div class="background_home">
    <div class="row welcome">
        <h1 class="fix-middle">
           Welcome to Ripon Youth Music Network</h1>
    </div>
    <div class="row info-row col-md-offset-1 col-md-10">
        <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi tincidunt volutpat risus, ut mollis neque luctus et. Nullam aliquam mi nec quam sodales tempor. Morbi vestibulum ligula sit amet eros molestie fringilla. Cras volutpat, arcu sagittis vestibulum scelerisque, lorem dui ornare neque, quis dictum lectus urna quis nisi. Ut feugiat justo sed odio dapibus cursus. Praesent quis odio vitae mauris tincidunt molestie ac eu mi. Phasellus imperdiet imperdiet lorem, in fermentum diam pellentesque eu.
        Integer pretium mattis metus at vulputate. Fusce interdum quam et ligula sollicitudin lacinia. Morbi diam eros, ultrices vel lectus id, dapibus fringilla diam. Praesent suscipit mattis ex in convallis. Donec eu pretium arcu. Vestibulum pulvinar id ante et malesuada. Suspendisse posuere diam quis tortor iaculis, non tempor dui semper. Donec iaculis semper condimentum. Vivamus maximus tortor quis odio rutrum viverra. Curabitur imperdiet eros id nisi semper aliquet. Morbi interdum nisl sit amet nisi luctus, quis pulvinar dolor lobortis. Quisque ut elit leo. Sed bibendum, enim sed pulvinar tempus, ante magna dictum ex, sit amet mollis arcu nisi quis libero. Donec id velit sit amet enim condimentum tincidunt. Fusce vel tincidunt sapien. Cras eu sem et arcu laoreet efficitur.
        </p>
    </div>

    </div>
@endsection

@section('background-color','#e6f7ff')