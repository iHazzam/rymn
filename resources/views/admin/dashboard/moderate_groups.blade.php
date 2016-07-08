@extends('admin_template')

@section('title', 'homepage')
@section('admin-title', '- Moderate Groups')
@section('body')
    <div class="flash-message">
        @foreach (['danger', 'warning', 'success', 'info'] as $msg)
            @if(Session::has('alert-' . $msg))

                <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
            @endif
        @endforeach
    </div> <!-- end .flash-message -->
    @if (count($groups) > 0)
        <div class="panel panel-default">
            <div class="panel-heading">
                Groups on RYMN
            </div>

            <div class="panel-body">
                <table class="table table-striped task-table">

                    <!-- Table Headings -->
                    <thead>
                    <th>Group Name</th>
                    <th>Group Email</th>
                    <th>Created</th>
                    <th>Delete</th>
                    </thead>

                    <!-- Table Body -->
                    <tbody>
                    @foreach ($groups as $group)
                        <tr>
                            <!-- Name -->
                            <td class="table-text">
                                <div>{{ $group->group_name }}</div>
                            </td>
                            <!-- Email -->
                            <td class="table-text">
                                <div>{{ $group->contact_email }}</div>
                            </td>
                            <!-- Creation Date -->
                            <td class="table-text">
                                <div>{{ $group->created_at->diffForHumans() }}</div>
                            </td>
                            <td>
                                <form action="{{ url('/admin/dashboard/groups/'.$group->id) }}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}

                                    <button type="submit" id="delete-group-{{ $group->id }}" class="btn btn-danger">
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