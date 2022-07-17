<?php

namespace App\Http\Services;

use App\Jobs\Email\SendCreateEventNotification;
use App\Models\Event;

class EventService
{
    public function index()
    {
        $events = Event::orderByDesc('created_at')->get();

        return view('events.index', compact('events'));
    }

    public function store($request)
    {
        $startAt = date('Y-m-d H:i:s', strtotime($request->startAt));
        $endAt = date('Y-m-d H:i:s', strtotime($request->endAt));

        $event = Event::create([
            'name' => $request->name,
            'start_at' => $startAt,
            'end_at' => $endAt,
        ]);

        SendCreateEventNotification::dispatch($event);

        return redirect()->route('events.index')->with('success', 'Successfully Created Event!');
    }

    public function update($event, $request)
    {
        $startAt = date('Y-m-d H:i:s', strtotime($request->startAt));
        $endAt = date('Y-m-d H:i:s', strtotime($request->endAt));

        $event->update([
            'name' => $request->name,
            'start_at' => $startAt,
            'end_at' => $endAt,
        ]);
        return redirect()->route('events.index')->with('success', 'Event updated successfully!');
    }
}
