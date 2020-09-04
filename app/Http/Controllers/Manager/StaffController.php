<?php

namespace App\Http\Controllers\Manager;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StaffFormRequest;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Session;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $staffs = User::role('staff')->get();
        return view('manager.staff.index', compact('staffs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return (view('manager.staff.create'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StaffFormRequest $request)
    {
        $data = [
            'name' => request()->name,
            'username' => request()->username,
            'password' => bcrypt(request()->password),
            'email' => request()->email,
            'address' => request()->address,
            'phone' => request()->phone,
            'gender' => request()->gender,

        ];

        $staff = User::create($data);
        $staff->assignRole('staff');

        $message = 'Berhasil menambahkan Staff baru';
        Session::flash('staff', $message);

        return redirect(route('manager.staff.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $staff)
    {

        return view('manager.staff.edit', compact('staff'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $staff)
    {
        if ($request->password == '') {
            $password = $staff->password;
        } else {
            $password = bcrypt($request->password);
        }

        $data = [
            'name' => request()->name,
            'username' => request()->username,
            'password' => $password,
            'email' => request()->email,
            'address' => request()->address,
            'phone' => request()->phone,
            'gender' => request()->gender,

        ];

        $staff->update($data);

        $message = 'Berhasil Mengubah Staff';

        Session::flash('staff', $message);

        return redirect(route('manager.staff.index'));
    }

    public function delete()
    {
        $a = request()->id;

        $staff = User::find($a);
        $staff->delete();

        $staffs = User::role('staff')->get();
        $rs['content'] = View::make('manager.staff.partial.content')
            ->with('staffs', $staffs)
            ->render();

        return response($rs);
    }
}
