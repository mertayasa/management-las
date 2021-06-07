<script src="{{asset('admin/vendor/datatables_jquery/datatables.js')}}"></script>

<script>

    let table


    let url = "{{ route('suppliers.admin.datatable') }}"
    console.log(`datatable suppliers ${url}`)

    datatable(url)



    function datatable (url){

        let column = [
            {data: 'DT_RowIndex', name: 'no',orderable: false, searchable: false},
            {data: 'name', name: 'name'},
            {data: 'phone', name: 'phone'},
            {data: 'address', name: 'address'},
        ]
        
        @if (Auth::user()->level == 0)
            column.push({data: 'action', name: 'action', orderable: false, searchable: false})
        @endif

        table = $('#supplierDatatable').DataTable({
            processing: true,
            serverSide: true,
            ajax: url,
            columns: column,
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
