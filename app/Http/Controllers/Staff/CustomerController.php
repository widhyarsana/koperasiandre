<?php

namespace App\Http\Controllers\Staff;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\CustomerFormRequest;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::get();
        return view('staff.customer.index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return (view('staff.customer.create'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CustomerFormRequest $request)
    {
        $data = [
            'name' => request()->name,
            'email' => request()->email,
            'address' => request()->address,
            'phone' => request()->phone,
            'gender' => request()->gender,
        ];

        $customer = Customer::create($data);

        $message = 'Berhasil menambahkan Peminjam baru';
        Session::flash('customer', $message);

        return redirect(route('staff.customer.index'));
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
    public function edit(Customer $customer)
    {

        return view('staff.customer.edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        $data = [
            'name' => request()->name,
            'email' => request()->email,
            'address' => request()->address,
            'phone' => request()->phone,
            'gender' => request()->gender,

        ];

        $customer->update($data);

        $message = 'Berhasil Mengubah Peminjam';

        Session::flash('customer', $message);

        return redirect(route('staff.customer.index'));
    }

    public function delete()
    {
        $a = request()->id;

        $customer = Customer::find($a);
        $customer->delete();

        $customers = Customer::get();
        $rs['content'] = View::make('staff.customer.partial.content')
            ->with('customers', $customers)
            ->render();

        return response($rs);
    }
}
