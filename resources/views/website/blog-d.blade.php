@extends('website.layout.app')

@section('main-content')
    <style>
        .par {
            margin-top: 100px;
            margin-bottom: 100px;
        }
    </style>
    <main style="background-color: white;">


        <section class="artical-detials">
            <div class="row">

                <div class="over-lay-detials-header">
                    <h1 class="par">{{$blogs->title}}</h1>
                    <br>
                    <br>
                    <div class="row">
                        <div class="par">
                            <p><i class="far fa-user"></i> {{$blogs->user->name}}</p>
                            <p><i class="fas fa-address-book"></i> {{$blogs->category->title}}</p>
                        </div>
                        <h3><i class="far fa-eye"></i> {{$blogs->views}}</h3>
                        <p><i class="far fa-calendar-alt"></i> {{$blogs->created_at->toDateString()}}</p>
                        {{--                                <div class="star-header">--}}
                        {{--                                        <!--================-->--}}
                        {{--                                        <span class="fa fa-star checked"></span>--}}
                        {{--                                        <span class="fa fa-star checked"></span>--}}
                        {{--                                        <span class="fa fa-star checked"></span>--}}
                        {{--                                        <span class="fa fa-star"></span>--}}
                        {{--                                        <span class="fa fa-star"></span>--}}

                        {{--                                </div>--}}
                    </div>
                </div>
                <img src="{{$blogs->image_link}}" alt="">

            </div>
        </section>
        <section class="artical-detials-body">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">
                        <p>
                            {{$blogs->text}}
                        </p>
                        <img class="ads-det" src="{{$ads->image_link}}" alt="">
                        <div class="edit-team-artical">
                            <div class="row">
                                <div class="membership">
                                    <img src="{{$blogs->user->image_link}}" alt="">

                                    <a> عضو {{$blogs->user->status}}</a>

                                </div>
                                <div class="edit-team-artical-p">
                                    <p><span>من قبل</span> {{$blogs->user->name}}
                                        <strong>{{$blogs->created_at->toDateString()}}</strong></p>
                                    <p><span>أخر تعديل</span> {{$blogs->updated_at->toDateString('d')}}</p>

                                </div>

                            </div>
                        </div>
                        <div class="artical-a department">
                            <div class=" card-artical-a-parent">
                                <a style="  font-size: 20px !important;"
                                class="a-parent"> مواضيع ذات علاقة</a>

                                <div class="row">
                                    @foreach($r_blog as $blog)
                                    <div class="col-lg-4 parent">
                                        <div class="card-artical-a department-card">
                                            <div class="card-overlay-artical-a card-overlay-department-a">
                                                <!--=======End-Star-header=========-->
                                                <span class="date-2"> <i
                                                        class="far fa-calendar-alt"></i> {{$blog->created_at->toDateString()}} </span>
                                            </div>
                                            <img src="{{$blog->image_link}}" alt="">
                                            <h1><a href="">{{$blog->title}}
                                                </a></h1>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 artical-a-col-lg">
                        <div class="row">
                            <div class="col-lg-12">
                                <h1>مواضيع شائعة</h1>
                            </div>
                            <div class="col-lg-12">
                                @foreach($c_blog as $blog)
                                    <div class="card-left-artical ">
                                        <img src="{{$blog->image_link}}" alt="">
                                        <a href="{{route('website.blog-d',$blog->slug)}}"><h3>{{$blog->title}}</h3></a>
                                        <p>
                                            {{$blog->short}}
                                        </p>
                                        @endforeach
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="ads" style="background-image: url({{$ad->image_link}});
            background-repeat: no-repeat;
            width: 100%;
            width: auto;
            background-size: 100% 100%;">
            <div class="container">
                <h1> {{$ad->title}} </h1>
                <p>{{$ad->text}}</p>
            </div>
        </section>
    </main>
@endsection
