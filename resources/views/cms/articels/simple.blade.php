@extends("cms.main")
@section("style")
    <link rel="stylesheet" href="{{asset("cms/plugins/fontawesome-free/css/all.min.css")}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset("cms/dist/css/adminlte.min.css")}}">
@endsection
@section("title", "Table")
@section("content")
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Simple Tables</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Simple Tables</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">


            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-12">
                    <div class="card">

                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Authors</th>
                                    <th>Short desc.</th>
                                    <th>Full desc.</th>
                                    <th>Status</th>
                                    <th>Created at</th>
                                    <th>Settings</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($articels as $articels)
                                    <tr>
                                        <td><img width="100" height="100" src="{{url('images/articels/'.$articels->image)}}"></td>
                                        <td>{{$articels->id}}</td>
                                        <td>{{$articels->title}}</td>
                                        <td>
                                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                                    data-target=".category_{{$articels->category_id}}">{{$articels->category->title}}</button>
                                            <div class="modal fade category_{{$articels->category_id}}" tabindex="-1"
                                                 role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <section class="content">
                                                            <div class="container-fluid">
                                                                <div class="row">
                                                                </div>
                                                                <!-- /.row -->
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <div class="card">

                                                                            <div class="card-body table-responsive p-0">
                                                                                <table class="table table-hover">
                                                                                    <thead>
                                                                                    <tr>
                                                                                        <th>ID</th>
                                                                                        <th>Title</th>
                                                                                        <th>Details</th>
                                                                                        <th>Status</th>
                                                                                        <th>Created at</th>
                                                                                    </tr>
                                                                                    </thead>
                                                                                    <tbody>

                                                                                    <tr>
                                                                                        <td>{{$articels->category->id}}</td>
                                                                                        <td>{{$articels->category->title}}</td>
                                                                                        <td>{{$articels->category->details}}</td>
                                                                                        @if($articels->category->visibility_status=="visible")
                                                                                            <td style="color: green">{{$articels->category->visibility_status}}</td>
                                                                                        @else
                                                                                            <td style="color: red">{{$articels->category->visibility_status}}</td>
                                                                                        @endif
                                                                                        <td>{{$articels->category->created_at}}</td>
                                                                                    </tr>
                                                                                    </tbody>

                                                                                </table>
                                                                            </div>
                                                                            <!-- /.card-body -->
                                                                        </div>
                                                                        <!-- /.card -->
                                                                    </div>
                                                                </div>
                                                                <!-- /.row -->
                                                            </div><!-- /.container-fluid -->
                                                        </section>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                                    data-target=".author_{{$articels->author_id}}">{{$articels->author->first_name.' '.$articels->author->last_name}}</button>
                                            <div class="modal fade author_{{$articels->author_id}}" tabindex="-1"
                                                 role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <section class="content">
                                                            <div class="container-fluid">
                                                                <!-- /.row -->
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <div class="card">
                                                                            <div class="card-body table-responsive p-0">
                                                                                <table class="table table-hover">
                                                                                    <thead>
                                                                                    <tr>
                                                                                        <th>ID</th>
                                                                                        <th>First Name</th>
                                                                                        <th>Last Name</th>
                                                                                        <th>Email</th>
                                                                                        <th>Mobile</th>
                                                                                        <th>Gender</th>
                                                                                        <th>Status</th>
                                                                                        <th>Created at</th>
                                                                                    </tr>
                                                                                    </thead>
                                                                                    <tbody>
                                                                                    <tr>
                                                                                        <td>{{$articels->author->id}}</td>
                                                                                        <td>{{$articels->author->first_name}}</td>
                                                                                        <td>{{$articels->author->last_name}}</td>
                                                                                        <td>{{$articels->author->email}}</td>
                                                                                        <td>{{$articels->author->mobile}}</td>
                                                                                        @if($articels->author->gender=="M")
                                                                                            <td style="color: green">
                                                                                                Male
                                                                                            </td>
                                                                                        @else
                                                                                            <td style="color: hotpink">
                                                                                                Female
                                                                                            </td>
                                                                                        @endif
                                                                                        @if($articels->author->status=="Active")
                                                                                            <td style="color: green">
                                                                                                Active
                                                                                            </td>
                                                                                        @else
                                                                                            <td style="color: red">
                                                                                                Blocked
                                                                                            </td>
                                                                                        @endif
                                                                                        <td>{{$articels->author->created_at}}</td>
                                                                                    </tr>
                                                                                    </tbody>
                                                                                </table>
                                                                            </div>
                                                                            <!-- /.card-body -->
                                                                        </div>
                                                                        <!-- /.card -->
                                                                    </div>
                                                                </div>
                                                                <!-- /.row -->
                                                            </div><!-- /.container-fluid -->
                                                        </section>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>{{$articels->short_desc}}</td>
                                        <td>{{$articels->full_desc}}</td>
                                        @if($articels->visibility_status=="visible")
                                            <td style="color: green">{{$articels->visibility_status}}</td>
                                        @else
                                            <td style="color: red">{{$articels->visibility_status}}</td>
                                        @endif
                                        <td>{{$articels->created_at}}</td>
                                        <td>
                                            <ul>
                                                <li><a href="{{route('art.con.edit',[$articels->id])}}">Edit</a></li>
                                                <li><a style="color: red"
                                                       href="{{route('art.con.destroy',[$articels->id])}}">Delete</a>
                                                </li>
                                            </ul>
                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>

                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!-- /.row -->

        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection

@section("script")
    <script src="{{asset("cms/dist/js/demo.js")}}"></script>

@endsection
