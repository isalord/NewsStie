@extends("cms.main")
<style>
    .error{
        color: red;
    }
    .valid{
        color: #00A000;
    }
</style>

@section("title", "Forms")
@section("content")
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Creat Articles</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Creat Articles</li>
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
                            <h3 class="card-title">Creat Articles</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form id="articel_creat_form" role="form"  method="post" action="{{route("art.con.store")}}" enctype="multipart/form-data">
                                @csrf
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
                                    <div class="col-sm-6">
                                        <!-- select -->
                                        <div class="form-group">
                                            <label>Select Category</label>
                                            <select class="form-control" name="category_id">
                                                <option value="-1">Select Category</option>
                                                @foreach($categories as $category)
                                                    <option value="{{$category->id}}">{{$category->title}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <!-- select -->
                                        <div class="form-group">
                                            <label>Select Author</label>
                                            <select class="form-control" name="author_id">
                                                <option value="-1">Select Author</option>
                                                @foreach($authors as $author)
                                                    <option
                                                        value="{{$author->id}}">{{$author->first_name.' '.$author->last_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-9">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Articel title</label>
                                            <input name="art_title" value="{{old('art_title')}}" type="text"
                                                   class="form-control" placeholder="Enter title ...">
                                        </div>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-sm-9">
                                        <!-- textarea -->
                                        <div class="form-group">
                                            <label>Short Description</label>
                                            <textarea name="art_short" class="form-control" rows="3"
                                                      placeholder="Enter short description...">{{old('art_short')}}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-9">
                                        <!-- textarea -->
                                        <div class="form-group">
                                            <label>Full Description</label>
                                            <textarea name="art_full" class="form-control" rows="3"
                                                      placeholder="Enter full description...">{{old('art_full')}}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-9">
                                <div class="form-group">
                                    <label for="customFile">Article image</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="articel_image">
                                        <label class="custom-file-label" for="customFile">Choose file</label>
                                    </div>
                                </div>
                                </div>
                                <div class="form-group">
                                    <div class="custom-control custom-switch">
                                        <input name="visibility_status"
                                               @if(old("visibility_status")=='on')
                                               checked
                                               @endif
                                               type="checkbox" class="custom-control-input" id="customSwitch1">
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

    <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
    <script>
        $.validator.addMethod("notEquals", function (value, element, arg) {
            return arg != value;
        },"Value must not equal arg");
        $('#articel_creat_form').validate({
            errorClass: "error",
            validClass: "valid",
            rules: {
                category_id: {
                    notEquals:"-1"
            },
                author_id: {
                    notEquals:"-1"
                },
                art_title:{
                    required:true,
                    minlength:3
                },
                art_short:{
                    required:true,
                    minlength:3
                },
                art_full:{
                    required:true,
                    minlength:3
                },
                articel_image:{
                    required:true
                }

            },
        messages: {
            category_id: {
                notEquals: "please select category"
            },
            author_id: {
                notEquals: "please select author"
            },
            art_title:{
                required:"please enter title",
                minlength:'min chartcters is 3'
            },
            art_short:{
                required:"please enter short desc.",
                minlength:'min chartcters is 3'
            },
            art_full:{
                required:"please enter full desc.",
                minlength:'min chartcters is 3'
            },
            articel_image:{
                required:"please select image"
            }
        }
        })
    </script>

@endsection
