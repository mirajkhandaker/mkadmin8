@extends("backend.master.main-layout")
@section("page-title","Site Setting")
@section("main-content")
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Settings</h1>
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
                    <div class="col-md-8 offset-md-2">
                        <div class="card card-dark">
                            <div class="card-header">
                                <h3 class="card-title">Edit Settings</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form method="post" action="{{route("site.setting.update")}}" id="slider_form" enctype="multipart/form-data">
                                @method('put')
                                @csrf

                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="site_title">Site Title</label>
                                                <input type="text" class="form-control {{$errors->has("site_title") ? "is-invalid":""}}" id="site_title" name="site_title" placeholder="Enter site title" value="{{old("site_title",$setting->site_title)}}">
                                                <span class="text-danger"> {{$errors->has("site_title") ? $errors->first("site_title") : ""}} </span>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="email">Email</label>
                                                <input type="email" class="form-control {{$errors->has("email") ? "is-invalid":""}}" id="tag_line" name="email" placeholder="Enter email" value="{{old("email",$setting->email)}}"  required>
                                                <span class="text-danger"> {{$errors->has("email") ? $errors->first("email") : ""}} </span>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="contact_no">Contact number</label>
                                                <input type="text" class="form-control {{$errors->has("contact_no") ? "is-invalid":""}}" id="contact_no" name="contact_no" placeholder="Enter contact number" value="{{old("contact_no",$setting->contact_no)}}">
                                                <span class="text-danger"> {{$errors->has("contact_no") ? $errors->first("contact_no") : ""}} </span>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="copy_right">Copy Right</label>
                                                <input type="text" class="form-control {{$errors->has("copy_right") ? "is-invalid":""}}" id="copy_right" name="copy_right" placeholder="" value="{{old("copy_right",$setting->copy_right)}}">
                                                <span class="text-danger"> {{$errors->has("copy_right") ? $errors->first("copy_right") : ""}} </span>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="meta_description">Meta Description</label>
                                                <textarea class="form-control {{$errors->has("meta_description") ? "is-invalid":""}}" id="meta_description" name="meta_description" placeholder="Enter meta description" maxlength="180">{{old("meta_description",$setting->meta_description)}}</textarea>

                                                <span class="text-danger"> {{$errors->has("contact_no") ? $errors->first("contact_no") : ""}} </span>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="meta_keyword">Meta Keywordst</label>
                                                <input type="text" class="form-control {{$errors->has("meta_keyword") ? "is-invalid":""}}" id="meta_keyword" name="meta_keyword" placeholder="" value="{{old("meta_keyword",$setting->meta_keyword)}}">
                                                <span class="text-danger"> {{$errors->has("meta_keyword") ? $errors->first("meta_keyword") : ""}} </span>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <label>
                                                Upload Icon (50x50)
                                            </label>
                                            <p><input type="file"  accept="image/*" name="icon" class="image" id="image" style="display: none;"></p>
                                            <p><label for="image" style="cursor: pointer;">
                                                    @if(!$setting->icon)
                                                        <img id="output" src="{{asset('/public/demo-pic/upload-image.jpg')}}" width="180"/>
                                                    @else
                                                        <img id="output" src="{{asset($setting->icon)}}" width="180"/>
                                                    @endif
                                                </label></p>
                                            <span class="text-danger"> {{$errors->has("icon") ? $errors->first("icon") : ""}} </span>
                                        </div>

                                        <div class="col-md-6">
                                            <label>
                                                Upload Company Logo (128x128)
                                            </label>
                                            <p><input type="file"  accept="image/*" name="logo" class="logo" id="logo" style="display: none;"></p>
                                            <p><label for="logo" style="cursor: pointer;">
                                                    @if(!$setting->logo)
                                                        <img id="outputLogo" src="{{asset('/public/demo-pic/upload-image.jpg')}}" width="180"/>
                                                    @else
                                                        <img id="outputLogo" src="{{asset($setting->logo)}}" width="180"/>
                                                    @endif
                                                </label></p>
                                            <span class="text-danger"> {{$errors->has("logo") ? $errors->first("logo") : ""}} </span>
                                        </div>

                                    </div>
                                </div>


                                <!-- /.card-body -->

                                <div class="card-footer text-right">
                                    <button type="submit" class="btn btn-dark">Submit</button>
                                    <!-- <button type="button" class="btn btn-default cancel">Cancel</button> -->
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
@endsection
