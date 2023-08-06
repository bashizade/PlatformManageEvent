<?php

namespace App\Http\Requests\Panel\Event;

use Illuminate\Foundation\Http\FormRequest;

class EventUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required',
            'description' => 'required',
            'start_date' => 'required | date',
            'end_date' => 'required | date',
            'price' => 'required',
            'message' => 'required',
            'count' => 'required',
            'categories' => 'required'
        ];
    }
}
