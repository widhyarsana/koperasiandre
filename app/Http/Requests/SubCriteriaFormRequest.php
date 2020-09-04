<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubCriteriaFormRequest extends FormRequest
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
            'name' => ['required', 'max:50'],
            'value' => ['required'],
            'criteria' => ['required']
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Nama tidak boleh kosong',
            'name.max:50' => 'Nama tidak boleh lebih dari 30',
            'value.required' => 'Bobot tidak boleh kosong',
            'criteria.required' => 'Kriteria tidak boleh kosong',
        ];
    }
}
