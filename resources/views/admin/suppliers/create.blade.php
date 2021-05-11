@extends('layouts.app')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Management Supplier</h1>
    </div>
    @include('layouts.flash')
    <!-- Area Table -->
    {!! Form::open(['route' => 'suppliers.admin.store']) !!}
    <div class="row">
        <div class="col-12 align-items-start">
            <a class="btn btn-danger mb-3 text-white" href="{{route('suppliers.admin.index')}}">Kembali</a>
        </div>
        <div class="col-lg-8 col-sm-12">
            <div class="card shadow mb-4">
                <div class="card-body">
                    @include('admin.suppliers.form')
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center">
                    Aksi
                </div>
                <div class="card-body">
                    <button class="btn btn-warning w-100" type="submit">Simpan</button>
                </div>
            </div>
        </div>
    </div>
    {!! Form::close() !!}
@endsection