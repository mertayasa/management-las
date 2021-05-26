@extends('layouts.app')
@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Management Proyek</h1>
    </div>
    @include('layouts.flash')
    <!-- Area Table -->
    {!! Form::open(['id' => 'newProjectForm']) !!}
    <div class="row">
        <div class="col-12 align-items-start">
            <a class="btn btn-danger mb-3 text-white" href="{{route('projects.admin.index')}}">Kembali</a>
        </div>
        <div class="col-lg-12 col-sm-12">
            <div class="card shadow mb-4">
                <div class="card-body">
                    @include('admin.projects.form')
                </div>
            </div>
            {{-- <button class="btn btn-warning mb-3 w-100" type="submit">Simpan Proyek</button> --}}
            <button class="btn btn-primary mt-3 w-100" type="submit" id="submitFormBtn">Simpan Proyek</button>
        </div>
    </div>
    {!! Form::close() !!}

    @include('admin.projects.cloning_target')
    @include('admin.projects.product_modal')

@endsection