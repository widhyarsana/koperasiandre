<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubCriteria extends Model
{
    protected $fillable = ['name', 'value', 'criteria_id'];

    public function criteria(){
      return $this->belongsTo(Criteria::class, 'criteria_id');
    }
}
