<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreatePatientRequest extends FormRequest
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
            'nom' => 'required|string',
            'prenom' => 'required|string',
            'date_de_naissance' => 'required',
            'address' => 'string',
            'telephone' => '',
            'assurance'=> '',
            'situation_familliale'=> '',
            'gestante'=> '',
            'partirution'=> '',
            'enfant_vivant'=> '',
            'premature'=> '',
            'cesarienne'=> '',
            'avortement'=> '',
            'menarche'=> '',
            'enfant_endicape' => '',
            'mariage_date'=> '',
            'contraception'=> '',
            'convention'=> '',
            'cycle'=> '',
            'groupage'=> '',
            'consanguinuite' => '',
            'menopause'=> '',
            'fonction'=> '',
            'antecedente_familiaux'=> '',
            'antecedente_personnelles'=> '',
            'alergies'=> '',
            'date_dernier_regle'=> '',
            'date_dernier_acouchement'=> '',
            'date_prochaine_acouchement'=> ''
        ];
    }
}
