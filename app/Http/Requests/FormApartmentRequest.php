<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormApartmentRequest extends FormRequest
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

                'title' => 'required|min:3|max:255',
                'rooms' => 'required|numeric',
                'beds' => 'required|numeric',
                'bathrooms' => 'required|numeric',
                'sqm' => 'required|numeric',
                'address' => 'required',
                // 'latitude' => 'required|numeric',
                // 'longitude' => 'required|numeric',
                'image' => 'required|max:255',
                // 'image_original_name' => 'required|min:3|max:255',
                // 'visible' => 'required',

        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Campo obbligatorio',
            'title.min' => 'Minimo 3 caratteri',
            'title.max' => 'Raggiunto numero massimo di caratteri',

            'rooms.required' => 'Campo obbligatorio',
            'rooms.numeric' => 'Inserisci il numero delle stanze',

            'beds.required' => 'Campo obbligatorio',
            'beds.numeric' => 'Inserisci il numero dei letti',

            'bathrooms.required' => 'Campo obbligatorio',
            'bathrooms.numeric' => 'Inserisci il numero di bagni',

            'sqm.required' => 'Campo obbligatorio',
            'sqm.numeric' => 'Inserisci la grandezza',

            'address.required' => 'Campo obbligatorio',

            'img.required' => 'Campo obbligatorio',
            'img.max' => 'Raggiunto numero massimo di caratteri',

            'visible.required' => 'Seleziona',
        ];
    }
}
