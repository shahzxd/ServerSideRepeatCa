@extends('admin.layouts.admin')

@section('content')
    <div class="row">
        <!-- ============================================================== -->
        <!-- basic table  -->
        <!-- ============================================================== -->
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <h5 class="card-header">Users</h5>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered first">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($data['users'] as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->role }}</td>
                                    <td><a href="" class="delete-user" user-id="{{ $user->id }}"><button class="btn btn-danger">Delete</button></a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end basic table  -->
        <!-- ============================================================== -->
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('body').on('click', '.delete-user', function(e) {
                e.preventDefault();
                var id = $(this).attr('user-id');
                var title = "Are you sure?";
                Swal.fire({
                    icon: "warning",
                    title: title,
                    showDenyButton: false,
                    showCancelButton: true,
                    confirmButtonText: "Yes",
                    cancelButtonText: "Cancel",
                }).then((result) => {
                    if (result.isConfirmed) {
                        localStorage.clear();
                        window.location.href = "{{ url('/user/delete') }}/" + id;
                    }
                });
            });
        });
    </script>
@endsection
