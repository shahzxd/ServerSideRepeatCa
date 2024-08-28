
@extends('front.layouts.app')
@section('content')
<div class="section subbanner">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12">
            <div class="caption" style="margin-bottom: 20px;">Events</div>
@auth
<a class="btn" href="{{ url('event/create') }}" style="background-color: red; color: white; border: none; padding: 10px 20px; text-decoration: none; margin-top: 10px;">
    Add an Event Here
    <span class="badge badge-secondary"></span>
</a>
@endauth


            </div>
        </div>
    </div>
</div>
<div class="section singlepage" >
    <div class="container">
        <div class="row pbot-main">
            <div class="col-xs-12 col-md-8">
             @foreach($events as $event)
                <div class="post-item">
                    <div class="image-wrap">
                        <img src="{{ asset('events/' . $event->image) }}" alt="" class="img-responsive">
                        <div class="meta">
                            <div class="blog-author">
                                <div class="blog-thumb">
                                    <img class="img-responsive" src="{{asset('front/images/home-testimony-img-1.jpg')}}" alt="...">
                                </div>by {{ $event->user->name }}
                            </div>

                            <div class="blog-comments"><i class="fa fa-ground">Capacity:</i>{{$event->capacity}}</div>
                            <div class="blog-date"><span>  {{ \Carbon\Carbon::parse($event->match_date)->format('F d') }}</span></div>
                        </div>
                    </div>
                    <h3 class="post-title"><a href="{{asset('/front/news-single.html')}}" title="">{{$event->title}}</a></h3>
                    <p>{{$event->description}}</p>
                    <a href="{{ route('front.events.show', $event->slug) }}" class="post-read-more" title="Event Details">Event Details<i class="fa fa-chevron-circle-right"></i></a>
                </div>
                @endforeach
                
            </div>

            <div class="col-xs-12 col-md-4">
                <div class="widget recent-post">
                    <h4 class="widget-heading">RECENT Events</h4>
                    <div class="widget-wrap">
                        @foreach($recentEvents as $recentEvent)
                        <div class="media">
                            <div class="media-left">
                                <a href="{{ route('front.events.show', $recentEvent->slug) }}" title="detail news">
                                    <img class="media-object" src="{{ asset('events/' . $recentEvent->image) }}" alt="{{$recentEvent->title}}">
                                </a>
                            </div>
                            <div class="media-body">
                                <p><a href="{{ route('front.events.show', $recentEvent->slug) }}" title="detail news">{{$recentEvent->title}}</a></p>
                                <div class="meta-date">
                                    {{ \Carbon\Carbon::parse($recentEvent->match_date)->format('F d, Y') }}
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
