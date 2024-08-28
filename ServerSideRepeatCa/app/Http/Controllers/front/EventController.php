<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{

    public function index() {
        $events = Event::query()
            ->where('is_approved', 1)
            ->orderBy('match_date', 'desc')
            ->take(3)
            ->get();

        return view('front.home.index', compact('events'));
    }
    public function allEvents(){

        $events = Event::query()->where('is_approved', 1)->get();
        $recentEvents = Event::query()
            ->where('is_approved', 1)
            ->orderBy('match_date', 'desc')
            ->take(3)
            ->get();

        return view('front.events.events', compact('events','recentEvents'));
    }

    public function show($slug)
    {
        $event = Event::query()->where('slug', $slug)->firstOrFail();
        return view('front.events.event-details', compact('event'));
    }
}
