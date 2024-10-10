<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

//Importação das classes de validação
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreTransactionRequest extends FormRequest
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
            "description" => ['required', 'string', 'max:255'],
            "amount" => ['required', 'numeric'],
            "category" => ['required', 'string', 'max:255'],
        ];
    }

    public function messages(){
        return [
            "description.required" => 'O campo de descrição é obrigatório',
            "description.string" => 'A descrição tem de ser uma string',
            "description.max" => 'No maximo 255 caracteres',
            "amount.numeric" => 'O valor tem ser um numero'
        ];
    }

    protected function failedValidation(Validator $validator){
        throw new HttpResponseException(response()->json([
            'errors' => $validator->errors(),
        ],422));
    }
}
