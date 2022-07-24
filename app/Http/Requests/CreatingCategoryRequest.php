<?php

namespace App\Http\Requests;

use App\DTO\CreatingCategoryDTO;
use Illuminate\Foundation\Http\FormRequest;

class CreatingCategoryRequest extends FormRequest
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
        ];
    }

    public function toDTO(): CreatingCategoryDTO
    {
        return CreatingCategoryDTO::fromArray($this->input());
    }
}
