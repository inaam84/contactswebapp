<?php

namespace App\Http\Requests;

use App\Rules\PostcodeRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreContactRequest extends FormRequest
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
        return [
            'forenames' => 'required|string|max:35',
            'surname' => 'required|string|max:35',
            'address_line_1' => 'required|string|max:35',
            'address_line_2' => 'nullable|string|max:35',
            'address_line_3' => 'nullable|string|max:35',
            'address_line_4' => 'nullable|string|max:35',
            'postcode' => ['required', 'string', 'min:6', 'max:8', new PostcodeRule],
            'telephone' => 'nullable|string|max:12',
            'mobile' => 'nullable|string|max:12',
            'email' => ['required', 'email', Rule::unique('contacts', 'email')->ignore($this->route('contact'))],
        ];
    }
}
