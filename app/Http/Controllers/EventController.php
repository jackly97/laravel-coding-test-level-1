<?php

namespace App\Http\Controllers;

use App\Http\Requests\Event\StoreEventRequest;
use App\Http\Requests\Event\UpdateEventRequest;
use App\Http\Services\EventService;
use App\Models\Event;

class EventController extends Controller
{
    public function index(EventService $eventService)
    {
        return $eventService->index();
    }

    public function create()
    {
        return view('events.create');
    }

    public function store(StoreEventRequest $request, EventService $eventService)
    {
        return $eventService->store($request);
    }

    public function show(Event $event)
    {
        return view('events.show', compact('event'));
    }

    public function edit(Event $event)
    {
        return view('events.edit', compact('event'));
    }

    public function update(UpdateEventRequest $request, Event $event, EventService $eventService)
    {
        return $eventService->update($event, $request);
    }

    public function destroy(Event $event)
    {
        $event->delete();
        return redirect()->route('events.index')->with('success', 'Successfully deleted event');
    }
}
