@extends("backend.master.main-layout")
@section("page-title","Module")
@section("main-content")
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Module</h1>
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
                                <h3 class="card-title">Module List</h3>
                                <a href="{{route('module.create')}}" class="btn btn-primary float-right text-white">
                                    <i class="fas fa-plus-circle"></i>
                                    Add New
                                </a>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive">
                                <table class="table table-bordered table-hover table-striped">
                                    <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>Id</th>
                                        <th>Created By</th>
                                        <th>Updated By</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($modules as $module)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{ $module->name }}</td>
                                        <td>{{ $module->description }}</td>
                                        <td>{{$module->id}}</td>
                                        <td>{{ $module->createdBy->name ?? '' }}</td>
                                        <td>{{ $module->updatedBy->name ?? '' }}</td>
                                        <td class="text-center">
                                            @if($module->status == 1)
                                                <button class="btn btn-xs btn-success">Active</button>
                                                @else
                                                <button class="btn btn-xs btn-danger">Inactive</button>
                                                @endif
                                        </td>
                                        <td class="text-center">
                                            @if(!empty($aclList[4][3]) || !empty($aclList[4][4]))
                                            <form method="post" action="{{ route('module.destroy',$module->id) }}">
                                                @if(!empty($aclList[4][3]))
                                                <a class="btn btn-xs btn-warning text-white" href="{{route('module.edit',$module->id)}}" title="Edit">
                                                    <i class="fas fa-pencil-alt"></i>
                                                </a>
                                                @endif
                                                    @if(!empty($aclList[4][4]))
                                                @method('delete')
                                                @csrf
                                                <button type="submit" class="btn btn-xs btn-danger text-white delete" title="Delete">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                                @endif
                                            </form>
                                                @endif
                                        </td>
                                    </tr>
                                        @empty
                                        <tr>
                                            <td colspan="8" class="text-center">Nothing Found</td>
                                        </tr>
                                        @endforelse

                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer clearfix text-right">
                                {{$modules->links("backend.include.pagination")}}
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
