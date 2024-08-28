@extends('front.layouts.app')

@section('content')
    @include('front.layouts.banner')
    <div class="section blog">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-6 col-md-offset-3">
                    <div class="page-title">
                        <h2 class="lead">LATEST EVENTS</h2>
                </div>
            </div>
            <div class="row">
                @foreach($events as $event)
                    <div class="col-sm-12 col-md-4">
                        <div class="blog-item">
                            <div class="gambar">
                                <div class="date">
                                    {{ \Carbon\Carbon::parse($event->match_date)->format('F d, Y') }}
                                </div>
                                <img src="{{ asset('events/' . $event->image) }}" alt="{{ $event->title }}" class="img-responsive" />
                            </div>
                            <div class="item-body">
                                <div class="description">
                                    <p class="lead">
                                        <a  title=""><strong>{{$event->title}}</strong></a>
                                    </p>
                                    <p class="lead">
                                        <a  title="">{{$event->description}}</a>
                                    </p>
                                    <a href="{{ route('front.events.show', $event->slug) }}" title="" class="readmore">Event Details</a>


                                </div>

                            </div>
                        </div>
                    </div>
                @endforeach


                <div class="loadmore">
                    <a href="{{route('front.event.all')}}" title="">Load More</a>
                </div>

            </div>
        </div>
    </div>

@endsection
