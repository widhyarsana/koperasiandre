<?php

namespace App\Http\Controllers\Manager;

use App\Models\Criteria;
use App\Models\SubCriteria;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\SubCriteriaFormRequest;

class SubCriteriaController extends Controller
{
    
    public function index()
    {
        $subCriterias = SubCriteria::get();
        return view('manager.subcriteria.index', compact('subCriterias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $criterias = Criteria::get();

        return (view('manager.subcriteria.create', compact('criterias')));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SubCriteriaFormRequest $request)
    {
        $data = [
            'name' => request()->name,
            'value' => request()->value,
            'criteria_id' => request()->criteria
        ];

        $subCriteria = SubCriteria::create($data);

        $message = 'Berhasil menambahkan Sub Kriteria baru';
        Session::flash('subcriteria', $message);

        return redirect(route('manager.subcriteria.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Criteria $criteria)
    {

        // return view('manager.criteria.show', compact('criteria'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(SubCriteria $subCriteria)
    {
        
        $criterias = Criteria::get();
        return view('manager.subcriteria.edit', compact('subCriteria', 'criterias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Criteria $criteria)
    {
        $data = [
            'name' => request()->name,
            'value' => request()->value,
            'criteria_id' => request()->criteria
        ];

        $criteria->update($data);

        $message = 'Berhasil Mengubah Sub Kriteria';

        Session::flash('subcriteria', $message);


        return redirect(route('manager.subcriteria.index'));
    }

    public function delete()
    {
        $a = request()->id;

        $subCriteria = SubCriteria::find($a);
        $subCriteria->delete();

        $subCriterias = SubCriteria::get();
        $rs['content'] = View::make('manager.subcriteria.partial.content')
            ->with('subCriterias', $subCriterias)
            ->render();

        return response($rs);
    }
}
