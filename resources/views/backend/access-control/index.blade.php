@extends("backend.master.main-layout")
@section("page-title","Role-Access")
@section("main-content")
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Role Access</h1>
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
                                <h3 class="card-title">Role Access Control</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive">
                                <form method="post" action="{{url('/roleacl')}}" class="form-horizontal">
                                    @csrf
                                    <div class="row">

                                        <div class="col-md-4">
                                            <div class="form-group select2-parent">
                                                <label>Select Role</label>
                                                <select name="role_id" id="role_id" class="form-control js-source-states single-select2" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                                    @foreach($roleList as $key => $name)
                                                        <option value="{{$key}}">{{$name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="access-control-setup">
                                        <!--AJAX content will be loaded here-->
                                    </div>
                                </form>
                            </div>
                            <!-- /.card-body -->
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
    <script type="text/javascript" lang="javascript">
        $(document).ready(function () {

            $("#role_id").change(function () {
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    type: "POST",
                    url: "{!! URL::to('roleAclSetup') !!}",
                    data: {role_id: $("#role_id").val(), _token : _token},
                    dataType: "text",
                    cache: false,
                    success:
                        function (data) {
                            $("#access-control-setup").html(data);
                            $(".cancel").click(function () {
                                history.go(-1);
                            });
                        }
                });
                return false;
            });

            //check/uncheck all
            $(document).on("change", '#access_table .m_activity', function () {
                var columnId = $(this).data('column-id');
                if ($(this).prop('checked')) {
                    $('.activity_' + columnId).prop('checked', true);
                } else {
                    $('.activity_' + columnId).prop('checked', false);
                }
            });

            $(document).on("change", '.activitycell', function () {
                var columnId = $(this).data('column-id');
                if ($('.activity_' + columnId + ':checked').length == $('.activity_' + columnId).length) {
                    $('#activity_header_' + columnId).prop('checked', true);
                } else {
                    $('#activity_header_' + columnId).prop('checked', false);
                }
            });

        });
    </script>
    @endsection
