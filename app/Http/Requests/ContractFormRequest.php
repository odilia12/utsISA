<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContractFormRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required', 
            'notes' => 'required', 
            'end_date' => 'required', 
            'company_name' => 'required', 
            'manager_id' => 'required', 
            'artist_id' => 'required', 
            'status' => 'required'
        ];
    }
}
