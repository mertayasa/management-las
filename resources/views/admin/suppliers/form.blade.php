<div class="content-link mt-3">
    <div class="col-12 p-0">
        {!! Form::label('supplierName', 'Nama Supplier') !!}
        {!! Form::text('name', null, ['id' => 'supplierName', 'class' => $errors->has('name') ? 'form-control is-invalid' : 'form-control'])!!}
        @if ($errors->has('name'))
            {!! showErrorMessage($errors, 'name') !!}
        @endif
    </div>
    <div class="col-12 p-0 mt-3">
        {!! Form::label('supplierPhone', 'Telpon Supplier') !!}
        {!! Form::number('phone', null, ['id' => 'supplierPhone', 'class' => $errors->has('phone') ? 'form-control is-invalid' : 'form-control'])!!}
        @if ($errors->has('phone'))
            {!! showErrorMessage($errors, 'phone') !!}
        @endif
    </div>
    <div class="col-12 p-0 mt-3">
        {!! Form::label('supplierAddress', 'Alamat Supplier') !!}
        {!! Form::textarea('address', null, ['id' => 'supplierAddress', 'class' => $errors->has('address') ? 'form-control is-invalid' : 'form-control'])!!}
        @if ($errors->has('address'))
            {!! showErrorMessage($errors, 'address') !!}
        @endif
    </div>
</div>