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
                <div class="project-info">
                    <div class="project-heading">
                        <h5 class="text-center">{{$project->name}}</h5>
                        <small class="d-block text-center"> <i>Telp. {{$project->phone}}</i> </small>
                        <small class="d-block text-center"> <i>Alamat. {{$project->address}}</i> </small>
                    </div>
                    <hr>
                    <table>
                        <tr>
                            <td> Jenis Proyek </td>
                            <td style="width: 30px; text-align:center">  :  </td>
                            <td>  {{$project->type == 1 ? 'Borongan' : 'Harian'}} </td>
                        </tr>
                        <tr>
                            <td> Tanggal Mulai </td>
                            <td style="width: 30px; text-align:center">  :  </td>
                            <td>  {{\Carbon\Carbon::parse($project->start)->format('d-m-Y')}} </td>
                        </tr>
                        <tr>
                            <td> Target Selesai </td>
                            <td style="width: 30px; text-align:center">  :  </td>
                            <td>  {{\Carbon\Carbon::parse($project->end)->format('d-m-Y')}} </td>
                        </tr>
                    </table>
                </div>
                <hr>
                
                <div class="project-rab">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Uraian</th>
                                <th>Satuan</th>
                                <th>Harga Satuan</th>
                                <th>Jumlah</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no_product = 1;
                            @endphp
                            <tr>
                                <td colspan="5"> <b>Bahan Baku</b> </td>
                            </tr>
                            @forelse ($project->projectDetail as $product)
                            <tr>
                                <td>{{$no_product}}</td>
                                <td>{{$product->product->name}}</td>
                                <td>{{$product->product_amount}} {{$product->product->unit}}</td>
                                <td>{{formatPrice($product->product_price)}}</td>
                                <td>{{formatPrice($product->product_price * $product->product_amount)}}</td>
                            </tr>
                            @php
                                $no_product++
                            @endphp
                            @empty
                                <tr>
                                    <td colspan="5">Tidak ada bahan baku</td>
                                </tr>
                            @endforelse
                            <tr>
                                <td colspan="4" class="text-right"> <b>Sub Total</b> </td>
                                <td>{{formatPrice($project->product_total)}}</td>
                            </tr>

                            @if (isset($project->additionalWorker))
                                <tr>
                                    <td colspan="5"> <b>Pegawai</b> </td>
                                </tr>
                            @endif

                            @php
                                $no_worker = 1;
                            @endphp
                          
                            @forelse ($project->additionalWorker as $worker)
                            <tr>
                                <td>{{$no_worker}}</td>
                                <td>{{$worker->name}}</td>
                                <td>{{$worker->work_day}} Hari</td>
                                <td>{{formatPrice($worker->salary_per_day)}}</td>
                                <td>{{formatPrice($worker->salary_per_day * $worker->work_day)}}</td>
                            </tr>
                            @php
                                $no_worker++
                            @endphp
                            @empty
                                <tr>
                                    <td colspan="5">Tidak ada pegawai</td>
                                </tr>
                            @endforelse
                            <tr>
                                <td colspan="4" class="text-right"> <b>Sub Total</b> </td>
                                <td>{{formatPrice($project->worker_salary)}}</td>
                            </tr>
                            <tr>
                                <td colspan="4" class="text-right"> <b>Biaya Pemasangan</b> </td>
                                <td>{{formatPrice($project->assembly_charge)}}</td>
                            </tr>
                            <tr>
                                <td colspan="4" class="text-right"> <b>Total Biaya Proyek</b> </td>
                                <td>{{formatPrice($project->total)}}</td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="project-description col-6">
                        <span>Tambahan :</span> <br>
                        <span>{{$project->detail}}</span>
                    </div>
                </div>
                .
                {{-- @dump($project->projectDetail[0]->product->supplier_name) --}}
            </div>
        </div>
    </div>
@endsection