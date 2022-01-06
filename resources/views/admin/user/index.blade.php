@extends('layouts.admin')


@section('title')
    dashboard | courseBlog
@endsection

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">
                    User | CourseBlog
                    <a href="{{ url('adduser') }}" class="btn btn-primary ">Add User</a>
                </h4>
            </div>
            <div class="card-body">
                <table class="table table-stripped">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>name</th>
                            <th>email</th>
                            <th>password</th>
                            @if (Auth::user()->role_as =='2')
                                <th>roles</th>
                            @endif
                            <th>edit</th>
                            @if (Auth::user()->role_as =='2')
                                <th>delete</th>
                                <th>block</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $row)
                            <tr>
                                <td>{{ $row->id }}</td>
                                <td>{{ $row->name }}</td>
                                <td>{{ $row->email }}</td>
                                <td>{{ $row->password }}</td>
                                @if (Auth::user()->role_as == '2')
                                    <td>{{ $row->role_as }}</td>
                                @endif
                                <td>
                                    <a href="{{ url('edituser/'.$row->id) }}" class="btn btn-success">Edit</a>
                                </td>
                                @if (Auth::user()->role_as == '2')
                                    <td>
                                        <a href="{{ url('deluser/'.$row->id) }}" class="btn btn-danger">Delete</a>
                                    </td>
                                    <td>
                                        <a href="{{ url('blockuser/'.$row->id) }}" class="btn btn-danger">Block</a>
                                    </td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                  </table>
            </div>
        </div>
    </div>
</div>


@endsection

@section('script')



@endsection
