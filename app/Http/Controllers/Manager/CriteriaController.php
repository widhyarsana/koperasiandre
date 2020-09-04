<?php

namespace App\Http\Controllers\Manager;

use App\Models\Criteria;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\CriteriaFormRequest;

class CriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $criterias = Criteria::get();
        return view('manager.criteria.index', compact('criterias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return (view('manager.criteria.create'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CriteriaFormRequest $request)
    {
        $data = [
            'name' => request()->name,
            'value' => request()->value,
        ];

        $criteria = Criteria::create($data);

        $message = 'Berhasil menambahkan Kriteria baru';
        Session::flash('criteria', $message);

        return redirect(route('manager.criteria.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Criteria $criteria)
    {
        
        return view('manager.criteria.show', compact('criteria'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Criteria $criteria)
    {

        return view('manager.criteria.edit', compact('criteria'));
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
        ];

        $criteria->update($data);

        $message = 'Berhasil Mengubah Kriteria';

        Session::flash('criteria', $message);


        return redirect(route('manager.criteria.index'));
    }

    public function delete()
    {
        $a = request()->id;

        $criteria = Criteria::find($a);
        $criteria->delete();

        $criterias = Criteria::get();
        $rs['content'] = View::make('manager.criteria.partial.content')
            ->with('criterias', $criterias)
            ->render();

        return response($rs);
    }
}
