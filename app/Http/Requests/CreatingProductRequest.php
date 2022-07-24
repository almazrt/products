<?php

namespace App\Http\Requests;

use App\DTO\CreatingProductDTO;
use Illuminate\Foundation\Http\FormRequest;

class CreatingProductRequest extends FormRequest
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
            'title' => 'required|max:255',
            'price' => 'required|numeric|between:0,99999999',
            'categoriesIds' => 'nullable|array',
        ];
    }

    public function toDTO(): CreatingProductDTO
    {
        return CreatingProductDTO::fromArray($this->input());
    }
}
