<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRestaurantRequest extends FormRequest
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
            'restaurant_name' => 'required|unique:restaurants|max:100|min:3',
            'p_iva' => 'required|unique:restaurants|max:11|min:11',
            'address' => 'required|max:255|min:3',
            'contact_phone' => 'nullable|unique:restaurants|regex:/^([0-9]*)$/|size:10',
            'description' => 'nullable',
            'delivery_price' => 'nullable',
            'opening_time' => 'required|date_format:H:i',
            'closing_time' => 'required|date_format:H:i',
            'min_price_order' => 'nullable',
            'image' => 'required',
            'rating' => 'nullable',
        ];
    }

    public function messages()
    {
        return [
            'restaurant_name.required' => 'Il nome del ristorante è obbligatorio.',
            'restaurant_name.min' => 'Il nome del ristorante deve essere lungo almeno :min caratteri.',
            'restaurant_name.max' => 'Il nome del ristorante non può superare i :max caratteri.',
            'restaurant_name.unique:restaurants' => 'Il nome del ristorante esiste già',
            'address.unique' => 'A questo indirizzo risulta un ristorante già registrato',
            'address.max' => 'L\'indirizzo non può superare i :max caratteri',
            'address.min' => 'L\'indirizzo deve essere lungo almeno :min caratteri',
            'opening_time' => 'Il campo è obbligatorio',
            'opening_time.date_format' => 'Il formato deve essere hh:mm',
            'closing_time' => 'Il campo è obbligatorio',
            'closing_time.date_format' => 'Il formato deve essere hh:mm', 
            'p_iva.required' => 'Questo campo è obbligatorio',
            'p_iva.unique' => 'La p_iva esiste già',
            'p_iva.min' => 'Deve essere di :min caratteri',
            'p_iva.max' => 'Deve essere di :max caratteri',
            'contact_phone.required' => 'Il numero di telefono è obbligatorio',
            'contact_phone.unique' => 'Questo numero di telefono esiste già',
            'contact_phone.size' => 'Il numero di telefono deve essere :size caratteri',
            'contact_phone.regex' => 'Questo campo può contenere solo numeri',
            'image' => 'Questo campo è obbligatorio',
        ];
    }
}
