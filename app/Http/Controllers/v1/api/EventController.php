<?php

namespace App\Http\Controllers\v1\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\v1\api\Event\EventRequest;
use App\Http\Requests\v1\api\Event\StoreEventRequest;
use App\Http\Requests\v1\api\Event\UpdateEventRequest;
use App\Http\Services\v1\api\EventService;

class EventController extends Controller
{
    public function index(EventService $eventService)
    {
        return $eventService->index();
    }

    public function activeEvents(EventService $eventService)
    {
        return $eventService->activeEvents();
    }

    public function store(StoreEventRequest $request, EventService $eventService)
    {
        return $eventService->store($request);
    }

    public function show(EventRequest $requestId, EventService $eventService)
    {
        return $eventService->show($requestId->id);
    }

    public function update(UpdateEventRequest $request, EventService $eventService)
    {
        return $eventService->update($request->route('id'), $request);
    }

    public function patch(EventRequest $requestId, UpdateEventRequest $request, EventService $eventService)
    {
        return $eventService->patch($requestId->id, $request);
    }

    public function destroy(EventRequest $requestId, EventService $eventService)
    {
        return $eventService->destroy($requestId->id);
    }
}
