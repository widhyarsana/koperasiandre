<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Valuation extends Model
{
    protected $fillable = [
        'date', 'customer_id', 'total', 'code'
    ];

    public function valuationCriterias(){
      return $this->hasMany(ValuationCriteria::class, 'valuation_id');
    }

    public function customer(){
      return $this->belongsTo(Customer::class, 'customer_id');
    }
}
