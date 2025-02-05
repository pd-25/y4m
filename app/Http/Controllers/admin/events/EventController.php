<?php

namespace App\Http\Controllers\admin\events;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
      /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Event::orderBy('id','desc')->paginate(10);
        return view('admin.events.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.events.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'venue' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp',
            'created_at' => 'required|date',
            'status' => 'required|integer',
        ]);

        $imagePath = $request->file('image')->store('events', 'public');

        Event::create([
            'title' => $request->title,
            'description' => $request->description,
            'venue' => $request->venue,
            'image' => $imagePath,
            'created_at' => $request->created_at,
            'status' => $request->status,
        ]);

        return redirect()->route('events.index')->with('msg', 'Event created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        return view('events.show', compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        return view('admin.events.edit', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $event)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'venue' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp',
            'created_at' => 'required|date',
            'status' => 'required|integer',
        ]);

        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($event->image);
            $imagePath = $request->file('image')->store('events', 'public');
            $event->image = $imagePath;
            
        }

        $event->update([
            'title' => $request->title,
            'description' => $request->description,
            'venue' => $request->venue,
            'created_at' => $request->created_at,
            'status' => $request->status,
        ]);

        return redirect()->route('events.index')->with('msg', 'Event updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        Storage::disk('public')->delete($event->image);
        $event->delete();
        return redirect()->route('events.index')->with('msg', 'Event deleted successfully!');
    }
}
