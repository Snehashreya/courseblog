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
                  Edit User | CourseBlog
                    <a href="{{ url('regusers') }}" class="btn btn-primary ">Back</a>
                </h4>
            </div>
            <div class="card-body">

                <form action="{{ url('updateuser/'.$users->id) }}" method="POST" >
                    @csrf
                    @method('PUT')
                    <div class="row">

                        <div class="col-md-6 mt-3 ">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" placeholder="Enter User name" name="name" value="{{ $users->name }}">
                        </div>
                        <div class="col-md-6 mt-3 ">
                            <label for="email">email</label>
                            <input type="text" class="form-control" placeholder="Enter email" name="email" value="{{ $users->email }}">
                        </div>
                        <div class="col-md-4 mt-3">
                            <label for="password">password</label>
                            <input type="text" class="form-control" placeholder="Enter password" name="password" value="{{ $users->password }}">
                        </div>
                        <div class="col-md-4 mt-3 ">
                            <label for="role_as">current role</label>
                            <select name="role_as" id="" class="form-control">
                                <option value="">{{ $users->role_as }}</option>
                            </select>
                        </div>
                        <div class="col-md-4 mt-3 ">
                            <label for="role_as">role_as</label>
                            <select name="role_as" id="" class="form-control">
                                <option value="0"> User = 0 </option>
                                <option value="1"> Admin = 1</option>
                                <option value="2"> Super Admin = 2 </option>
                            </select>
                        </div>
                        <div class="col-md-6 mt-3 mt-3">
                            <button type="submit" class="btn btn-primary">Update User</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

@endsection

@section('script')


@endsection
