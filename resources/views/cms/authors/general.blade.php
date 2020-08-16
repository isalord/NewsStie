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
                            <form role="form" method="post" action="{{route("author.con.store")}}">
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
                                    <div class="col-sm-9">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>First name</label>
                                            <input name="first_name" value="{{old('first_name')}}" type="text"
                                                   class="form-control" placeholder="Enter First Name ...">
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-sm-9">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>last name</label>
                                            <input name="last_name" value="{{old('last_name')}}" type="text"
                                                   class="form-control" placeholder="Enter Last Name ...">
                                        </div>
                                    </div>

                                </div>

                        <div class="row">
                            <div class="col-sm-9">
                                <!-- text input -->
                                <div class="form-group">
                                    <label>Email</label>
                                    <input name="email" value="{{old('email')}}" type="email"
                                           class="form-control" placeholder="Enter email ...">
                                </div>
                            </div>

                        </div>

                                <div class="row">
                                    <div class="col-sm-9">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Mobile</label>
                                            <input name="mobile" value="{{old('mobile')}}" type="tel"
                                                   class="form-control" placeholder="Enter mobile ...">
                                        </div>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-sm-9">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input name="password" value="{{old('password')}}" type="password"
                                                   class="form-control" placeholder="Enter password ...">
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-sm-9">
                                        <!-- radio -->
                                        <div class="form-group">
                                            <div class="form-check">
                                                <input class="form-check-input" value="Male" type="radio" name="gender">
                                                <label class="form-check-label">Male</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input"value="Female" type="radio" name="gender" checked>
                                                <label class="form-check-label">Female</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="custom-control custom-switch">
                                        <input name="status"
                                               @if(old("status")=='Active')
                                               checked
                                               @endif
                                               type="checkbox" class="custom-control-input" id="customSwitch1">
                                        <label class="custom-control-label" for="customSwitch1">Author status</label>
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
