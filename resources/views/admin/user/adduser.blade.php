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
                  Add User | CourseBlog
                    <a href="{{ url('regusers') }}" class="btn btn-primary ">Back</a>
                </h4>
            </div>
            <div class="card-body">

                <form action="{{ url('saveuser') }}" method="POST" >
                    @csrf
                    <div class="row">

                        <div class="col-md-6 ">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" placeholder="Enter User name" name="name">
                        </div>
                        <div class="col-md-6 ">
                            <label for="email">email</label>
                            <input type="text" class="form-control" placeholder="Enter email" name="email">
                        </div>
                        <div class="col-md-6 ">
                            <label for="password">password</label>
                            <input type="text" class="form-control" placeholder="Enter password" name="password">
                        </div>
                        <div class="col-md-6 ">
                            <label for="role_as">role_as</label>
                            <select name="role_as" id="" class="form-control">
                                <option value="0">0 = User</option>
                                <option value="1">1 = Admin</option>
                                <option value="2">2 = Super Admin</option>
                            </select>
                        </div>
                        <div class="col-md-6 mt-3">
                            <button type="submit" class="btn btn-primary">Save User</button>
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
