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
                  Add Product | CourseBlog
                    <a href="{{ url('products') }}" class="btn btn-primary ">Back</a>
                </h4>
            </div>
            <div class="card-body">

                <form action="{{ url('saveprod') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <label for="name">category list</label>
                            <select name="cate_id" id="" class="form-control">
                                @foreach ($category as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 ">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" placeholder="Enter the  Product name" name="name">
                        </div>
                        <div class="col-md-6 ">
                            <label for="slug">Slug</label>
                            <input type="text" class="form-control" placeholder="Enter the  Product slug" name="slug">
                        </div>
                        <div class="col-md-12 mt-3">
                            <label for="Description">Description</label>
                            <textarea name="description" id='summernote' class="form-control" rows="10"></textarea>
                        </div>
                        <div class="col-md-12 mt-3">
                            <label for="Metatitle">Meta Title</label>
                            <input type="text" class="form-control" placeholder="Enter Meta Title" name="meta_title">
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="metadesc">Meta Description</label>
                            <input type="text" class="form-control" placeholder="Enter Meta description" name="meta_description">
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="metakeyword">Meta Keyword</label>
                            <input type="text" class="form-control" placeholder="Enter Meta Keyword" name="meta_keyword">
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="status">status</label>
                            <input class="form-control" name="status" type="checkbox" >
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="image">image</label>
                            <input class="form-control"  type="file"  name="image">
                        </div>
                        <div class="col-md-6 mt-3">
                            <button type="submit" class="btn btn-primary">Save Product</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

@endsection

@section('script')


<script>
     $('#summernote').summernote({
        placeholder: 'Type here....',
        tabsize: 2,
        height: 100
      });
</script>


@endsection
