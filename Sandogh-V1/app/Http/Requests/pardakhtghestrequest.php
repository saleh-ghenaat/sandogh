<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class pardakhtghestrequest extends FormRequest
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
            'code_peygiri' => 'required',
            'mablagh_ghest'=> 'required',
            'tarikh' => 'required',
            'image' => 'required|image|mimes:png,jpg,jpeg,gif',
            'shahriye' => 'required',
        ];
    }
}
