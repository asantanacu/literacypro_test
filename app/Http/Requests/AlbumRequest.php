<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AlbumRequest extends FormRequest
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
            $rules['band_id'] = 'required|exists:bands,id';
            $rules['name'] = 'required|string';
            $rules['recorded_date'] = 'required|date';
            $rules['number_of_tracks'] = 'required|integer';
            $rules['label'] = 'required|string';
            $rules['producer'] = 'required|string';
            $rules['genre'] = 'required|string';
        }

        return $rules;
    }
}
