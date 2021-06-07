@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{asset('admin/vendor/datatables_jquery/datatables.css')}}">
    <link rel="stylesheet" href="{{asset('admin/vendor/sweetalert2/dist/sweetalert2.css')}}">
    {{-- <link rel="stylesheet" href="{{asset('plugin/iCheck/skins/flat/orange.css')}}"> --}}
@endpush

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Management Supplier</h1>
    </div>
    <p><strong><a href="{{route('dashboard.admin')}}" class='text-decoration-none text-gray-900'>Dashboard</a></strong> / Management Supplier</p>
    <!-- Area Table -->
    @include('layouts.flash')
    <div class="col-12 p-0">
        <div class="card shadow mb-4">
            <!-- Card Body -->
            <div class="card-body">
                <div class="col-12 p-0 mb-3">
                    <div class="row">
                        @if (checkUserLevel() == 'admin')
                            <div class="col-6 align-items-start">
                                <a href="{{route('suppliers.admin.create')}}" type="button" class="btn btn-warning mb-3 mr-2">+ Tambah Data</a>
                            </div>
                        @endif
                        <div class="col-6 d-flex">
                        </div>
                    </div>
                </div>


                <table id="supplierDatatable" class="table" style="width: 100%;">
                    <thead>
                        <td><b>No</b></td>
                        <td><b>Nama</b></td>
                        <td><b>Telpon</b></td>
                        <td><b>Alamat</b></td>
                        @if (checkUserLevel() == 'admin')
                            <td><b>Aksi</b></td>
                        @endif
                    </thead>
                    <tbody></tbody>
                </table>


            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script src="{{asset('admin/vendor/sweetalert2/dist/sweetalert2.js')}}"></script>
{{-- <script src="{{asset('plugin/iCheck/icheck.js')}}"></script> --}}
@include('admin.suppliers.datatable')
@endpush