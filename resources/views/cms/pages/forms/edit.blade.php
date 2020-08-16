@extends("cms.main")
@section("title", "Forms")
@section("content")
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>General Form</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">General Form</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->

                <!--/.col (left) -->
                <!-- right column -->
                <div class="col-md-12">
                    <!-- general form elements disabled -->
                    <div class="card card-warning">
                        <div class="card-header">
                            <h3 class="card-title">General Elements</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form role="form" method="post" action="{{route("cat.con.update",[$category->id])}}">
                                @csrf
                                @method("PUT")
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <div class="row">
                                    <div class="col-sm-9">
                                        <!-- text input -->
                                        <div class="form-group">

                                            <label>Title</label>
                                            <input name="cat_title" type="text" value="{{$category->title}}"
                                                   class="form-control" placeholder="Enter title ...">
                                        </div>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-sm-9">
                                        <!-- textarea -->
                                        <div class="form-group">
                                            <label>Category details</label>
                                            <textarea name="cat_details" class="form-control" rows="3"
                                                      placeholder="Enter details...">{{$category->details}}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="custom-control custom-switch">
                                        <input name="visibility_status" type="checkbox"
                                               @if($category->visibility_status =="visible")
                                               checked
                                               @endif
                                               class="custom-control-input" id="customSwitch1">
                                        <label class="custom-control-label" for="customSwitch1">visibility</label>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </form>
                        </div>
                    </div>

                </div>
                <!--/.col (right) -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection

@section("script")
    <script src="{{asset("cms/plugins/bs-custom-file-input/bs-custom-file-input.min.js")}}"></script>
    <script src="{{asset("cms/dist/js/adminlte.min.js")}}"></script>

@endsection
