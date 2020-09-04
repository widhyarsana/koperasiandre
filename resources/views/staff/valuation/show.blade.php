@extends('layouts.master')

@section('title', 'Detail Kelayakan Peminjam')

@section('style')
<!-- Theme JS files -->
<script src="/global_assets/js/plugins/forms/selects/select2.min.js"></script>
<script src="/global_assets/js/plugins/forms/styling/uniform.min.js"></script>

<script src="/assets/js/app.js"></script>
<script src="/global_assets/js/demo_pages/form_layouts.js"></script>
<!-- /theme JS files -->

@endsection

@section('header')
<div class="page-header border-bottom-0">
     <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline border-0">
          <div class="d-flex">
               <div class="breadcrumb">
                    <a href="{{ route('dashboard') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <span class="breadcrumb-item active">Detail Kelayakan Peminjam</span>
               </div>

               <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
          </div>
     </div>

     <br>
</div>
@endsection

@section('content')
<div class="content">

     <!-- Task overview -->
     <div class="card">
          <div class="card-header header-elements-md-inline bg-secondary">
               <h5 class="card-title">Detail Kelayakan Peminjaman</h5>
          </div>

          <div class="card-body">
               @if(Session::has('valuation'))
               <input type="hidden" id="message" value="{{ session()->get('valuation') }}">
               @endif
               <h6 class="font-weight-semibold">Nama Peminjam: {{ ucfirst($valuation->customer->name) }}</h6>
               <h6 class="font-weight-semibold">Nilai Kelayakan: {{ number_format($valuation->total)}}</h6>
               <h6 class="font-weight-semibold">Tanggal: {{ date('d F Y', strtotime($valuation->date)) }}</h6>
               <h5 class="card-title">Detail Kelayakan Peminjaman</h5>
               <div class="card card-table table-responsive shadow-0">
                    <table class="table">
                         <thead>
                              <tr>
                                   <th>#</th>
                                   <th>Kriteria</th>
                                   <th>Sub Kriteria</th>
                                   <th>Nilai</th>
                              </tr>
                         </thead>
                         <tbody>
                              @foreach ($valuation->valuationCriterias as $valuationCriteria)
                              <tr>
                                   <td>{!! $loop->iteration !!}</td>
                                   <td>{{ ucfirst($valuationCriteria->criteria->name) }} </td>
                                   <td>{{ ucfirst($valuationCriteria->subcriteria->name) }} </td>
                                   <td>{{ number_format($valuationCriteria->total) }}</td>
                              </tr>
                              @endforeach
                         </tbody>
                    </table>
               </div>
          </div>
     </div>
     <!-- /task overview -->


</div>
@endsection