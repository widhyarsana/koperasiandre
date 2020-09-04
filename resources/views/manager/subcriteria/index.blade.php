@extends('layouts.master')

@section('title', 'Daftar Sub Kriteria')

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
                    <a href="{{ route('manager.subcriteria.index') }}" class="breadcrumb-item">Sub Kriteria</a>
                    <span class="breadcrumb-item active">Daftar Sub Kriteria</span>
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

          <div class="card-header bg-secondary header-elements-md-inline ">
               <div class="row">
                    <div class="col-md-2">
                         <div class="text-left">
                              <a href="{{ route('manager.subcriteria.create') }}"
                                   class="btn btn-primary mt-2">Tambah</a>
                         </div>
                    </div>
                    <div class="col-md-4"></div>
                    @if(Session::has('subcriteria'))
                    <input type="hidden" id="message" value="{{ session()->get('subcriteria') }}">
                    @endif
               </div>
               <div class="header-elements" style="margin-right: 50%">

                    <h5 class="card-title">Daftar Sub Kriteria</h5>
               </div>
          </div>

          <div id="content">
               <div id="child">
                    <input type="hidden" id="csrf" value="{{csrf_token()}}">
                    <input type="hidden" id="obj" value="subcriteria">
                    <input type="hidden" id="sum" value="{{ $subCriterias->count() }}">
                    <table class="table datatable-basic">
                         <thead>
                              <tr>
                                   <th>No</th>
                                   <th>Nama</th>
                                   <th>Kriteria</th>
                                   <th>Bobot</th>
                                   <th>Bobot Kriteria</th>
                                   <th class="text-center">Actions</th>
                              </tr>
                         </thead>
                         <tbody>
                              @foreach($subCriterias as $key => $subCriteria)
                              <tr>
                                   <td scope="row">{!! $loop->iteration !!}</td>
                                   <td>{{ \Str::ucfirst($subCriteria->name) }}</>
                                   </td>
                                   <td>{{ \Str::ucfirst($subCriteria->criteria->name) }}</>
                                   </td>
                                   <td>{{ number_format($subCriteria->value) }}</td>
                                   <td>{{ number_format($subCriteria->criteria->value) }}%</td>
                                   <td style="width: 15%">
                                        <a href="{{ route('manager.subcriteria.edit', [$subCriteria]) }}"
                                             class="btn btn-success">Edit</a>
                                        <button class="btn btn-danger delete-item" id="hapus_{{ $key }}"
                                             data-id="{{ $subCriteria->id }}">Delete</button>
                                        <input type="hidden" id="item_{{ $key }}" value="{{ $subCriteria->id }}">
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