<div class="col-12 p-0">
    @if (\Request::route()->getName() == 'products.admin.edit')
        {!! Form::label('supplierName', 'Nama Supplier') !!}
        {!! Form::text('supplier_name', $supplier, ['id' => 'supplierName', 'class' => 'form-control', 'disabled' => true]) !!} 
    @else
        {!! Form::label('supplierName', 'Nama Supplier') !!}
        {!! Form::select('supplier_id', $suppliers, null, ['id' => 'supplierName', 'class' => $errors->has('supplier_id') ? 'form-control is-invalid' : 'form-control']) !!}
        @if ($errors->has('supplier_id'))
            {!! showErrorMessage($errors, 'supplier_id') !!}
        @endif
    @endif
</div>
<div class="col-12 p-0 mt-3">
    {!! Form::label('productName', 'Nama Bahan Baku') !!}
    {!! Form::text('name', null, ['id' => 'productName', 'class' => $errors->has('name') ? 'form-control is-invalid' : 'form-control'])!!}
    @if ($errors->has('name'))
        {!! showErrorMessage($errors, 'name') !!}
    @endif
</div>
<div class="col-12 p-0 mt-3">
    {!! Form::label('supplierUnit', 'Satuan') !!}
    {!! Form::select('unit', $units, null, ['id' => 'supplierUnit', 'class' => $errors->has('unit') ? 'form-control is-invalid' : 'form-control']) !!}
    @if ($errors->has('unit'))
        {!! showErrorMessage($errors, 'unit') !!}
    @endif
</div>
<div class="col-12 p-0 mt-3">
    {!! Form::label('supplierPrice', 'Harga') !!}
    {!! Form::number('price', null, ['id' => 'supplierPrice', 'class' => $errors->has('price') ? 'form-control is-invalid' : 'form-control'])!!}
    @if ($errors->has('price'))
        {!! showErrorMessage($errors, 'price') !!}
    @endif
</div>