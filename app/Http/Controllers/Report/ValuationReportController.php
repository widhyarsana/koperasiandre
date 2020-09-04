<?php

namespace App\Http\Controllers\Report;

use App\Models\Customer;
use Barryvdh\DomPDF\PDF;
use App\Models\Valuation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;

class ValuationReportController extends Controller
{
    public function index()
    {

        $customers = Customer::get();
        $valuations = Valuation::get();

        return view('report.valuation.index', compact('valuations', 'customers'));
    }

    public function store()
    {

        $start = request()->start;
        $end = request()->end;
        $customer = request()->customer;
        $status = request()->status;

        if ($start != null && $end != null && $customer != null && $status != null) {
            if ($status == 1) {
                $Valuations = Valuation::where('created_at', '>=', $start)->where('created_at', '<=', $end)->where('customer_id', $customer)->where('total', '>=', 60)->get();
            } else {
                $Valuations = Valuation::where('created_at', '>=', $start)->where('created_at', '<=', $end)->where('customer_id', $customer)->where('total', '<', 60)->get();
            }
        } else if ($start != null && $end != null && $customer != null && $status == null) {
            $Valuations = Valuation::where('created_at', '>=', $start)->where('created_at', '<=', $end)->where('customer_id', $customer)->get();
        } else if ($start != null && $end != null && $customer == null && $status != null) {
            if ($status == 1) {
                $Valuations = Valuation::where('created_at', '>=', $start)->where('created_at', '<=', $end)->where('total', '>=', 60)->get();
            } else {
                $Valuations = Valuation::where('created_at', '>=', $start)->where('created_at', '<=', $end)->where('total', '<', 60)->get();
            }
        } else if ($start != null && $end == null && $customer != null && $status != null) {

            if ($status == 1) {
                $Valuations = Valuation::where('created_at', '>=', $start)->where('customer_id', $customer)->where('total', '>=', 60)->get();
            } else {
                $Valuations = Valuation::where('created_at', '>=', $start)->where('customer_id', $customer)->where('total', '<', 60)->get();
            }
        } else if ($start == null && $end != null && $customer != null && $status != null) {

            if ($status == 1) {
                $Valuations = Valuation::where('created_at', '<=', $end)->where('customer_id', $customer)->where('total', '>=', 60)->get();
            } else {
                $Valuations = Valuation::where('created_at', '<=', $end)->where('customer_id', $customer)->where('total', '<', 60)->get();
            }
        } else if ($start != null && $end != null && $customer == null && $status == null) {
            $Valuations = Valuation::where('created_at', '>=', $start)->where('created_at', '<=', $end)->get();
        } else if ($start != null && $end == null && $customer != null && $status == null) {
            $Valuations = Valuation::where('created_at', '>=', $start)->where('customer_id', $customer)->get();
        } else if ($start == null && $end != null && $customer != null && $status == null) {
            $Valuations = Valuation::where('created_at', '<=', $end)->where('customer_id', $customer)->get();
        } else if ($start != null && $end == null && $customer == null && $status != null) {
            if ($status == 1) {
                $Valuations = Valuation::where('created_at', '>=', $start)->where('total', '>=', 60)->get();
            } else {
                $Valuations = Valuation::where('created_at', '>=', $start)->where('total', '<', 60)->get();
            }
        } else if ($start == null && $end != null && $customer == null && $status != null) {

            if ($status == 1) {
                $Valuations = Valuation::where('created_at', '<=', $end)->where('total', '>=', 60)->get();
            } else {
                $Valuations = Valuation::where('created_at', '<=', $end)->where('total', '<', 60)->get();
            }
        } else if ($start == null && $end == null && $customer != null && $status != null) {
            if ($status == 1) {
                $Valuations = Valuation::where('customer_id', $customer)->where('total', '>=', 60)->get();
            } else {
                $Valuations = Valuation::where('customer_id', $customer)->where('total', '<', 60)->get();
            }
        } else if ($start != null && $end == null && $customer == null && $status == null) {
            $Valuations = Valuation::where('created_at', '>=', $start)->get();
        } else if ($start == null && $end != null && $customer == null && $status == null) {
            $Valuations = Valuation::where('created_at', '<=', $end)->get();
        } else if ($start == null && $end == null && $customer != null && $status == null) {
            $Valuations = Valuation::where('customer_id', $customer)->get();
        } else if ($start == null && $end == null && $customer == null && $status != null) {
            if ($status == 1) {
                $Valuations = Valuation::where('total', '>=', 60)->get();
            } else {
                $Valuations = Valuation::where('total', '<', 60)->get();
            }
        } else if ($start == null && $end == null && $customer == null && $status == null) {
            $Valuations = Valuation::get();
        }


        if (request()->cetak) {
            $pdf = PDF::loadview('report.Valuation.print', ['Valuations' => $Valuations]);
            return $pdf->download('laporan.pesanan.pdf');
        } else {
            $message = 'Pencarian Berhasil';
            $rs['message'] = View::make('report.valuation.message')
                ->with('message', $message)
                ->render();
            $rs['content'] = View::make('report.valuation.content')
                ->with('valuations', $Valuations)
                ->render();

            return response($rs);
        }
    }

}
