    {{-- Cloning Worker --}}
    <div id="pivotWorker"></div>
    <div class="row mt-3 d-none new-worker">
        <div class="col-5">
            <div class="col-12 p-0">
                {!! Form::label('productName', 'Nama Pegawai') !!}
                {!! Form::text('worker[]', null, ['required', 'id' => '', 'onchange' => 'countSalary(this)', 'onkeyup' => 'countSalary(this)', 'class' => 'form-control'])!!}
            </div>
        </div>
        <div class="col-2">
            <div class="col-12 p-0">
                {!! Form::label('productCount', 'Jumlah Hari Kerja') !!}
                {!! Form::number('worker_work_day[]', 1, ['required', 'id' => '', 'onchange' => 'countSalary(this)', 'onkeyup' => 'countSalary(this)', 'class' => 'form-control work-day'])!!}
            </div>
        </div>
        <div class="col-2">
            <div class="col-12 p-0">
                {!! Form::label('productSumPrice', 'Gaji Per Hari') !!}
                {!! Form::number('worker_sallary_per_day[]', 0, ['required', 'id' => '', 'onchange' => 'countSalary(this)', 'onkeyup' => 'countSalary(this)', 'class' => 'form-control salary-per-day'])!!}
            </div>
        </div>
        <div class="col-2">
            <div class="col-12 p-0">
                {!! Form::label('productSumPrice', 'Total Gaji') !!}
                {!! Form::number('worker_total_sallary[]', 0, ['required', 'id' => '', 'readonly', 'onchange' => 'countSalary(this)', 'onkeyup' => 'countSalary(this)', 'class' => 'form-control sum-salary'])!!}
            </div>
        </div>
        <div class="col-1 pt-2">
            <div class="pt-1"></div>
            <button class="btn btn-sm btn-danger mt-4 py-1" type="button" onclick="deleteWorker(this)"> - </button>
        </div>
    </div>
    {{-- Cloning Worker --}}


    {{-- Cloning Product --}}
    <div id="pivot"></div>
    <div class="row mt-3 d-none">
        <div class="col-5">
            <div class="col-12 p-0">
                {!! Form::label('productName', 'Nama Barang') !!}
                {!! Form::select('product1[]', $products, null, ['required', 'placeholder' => 'Please Select', 'class' => 'form-control product-id', 'onchange' => 'findProductPrice(this)']) !!}
            </div>
        </div>
        <div class="col-2">
            <div class="col-12 p-0">
                {!! Form::label('productPrice', 'Harga Barang') !!}
                {!! Form::number('product1[]', null, ['required', 'id' => '', 'readonly', 'class' => 'form-control product-price'])!!}
            </div>
        </div>
        <div class="col-2">
            <div class="col-12 p-0">
                {!! Form::label('productCount', 'Jumlah Barang') !!}
                {!! Form::number('product1[]', null, ['required', 'id' => '', 'onchange' => 'countSumPrice(this)', 'onkeyup' => 'countSumPrice(this)', 'onfocusout' => 'setDefaultValue(this)', 'class' => 'form-control product-qty'])!!}
            </div>
        </div>
        <div class="col-2">
            <div class="col-12 p-0">
                {!! Form::label('productSumPrice', 'Harga X') !!}
                {!! Form::number('product1[]', null, ['required', 'id' => '', 'readonly', 'class' => 'form-control product-sum-price'])!!}
            </div>
        </div>
        <div class="col-1 pt-2">
            <div class="pt-1"></div>
            <button class="btn btn-sm btn-danger mt-4 py-1" type="button" onclick="deleteProduct(this)"> - </button>
        </div>
    </div>
    {{-- Cloning Product --}}