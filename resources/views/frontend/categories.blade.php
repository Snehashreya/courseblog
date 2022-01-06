@extends('layouts.front')


@section('title')

@endsection

@section('content')

<div class="class">
    <div class="container">
        <div class="row ml-5 mr-5 mt-3 mb-3">
            <h2 class="categoriesfront mt-3 mb-2">{{$category->name }} Posts</h2>
            <div class="">
                <div class="underlinefront mb-5"></div>
            </div>

            <div class="col-md-6 mb-3">
                @forelse ($product as $item)
                    <div class="card my-2">
                        <div class="card-body">
                            <a href="{{ url('view-course/'.$category->slug. '/'. $item->slug) }}" style="text-decoration: none">
                                {{ $item->name }}
                            </a>
                            <h6 class="mt-2">Posted On: {{ $item->created_at }}</h6>
                        </div>
                    </div>
                @empty
                    <h4>No posts available</h4>

                @endforelse
            </div>


            <div class="col-md-6 mb-3">
                <div class="card">
                    <div class="card-header">
                        <h3>Advertise Area</h3>
                    </div>
                    <div class="card-body">
                        <h1>Advertise Area</h3>

                    </div>
                </div>
            </div>



        </div>
    </div>
</div>

@endsection



@section('script')

@endsection

