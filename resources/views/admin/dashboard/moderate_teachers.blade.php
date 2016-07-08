@extends('admin_template')

@section('title', 'homepage')
@section('admin-title', '- Moderate teachers')
@section('body')
    <div class="flash-message">
        @foreach (['danger', 'warning', 'success', 'info'] as $msg)
            @if(Session::has('alert-' . $msg))

                <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
            @endif
        @endforeach
    </div> <!-- end .flash-message -->
    @if (count($teachers) > 0)
        <div class="panel panel-default">
            <div class="panel-heading">
                Teachers on RYMN
            </div>

            <div class="panel-body">
                <table class="table table-striped task-table">

                    <!-- Table Headings -->
                    <thead>
                    <th>Teacher Name</th>
                    <th>Teacher Email</th>
                    <th>Primary Instrument</th>
                    <th>Created</th>
                    <th>Delete</th>
                    </thead>

                    <!-- Table Body -->
                    <tbody>
                    @foreach ($teachers as $teacher)
                        <tr>
                            <!-- Name -->
                            <td class="table-text">
                                <div>{{ $teacher->first_name . ' ' . $teacher->last_name }}</div>
                            </td>
                            <!-- teacher date -->
                            <td class="table-text">
                                <div>{{ $teacher->email }}</div>
                            </td>
                            <!-- Primary Instrument -->
                            <td class="table-text">
                                <div>{{ $teacher->instruments_played1}}</div>
                            </td>
                            <!-- Creation Date -->
                            <td class="table-text">
                                <div>{{ $teacher->created_at->diffForHumans() }}</div>
                            </td>
                            <td>
                                <form action="{{ url('/admin/dashboard/teachers/'.$teacher->id) }}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}

                                    <button type="submit" id="delete-teacher-{{ $teacher->id }}" class="btn btn-danger">
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