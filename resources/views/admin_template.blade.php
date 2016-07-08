@extends('template')

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
                    <a href="/admin/dashboard" class="btn btn-default">Dashboard</a>
                    <a href="/admin/dashboard/events" class="btn btn-primary">Events</a>
                    <a href="/admin/dashboard/groups" class="btn btn-default">Groups</a>
                    <a href="/admin/dashboard/teachers" class="btn btn-primary">Teachers</a>
                    <a href="/admin/dashboard/submit" class="btn btn-default">Submit Resources</a>
                </form>
            </div>
        </div>
    </nav>


@endsection