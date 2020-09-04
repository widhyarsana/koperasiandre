<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ValuationCriteria extends Model
{
    protected $fillable = [
        'criteria_id', 'valuation_id', 'subcriteria_id', 'criteria_value','subcriteria_value', 'total'
    ];

    public function criteria(){
      return $this->belongsTo(Criteria::class, 'criteria_id');
    }

    public function Subcriteria()
    {
        return $this->belongsTo(SubCriteria::class, 'subcriteria_id');
    }
}
