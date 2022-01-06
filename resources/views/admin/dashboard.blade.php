@extends('layouts.admin')


@section('title')
    dashboard | courseBlog
@endsection

@section('content')

<div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header"><h4 class="card-title">Home Page of Dashboard</h4></div>
            <div class="card-body">
                <div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
                    <div class="card-header">Users</div>
                    <div class="card-body">
                      <h5 class="card-title">Total No.of Users</h5>
                      <p class="card-text"><h2>{{ $count = DB::table('users')->count(); }}</h2></p>
                    </div>
                </div>
                <div class="card text-white bg-info mb-3" style="max-width: 18rem;">
                    <div class="card-header">Courses</div>
                    <div class="card-body">
                      <h5 class="card-title">Total No.of Courses</h5>
                      <p class="card-text"><h2> {{ $count = DB::table('categories')->count(); }}</h2></p>
                    </div>
                </div>
                <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
                    <div class="card-header">Posts</div>
                    <div class="card-body">
                      <h5 class="card-title">Total No.of Posts</h5>
                      <p class="card-text"><h2>{{ $count = DB::table('products')->count(); }}</h2></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')

@endsection
