@extends('layouts.front')


@section('title')

@endsection

@section('content')

<div class="">
    <div class="container-fluid bg-black">
        <div class="row row1">
            <h2 class="categoriesfront text-white mt-3 mb-2">Categories</h2>
            <div class="">
                <div class="underlinefront mb-5"></div>
            </div>
                @foreach ($category as $cateitem)
                    <div class="col-md-3 mb-5 ">
                        <a href="{{ url('view-course/'.$cateitem->slug) }}" class="category">
                            <div class="card ">
                                <div class="card-body ">
                                    <h4 class="text-center">{{ $cateitem->name }}</h4>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
        </div>
    </div>
</div>

{{-- about  --}}
<div class="">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h2 class="categoriesfront mt-5 mb-2">About CourseBlog</h2>
                <div class="underlinefront mb-3 "></div>
                <p class="mb-3">
                   CourseBlog provides a collection of tutorials about PHP,Mysql,Laravel,Python,Django,ASP.Net,VB.Net,
                   Codeignitor,Bootstrap v4, V4+, jQuery, Ajax, Laravel APis, Composer Packages, Git, Heroku etc. You will find
                   the best example and tutorials of about PHP and Laravel.
                </p>
            </div>
        </div>
    </div>
</div>


<div class="class">
    <div class="container">
        <div class="row ml-5 mr-5 mt-3 mb-3">
            <h2 class="categoriesfront mt-3 mb-2">Latest Posts</h2>
            <div class="">
                <div class="underlinefront mb-5"></div>
            </div>
           @foreach ( $product as $item)




            <div class="col-md-6 mb-3">
                <div class="card">
                    <div class="card-body">
                           <a href="{{ url('view-course/'.$item->category->slug. '/'. $item->slug) }}" style="text-decoration: none">
                                {{ $item->name }}
                           </a>
                           <h6 class="mt-2">Posted On: {{ $item->created_at }}</h6>
                    </div>
                </div>
            </div>

            <div class="col-md-3 mb-3">
                <div class="card">
                    <div class="card-header">
                        Advertise Area
                    </div>
                    <div class="card-body">

                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="card">
                    <div class="card-header">
                        Advertise Area
                    </div>
                    <div class="card-body">

                    </div>
                </div>
            </div>

            @endforeach

        </div>
    </div>
</div>

@endsection

@section('script')

@endsection
