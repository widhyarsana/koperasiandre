@extends('layouts.master')

@section('title', 'Dasboard')

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
                    <a href="{{ route('dashboard') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i>
                         Home</a>
                    <span class="breadcrumb-item active">Dashboard</span>
               </div>

               <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
          </div>
     </div>

     <br>
</div>
@endsection

@section('content')
   
@endsection