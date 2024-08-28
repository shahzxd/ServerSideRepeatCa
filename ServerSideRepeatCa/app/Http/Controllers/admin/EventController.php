<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

class EventController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $userId = Auth::id();
        $userRole = Auth::user()->role;

        if ($userRole === 'admin') {
            $events = Event::query()
                ->where('is_approved', 1)
                ->get();
        } else {
            $events = Event::query()
                ->where('user_id', $userId)
                ->where('is_approved', 1)
                ->get();
        }
        $data = [
            'title' => 'Event list',
            'breadcrumbs' => array("admin/dashboard" => "Dashboard", 'event/index' => 'Events'),
            'active' => 'events',
            'events' => $events,
        ];
        return view('admin.events.index', compact('data'));
    }
    public function pending()
    {
        $userId = Auth::id();
        $events = Event::query()
            ->where('is_approved', 0)
            ->get();
        $data = [
            'title' => 'Pending Event list',
            'breadcrumbs' => array("admin/dashboard" => "Dashboard", 'event/index' => 'Events'),
            'active' => 'pending_events',
            'events' => $events,
        ];
        return view('admin.events.pending-events', compact('data'));
    }
    public function create()
    {
        $data = [
            'title' => 'Create Event',
            'breadcrumbs' => [
                "admin/dashboard" => "Dashboard",
                'events/create' => 'Create Event'
            ],
            'active' => 'events',
        ];
        return view('admin.events.create', compact('data'));
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'capacity' => 'required|integer',
            'match_date' => 'required|date',
            'location' => 'required|string|max:255',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:4048',
            'description' => 'required|string',
        ]);
        if ($validator->fails()) {
            Session::flash('error', $validator->errors()->first());
            return redirect()->back()->withInput();
        }
        $data = $request->all();
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('events'), $imageName);
            $data['image'] = $imageName;
        }
        $data['user_id'] = Auth::id();
        if (Auth::user()->role === 'admin') {
            $data['is_approved'] = 1;
        }
        Event::query()->create($data);
        return redirect()->route('event.index')->with('success', 'Event created successfully.');
    }

    public function edit($id)
    {
        $event = Event::find($id);

        $data = [
            'title' => 'Business list',
            'breadcrumbs' => array("admin/dashboard" => "Dashboard", 'business/index' => 'Business', 'event/edit/' . $event->id => "Edit event"),
            'active' => 'Event',
            'event' => $event,
        ];
        return view('admin.events.edit', compact('data'));
    }
    public function update(Request $request, $id)
    {
        $event = Event::findOrFail($id);
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:4048',
            'capacity' => 'required|integer',
            'match_date' => 'required|date',
            'location' => 'required|string|max:255',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif',
            'description' => 'required|string',
        ]);
        if ($validator->fails()) {
            Session::flash('error', $validator->errors()->first());
            return redirect()->back()->withInput();
        }
        $data = $request->all();
        if ($request->hasFile('image')) {
            if ($event->image && file_exists(public_path('events/' . $event->image))) {
                unlink(public_path('events/' . $event->image));
            }
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('events'), $imageName);
            $data['image'] = $imageName;
        } else {
            $data['image'] = $event->image;
        }
        $event->update($data);
        return redirect()->route('event.index')->with('success', 'Event updated successfully.');
    }
    public function delete($id)
    {
        try {
            $event = Event::find($id);
            $event->delete();
            return redirect()->back()->with('success', 'Event deleted successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());

        }
    }
    public function approve($id)
    {
        $event = Event::findOrFail($id);
        $event->is_approved = 1;
        $event->save();
        return redirect()->back()->with('success', 'Event approved successfully.');
    }

}
