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
            'p_iva' => 'required|unique:restaurants|max:11|min:3',
            'address' => 'required|max:255|min:3',
            'contact_phone' => 'nullable|unique:restaurants|max:15|min:5',
            'description' => 'nullable',
            'delivery_price' => 'nullable',
            'opening_time' => 'required|date_format:H:i',
            'closing_time' => 'required|date_format:H:i',
            'min_price_order' => 'nullable',
            'image' => 'required',
            'rating' => 'nullable',



        ];
    }
}
