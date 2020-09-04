@extends('layouts.master')

@section('title', 'Detail Kriteria')

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
                    <a href="{{ route('manager.criteria.index') }}" class="breadcrumb-item">Kriteria</a>
                    <span class="breadcrumb-item active">Detail Kriteria</span>
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
               <h5 class="card-title">{{ ucfirst($criteria->name) }}</h5>
          </div>

          <div class="card-body">

               <h6 class="font-weight-semibold">Daftar Sub Kriteria</h6>
               <div class="card card-table table-responsive shadow-0">
                    <table class="table">
                         <thead>
                              <tr>
                                   <th>#</th>
                                   <th>Nama</th>
                                   <th>Bobot</th>
                              </tr>
                         </thead>
                         <tbody>
                              @foreach ($criteria->subCriterias as $subCriteria)
                                   <tr>
                                        <td>{!! $loop->iteration !!}</td>
                                        <td>{{ ucfirst($subCriteria->name) }}</td>
                                        <td>{{ number_format($subCriteria->value) }}</td>
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