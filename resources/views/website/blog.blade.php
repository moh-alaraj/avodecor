
@extends('website.layout.app')

@section('main-content')

    <style>
        .but{
            background-color: #BC264F;
            color: white;
            margin-left: 600px;
            margin-bottom: 10px;
        }
    </style>

    @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif
        <section class="blog" style="padding-top: 3rem;">
            <div class="container">
                <a class="Titel">المدونة</a>

                <div class="table-toolbar mb-3">
                    <a href="{{ route('admin.blog') }}" class="btn but">إنشاء مدونة</a>
                </div>

                <div class="row">
                    @foreach($blogs as $blog)
                    <div class="col-lg-3 col-md-4">
                        <div class="card-blog">
                            <div class="blog-img">
                                <img src="{{$blog->image_link}}" alt="">
                            </div>
                            <h1>{{$blog->title}}</h1>
                            <p>{{$blog->short}}</p>
                            <div class="row">
                                <span class="col-lg-6 col"><i class="fas fa-calendar-alt" aria-hidden="true"></i>
                                   {{$blog->created_at->toDateString()}}</span>
                                <a href="{{route('website.blog-d',$blog->slug)}}" class="col-lg-6 col">عرض المزيد</a>

                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
            <div class="center">
                <div class="pagination">
                    <a href="#"><i class="fas fa-chevron-left" aria-hidden="true"></i></a>
                    <a href="#" class="active">1</a>
                    <a href="#">2</a>
                    <a href="#">3</a>
                    <a href="#">4</a>
                    <a href="#">5</a>
                    <a href="#"><i class="fas fa-chevron-right" aria-hidden="true"></i></a>
                </div>
            </div>
        </section>

@endsection
