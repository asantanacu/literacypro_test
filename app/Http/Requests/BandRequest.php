<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BandRequest extends FormRequest
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
        $rules = [];

        if($this->method() == 'POST' || $this->method() == 'PUT' || $this->method() == 'PATCH')
        {
            $rules['name'] = 'required|string';
            $rules['start_date'] = 'required|date';
            $rules['website'] = 'required|url';
            $rules['still_active'] = 'required|boolean';
        }

        return $rules;


    }
}
