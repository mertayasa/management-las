<script src="{{asset('admin/vendor/datatables_jquery/datatables.js')}}"></script>

<script>

    let table


    let url = "{{ route('projects.admin.datatable') }}"
    // console.log(`datatable suppliers ${url}`)

    datatable(url)



    function datatable (url){

        table = $('#projectDatatable').DataTable({
            processing: true,
            serverSide: true,
            responsive: true,
            ajax: url,
            columns: [
                {data: 'DT_RowIndex', name: 'no',orderable: false, searchable: false},
                {data: 'name', name: 'name'},
                {data: 'start', name: 'start'},
                {data: 'end', name: 'end'},
                {data: 'type', name: 'type'},
                {data: 'progress', name: 'progress', orderable: false},
                {data: 'detail', name: 'detail'},
                {data: 'assembly_charge', name: 'assembly_charge'},
                {data: 'product_total', name: 'product_total'},
                {data: 'worker_salary', name: 'worker_salary'},
                {data: 'total', name: 'total'},
                {data: 'action', name: 'action', orderable: false, searchable: false}
            ],
            order: [[ 1, "desc" ]],
            columnDefs: [
                { "width": "50%", "targets": 5 },
                {
                    targets:  '_all',
                    className: 'align-middle'
                },
                {
                    responsivePriority: 2, targets: 11
                },
            ],
            language: {
                search: "",
                searchPlaceholder: "Cari"
            },
        });
    }

</script>
