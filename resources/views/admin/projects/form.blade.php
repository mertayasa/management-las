@push('styles')
    <link href="{{asset('select2/dist/css/select2.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="{{asset('select2/dist/css/select2-bootstrap4.css')}}">
@endpush

{{-- Projects Summary --}}
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
        
            <div class="col-12 p-0 mt-3">
                {!! Form::label('projectType', 'Jenis Pengerjaan') !!}
                {!! Form::select('type', [0 => 'Borongan', 1 => 'Harian'], null, ['id' => 'projectType', 'onchange' => 'hideOrShowWorker()', 'class' => $errors->has('type') ? 'form-control is-invalid' : 'form-control']) !!}
                @if ($errors->has('type'))
                    {!! showErrorMessage($errors, 'type') !!}
                @endif
            </div>
        </div>
    </div>
</div>

{{-- <hr> --}}
{{-- Worker --}}
<div class="content-link mt-5 d-none" id="workerMainContainer">
    <h4>Pegawai Proyek</h4>
    <hr>
    <div class="row">
        <div class="product-row col-12" id="workerContainer">

            {{-- pivot worker --}}

            <div class="row mt-3">
                <div class="col-4">
                    <div class="col-12 p-0">
                        {!! Form::label('productName', 'Nama Pegawai') !!}
                        {!! Form::text('worker[]', null, ['required', 'id' => '', 'class' => $errors->has('worker') ? 'form-control is-invalid' : 'form-control'])!!}
                    </div>
                </div>
                <div class="col-2">
                    <div class="col-12 p-0">
                        {!! Form::label('productCount', 'Jumlah Hari Kerja') !!}
                        {!! Form::number('worker_work_day[]', null, ['required', 'id' => '', 'class' => $errors->has('worker_work_day') ? 'form-control is-invalid' : 'form-control'])!!}
                    </div>
                </div>
                <div class="col-2">
                    <div class="col-12 p-0">
                        {!! Form::label('productSumPrice', 'Gaji Per Hari') !!}
                        {!! Form::number('worker_sallary_per_day[]', null, ['required', 'id' => '', 'class' => $errors->has('worker_sallary_per_day') ? 'form-control is-invalid' : 'form-control'])!!}
                    </div>
                </div>
                <div class="col-2">
                    <div class="col-12 p-0">
                        {!! Form::label('productSumPrice', 'Total Gaji') !!}
                        {!! Form::number('worker_total_sallary[]', null, ['required', 'id' => '', 'readonly', 'class' => $errors->has('worker_total_sallary') ? 'form-control is-invalid' : 'form-control'])!!}
                    </div>
                </div>
                <div class="col-2 pt-2">
                    <div class="pt-1"></div>
                    <button class="btn btn-sm btn-primary mt-4 py-1" type="button" onclick="addNewWorker()">Tambah Pegawai</button>
                </div>
            </div>

        </div>
    </div>

</div>

{{-- <hr> --}}
{{-- Product --}}
<div class="content-link mt-5">
    <h4>Bahan Baku Proyek</h4>
    <hr>
    <div class="row">
        <div class="product-row col-12" id="productContainer">
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

        </div>
    </div>

    {{-- <button class="btn btn-primary mt-3 text-right" type="button" onclick="addNewProduct()">Tambah Bahan Baku</button> --}}
</div>

{{-- <hr> --}}
{{-- Additional Info --}}
<div class="content-link mt-5">
    <h4>Detail & Biaya Proyek</h4>
    <hr>
    <div class="row">

        <div class="col-6">
            <div class="col-12 p-0">
                {!! Form::label('projectDetail', 'Detail Proyek') !!}
                {!! Form::textarea('detail', null, ['required', 'id' => 'projectDetail', 'class' => $errors->has('detail') ? 'form-control is-invalid' : 'form-control'])!!}
                @if ($errors->has('detail'))
                    {!! showErrorMessage($errors, 'detail') !!}
                @endif
            </div>
        </div>

        <div class="col-6">
            <div class="col-12 p-0">
                {!! Form::label('projectCharge', 'Biaya Pemasangan') !!}
                {!! Form::number('assembly_charge', null, ['required', 'id' => 'projectCharge', 'onchange' => 'countAssemblyCharge(this)', 'onkeyup' => 'countAssemblyCharge(this)', 'onfocusout' => 'setDefaultValue(this)', 'class' => $errors->has('assembly_charge') ? 'form-control is-invalid' : 'form-control'])!!}
                @if ($errors->has('assembly_charge'))
                    {!! showErrorMessage($errors, 'type') !!}
                @endif
            </div>

            <table align="left" class="mt-5 col-12 ">
                <tr>
                    <td class="text-left">Biaya Bahan Baku</td>
                    <td style="width: 30px; text-align:center"> : </td>
                    <td><span id="productTotalPrice">Rp 0</span></td>
                </tr>
                <tr>
                    <td class="text-left">Biaya Pemasangan</td>
                    <td style="width: 30px; text-align:center"> : </td>
                    <td><span id="assemblyChargeTotal">Rp 0</span></td>
                </tr>
                <tr>
                    <td class="text-left">Biaya Tukang</td>
                    <td style="width: 30px; text-align:center"> : </td>
                    <td><span id="workerChargeTotal">Rp 0</span></td>
                </tr>

                <tr class="border-top">
                    <td class="text-left" style="font-weight: bold">Total Biaya RAB</td>
                    <td style="width: 30px; text-align:center; font-weight: bold"> : </td>
                    <td style="font-weight: bold"><span id="RABTotalPrice">Rp 0</span></td>
                </tr>
            </table>
        </div>

    </div>
</div>

@push('scripts')
    <script src="{{asset('select2/dist/js/select2.js')}}"></script>
    <script>
        $('.initSelect2').select2({ theme: 'bootstrap4'});

        let productFieldCount = 1
        let withAdditionalWorker = 0
        let additionalWorkerCharge = 0
        let productCharge = 0
        let assemblyCharge = 0

        // ===========Product JS=============================================================================================================

        function addNewProduct(event){
            const rowProductElement = document.getElementById('pivot').nextElementSibling
            const clone = rowProductElement.cloneNode(true);
            const clonedInput = clone.querySelectorAll('input, select')
            const clonedSelect = clone.querySelectorAll('.product-id')

            let select2Class = `newSelect${productFieldCount+1}`
            clonedSelect[0].classList.add(select2Class)

            clonedInput.forEach(function(input) {
                input.setAttribute('name', `product${productFieldCount+1}[]`)
            });

            const productContainer = document.getElementById('productContainer')
            clone.classList.remove('d-none')
            productContainer.appendChild(clone)

            $(`.${select2Class}`).select2({ theme: 'bootstrap4'})

            productFieldCount++
        }

        function deleteProduct(element){
            const productDiv = element.parentElement.parentElement
            productDiv.remove()
            countTotalProductPrice()
        }

        function findProductPrice(element){
            const priceColumn = element.parentElement.parentElement.parentElement.querySelectorAll('.product-price')[0];
            const qtyColumn = element.parentElement.parentElement.parentElement.querySelectorAll('.product-qty')[0];
            const sumPriceColumn = element.parentElement.parentElement.parentElement.querySelectorAll('.product-sum-price')[0];
            if(element.value.length > 0){
                $.ajax({
                    url:"{{url('products/price')}}" + '/' + element.value,
                    method:'get',
                    dataType:'json',
                    success:function(productPrice){
                        priceColumn.value = productPrice
                        qtyColumn.value = 1
                        sumPriceColumn.value = productPrice
                    }
                })
            }else{
                priceColumn.value = ''
                qtyColumn.value = ''
                sumPriceColumn.value = ''
            }

            setTimeout(() => {  countTotalProductPrice() }, 500);
        }

        function countSumPrice(element){
            const priceColumn = element.parentElement.parentElement.parentElement.querySelectorAll('.product-price')[0];
            const sumPriceColumn = element.parentElement.parentElement.parentElement.querySelectorAll('.product-sum-price')[0];
            if(element.value > 0){
                sumPriceColumn.value = element.value * priceColumn.value
            }else{
                sumPriceColumn.value = 1 * priceColumn.value
            }

            countTotalProductPrice()
        }

        function setDefaultValue(element){
            const productIdColumn = element.parentElement.parentElement.parentElement.querySelectorAll('.product-id')[0];
            if(element.value < 1 && productIdColumn.value.length > 0){
                element.value = 1
            }
        }

        function countTotalProductPrice(){
            const sumProductPriceElement = document.querySelectorAll('.product-sum-price')
            const productTotalPrice = document.getElementById('productTotalPrice')
            let sumProductPrice = 0

            for (var i = 0; i < sumProductPriceElement.length; i++) {
                let sumValue = sumProductPriceElement.item(i).value
                if(sumValue.length > 0){
                    sumProductPrice = parseInt(sumProductPrice) + parseInt(sumValue)
                }
            }

            const locale = 'id';
            const options = {style: 'currency', currency: 'idr', minimumFractionDigits: 0, maximumFractionDigits: 2};
            const formatter = new Intl.NumberFormat(locale, options);

            productTotalPrice.innerHTML = formatter.format(sumProductPrice)
            productCharge = sumProductPrice

            countRABTotalPrice()
        }



        // ===========Assembly JS=============================================================================================================


        function countAssemblyCharge(element){
            const assemblyChargeTotalElement = document.getElementById('assemblyChargeTotal')
            let assemblyChargeTotal = element.value

            const locale = 'id';
            const options = {style: 'currency', currency: 'idr', minimumFractionDigits: 0, maximumFractionDigits: 2};
            const formatter = new Intl.NumberFormat(locale, options);

            assemblyChargeTotalElement.innerHTML = formatter.format(assemblyChargeTotal > 0 ? assemblyChargeTotal : 0)
            assemblyCharge = assemblyChargeTotal

            countRABTotalPrice()
        }

        // ===========Total RAB JS=============================================================================================================

        function countRABTotalPrice(){
            const RABTotalPriceElement = document.getElementById('RABTotalPrice')

            const locale = 'id';
            const options = {style: 'currency', currency: 'idr', minimumFractionDigits: 0, maximumFractionDigits: 2};
            const formatter = new Intl.NumberFormat(locale, options);

            RABTotalPriceElement.innerHTML = formatter.format(parseInt(productCharge) + parseInt(assemblyCharge))
            
        }


        // ===========Worker JS=============================================================================================================


        function addNewWorker(event){
            const rowWorkerElement = document.getElementById('pivotWorker').nextElementSibling
            const clone = rowWorkerElement.cloneNode(true);
            const workerContainer = document.getElementById('workerContainer')
            clone.classList.remove('d-none')
            workerContainer.appendChild(clone)
        }

        function deleteWorker(element){
            const workerDiv = element.parentElement.parentElement
            workerDiv.remove()
        }

        function hideOrShowWorker(){
            let element = document.getElementById('projectType')
            let workerMainContainer = document.getElementById('workerMainContainer')

            if(element.value == 1){
                workerMainContainer.classList.remove('d-none')
                withAdditionalWorker = 1
            }

            if(element.value == 0){
                workerMainContainer.classList.add('d-none')
                withAdditionalWorker = 0
            }
        }

        // ===========Form Submit JS, actually it's JQuery=======================================================================================

        $('#newProjectForm').on('submit', function(event){
            event.preventDefault();
            $.ajax({
                url:'{{route('projects.admin.store')}}',
                method:'post',
                data:$(this).serialize(),
                dataType:'json',
                beforeSend:function(){
                    $('#submitFormBtn').attr('disabled','disabled');
                },
                success:function(data)
                {
                    console.log(data)
                    $('#submitFormBtn').attr('disabled', false);
                }
            })
        });

    </script>
@endpush