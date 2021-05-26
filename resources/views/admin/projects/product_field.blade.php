<div class="row">
    <div class="col-5">
        <div class="col-12 p-0">
            {!! Form::label('productName', 'Nama Barang') !!}
            {!! Form::select('product1[]', $products, null, ['required', 'placeholder' => 'Please Select', 'class' => 'form-control product-id initSelect2', 'onchange' => 'findProductPrice(this)']) !!}
        </div>
    </div>
    <div class="col-2">
        <div class="col-12 p-0">
            {!! Form::label('productPrice', 'Harga Barang') !!}
            {!! Form::number('product1[]', null, ['required', 'id' => '', 'readonly', 'class' => $errors->has('product_price') ? 'form-control is-invalid product-price' : 'form-control product-price'])!!}
        </div>
    </div>
    <div class="col-2">
        <div class="col-12 p-0">
            {!! Form::label('productCount', 'Jumlah Barang') !!}
            {!! Form::number('product1[]', null, ['required', 'id' => '', 'onchange' => 'countSumPrice(this)', 'onkeyup' => 'countSumPrice(this)', 'onfocusout' => 'setDefaultValue(this)', 'class' => $errors->has('product_count') ? 'form-control is-invalid product-qty' : 'form-control product-qty'])!!}
        </div>
    </div>
    <div class="col-2">
        <div class="col-12 p-0">
            {!! Form::label('productSumPrice', 'Harga X') !!}
            {!! Form::number('product1[]', null, ['required','id' => '', 'readonly', 'class' => $errors->has('product_count') ? 'form-control is-invalid product-sum-price' : 'form-control product-sum-price'])!!}
        </div>
    </div>
    <div class="col-1 pt-2">
        <div class="pt-1"></div>
        <button class="btn btn-sm btn-primary mt-4 py-1" type="button" onclick="addNewProduct()">+</button>
    </div>
</div>