<?php

namespace App\Http\Requests\v1\api\Event;

use Illuminate\Foundation\Http\FormRequest;

class EventRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    protected function prepareForValidation()
    {
        $this->merge(['id' => $this->route('id')]);
    }

    public function rules()
    {
        return [
            'id' => ['required', 'exists:events,id,deleted_at,NULL'],
        ];
    }

    public function messages()
    {
        return [
            'id.exists' => 'Event not found!',
        ];
    }
}
