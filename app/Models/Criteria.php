<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Criteria extends Model
{
    protected $fillable = ['name', 'value'];

    public function subCriterias(){
      return $this->hasMany(SubCriteria::class, 'criteria_id');
    }
}
