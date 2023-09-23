<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateAssociateToGroupRequest extends FormRequest
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
        $rules = [            
            'user_group_id' => 'required|integer|exists:user_groups,id', // Valida se o user_group_id existe na tabela user_groups.
            'user_id' => 'required|integer|exists:users,id', // Valida se o user_id existe na tabela users.
        ];
        
        return $rules;
    }
}
