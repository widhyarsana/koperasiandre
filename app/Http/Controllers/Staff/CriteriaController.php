<?php

namespace App\Http\Controllers\Staff;

use App\Models\Criteria;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CriteriaController extends Controller
{
    public function index()
    {
        $criterias = Criteria::get();
        return view('staff.criteria.index', compact('criterias'));
    }

    public function show(Criteria $criteria)
    {

        return view('staff.criteria.show', compact('criteria'));
    }

}
