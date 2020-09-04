<?php

namespace App\Http\Requests;

use App\Models\Criteria;
use Illuminate\Foundation\Http\FormRequest;

class ValuationFormRequest extends FormRequest
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
        $rules = [

                'customer' => ['required'],
                'date' => ['required'],
            ];

            $criterias = Criteria::get();

            foreach($criterias as $criteria){
                $rules['criteria_'. $criteria->id] = ['required'];
            }

            return $rules;
    }
    public function messages()
    {
        $messages = [
            'customer.required' => 'Peminjam tidak boleh kosong',
            'date.required' => 'Tanggal tidak boleh kosong',
        ];

        $criterias = Criteria::get();

        foreach ($criterias as $criteria) {
            $messages['criteria_' . $criteria->id.'.required'] = 'Kriteria ' . ucfirst($criteria->name) . ' tidak boleh kosong';
        }

        return $messages;
    }
}
