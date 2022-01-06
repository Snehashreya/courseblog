@extends('layouts.front')


@section('title')

@endsection

@section('content')

<div class="class">
    <div class="container">
        <div class="row mt-3 mb-3">

            @foreach ($products as $item)
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">


                           

                                <h1 class="mb"><b>{{ $item->name }}</b></h1>
                                <img src="{{ asset('uploads/products/'.$item->image) }}" alt="image">
                                <p class="mt-5">
                                    {!! $item->description !!}
                                </p>





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
