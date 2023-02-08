<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
            'name' => 'required|min:5|max:100',
            'price' => 'required|min:0.01',
            'available' => 'required',
            'type_id' => 'required|exists:types,id',
            'discount' => 'nullable|regex:/^([0-9]*)$/'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Il nome del prodotto è obbligatorio.',
            'name.min' => 'Il nome del prodotto deve essere lungo almeno :min caratteri.',
            'name.max' => 'Il nome del prodotto non può superare i :max caratteri.',
            'price.required' => 'Il prezzo è obbligatorio',
            'price.min' => 'Il prezzo deve essere almeno :min euro',
            'available.required' => 'La disponibilità è obbligatoria',
            'type_id.required' => 'Questo campo è obbligatorio',
            'discount.regex' => 'Lo sconto deve essere un numero.'
        ];
    }
}