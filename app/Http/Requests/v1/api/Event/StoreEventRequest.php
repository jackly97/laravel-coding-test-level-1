<?php

namespace App\Http\Requests\v1\api\Event;

use Illuminate\Foundation\Http\FormRequest;

class StoreEventRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $currentDateTime = date('Y-m-d H:i:s');

        return [
            'name' => ['required', 'string'],
            'startAt' => ['required', 'date_format:Y-m-d H:i:s', 'after_or_equal:' . $currentDateTime],
            'endAt' => ['required', 'date_format:Y-m-d H:i:s', 'after:startAt'],
        ];
    }
}
