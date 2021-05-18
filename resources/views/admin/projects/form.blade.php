<div class="content-link mt-3">
    <h4>Rangkuman Proyek</h4>
    <hr>
    <div class="row">
        <div class="col-6">
            <div class="col-12 p-0">
                {!! Form::label('projectName', 'Nama Proyek') !!}
                {!! Form::text('name', null, ['id' => 'projectName', 'class' => $errors->has('name') ? 'form-control is-invalid' : 'form-control'])!!}
                @if ($errors->has('name'))
                    {!! showErrorMessage($errors, 'name') !!}
                @endif
            </div>
        
            <div class="col-12 p-0 mt-3">
                {!! Form::label('projectStart', 'Tanggal Mulai') !!}
                {!! Form::date('start', null, ['id' => 'projectStart', 'class' => $errors->has('start') ? 'form-control is-invalid' : 'form-control'])!!}
                @if ($errors->has('start'))
                    {!! showErrorMessage($errors, 'start') !!}
                @endif
            </div>
    
            <div class="col-12 p-0 mt-3">
                {!! Form::label('projectAddress', 'Alamat Proyek') !!}
                {!! Form::text('address', null, ['id' => 'projectAddress', 'class' => $errors->has('address') ? 'form-control is-invalid' : 'form-control'])!!}
                @if ($errors->has('address'))
                    {!! showErrorMessage($errors, 'address') !!}
                @endif
            </div>
        
            {{-- Detail Proyek --}}
            {{-- <div class="col-12 p-0 mt-3">
                {!! Form::label('projectDetail', 'Detail Proyek') !!}
                {!! Form::textarea('detail', null, ['id' => 'projectDetail', 'class' => $errors->has('detail') ? 'form-control is-invalid' : 'form-control'])!!}
                @if ($errors->has('detail'))
                    {!! showErrorMessage($errors, 'detail') !!}
                @endif
            </div> --}}
        </div>

        <div class="col-6">
            <div class="col-12 p-0">
                {!! Form::label('projectPhone', 'Telpon Client') !!}
                {!! Form::number('phone', null, ['id' => 'projectPhone', 'class' => $errors->has('phone') ? 'form-control is-invalid' : 'form-control'])!!}
                @if ($errors->has('phone'))
                    {!! showErrorMessage($errors, 'phone') !!}
                @endif
            </div>

            <div class="col-12 p-0 mt-3">
                {!! Form::label('projectEnd', 'Estimasi Tanggal Selesai') !!}
                {!! Form::date('end', null, ['id' => 'projectEnd', 'class' => $errors->has('end') ? 'form-control is-invalid' : 'form-control'])!!}
                @if ($errors->has('end'))
                    {!! showErrorMessage($errors, 'end') !!}
                @endif
            </div>

            {{-- Biaya Pemasangan --}}
            {{-- <div class="col-12 p-0">
                {!! Form::label('projectCharge', 'Biaya Pemasangan') !!}
                {!! Form::number('assembly_charge', null, ['id' => 'projectCharge', 'class' => $errors->has('assembly_charge') ? 'form-control is-invalid' : 'form-control'])!!}
                @if ($errors->has('assembly_charge'))
                    {!! showErrorMessage($errors, 'type') !!}
                @endif
            </div> --}}
        
            <div class="col-12 p-0 mt-3">
                {!! Form::label('projetcType', 'Jenis Pengerjaan') !!}
                {!! Form::select('type', [0 => 'Borongan', 1 => 'Harian'], null, ['id' => 'projetcType', 'class' => $errors->has('type') ? 'form-control is-invalid' : 'form-control']) !!}
                @if ($errors->has('type'))
                    {!! showErrorMessage($errors, 'type') !!}
                @endif
            </div>
        </div>
    </div>
</div>

<hr>

<div class="content-link mt-5">
    <h4>Pegawai Proyek</h4>
    <hr>
    <div class="row">
        <div class="product-row col-12" id="workerContainer">

            {{-- For Cloning --}}
            <div id="pivotWorker"></div>
            <div class="row d-none mt-3">
                <div class="col-4">
                    <div class="col-12 p-0">
                        {!! Form::label('productName', 'Nama Pegawai') !!}
                        {!! Form::text('product_id[]', null, ['id' => '', 'class' => $errors->has('product_id') ? 'form-control is-invalid' : 'form-control'])!!}
                        @if ($errors->has('product_id'))
                            {!! showErrorMessage($errors, 'product_id') !!}
                        @endif
                    </div>
                </div>
                <div class="col-4">
                    <div class="col-12 p-0">
                        {!! Form::label('productCount', 'Jumlah Hari Kerja') !!}
                        {!! Form::number('product_count[]', null, ['id' => '', 'class' => $errors->has('product_count') ? 'form-control is-invalid' : 'form-control'])!!}
                        @if ($errors->has('product_count'))
                            {!! showErrorMessage($errors, 'product_count') !!}
                        @endif
                    </div>
                </div>
                <div class="col-2">
                    <div class="col-12 p-0">
                        {!! Form::label('productSumPrice', 'Gaji Per Hari') !!}
                        {!! Form::number('product_total_price[]', null, ['id' => '', 'class' => $errors->has('product_count') ? 'form-control is-invalid' : 'form-control'])!!}
                        @if ($errors->has('product_count'))
                            {!! showErrorMessage($errors, 'product_count') !!}
                        @endif
                    </div>
                </div>
                <div class="col-2">
                    <div class="col-12 p-0">
                        {!! Form::label('productSumPrice', 'Total Gaji') !!}
                        {!! Form::number('product_total_price[]', null, ['id' => '', 'class' => $errors->has('product_count') ? 'form-control is-invalid' : 'form-control'])!!}
                        @if ($errors->has('product_count'))
                            {!! showErrorMessage($errors, 'product_count') !!}
                        @endif
                    </div>
                </div>
            </div>
            {{-- For Cloning --}}

            <div class="row mt-3">
                <div class="col-4">
                    <div class="col-12 p-0">
                        {!! Form::label('productName', 'Nama Pegawai') !!}
                        {!! Form::text('product_id[]', null, ['id' => '', 'class' => $errors->has('product_id') ? 'form-control is-invalid' : 'form-control'])!!}
                        @if ($errors->has('product_id'))
                            {!! showErrorMessage($errors, 'product_id') !!}
                        @endif
                    </div>
                </div>
                <div class="col-4">
                    <div class="col-12 p-0">
                        {!! Form::label('productCount', 'Jumlah Hari Kerja') !!}
                        {!! Form::number('product_count[]', null, ['id' => '', 'class' => $errors->has('product_count') ? 'form-control is-invalid' : 'form-control'])!!}
                        @if ($errors->has('product_count'))
                            {!! showErrorMessage($errors, 'product_count') !!}
                        @endif
                    </div>
                </div>
                <div class="col-2">
                    <div class="col-12 p-0">
                        {!! Form::label('productSumPrice', 'Gaji Per Hari') !!}
                        {!! Form::number('product_total_price[]', null, ['id' => '', 'class' => $errors->has('product_count') ? 'form-control is-invalid' : 'form-control'])!!}
                        @if ($errors->has('product_count'))
                            {!! showErrorMessage($errors, 'product_count') !!}
                        @endif
                    </div>
                </div>
                <div class="col-2">
                    <div class="col-12 p-0">
                        {!! Form::label('productSumPrice', 'Total Gaji') !!}
                        {!! Form::number('product_total_price[]', null, ['id' => '', 'class' => $errors->has('product_count') ? 'form-control is-invalid' : 'form-control'])!!}
                        @if ($errors->has('product_count'))
                            {!! showErrorMessage($errors, 'product_count') !!}
                        @endif
                    </div>
                </div>
            </div>

        </div>
    </div>

    <button class="btn btn-primary mt-3 text-right" type="button" onclick="addNewWorker()">Tambah Pegawai</button>
</div>

<hr>

<div class="content-link mt-5">
    <h4>Bahan Baku Proyek</h4>
    <hr>
    <div class="row">
        <div class="product-row col-12" id="productContainer">

            {{-- For Cloning --}}
            <div id="pivot"></div>
            <div class="row d-none mt-3">
                <div class="col-6">
                    <div class="col-12 p-0">
                        {!! Form::label('productName', 'Nama Barang') !!}
                        {!! Form::text('product_id[]', null, ['id' => '', 'class' => $errors->has('product_id') ? 'form-control is-invalid' : 'form-control'])!!}
                        @if ($errors->has('product_id'))
                            {!! showErrorMessage($errors, 'product_id') !!}
                        @endif
                    </div>
                </div>
                <div class="col-4">
                    <div class="col-12 p-0">
                        {!! Form::label('productCount', 'Jumlah Barang') !!}
                        {!! Form::number('product_count[]', null, ['id' => '', 'class' => $errors->has('product_count') ? 'form-control is-invalid' : 'form-control'])!!}
                        @if ($errors->has('product_count'))
                            {!! showErrorMessage($errors, 'product_count') !!}
                        @endif
                    </div>
                </div>
                <div class="col-2">
                    <div class="col-12 p-0">
                        {!! Form::label('productSumPrice', 'Harga X') !!}
                        {!! Form::number('product_total_price[]', null, ['id' => '', 'class' => $errors->has('product_count') ? 'form-control is-invalid' : 'form-control'])!!}
                        @if ($errors->has('product_count'))
                            {!! showErrorMessage($errors, 'product_count') !!}
                        @endif
                    </div>
                </div>
            </div>
            {{-- For Cloning --}}

            <div class="row">
                <div class="col-6">
                    <div class="col-12 p-0">
                        {!! Form::label('productName', 'Nama Barang') !!}
                        {!! Form::text('product_id[]', null, ['id' => '', 'class' => $errors->has('product_id') ? 'form-control is-invalid' : 'form-control'])!!}
                        @if ($errors->has('product_id'))
                            {!! showErrorMessage($errors, 'product_id') !!}
                        @endif
                    </div>
                </div>
                <div class="col-4">
                    <div class="col-12 p-0">
                        {!! Form::label('productCount', 'Jumlah Barang') !!}
                        {!! Form::number('product_count[]', null, ['id' => '', 'class' => $errors->has('product_count') ? 'form-control is-invalid' : 'form-control'])!!}
                        @if ($errors->has('product_count'))
                            {!! showErrorMessage($errors, 'product_count') !!}
                        @endif
                    </div>
                </div>
                <div class="col-2">
                    <div class="col-12 p-0">
                        {!! Form::label('productSumPrice', 'Harga X') !!}
                        {!! Form::number('product_total_price[]', null, ['id' => '', 'class' => $errors->has('product_count') ? 'form-control is-invalid' : 'form-control'])!!}
                        @if ($errors->has('product_count'))
                            {!! showErrorMessage($errors, 'product_count') !!}
                        @endif
                    </div>
                </div>
            </div>

        </div>
    </div>

    <button class="btn btn-primary mt-3 text-right" type="button" onclick="addNewProduct()">Tambah Bahan Baku</button>
</div>

<hr>

<div class="content-link mt-5">
    <h4>Detail & Biaya Proyek</h4>
    <hr>
    <div class="row">

        <div class="col-6">
            <div class="col-12 p-0">
                {!! Form::label('projectDetail', 'Detail Proyek') !!}
                {!! Form::textarea('detail', null, ['id' => 'projectDetail', 'class' => $errors->has('detail') ? 'form-control is-invalid' : 'form-control'])!!}
                @if ($errors->has('detail'))
                    {!! showErrorMessage($errors, 'detail') !!}
                @endif
            </div>
        </div>

        <div class="col-6">
            <div class="col-12 p-0">
                {!! Form::label('projectCharge', 'Biaya Pemasangan') !!}
                {!! Form::number('assembly_charge', null, ['id' => 'projectCharge', 'class' => $errors->has('assembly_charge') ? 'form-control is-invalid' : 'form-control'])!!}
                @if ($errors->has('assembly_charge'))
                    {!! showErrorMessage($errors, 'type') !!}
                @endif
            </div>

            <table align="left" class="mt-5 col-12 ">
                <tr>
                    <td class="text-left">Biaya Bahan Baku</td>
                    <td style="width: 30px; text-align:center"> : </td>
                    <td>Rp. 12321</td>
                </tr>
                <tr>
                    <td class="text-left">Biaya Pemasangan</td>
                    <td style="width: 30px; text-align:center"> : </td>
                    <td>Rp. 12321.1221 </td>
                </tr>
                <tr>
                    <td class="text-left">Biaya Tukang</td>
                    <td style="width: 30px; text-align:center"> : </td>
                    <td>Rp. 212213 </td>
                </tr>

                <tr class="border-top">
                    <td class="text-left" style="font-weight: bold">Total Biaya RAB</td>
                    <td style="width: 30px; text-align:center; font-weight: bold"> : </td>
                    <td style="font-weight: bold">Rp. 123213</td>
                </tr>
            </table>
        </div>

    </div>
</div>

@push('scripts')
    <script>
        function addNewProduct(event){
            const rowProductElement = document.getElementById('pivot').nextElementSibling
            const clone = rowProductElement.cloneNode(true);
            const productContainer = document.getElementById('productContainer')
            clone.classList.remove('d-none')
            productContainer.appendChild(clone)
        }

        function addNewWorker(event){
            const rowWorkerElement = document.getElementById('pivotWorker').nextElementSibling
            const clone = rowWorkerElement.cloneNode(true);
            const workerContainer = document.getElementById('workerContainer')
            clone.classList.remove('d-none')
            workerContainer.appendChild(clone)
        }
    </script>
@endpush