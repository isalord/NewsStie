@extends("website.main")
@section("title","All news")
@section("content")
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <h1 class="mt-4 mb-3">{{$category->title}}</h1>

        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{route("home")}}">Home</a>
            </li>
            <li class="breadcrumb-item active">{{$category->title}}</li>
        </ol>
        @foreach($category->articels as $articel)
            <div class="row">
                <div class="col-md-7">
                    <a href="#">
                        <img class="img-fluid full-width h-200 rounded mb-3 mb-md-0"
                             src="{{url('images/articels/'.$articel->image)}}" alt="">
                    </a>
                    <br><br>
                </div>

                <div class="col-md-5">
                    <h3>{{$articel->title}}</h3>
                    <p>{{$articel->short_desc}}</p>
                    <a class="btn btn-primary" href="{{route('news_de',[$articel->id])}}">Read more..
                        <span class="glyphicon glyphicon-chevron-right"></span>
                    </a>
                    <br><br>
                </div>

            </div>
        @endforeach
        <hr>


        <!-- Pagination -->
        <ul class="pagination justify-content-center">
            <li class="page-item">
                <a class="page-link" href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                    <span class="sr-only">Previous</span>
                </a>
            </li>
            <li class="page-item">
                <a class="page-link" href="">1</a>
            </li>
            <li class="page-item">
                <a class="page-link" href="">2</a>
            </li>
            <li class="page-item">
                <a class="page-link" href="">3</a>
            </li>
            <li class="page-item">
                <a class="page-link" href="" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                    <span class="sr-only">Next</span>
                </a>
            </li>
        </ul>

    </div>
@endsection
