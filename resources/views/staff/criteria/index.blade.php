@extends('layouts.master')

@section('title', 'Daftar Kriteria')

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
                    <a href="{{ route('manager.criteria.index') }}" class="breadcrumb-item">Kriteria</a>
                    <span class="breadcrumb-item active">Daftar Kriteria</span>
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

                    <h5 class="card-title">Daftar Kriteria</h5>
               </div>
          </div>

          <div id="content">
               <div id="child">
                    <input type="hidden" id="csrf" value="{{csrf_token()}}">
                    <input type="hidden" id="obj" value="criteria">
                    <input type="hidden" id="sum" value="{{ $criterias->count() }}">
                    <table class="table datatable-basic">
                         <thead>
                              <tr>
                                   <th>No</th>
                                   <th>Nama</th>
                                   <th>Bobot</th>
                                   <th class="text-center">Actions</th>
                              </tr>
                         </thead>
                         <tbody>
                              @foreach($criterias as $key => $criteria)
                              <tr>
                                   <td scope="row">{!! $loop->iteration !!}</td>
                                   <td>{{ \Str::ucfirst($criteria->name) }}</>
                                   </td>
                                   <td>{{ number_format($criteria->value) }}%</td>

                                   <td style="width: 10%">
                                        <a href="{{ route('staff.criteria.show', [$criteria]) }}"
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