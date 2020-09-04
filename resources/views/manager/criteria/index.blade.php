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

          <div class="card-header bg-secondary header-elements-md-inline">
               <div class="row">
                    <div class="col-md-2">
                         <div class="text-left">
                              <a href="{{ route('manager.criteria.create') }}" class="btn btn-primary mt-2">Tambah</a>
                         </div>
                    </div>
                    <div class="col-md-4"></div>
                    @if(Session::has('criteria'))
                    <input type="hidden" id="message" value="{{ session()->get('criteria') }}">
                    @endif
               </div>
               <div class="header-elements" style="margin-right: 50%">

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

                                   <td style="width: 25%">
                                        <a href="{{ route('manager.criteria.show', [$criteria]) }}"
                                             class="btn btn-warning">Detail</a>
                                        <a href="{{ route('manager.criteria.edit', [$criteria]) }}"
                                             class="btn btn-success">Edit</a>
                                        <button class="btn btn-danger delete-item" id="hapus_{{ $key }}"
                                             data-id="{{ $criteria->id }}">Delete</button>
                                        <input type="hidden" id="item_{{ $key }}" value="{{ $criteria->id }}">
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