@extends("cms.main")
@section("title", "Forms")
<style>
    .error{
        color: red;
    }
    .valid{
        color: #00A000;
    }
</style>
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
                            <form role="form" id="creat_category_form" method="post" action="{{route("cat.con.store")}}">
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
                                @if(session()->has('status') && session()->has('message'))
                                    @if(session()->get('status'))
                                        <div class="alert alert-success" role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                           {{session()->get('message')}}
                                        </div>
                                        @else
                                        <div class="alert alert-danger">
                                        {{session()->get('message')}}
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        @endif

                                    @endif

                                <div class="row">
                                    <div class="col-sm-9">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Title</label>
                                            <input name="cat_title" value="{{old('cat_title')}}"  type="text" class="form-control" placeholder="Enter title ...">
                                        </div>
                                    </div>

                                    </div>

                                <div class="row">
                                    <div class="col-sm-9">
                                        <!-- textarea -->
                                        <div class="form-group">
                                            <label>Category details</label>
                                            <textarea name="cat_details" class="form-control" rows="3" placeholder="Enter details...">{{old('cat_title')}}</textarea>
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
        $('#creat_category_form').validate({
            errorClass:"error",
            validClass:"valid",
            rules:{
                cat_title:{
                    required:true,
                    minLength:3,
                    maxlength:10
                },
                cat_details:{
                    required:true,
                    minlength:3,
                    maxlength:100
                }
            },
            messages:{
                cat_title:{
                    required:'please enter title',
                    minlength:'minimun chracters is 3',
                    maxlength:'maxumu chracturs is 20'
                },
                cat_details:{
                    required:'please enter details',
                    minlength:'minimun chracters is 3',
                    maxlength:'maxumu chracturs is 100'
                }
            }
        })
    </script>

    @endsection
