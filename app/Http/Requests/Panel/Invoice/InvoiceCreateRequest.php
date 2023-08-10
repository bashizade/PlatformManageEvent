<?php

namespace App\Http\Requests\Panel\Invoice;

use Illuminate\Foundation\Http\FormRequest;

class InvoiceCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'event_id' => 'required',
            'number' => 'required',
            'date' => 'required | date',
            'agent' => 'required',
            'patch_file' => 'required | mimes:jpg,png',
        ];
    }
}
