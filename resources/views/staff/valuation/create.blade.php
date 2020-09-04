@extends('layouts.master')

@section('title', 'Input Kelayakan Peminjaman')

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
                    <span class="breadcrumb-item active">Input Kelayakan Peminjaman</span>
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
                         <h5 class="card-title">Input Kelayakan Peminjaman</h5>
                    </div>

                    <div class="card-body">
                         <form action="{{ route('staff.valuation.store') }}" method="POST">
                              @csrf
                              <div class="form-group">
                                   <label>Peminjam:</label>
                                   <select name="customer" id="" class="form-control">
                                        <option value="">Pilih Peminjam</option>
                                        @foreach ($customers as $customer)
                                            <option {{ old('customer') == $customer->id ? 'selected':'' }} value="{{ $customer->id }}">{{ ucfirst($customer->name) }} </option>
                                        @endforeach
                                   </select>
                              </div>
                              @error('customer')
                              <div class="alert alert-warning alert-rounded alert-dismissible">
                                   <button type="button" class="close"
                                        data-dismiss="alert"><span>&times;</span></button>
                                   {{ $message }}
                              </div>
                              @enderror
                              <div class="form-group">
                                   <label>Tanggal:</label>
                                   <input type="date" class="form-control" name="date" value="{{ old('date') }}">
                              </div>
                              @error('date')
                              <div class="alert alert-warning alert-rounded alert-dismissible">
                                   <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
                                   {{ $message }}
                              </div>
                              @enderror
                              <div class="form-group">
                                   <h6>Silahkan Isi Kriteria</h6>
                              </div>
                              @foreach ($criterias as $criteria)
                                  <div class="form-group pl-3">
                                   <label class="d-block text-bold">{!! $loop->iteration !!}. {{ $criteria->name }}:</label>
                              
                                   @foreach ($criteria->subCriterias as $subCriteria)
                                       <div class="pl-3 mb-1">
                                            <div class="form-check">
                                             <label class="form-check-label pl-1">
                                                  <input type="radio" class="form-input-styled" value="{{ $subCriteria->id }}" name="criteria_{{ $criteria->id }}" {{ old('criteria_'.$criteria->id) == $subCriteria->id ? 'checked':'' }} data-fouc>
                                                  {{ ucfirst($subCriteria->name) }}
                                             </label>
                                       </div>
                                   </div>
                                   @endforeach
                              </div>
                              @error('criteria_'.$criteria->id)
                              <div class="alert alert-warning alert-rounded alert-dismissible">
                                   <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
                                   {{ $message }}
                              </div>
                              @enderror
                              @endforeach



                              <div class="text-right">
                                   <a href="{{ route('staff.customer.index') }}" class="btn btn-danger"><i
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