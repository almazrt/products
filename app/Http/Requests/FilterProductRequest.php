<?php

namespace App\Http\Requests;

use App\DTO\CreatingCategoryDTO;
use App\DTO\FilterProductDTO;
use Illuminate\Foundation\Http\FormRequest;

class FilterProductRequest extends FormRequest
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
        return [];
    }

    public function toDTO(): FilterProductDTO
    {
        return FilterProductDTO::fromArray($this->input());
    }
}
