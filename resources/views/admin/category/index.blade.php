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
                    Categories | CourseBlog
                    <a href="{{ url('addcate') }}" class="btn btn-primary ">Add Category</a>
                </h4>
            </div>
            <div class="card-body">
                <table class="table table-stripped">
                    <thead>
                      <tr>
                        <th>id</th>
                        <th>name</th>
                        <th>slug</th>
                        <th>description</th>
                        <th>Navbar status</th>
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
                        @foreach ($category as $row)
                            <tr>
                                <td>{{ $row->id}}</td>
                                <td>{{ $row->name}}</td>
                                <td>{{ $row->slug}}</td>
                                <td>{{ $row->description}}</td>
                                <td>{{ $row->navstatus}}</td>
                                <td>{{ $row->status}}</td>
                                <td>
                                    <img src="{{ asset('uploads/categories/'.$row->image) }}" alt="cate image" height="75px" >
                                </td>
                                <td>{{ $row->created_at}}</td>
                                <td>{{ $row->updated_at}}</td>
                                <td>
                                    <a href="{{ url('editcate/'.$row->id) }}" class="btn btn-success">Edit</a>
                                </td>
                                @if (Auth::user()->role_as == '2')
                                    <td>
                                        <a href="{{ url('deletecate/'.$row->id) }}" class="btn btn-danger">Delete</a>
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

<script>
    $(document).ready(function () {

        $('.cate_del_btn').click(function (e) {
            e.preventDefault();
             /* console.log('hello')  */

             var delete_id = $(this).closest("tr").find('.catedelvalue').val();
             alert(delete_id);



            /* swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this imaginary file!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
                })
                .then((willDelete) => {
                if (willDelete) {
                    swal("Poof! Your imaginary file has been deleted!", {
                    icon: "success",
                    });
                } else {
                    swal("Your imaginary file is safe!");
                }
            }); */


        });

    });
</script>

@endsection
