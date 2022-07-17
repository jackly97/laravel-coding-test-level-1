<?php

namespace App\Http\Services\v1\api;

use App\Http\Resources\v1\api\Event\EventCollection;
use App\Http\Resources\v1\api\Event\EventResource;
use App\Models\Event;
use App\Traits\ApiResponder;
use Carbon\Carbon;

class EventService
{
    use ApiResponder;

    public function index()
    {
        return $this->successResponse('Successfully retrived events', new EventCollection(Event::orderByDesc('created_at')->paginate(15)->appends(request()->query())));
    }

    public function activeEvents()
    {
        $events = Event::where('start_at', '<=', Carbon::now()->format('Y-m-d H:i:s'))
            ->where('end_at', '>=', Carbon::now()->format('Y-m-d H:i:s'));

        return $this->successResponse('Successfully retrived active events', new EventCollection($events->orderByDesc('created_at')->paginate(15)->appends(request()->query())));

    }

    public function show($id)
    {
        return $this->successResponse('Successfully show event details', new EventResource(Event::find($id)));
    }

    public function store($request)
    {
        $event = Event::create([
            'name' => $request->name,
            'start_at' => $request->startAt,
            'end_at' => $request->endAt,
        ]);

        return $this->successResponse('Successfully created new event', new EventCollection($event->orderByDesc('created_at')->paginate(15)));
    }

    public function update($id, $request)
    {
        $event = Event::updateOrCreate(['id' => $id], [
            'name' => $request->name,
            'start_at' => $request->startAt,
            'end_at' => $request->endAt,
        ]);

        return $this->successResponse('Successfully updated event details', new EventResource($event));
    }

    public function patch($id, $request)
    {
        $event = Event::find($id);

        $event->update([
            'name' => $request->name,
            'start_at' => $request->startAt,
            'end_at' => $request->endAt,
        ]);

        return $this->successResponse('Successfully updated event details', new EventResource($event));
    }

    public function destroy($id)
    {
        Event::find($id)->delete();

        return $this->successResponseWithMessageOnly('Successfully deleted event');
    }
}
