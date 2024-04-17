<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateLesson extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $uuid = $this->lesson ?? '';

        return [
            'name' => 'required', 'min:3', 'max:255', "unique:lessons,name,{$uuid},module_id",
            'description' => 'nullable', 'min:3', 'max:1000',
            'video' => 'required|string',
            'module' => 'required|exists:modules,uuid',
        ];
    }
}
