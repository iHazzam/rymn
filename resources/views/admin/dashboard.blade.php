@extends('admin_template')

@section('title', 'homepage')

@section('banner')


    <script>
        $('.navbar-lower').affix({
            offset: {top: 50}
        });
    </script>





    <div class="divide-nav">
        <div class="container">
            <p class="divide-text">Admin Panel @yield('admin-title')</p>
        </div>
    </div>
    <nav class="navbar navbar-default navbar-lower" role="navigation">
        <div class="container">
            <div class="collapse navbar-collapse collapse-buttons">
                <form class="navbar-form navbar-left" role="search">
                    <a href="dashboard/events" class="btn btn-primary">Events</a>
                    <a href="dashboard/groups" class="btn btn-default">Groups</a>
                    <a href="dashboard/teachers" class="btn btn-primary">Teachers</a>
                    <a href="dashboard/social" class="btn btn-default">Social-Send</a>
                    <a href="dashboard/submit" class="btn btn-primary">Submit Resources</a>
                </form>
            </div>
        </div>
    </nav>


@endsection

@section('body')

    <h1> This is the admin dashboard </h1>


@endsection