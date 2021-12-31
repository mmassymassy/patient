<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;
    protected $fillable = [
        'CODE_B','CODE_c',
        'nom','prenom','date','date_de_naissance','address',
        'assurance','situation_familliale','telephone','gestante',
        'partirution','enfant_vivant','premature','cesarienne','avortement',
        'menarche','enfant_endicape','date_mariage','contraception','convention',
        'cycle','groupage','consanguinuite','menopause','fonction',
        'antecedente_familiaux','antecedente_personnelles','alergies',
        'date_dernier_regle','date_dernier_acouchement','date_prochaine_acouchement'
    ];
}
