@extends("backend.master.main-layout")
@section("page-title","User")
@section("main-content")

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">User</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            {{--<li class="breadcrumb-item"><a href="#">Home</a></li>--}}
                            {{--<li class="breadcrumb-item active">Starter Page</li>--}}
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">User List</h3>
                                <a href="{{route('user.create')}}" class="btn btn-primary float-right text-white">
                                    <i class="fas fa-plus-circle"></i>
                                    Add New
                                </a>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body ">
                                <form id="filterForm">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="name" id="name" placeholder="Enter User Name">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <button type="submit" class="btn btn-dark">Search</button>
                                        </div>
                                    </div>
                                </form>
                                <div>
                                    <table class="table table-bordered table-hover table-striped" id="dTable">
                                        <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th>Photo</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Contact No</th>
                                            <th>role</th>
                                            <th>Created By</th>
                                            <th>Updated By</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody></tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
@endsection

@section('js')
    <script>
        $(document).ready( function () {
            let formData = {};

            function loadDataTable(formData){
                $('#dTable').dataTable({
                    dom: 'Blrtip',
                    // dom: 'Blfrtip',
                    buttons: [
                        {
                            extend: 'print',
                            title: 'User List - {{date("d-m-Y")}}',
                            exportOptions: {
                                stripHtml : false,
                                columns: [ 0, 1, 2,3,4, 5 ],
                            }
                        },
                        {
                            extend: 'excelHtml5',
                            title: 'User List - {{date("d-m-Y")}}',
                            exportOptions: {
                                columns: [ 0, 1, 2,3,4, 5 ]
                            }
                        },
                        {
                            extend: 'pdfHtml5',
                            title: 'User List - {{date("d-m-Y")}}',
                            exportOptions: {
                                columns: [ 0, 1, 2,3,4, 5 ]
                            }
                        }
                    ],
                    'processing': true,
                    'serverSide': true,
                    // 'serverMethod': 'post',
                    "pageLength": 20,
                    "lengthMenu": [[10, 20,30,40, 50,100, -1], [10, 20,30,40, 50,100, "All"]],

                    "bSort" : false,
                    "language": {

                        // Change the Pagination button labels
                        "paginate": {
                            "first": "First",
                            "last": "Last",
                            "previous": "Previous",
                            "next": "Next",
                        }
                    },
                    'ajax': {
                        'url':'{{route("user.index")}}',
                        "type": "GET",
                        "data": formData
                    },
                    'columns': [
                        {
                            "title": "Sl",
                            render: function (data, type, row, meta) {
                                return meta.row + meta.settings._iDisplayStart + 1;
                            }
                        },
                        { "data": function ( data, type, row ) {
                                if(!data.photo){
                                    return '';
                                }
                                return '<img width="100" src="'+data.photo+'"/>';
                            }
                        },
                        { data: 'name' },
                        { data: 'email' },
                        { data: 'contact_no' },
                        { data: 'role.name' },
                        { data: 'creator.name' },
                        { data: 'updator.name' },
                        { "data": function ( data, type, row ) {
                                let status = '<span class="btn btn-danger btn-xs">Inactive</span>';
                                if (data.status === 1){
                                    status = '<span class="btn btn-success btn-xs">Active</span>';
                                }
                                return status;
                            }
                        },
                        {data: 'actions'},
                    ]
                });
            }

            loadDataTable();

            $('#filterForm').on('submit',function (event) {
                event.preventDefault();
                formData = getFormData($(this));

                $('#dTable').DataTable().destroy();
                loadDataTable(formData);
            });

            function getFormData($form){
                let unindexed_array = $form.serializeArray();
                let indexed_array = {};

                $.map(unindexed_array, function(n, i){
                    indexed_array[n['name']] = n['value'];
                });

                return indexed_array;
            }

            $(document).on('input','#name',function (){
                $('#filterForm').submit();
            });
        });
    </script>
    @endsection
