<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FieldRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'form_id' => 'required',
            'label' => 'required|min:3|max:255',
            'type' => 'required|min:3|max:255',
            'class' => 'required|min:3|max:255',
            'is_required' => 'required|boolean',
            'is_multiple' => 'required|boolean',
            'options' => 'nullable',
        ];
    }
}
