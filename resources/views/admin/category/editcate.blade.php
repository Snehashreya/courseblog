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
                  Edit Categories | CourseBlog
                    <a href="{{ url('categories') }}" class="btn btn-primary ">Back</a>
                </h4>
            </div>
            <div class="card-body">

                <form action="{{ url('updatecate/'.$category->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" value="{{ $category->name }}" placeholder="Enter the  Category Name" name="name">
                        </div>
                        <div class="col-md-6 ">
                            <label for="slug">slug</label>
                            <input type="text" class="form-control" value="{{ $category->slug }}" placeholder="Enter the  Category slug" name="slug">
                        </div>
                        <div class="col-md-12 mt-3">
                            <label for="Description">Description</label>
                            <textarea name="description" class="form-control" rows="10">{{ $category->description }}</textarea>
                        </div>
                        <div class="col-md-12 mt-3">
                            <label for="Metatitle">Meta Title</label>
                            <input type="text" class="form-control" value="{{ $category->metatitle }}" placeholder="Enter Meta Title" name="metatitle">
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="metadesc">Meta Description</label>
                            <input type="text" class="form-control" value="{{ $category->metadesc }}" placeholder="Enter Meta description" name="metadesc">
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="metakeyword">Meta Keyword</label>
                            <input type="text" class="form-control" value="{{ $category->metakeyword }}" placeholder="Enter Meta Keyword" name="metakeyword">
                        </div>
                        <div class="col-md-4 mt-3">
                            <label for="navstatus">Navbar status</label>
                            <input class="form-control" name="navstatus" type="checkbox" {{ $category->navstatus == '1' ? 'checked':'' }} >
                        </div>
                        <div class="col-md-4 mt-3">
                            <label for="status">status</label>
                            <input class="form-control" name="status" type="checkbox" {{ $category->navstatus == '1' ? 'checked':'' }} >
                        </div>
                        <div class="col-md-4 mt-3">
                            <img src="{{ asset('uploads/categories/'.$category->image) }}" alt="cate image" width="100px" height="100px">
                            <input class="form-control mt-2"  type="file"  name="image">
                        </div>
                        <div class="col-md-6 mt-3">
                            <button type="submit" class="btn btn-primary">Update category</button>
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
