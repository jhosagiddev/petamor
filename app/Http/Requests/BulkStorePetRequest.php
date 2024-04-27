<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class BulkStorePetRequest extends FormRequest
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
            '*.customerId' => ['required', 'integer'],
            '*.name' => ['required'],
            '*.breed' => ['required'],
            '*.age' => ['required'],
            '*.color' => ['required'],
            '*.sex' => ['required', Rule::in(['male', 'female'])],
            '*.isBreed' => ['required', Rule::in(['yes', 'no'])],
        ];
    }

    protected function prepareForValidation()
    {
        $data = [];
        foreach ($this->toArray() as $obj) {
            $obj['customer_id'] = $obj['customerId'] ?? null;
            $obj['name'] = $obj['name'] ?? null;
            $obj['breed'] = $obj['breed'] ?? null;
            $obj['age'] = $obj['age'] ?? null;
            $obj['color'] = $obj['color'] ?? null;
            $obj['sex'] = $obj['sex'] ?? null;
            $obj['is_ready_to_breed'] = $obj['isBreed'] ?? null;
            $data[] = $obj;
        }
        $this->merge($data);
    }
}
