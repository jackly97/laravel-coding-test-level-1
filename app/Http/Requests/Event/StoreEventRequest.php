<?php

namespace App\Http\Requests\Event;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class StoreEventRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $currentDateTime = Carbon::now();

        return [
            'name' => ['required', 'string'],
            'startAt' => ['required', 'after_or_equal:' . $currentDateTime],
            'endAt' => ['required', 'after:startAt'],
        ];
    }
}
