@extends('front.layouts.app')

@section('content')
    <div class="row">
        <!-- ============================================================== -->
        <!-- basic table  -->
        <!-- ============================================================== -->
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <h5 class="card-header">Events</h5>
                <div class="card-body">
                    <div class="table-responsive" style="margin-top: 50px;">
                        <table class="table table-striped table-bordered first">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Match Date</th>
                                    <th>Capacity</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data['events'] as $event)
                                    <tr>
                                        <td><img src="{{ asset('events/' . $event->image) }}" alt="Event Image" style="max-width: 100px; max-height: 100px;"></td>
                                        <td>{{ $event->title }}</td>
                                        <td>{{ $event->description }}</td>
                                        <td>{{ $event->match_date }}</td>
                                        <td>{{ $event->capacity }}</td>
                                        <td><a href="{{ url('event/edit', $event->id) }}"><button class="btn btn-primary">Edit</button></a></td>
                                        <td><a href="{{ url('event/delete', $event->id) }}" class="btn btn-danger delete-event">Delete</a></td>
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
                var url = $(this).attr('href');
                window.location.href = url;
            });
        });
    </script>
@endsection
