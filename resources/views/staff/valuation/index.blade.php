@extends('layouts.master')

@section('title', 'History Kelayakan')

@section('style')
<!-- Theme JS files -->
<script src="/global_assets/js/plugins/tables/datatables/datatables.min.js"></script>
<script src="/global_assets/js/plugins/forms/selects/select2.min.js"></script>

<script src="/assets/js/app.js"></script>
<script src="/global_assets/js/demo_pages/datatables_basic.js"></script>
<!-- /theme JS files -->

@endsection

@section('header')
<div class="page-header border-bottom-0">
     <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline border-0">
          <div class="d-flex">
               <div class="breadcrumb">
                    <a href="{{ route('dashboard') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <a href="{{ route('manager.criteria.index') }}" class="breadcrumb-item">History Kelayakan</a>
               </div>

               <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
          </div>
     </div>

     <br>
</div>
@endsection

@section('content')
<div class="content">

     <!-- Basic datatable -->
     <div class="card">

          <div class="card-header bg-secondary text-center">
               
               <div class="header-elements" >

                    <h5 class="card-title">History Kelayakan</h5>
               </div>
          </div>

          <div id="content">
               <div id="child">
                    <table class="table datatable-basic">
                         <thead>
                              <tr>
                                   <th>No</th>
                                   <th>Kode Kelayakan</th>
                                   <th>Peminjam</th>
                                   <th>Kelayakan</th>
                                   <th>Nilai Kelayakan</th>
                                   <th class="text-center">Actions</th>
                              </tr>
                         </thead>
                         <tbody>
                              @foreach($valuations as $key => $valuation)
                              <tr>
                                   <td scope="row">{!! $loop->iteration !!}</td>
                                   <td>{{ $valuation->code }}</td>
                                   <td>{{ \Str::ucfirst($valuation->customer->name) }}</>
                                   </td>
                                   <td>{{ $valuation->total >= 60 ? 'Layak':'Tidak layak' }}</td>
                                   <td>{{ number_format($valuation->total) }}</td>

                                   <td style="width: 10%">
                                        <a href="{{ route('staff.valuation.show', [$valuation]) }}"
                                             class="btn btn-warning">Detail</a>
                                   </td>
                              </tr>
                              @endforeach
                         </tbody>
                    </table>
               </div>
          </div>
     </div>
</div>
@endsection