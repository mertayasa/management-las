<div class="row mt-3">
    <div class="col-5">
        <div class="col-12 p-0">
            {!! Form::label('productName', 'Nama Pegawai') !!}
            {!! Form::text('worker[]', null, ['id' => '', 'class' => 'form-control'])!!}
        </div>
    </div>
    <div class="col-2">
        <div class="col-12 p-0">
            {!! Form::label('productCount', 'Jumlah Hari Kerja') !!}
            {!! Form::number('worker[]', 1, ['id' => '', 'onchange' => 'countSalary(this)', 'onkeyup' => 'countSalary(this)', 'class' => 'form-control work-day'])!!}
        </div>
    </div>
    <div class="col-2">
        <div class="col-12 p-0">
            {!! Form::label('productSumPrice', 'Gaji Per Hari') !!}
            {!! Form::number('worker[]', 0, ['id' => '', 'onchange' => 'countSalary(this)', 'onkeyup' => 'countSalary(this)', 'class' => 'form-control salary-per-day'])!!}
        </div>
    </div>
    <div class="col-2">
        <div class="col-12 p-0">
            {!! Form::label('productSumPrice', 'Total Gaji') !!}
            {!! Form::number('worker[]', 0, ['id' => '', 'readonly', 'class' => 'form-control sum-salary'])!!}
        </div>
    </div>
    <div class="col-1 pt-2">
        <div class="pt-1"></div>
        <button class="btn btn-sm btn-primary mt-4 py-1" type="button" onclick="addNewWorker()">+</button>
    </div>
</div>