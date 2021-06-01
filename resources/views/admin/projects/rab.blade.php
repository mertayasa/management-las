@extends('layouts.app')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">RAB Proyek</h1>
    </div>
    <p><strong><a href="{{route('dashboard.admin')}}" class='text-decoration-none text-gray-900'>Dashboard</a></strong> / Management Proyek / RAB</p>
    <!-- Area Table -->
    @include('layouts.flash')
    <div class="col-12 p-0">
        <div class="card shadow mb-4">
            <!-- Card Body -->
            <div class="card-body">
                {{-- <div class="col-12 p-0 mb-3">
                    <div class="row">
                        <div class="col-6 align-items-start">
                            <a href="{{route('projects.admin.create')}}" type="button" class="btn btn-warning mb-3 mr-2">+ Tambah Data</a>
                        </div>
                        <div class="col-6 d-flex">
                        </div>
                    </div>
                </div> --}}
                @dump($project->projectDetail[0]->product->supplier_name)
            </div>
        </div>
    </div>
@endsection