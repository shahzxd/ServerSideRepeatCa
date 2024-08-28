<div class="footer">
    @php
        $threeEvents = \App\Models\Event::query()
            ->where('is_approved', 1)
            ->orderBy('match_date', 'desc')
            ->take(3)
            ->get();
    @endphp

    <div class="f-desc">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                    <div class="footer-item">
                        <div class="footer-title">
                            <h4>ABOUT CLUB</h4>
                        </div>
                        <p>Stay up-to-date with the latest football matches and tournaments, and get involved by posting your own events. Whether you're tracking major games or local fixtures, our platform keeps you connected with live scores, match updates, and exclusive highlights.</p>
                        
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                    <div class="footer-item">
                        <div class="footer-title">
                            <h4>RECENT EVENTS</h4>
                        </div>

                        @foreach($threeEvents as $event)
                            <div class="footer-blog-item">
                                <div class="footer-blog-lead">
                                    <a href="{{ route('front.events.show', $event->slug) }}" title="{{ $event->title }}">
                                        {{ $event->title }}
                                    </a>
                                </div>
                                <div class="footer-blog-date">
                                    {{ \Carbon\Carbon::parse($event->match_date)->format('F d, Y') }}
                                </div>
                            </div>
                        @endforeach


                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                    <div class="footer-item">
                        <div class="footer-title">
                            <h4>INFORMATION</h4>
                        </div>
                        <ul class="sitemap">
                            <li><a href="{{route('front.event.index')}}" title="">Home</a></li>
                            <li><a href="{{route('front.event.all')}}" title="">Events</a></li>


                        </ul>
                    </div>
                </div>

            </div>
        </div>

    </div>

    <div class="fcopy">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <p class="ftex">&copy; Copywrite 2024</p>
                </div>
            </div>
        </div>
    </div>

</div>
