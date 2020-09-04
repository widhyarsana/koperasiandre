@extends('layouts.master')

@section('title', 'Daftar Peminjam')

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
                    <a href="{{ route('staff.customer.index') }}" class="breadcrumb-item">Peminjam</a>
                    <span class="breadcrumb-item active">Daftar Peminjam</span>
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
          <div class="card-header bg-secondary header-elements-md-inline bg-secondary">
               <div class="row">
                    <div class="col-md-2">
                         <div class="text-left">
                              <a href="{{ route('staff.customer.create') }}" class="btn btn-primary mt-2">Tambah</a>
                         </div>
                    </div>
                    <div class="col-md-4"></div>
                    @if(Session::has('customer'))
                    <input type="hidden" id="message" value="{{ session()->get('customer') }}">
                    @endif
               </div>
               <div class="header-elements" style="margin-right: 50%">

                    <h5 class="card-title">Daftar Peminjam</h5>
               </div>
          </div>

          <div id="content">
               <div id="child">
                    <input type="hidden" id="csrf" value="{{csrf_token()}}">
                    <input type="hidden" id="obj" value="customer">
                    <input type="hidden" id="sum" value="{{ $customers->count() }}">
                    <table class="table datatable-basic">
                         <thead>
                              <tr>
                                   <th>No</th>
                                   <th>Nama</th>
                                   <th>E-Mail</th>
                                   <th>Jenis Kelamin</th>
                                   <th>Kelayakan</th><th>Alamat</th>
                                   <th class="text-center">Actions</th>
                              </tr>
                         </thead>
                         <tbody>
                              @foreach($customers as $key => $customer)
                              <tr>
                                   <td scope="row">{!! $loop->iteration !!}</td>
                                   <td>{{ \Str::ucfirst($customer->name) }}</>
                                   </td>
                                   <td>{{ \Str::ucfirst($customer->email) }}</td>
                                   <td>{{ $customer->gender == 1 ? 'Laki-Laki': 'Perempuan' }}</td>
                                   @if($customer->worthy >= 60)
                                        <td>Layak - {{ $customer->worthy}}</td>
                                   @elseif($customer->worthy < 60 && $customer->worthy > 0)
                                   <td>Tidak Layak - {{ $customer->worthy}}</td>

                                   @else
                                        <td>Belum Ada</td>
                                   @endif
                                   <td>{{ \Str::ucfirst($customer->address) }}</td>
                                   <td style="width: 15%">
                                        <a href="{{ route('staff.customer.edit', [$customer]) }}"
                                             class="btn btn-success">Edit</a>
                                        {{-- <a href="{{ route('superadmin.admin.delete', [$admin]) }}" class="btn
                                        btn-danger">Hapus</a> --}}
                                        <button class="btn btn-danger delete-item" id="hapus_{{ $key }}"
                                             data-id="{{ $customer->id }}">Delete</button>
                                        <input type="hidden" id="item_{{ $key }}" value="{{ $customer->id }}"></td>
                              </tr>
                              @endforeach
                         </tbody>
                    </table>
               </div>
          </div>
     </div>
</div>
@endsection