<?php

namespace App\Http\Resources\v1\api\Event;

use Illuminate\Http\Resources\Json\ResourceCollection;

class EventCollection extends ResourceCollection
{
    public function toArray($request)
    {
        if (count($this->collection) > 0) {
            $eventCollection = $this->collection->map(function ($event) {
                return new EventResource($event);
            });
            $returnCollections = [
                'items' => $eventCollection,
                'pagination' => [
                    'currentPage' => $this->currentPage(),
                    'totalPages' => $this->lastPage(),
                    'perPage' => $this->perPage(),
                    'from' => $this->firstItem(),
                    'to' => $this->lastItem(),
                    'totalItems' => $this->total(),
                    'firstPageUrl' => $this->url(1),
                    'prevPageUrl' => $this->previousPageUrl(),
                    'currentPageUrl' => $this->url($this->currentPage()),
                    'nextPageUrl' => $this->nextPageUrl(),
                    'lastPageUrl' => $this->url($this->lastPage()),
                ],
            ];
        } else {
            $returnCollections = [
                'items' => [],
                'pagination' => [
                    'currentPage' => 1,
                    'perPage' => 15,
                    'from' => 1,
                    'to' => 1,
                    'totalItems' => 0,
                    'firstPageUrl' => null,
                    'prevPageUrl' => null,
                    'currentPageUrl' => null,
                    'nextPageUrl' => null,
                    'lastPageUrl' => null,
                ],
            ];
        }
        return $returnCollections;
    }
}
