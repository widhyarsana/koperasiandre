@extends('layouts.master')

@section('title', 'Tambah Sub Kriteria')

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
                    <a href="{{ route('manager.subcriteria.index') }}" class="breadcrumb-item">Sub Kriteria</a>
                    <span class="breadcrumb-item active">Tambah Sub Kriteria</span>
               </div>

               <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
          </div>
     </div>

     <br>
</div>
@endsection

@section('content')
<div class="content">

     <!-- Basic layout-->

     <div class="row">
          <div class="col-md-2"></div>
          <div class="col-md-8">
               <div class="card">
                    <div class="card-header text-center ">

                         <h5 class="card-title">Tambah Sub Kriteria</h5>
                    </div>
                    <div class="card-body">
                         <form action="{{ route('manager.subcriteria.store') }}" method="POST">
                              @csrf
                              <div class="form-group">
                                   <label>Kriteria:</label>
                                   <select name="criteria" id="" class="form-control">
                                        @foreach($criterias as $criteria)
                                             <option value="{{ $criteria->id }}">{{ $criteria->name }}</option>
                                        @endforeach
                                   </select>
                              </div>
                              @error('criteria_id')
                              <div class="alert alert-warning alert-rounded alert-dismissible">
                                   <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
                                   {{ $message }}
                              </div>
                              @enderror

                              <div class="form-group">
                                   <label>Nama:</label>
                                   <input type="text" class="form-control " placeholder="Masukan Nama" name="name"
                                        value="{{ old('name') }}">
                              </div>
                              @error('name')
                              <div class="alert alert-warning alert-rounded alert-dismissible">
                                   <button type="button" class="close"
                                        data-dismiss="alert"><span>&times;</span></button>
                                   {{ $message }}
                              </div>
                              @enderror

                              <div class="form-group">
                                   <label>Bobot:</label>
                                   <input type="number" class="form-control" placeholder="Masukan Bobot" name="value"
                                        value="{{ old('value') }}">
                              </div>
                              @error('value')
                              <div class="alert alert-warning alert-rounded alert-dismissible">
                                   <button type="button" class="close"
                                        data-dismiss="alert"><span>&times;</span></button>
                                   {{ $message }}
                              </div>

                              @enderror


                              <div class="text-right">
                                   <a href="{{ route('manager.subcriteria.index') }}" class="btn btn-danger"><i
                                             class="icon-backward mr-2"></i>Kembali</a>
                                   <button type="submit" class="btn btn-primary">Simpan<i
                                             class="icon-paperplane ml-2"></i></button>
                              </div>
                         </form>
                    </div>
               </div>
          </div>
     </div>




</div>
@endsection