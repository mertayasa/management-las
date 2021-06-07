<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="{{asset('admin/css/sb-admin-2.css')}}" rel="stylesheet">
    <title>RAB {{$project->name}}</title>
</head>
<body>
    <div class="card-body">
        <div class="project-info">
            <div class="project-heading">
                <h5 class="text-center"> RAB <br> {{$project->name}}</h5>
                <small class="d-block text-center"> <i>Telp. {{$project->phone}}</i> </small>
                <small class="d-block text-center"> <i>Alamat. {{$project->address}}</i> </small>
            </div>
            <hr>
            <table>
                <tr>
                    <td> Jenis Proyek </td>
                    <td>  {{$project->type == 1 ? 'Borongan' : 'Harian'}} </td>
                </tr>
                <tr>
                    <td> Tanggal Mulai </td>
                    <td>  {{\Carbon\Carbon::parse($project->start)->format('d-m-Y')}} </td>
                </tr>
                <tr>
                    <td> Target Selesai </td>
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
            {{-- <div class="row"> --}}
                
                <div class="col-6">
                    <p>Tambahan :</p>
                    <p>{{$project->detail}}</p>
                </div>
                
                <div class="col-6" style="margin-top: 50px">
                    <p>Denpasar. {{\Carbon\Carbon::now()->format('d-m-Y')}}</p>
                    <br>
                    <br>
                    <br>
                    <p>Manager Las</p>
                </div>

            {{-- </div> --}}
        </div>
    </div>

    <style>
        table{
            width: 100%;
            font-style: sans-serif;
            border-collapse: collapse;
        }

        table, th, td{
            border: 1px solid black;
        }

        th, td {
            padding: 15px;
            text-align: left;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>

    <script src="{{asset('admin/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('admin/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
</body>
</html>