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
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Email</th>
                                    <th>Mobile</th>
                                    <th>Gender</th>
                                    <th>Articles Num.</th>
                                    <th>Status</th>
                                    <th>Created at</th>
                                    <th>Settings</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($authors as $author)
                                    <tr>
                                        <td>{{$author->id}}</td>
                                        <td>{{$author->first_name}}</td>
                                        <td>{{$author->last_name}}</td>
                                        <td>{{$author->email}}</td>
                                        <td>{{$author->mobile}}</td>
                                        @if($author->gender=="M")
                                            <td style="color: green">Male</td>
                                        @else
                                            <td style="color: hotpink">Female</td>
                                        @endif
                                        <td>{{$author->articels_count}}</td>
                                        @if($author->status=="Active")
                                            <td style="color: green">Active</td>
                                        @else
                                            <td style="color: red">Blocked</td>
                                        @endif
                                        <td>{{$author->created_at}}</td>
                                        <td>
                                            <ul>
                                                <li><a href="{{route('author.con.edit',[$author->id])}}">Edit</a></li>
                                                <li><a style="color: red"
                                                       href="{{route('author.con.destroy',[$author->id])}}">Delete</a>
                                                </li>
                                                @if($author->articels_count >0)
                                                <li><a style="color: red"
                                                       href="{{route('author.con.art',[$author->id])}}">ِArticles</a>
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
