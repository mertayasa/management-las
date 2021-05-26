@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{asset('admin/vendor/datatables_jquery/datatables.css')}}">
    {{-- <link rel="stylesheet" href="{{asset('plugin/sweetalert2/dist/sweetalert2.css')}}">
    <link rel="stylesheet" href="{{asset('plugin/iCheck/skins/flat/orange.css')}}"> --}}
@endpush

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Management Proyek</h1>
    </div>
    <p><strong><a href="{{route('dashboard.admin')}}" class='text-decoration-none text-gray-900'>Dashboard</a></strong> / Management Proyek</p>
    <!-- Area Table -->
    @include('layouts.flash')
    <div class="col-12 p-0">
        <div class="card shadow mb-4">
            <!-- Card Body -->
            <div class="card-body">
                <div class="col-12 p-0 mb-3">
                    <div class="row">
                        <div class="col-6 align-items-start">
                            <a href="{{route('projects.admin.create')}}" type="button" class="btn btn-warning mb-3 mr-2">+ Tambah Data</a>
                            {{-- <button type="button" class="btn btn-warning mb-3 mr-2">+ Tambah Data</button> --}}
                        </div>
                        <div class="col-6 d-flex">
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table id="projectDatatable" cellspacing="0" class="table table-hover" style="width: 100%;">
                        <thead>
                            <td><b>No</b></td>
                            <td style="white-space: nowrap;"><b>Nama Proyek</b></td>
                            <td style="white-space: nowrap;"><b>Tanggal Mulai</b></td>
                            <td style="white-space: nowrap;"><b>Target Selesai</b></td>
                            <td style="white-space: nowrap;"><b>Jenis Pengerjaan</b></td>
                            <td style="white-space: nowrap;"><b>Progress</b></td>
                            <td><b>Detail</b></td>
                            <td><b>Biaya Pemasangan</b></td>
                            <td><b>Biaya Bahan Baku</b></td>
                            <td><b>Biaya Tukang</b></td>
                            <td><b>Total Biaya</b></td>
                            <td><b>Aksi</b></td>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
  
    <!-- Modal -->
    <div class="modal fade" id="projectProgressModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                {!! Form::open(['id' => 'projectProgress']) !!}
                {!! Form::select('progress', ['Proyek Baru', 'Pembelian Bahan', 'Pengerjaan', 'Pemasangan', 'Selesai'], null, ['class'=>'form-control']) !!}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="updateProgressbtn">Save changes</button>
            </div>
                {!! Form::close() !!}
        </div>
        </div>
    </div>
@endsection

@push('scripts')
<script src="{{asset('admin/vendor/datatables_jquery/datatables.js')}}"></script>
{{-- <script src="{{asset('plugin/sweetalert2/dist/sweetalert2.js')}}"></script> --}}
{{-- <script src="{{asset('plugin/iCheck/icheck.js')}}"></script> --}}
@include('admin.projects.datatable')
<script>
    function updateProjectProgress(progress){
        const projectProgress = document.getElementById('projectProgress')
        const selectOption = projectProgress.querySelector(`option[value="${progress}"]`).setAttribute('selected', true)
    }

    $('#projectProgress').on('submit', function(event){
        event.preventDefault()
        $.ajax({
            url:'{{route('projects.admin.store')}}',
            method:'post',
            data:$(this).serialize(),
            dataType:'json',
            beforeSend:function(){
                $('#updateProgressBtn').attr('disabled','disabled')
            },
            success:function(data)
            {
                console.log(data)
                if(data.code = 1){
                    window.location.href = data.url
                }

                if(data.code = 0){
                    window.location.reload()
                }

                $('#updateProgressBtn').attr('disabled', false)
            }
        })
    });
</script>
@endpush