@extends('admin.layouts.admin')
@section('content')
<style>
    input[type="file"] {
        outline: none; /* Removes the default outline */
        border: 1px solid #ced4da; /* Custom border color */
        box-shadow: none; /* Removes the default shadow */
    }
</style>
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

            <div class="card">
                <h5 class="card-header">Add Event</h5>
                <div class="card-body">
                    <form method="post" action="{{ url('/event/store') }}" id="add_event_form" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="title" class="col-form-label">Event Title</label>
                                <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required>
                                @error('title')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="capacity" class="col-form-label">Capacity</label>
                                <input id="capacity" type="number" class="form-control @error('capacity') is-invalid @enderror" name="capacity" value="{{ old('capacity') }}" required>
                                @error('capacity')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="match_date" class="col-form-label">Event Date & Time</label>
                                <input id="match_date" type="datetime-local" class="form-control @error('match_date') is-invalid @enderror" name="match_date" value="{{ old('match_date') }}" required>
                                @error('match_date')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="location" class="col-form-label">Location</label>
                                <input id="location" type="text" class="form-control @error('location') is-invalid @enderror" name="location" value="{{ old('location') }}" required>
                                @error('location')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="latitude" class="col-form-label">Latitude</label>
                                <input id="latitude" type="text" class="form-control @error('latitude') is-invalid @enderror" name="latitude" value="{{ old('latitude') }}" required>
                                @error('latitude')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="longitude" class="col-form-label">Longitude</label>
                                <input id="longitude" type="text" class="form-control @error('longitude') is-invalid @enderror" name="longitude" value="{{ old('longitude') }}" required>
                                @error('longitude')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>



                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="image" class="col-form-label">Event Image</label>
                                <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image" required>
                                @error('image')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="description">Event Description</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" id="description" rows="3" name="description" required>{{ old('description') }}</textarea>
                            @error('description')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary" id="submit_button">Add Event</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection

