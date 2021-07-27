
@extends('website.layout.app')

@section('main-content')

        <!--==================  Start slider ===============================-->

        <section class="SLIDER">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    @foreach($sliders as $key => $slider)

                    <div class="carousel-item @if($key == 0) active @endif">
                        <div class="listslide">
                            <h1>
                                {{$slider->title}}
                            </h1>
                            <ul>
                                @foreach($slider->tags as $tag)
                                <a  class="badge badge-info">{{$tag->title}}</a>
                                @endforeach
                            </ul>
                        </div>
                        <img class="d-block w-100" src="{{$slider->image_link}}" alt="First slide">
                    </div>

                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="next">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="prev">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>

            @endforeach

        </section>
        <!--==================  End slider ===============================-->

        <Section class="Servies-avo">
            <div class="container">
                <a class="Titel" >الخدمات</a>
                <div class="row">
                    @foreach($services as $service)
                    <div class="col-lg-4">
                        <a href="{{route('website.services',$service->slug)}}" class="card-Servies-avo">
                            <img src="{{$service->image_link}}" alt="">
                            <h1>{{$service->title}}</h1>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </Section>
        <section class="Features">
            <div class="container">
                <a class="Titel" >بماذا نتميز</a>

                <div class="row">
                    @foreach($features as $feature)
                    <div class="col-lg-3">
                        <div class="card-Featuers-avo">
                            <div class="row">
                                <h1  class="col-lg-8 col-md-6 col" >{{$feature->title}}</h1>
                                  <img class="col-lg-4 col-md-6 col" src="{{$feature->image_link}}" alt="">
                            </div>
                            <p>{{$feature->text}}</p>

                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </section>
        <section class="how-to">
                <div class="container">
                        <a class="Titel" >كيف تتطلب مشروعك</a>

                    <div class="row">
                     <div class="col-lg-6">
                         <ul>
                             @foreach($horders as $horder)
                             <li>
                                    <h6>{{$horder->title}}</h6>
                                    <p class="">
                                          {{$horder->text}} .
                                    </p>

                             </li>
                             @endforeach
                         </ul>
                     </div>
                     <div class="col-lg-6">
                        <img src="{{asset('website/img/how-to.png')}}" alt="">
                     </div>
                    </div>
                </div>
            </section>



        <section class="proti">

                <div class="container">

                      <a class="Titel" href="{{route('website.works')}}">أعمالنا</a>
                    <div class="row">
                        @foreach($works as $work)
                        <div class="col-lg-4">
                              <div class="card-proti">
                                      <a class="over-lay-proti">
                                        <span>{{$work->title}}</span>
                                      </a>
                                      <img src="{{$work->image_link}}" alt="">
                                  </div>
                        </div>
                        @endforeach
                    </div>

                </div>
            </section>
            <section class="ads"  style="background-image: url({{$ad->image_link}});
              background-repeat: no-repeat;
                width: 100%;
                width: auto;
                background-size: 100% 100%;" >
                <div class="container">
                    <h1> {{$ad->title}} </h1>
                    <p>{{$ad->text}}</p>
                </div>
            </section>


            <section class="blog">
                <div class="container">
                    <a class="Titel" href="{{route('website.blog')}}">المدونة</a>

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
                                       <span class="col-lg-6 col"><i class="fas fa-calendar-alt" aria-hidden="true"></i> {{$blog->created_at->toDateString()}}</span>
                                       <a href="{{route('website.blog-d',$blog->slug)}}" class="col-lg-6 col">عرض المزيد</a>

                                  </div>
                                </div>
                        </div>
                    @endforeach
                         <!--=====================================-->
                </div>
                </div>
           </section>
@endsection
