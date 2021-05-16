<script src="{{asset('admin/vendor/datatables_jquery/datatables.js')}}"></script>
<script>
    let table
    let url = "{{ route('products.admin.datatable') }}"
    console.log(`datatable suppliers ${url}`)
    datatable(url)

    function datatable (url){
        table = $('#productDatatable').DataTable({
            processing: true,
            serverSide: true,
            ajax: url,
            columns: [
                {data: 'DT_RowIndex', name: 'no',orderable: false, searchable: false},
                {data: 'name', name: 'name'},
                {data: 'price', name: 'price'},
                {data: 'unit', name: 'unit'},
                {data: 'supplier.name', name: 'supplier'},
                {data: 'action', name: 'action', orderable: false, searchable: false}
            ],
            order: [[ 1, "desc" ]],
            columnDefs: [
                {
                    targets:  '_all',
                    className: 'align-middle'
                }
            ],
            language: {
                search: "",
                searchPlaceholder: "Cari"
            },
        });
    }

</script>
