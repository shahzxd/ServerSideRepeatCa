
@extends('front.layouts.app')
@section('content')
<!-- BANNER -->
<div class="section subbanner">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12">
                <div class="caption">Event Details</div>
            </div>
        </div>
    </div>
</div>
<!-- ABOUT SECTION -->
<div class="section singlepage">
    <div class="container">

        <div class="row">
            <div class="col-sm-12 col-md-12">
                <div class="page-title">
                    <h2 class="lead">ABOUT   Event</h2>
                    <div class="border-style"></div>
                </div>
            </div>
        </div>

        <div class="row">

            <div class="col-sm-12 col-md-6">

                <div class="welcome">
                    <div class="title-block">{{$event->title}}</div>
                    <p><strong>website Name</strong> any descripiton </p>
                    <p>{{$event->description}}</p>
                </div>

            </div>

            <div class="col-sm-12 col-md-6">

                <div id="about-caro" class="owl-carousel owl-theme">
                    <div class="item">
                        <img src="{{ asset('events/' . $event->image) }}" alt="" class="img-responsive" />
                    </div>
                    <div class="item">
                        <img src="{{asset('front/images/slide-2.jpg')}}" alt="" class="img-responsive" />
                    </div>
                    <div class="item">
                        <img src="{{asset('/front/images/slide-3.jpg')}}" alt="" class="img-responsive" />
                    </div>
                </div>

            </div>
            <div class="col-md-12">

                <div id="map" style="height: 400px; width: 100%;margin-top: 50px"></div>

                <!-- Hidden input fields to pass latitude and longitude to JavaScript -->
                <input type="hidden" id="latitude" value="{{ $event->latitude }}">
                <input type="hidden" id="longitude" value="{{ $event->longitude }}">

            </div>


        </div>
    </div>
</div>
@endsection
@push("scripts")
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBdFqSAB6pE2hKvzy2uSrQMn4m0nTQw_Nc&libraries=places&callback=initializeMap" async defer></script>
    <script>
        function initializeMap() {
            // Get latitude and longitude from hidden input fields
            const latitude = parseFloat(document.getElementById('latitude').value);
            const longitude = parseFloat(document.getElementById('longitude').value);

            // Create a map centered on the event's location
            const eventLocation = { lat: latitude, lng: longitude };

            const map = new google.maps.Map(document.getElementById('map'), {
                zoom: 12,
                center: eventLocation
            });

            // Add a marker at the event's location
            new google.maps.Marker({
                position: eventLocation,
                map: map,
                title: 'Event Location'
            });
        }
    </script>
@endpush
