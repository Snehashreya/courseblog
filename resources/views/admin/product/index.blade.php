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
                    Product | CourseBlog
                    <a href="{{ url('addprod') }}" class="btn btn-primary ">Add Product</a>
                </h4>
            </div>
            <div class="card-body">
                <table class="table table-stripped">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>cate_id</th>
                            <th>name</th>
                            <th>slug</th>
                            {{-- <th>description</th> --}}
                            <th>status</th>
                            <th>image</th>
                            <th>created_at</th>
                            <th>updated_at</th>
                            <th>edit</th>
                            @if (Auth::user()->role_as =='2')
                                <th>delete</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($product as $row)
                        <tr>
                            <th>{{ $row->id }}</th>
                            <th>{{ $row->cate_id }}</th>
                            <th>{{ $row->name }}</th>
                            <th>{{ $row->slug }}</th>
                            {{-- <th>{!! $row->description !!}</th> --}}
                            <th>{{ $row->status }}</th>
                            <th>
                                <img src="{{ asset('uploads/products/'.$row->image) }}" alt="cate image" height="75px" >
                            </th>
                            <th>{{ $row->created_at }}</th>
                            <th>{{ $row->updated_at }}</th>
                            <th>
                                <a href="{{ url('editprod/'.$row->id) }}" class="btn btn-success">Edit</a>
                            </th>
                            @if (Auth::user()->role_as == '2')
                                <th>
                                    <a href="{{ url('deleteprod/'.$row->id) }}" class="btn btn-danger">Delete</a>
                                </th>
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
