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
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Details</th>
                                    <th>Articels Count</th>
                                    <th>Status</th>
                                    <th>Created at</th>
                                    <th>Settings</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($categories as $category)
                                    <tr>
                                        <td>{{$category->id}}</td>
                                        <td>{{$category->title}}</td>
                                        <td>{{$category->details}}</td>
                                        <td>{{$category->articels_count}}</td>
                                        @if($category->visibility_status=="visible")
                                            <td style="color: green">{{$category->visibility_status}}</td>
                                        @else
                                            <td style="color: red">{{$category->visibility_status}}</td>
                                        @endif
                                        <td>{{$category->created_at}}</td>
                                        <td>
                                            <ul>
                                                <li><a href="{{route('cat.con.edit',[$category->id])}}">Edit</a></li>
                                                <li><a style="color: red" href="{{route('cat.con.destroy',[$category->id])}}">Delete</a>
                                                @if($category->articels_count >0)
                                                <li><a style="color: red" href="{{route('cat.con.articel',[$category->id])}}">Articels</a>
                                                </li>
                                                    @endif
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
