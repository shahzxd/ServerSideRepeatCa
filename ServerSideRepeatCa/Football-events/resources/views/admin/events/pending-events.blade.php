@extends('admin.layouts.admin')
@section('content')
    <div class="row">
        <!-- ============================================================== -->
        <!-- basic table  -->
        <!-- ============================================================== -->
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <h5 class="card-header">Events</h5>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered first">
                            <thead>
                            <tr>

                                <th>image</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Match Date</th>
                                <th>Capacity</th>
                                <th>Approve</th>
                                <th>Reject</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach ($data['events'] as $event)
                                <tr>

                                    <td><img src="{{ asset('events/' . $event->image) }}" alt="Current Image" style="max-width: 100px; max-height: 100px;"></td>
                                    <td>{{ $event->title }}</td>
                                    <td>{{ $event->description}}</td>
                                    <td>{{ $event->match_date }}</td>
                                    <td>{{ $event->capacity }}</td>
                                    <td><a href="{{ url('event/approve', $event->id) }}"><button
                                                class="btn btn-primary">Approve</button></a></td>
                                    <td><a href="" class="delete-event" event-id={{ $event->id }}><button
                                                class="btn btn-danger">Reject</button></a></td>
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
            $('body').on('click', '.delete-event', function(e) {
                e.preventDefault();
                var id = $(this).attr('event-id');
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
                        window.location.href = "{{url('/event/delete')}}/"+id;
                    }
                });
            });
        });
    </script>
@endsection
