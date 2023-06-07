<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
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
            'title' => 'required | min:5 | max:200 | unique:projects',
            'image' => 'required | min:5',
            'link_ghit' => 'required | min:5',
            'link_site' => 'required | min:5',
            'description' => 'required | min:5',
            'type_id' => ['exists:types,id']
        ];
    }
}
