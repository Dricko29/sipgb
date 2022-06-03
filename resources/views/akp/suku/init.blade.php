<script>

    $(document).ready(function () {
        $('#suku').DataTable({
                pageLength: 10,
                lengthChange: true,
                bFilter: true,
                destroy: true,
                processing: true,
                serverSide: true,
                oLanguage: {
                    sZeroRecords: "Tidak Ada Data",
                    sSearch: "Pencarian _INPUT_",
                    sLengthMenu: "_MENU_",
                    sInfo: "Menampilkan _START_ - _END_ dari _TOTAL_ data",
                    sInfoEmpty: "0 data",
                    oPaginate: {
                        sNext: "<i class='ri-arrow-right-line'></i>",
                        sPrevious: "<i class='ri-arrow-left-line'></i>"
                    }
                },
                ajax: {
                    url:"{{route('suku.index')}}",
                    type: "GET"
                            
                },
                columns: [
                    {
                        data: 'DT_RowIndex', 
                        orderable: false, 
                        searchable: false                                    
                    },                                   
                    {
                        data: 'nama',                                    
                    },                                   
                    {
                        data: 'action',  
                        orderable: false, 
                        searchable: false  
                    },    
                ]
        });
    });
</script>

    
