@extends('template')

@section('title', 'homepage')
@section('banner')
    <div class="row banner no-gutters">
        <div class="col-md-3  col-sm-6 col-xs-6">
            <a href="learn/instruments">
                <img class="banner-img" src="imgs/banners/learn_1.png">
            </a>
        </div>
        <div class="col-md-3  col-sm-6 col-xs-6">
            <a href="learn/teachers">
                <img class="banner-img" src="imgs/banners/learn_2.png">
            </a>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-6">
            <a href="learn/parents">
                <img class="banner-img" src="imgs/banners/learn_3.png">
            </a>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-6">
            <a href="learn/kids">
                <img class="banner-img" src="imgs/banners/learn_4.png">
            </a>
        </div>
    </div>
@endsection
@section('body')

    <h3 class="fix-middle" id="underline">Learn an instrument in the Ripon Area</h3>
    <div class="row info-row col-md-offset-1 col-md-10">
        <p>
            Lorem ipsunteger pretium mattis metus at vulputate. Fusce interdum quam et ligula sollicitudin lacinia. Morbi diam eros, ultrices vel lectus id, dapibus fringilla diam. Praesent suscipit mattis ex in convallis. Donec eu pretium arcu. Vestibulum pulvinar id ante et malesuada. Suspendisse posuere diam quis tortor iaculis, non tempor dui semper. Donec iaculis semper condimentum. Vivamus maximus tortor quis odio rutrum viverra. Curabitur imperdiet eros id nisi semper aliquet. Morbi interdum nisl sit amet nisi luctus, quis pulvinar dolor lobortis. Quisque ut elit leo. Sed bibendum, enim sed pulvinar tempus, ante magna dictum ex, sit amet mollis arcu nisi quis libero. Donec id velit sit amet enim condimentum tincidunt. Fusce vel tincidunt sapien. Cras eu sem et arcu laoreet efficitur.
        </p>
    </div>

@endsection