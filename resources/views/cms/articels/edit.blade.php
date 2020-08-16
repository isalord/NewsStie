@extends("cms.main")
@section("title", "Forms")
@section("content")
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Articles</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Edit Articles</li>
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
                            <h3 class="card-title">Edit Articles</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form role="form" method="post" action="{{route("art.con.update",[$articel->id])}}"
                                  enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
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
                                                @foreach($categories as $category)
                                                    <option value="{{$category->id}}"
                                                            @if($articel->category_id ==$category->id) selected @endif>{{$category->title}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Select Author</label>
                                        <select class="form-control" name="author_id">
                                            <option value="-1">Select Author</option>
                                            @foreach($authors as $author)
                                                <option
                                                    value="{{$author->id}}"
                                                     @if( old('author_id'))@if (old('author_id')==$author->id) selected @endif @endif>{{$author->first_name.' '.$author->last_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-9">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Articel title</label>
                                            <input name="art_title" value="{{$articel->title}}" type="text"
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
                                                      placeholder="Enter short description...">{{$articel->short_desc}}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-9">
                                        <!-- textarea -->
                                        <div class="form-group">
                                            <label>Full Description</label>
                                            <textarea name="art_full" class="form-control" rows="3"
                                                      placeholder="Enter full description...">{{$articel->full_desc}}</textarea>
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
                                               @if($articel->visibility_status =='visible')
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

@endsection
