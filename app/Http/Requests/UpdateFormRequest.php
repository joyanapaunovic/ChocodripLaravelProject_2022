<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateFormRequest extends FormRequest
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
            'name' => 'required|string|min:3',
            'desc' => 'required|string|min:3',
            'ingredients' => 'required|string|min:3',
            'nutritionValues' => 'required|string|min:3',
            'category' => 'required|not_in:0',
            'previousPrice' => 'numeric|nullable',
            'currentPrice' => 'required|numeric|min:1',
            'availability' => 'required|boolean',
            'photo' => 'file|mimes:jpg,png'
        ];
    }
    public function messages()
    {
        return [
        'name.required' => 'Name is a required field.',
        'desc.required' => 'Description is a required field.',
        'ingredients.required' => 'Ingredients is a required field.',
        'nutritionValues.required' => 'Nutrition values is a required field.',
        'category.required' => 'Category is required.',
        'currentPrice.required' => 'Current price is a required field.',
        'availability.required' => "Choose availability of the product.",
        'name.min' => 'Name must be at least 3 characters long.',
        'desc.min' => 'Description must be at least 3 characters long.',
        'ingredients.min' => 'Ingredients must be at least 3 characters long.',
        'nutritionValues.min' => 'Nutrition must be at least 3 characters long.',
        'photo.mimes' => "Photo must have an extension .jpg or .png."
    ];
    }
}
