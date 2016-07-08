@extends('admin_template')

@section('title', 'homepage')
@section('admin-title', '- Moderate Events')
@section('body')

    <div class="flash-message">
        @foreach (['danger', 'warning', 'success', 'info'] as $msg)
            @if(Session::has('alert-' . $msg))

                <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
            @endif
        @endforeach
    </div> <!-- end .flash-message -->
    @if (count($events) > 0)
        <div class="panel panel-default">
            <div class="panel-heading">
                events on RYMN
            </div>

            <div class="panel-body">
                <table class="table table-striped task-table">

                    <!-- Table Headings -->
                    <thead>
                    <th>Event Name</th>
                    <th>Event Date</th>
                    <th>Group Name</th>
                    <th>Created</th>
                    <th>Delete</th>
                    </thead>

                    <!-- Table Body -->
                    <tbody>
                    @foreach ($events as $event)
                        <tr>
                            <!-- Name -->
                            <td class="table-text">
                                <div>{{ $event->name }}</div>
                            </td>
                            <!-- event date -->
                            <td class="table-text">
                                <div>{{ $event->date->diffForHumans() }}</div>
                            </td>
                            <!-- group who own event -->
                            <td class="table-text">
                                <div>{{ $event->group()->first()->group_name}}</div>
                            </td>
                            <!-- Creation Date -->
                            <td class="table-text">
                                <div>{{ $event->created_at->diffForHumans() }}</div>
                            </td>
                            <td>
                                <form action="{{ url('/admin/dashboard/events/'.$event->id) }}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}

                                    <button type="submit" id="delete-event-{{ $event->id }}" class="btn btn-danger">
                                        <i class="fa fa-btn fa-trash"></i>Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif


@endsection