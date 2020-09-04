<?php

namespace App\Http\Controllers\Staff;

use App\Models\Criteria;
use App\Models\Customer;
use App\Models\Valuation;
use App\Models\SubCriteria;
use Illuminate\Http\Request;
use App\Models\ValuationCriteria;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\ValuationFormRequest;

class ValuationController extends Controller
{

    public function index(){
      
        $valuations = Valuation::get();

        return view('staff.valuation.index', compact('valuations'));

    }

    public function create(){
      
        $customers = Customer::get();
        $criterias = Criteria::get();
        $subCriterias = SubCriteria::get();

        return view('staff.valuation.create', compact('customers', 'criterias', 'subCriterias'));
    }

    public function store(ValuationFormRequest $request){
        $now = date("Ymdhis");
        $code = 'OD-' . $now;

        $data = [
            'customer_id' => request()->customer,
            'date' => request()->date,
            'total' => 0,
            'code' => $code
        ];

        $valuation = Valuation::create($data);
        $criterias = Criteria::get();
        foreach($criterias as $criteria){
            $total = 0;
            $data2 = [
                'valuation_id' => $valuation->id,
                'criteria_id' => $criteria->id,
                'criteria_value' => $criteria->value,
            ];

            $criteriaId = 'criteria_'.$criteria->id;
            $subCriterias = $criteria->subCriterias;

            foreach($subCriterias as $subCriteria){
                if($subCriteria->id == $request[$criteriaId]){
                   $data2['subcriteria_id'] = $subCriteria->id;
                   $data2['subcriteria_value'] = $subCriteria->value;
                }
            }

            $criteriaValue = ($data2['criteria_value'] / 100 ); 
            $subCriteriaValue = $data2['subcriteria_value'];
            $total = ($criteriaValue * $subCriteriaValue);
            $data2['total'] = $total;
            $valuationcriteria = ValuationCriteria::create($data2);
        }
        
        $sum = 0;
        $valuationcriterias = $valuation->valuationCriterias;
        foreach($valuationcriterias as $item){
            $sum = $sum + $item->total;
        }

        $valuation->total = $sum;
        $valuation->save();

        $customer = Customer::find(request()->customer);

        $customer->worthy = $sum;
        $customer->save();

        $message = 'Berhasil Manginputkan kelayakan';

        Session::flash('valuation', $message);

        return redirect(route('staff.valuation.show', [$valuation]));

    }

    public function show(Valuation $valuation){

        return view('staff.valuation.show', compact('valuation'));
    }
}
