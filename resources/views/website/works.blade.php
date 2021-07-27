
@extends('website.layout.app')

@section('main-content')
      <section class="works">

          <div class="container">
            <a class="Titel">معرض الاعمال</a>

              <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">

                    <div class="works-taps">
                        <div class="row">
                            @foreach($works as $work)
                            <div class="col-lg-3">
                                <img src="{{$work->image_link}}" alt="">
                            </div>
                            @endforeach
{{--                            <div class="col-lg-3">--}}
{{--                                <img src="img/protofile/2.jpg" alt="">--}}
{{--                            </div>--}}
{{--                            <div class="col-lg-3">--}}
{{--                                <img src="img/protofile/3.jpg" alt="">--}}
{{--                            </div>--}}
{{--                            <div class="col-lg-3">--}}
{{--                                <img src="img/protofile/4.jpg" alt="">--}}
{{--                            </div>--}}
{{--                            <div class="col-lg-3">--}}
{{--                                <img src="img/protofile/1.jpg" alt="">--}}


{{--                            </div>--}}
{{--                            <div class="col-lg-3">--}}
{{--                                <img src="img/protofile/2.jpg" alt="">--}}
{{--                            </div>--}}
{{--                            <div class="col-lg-3">--}}
{{--                                <img src="img/protofile/3.jpg" alt="">--}}
{{--                            </div>--}}
{{--                            <div class="col-lg-3">--}}
{{--                                <img src="img/protofile/4.jpg" alt="">--}}
{{--                            </div>--}}
{{--                            <div class="col-lg-3">--}}
{{--                                <img src="img/protofile/1.jpg" alt="">--}}


{{--                            </div>--}}
{{--                            <div class="col-lg-3">--}}
{{--                                <img src="img/protofile/2.jpg" alt="">--}}
{{--                            </div>--}}
{{--                            <div class="col-lg-3">--}}
{{--                                <img src="img/protofile/3.jpg" alt="">--}}
{{--                            </div>--}}
{{--                            <div class="col-lg-3">--}}
{{--                                <img src="img/protofile/4.jpg" alt="">--}}
{{--                            </div>--}}
{{--                            <div class="col-lg-3">--}}
{{--                                <img src="img/protofile/1.jpg" alt="">--}}


{{--                            </div>--}}
{{--                            <div class="col-lg-3">--}}
{{--                                <img src="img/protofile/2.jpg" alt="">--}}
{{--                            </div>--}}
{{--                            <div class="col-lg-3">--}}
{{--                                <img src="img/protofile/3.jpg" alt="">--}}
{{--                            </div>--}}
{{--                            <div class="col-lg-3">--}}
{{--                                <img src="img/protofile/4.jpg" alt="">--}}
{{--                            </div>--}}
                        </div>
                    </div>
                </div>
              </div>
          </div>
{{--                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">--}}
{{--                    <div class="works-taps">--}}
{{--                        <div class="row">--}}
{{--                            <div class="col-lg-3">--}}
{{--                                <img src="img/protofile/5.jpg" alt="">--}}


{{--                            </div>--}}
{{--                            <div class="col-lg-3">--}}
{{--                                <img src="img/protofile/2.jpg" alt="">--}}
{{--                            </div>--}}
{{--                            <div class="col-lg-3">--}}
{{--                                <img src="img/protofile/3.jpg" alt="">--}}
{{--                            </div>--}}
{{--                            <div class="col-lg-3">--}}
{{--                                <img src="img/protofile/4.jpg" alt="">--}}
{{--                            </div>--}}
{{--                            <div class="col-lg-3">--}}
{{--                                <img src="img/protofile/1.jpg" alt="">--}}


{{--                            </div>--}}
{{--                            <div class="col-lg-3">--}}
{{--                                <img src="img/protofile/2.jpg" alt="">--}}
{{--                            </div>--}}
{{--                            <div class="col-lg-3">--}}
{{--                                <img src="img/protofile/3.jpg" alt="">--}}
{{--                            </div>--}}
{{--                            <div class="col-lg-3">--}}
{{--                                <img src="img/protofile/4.jpg" alt="">--}}
{{--                            </div>--}}
{{--                            <div class="col-lg-3">--}}
{{--                                <img src="img/protofile/1.jpg" alt="">--}}


{{--                            </div>--}}
{{--                            <div class="col-lg-3">--}}
{{--                                <img src="img/protofile/2.jpg" alt="">--}}
{{--                            </div>--}}
{{--                            <div class="col-lg-3">--}}
{{--                                <img src="img/protofile/3.jpg" alt="">--}}
{{--                            </div>--}}
{{--                            <div class="col-lg-3">--}}
{{--                                <img src="img/protofile/4.jpg" alt="">--}}
{{--                            </div>--}}
{{--                            <div class="col-lg-3">--}}
{{--                                <img src="img/protofile/1.jpg" alt="">--}}


{{--                            </div>--}}
{{--                            <div class="col-lg-3">--}}
{{--                                <img src="img/protofile/2.jpg" alt="">--}}
{{--                            </div>--}}
{{--                            <div class="col-lg-3">--}}
{{--                                <img src="img/protofile/3.jpg" alt="">--}}
{{--                            </div>--}}
{{--                            <div class="col-lg-3">--}}
{{--                                <img src="img/protofile/4.jpg" alt="">--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">--}}
{{--                    <div class="works-taps">--}}
{{--                        <div class="row">--}}
{{--                            <div class="col-lg-3">--}}
{{--                                <img src="img/protofile/1.jpg" alt="">--}}


{{--                            </div>--}}
{{--                            <div class="col-lg-3">--}}
{{--                                <img src="img/protofile/2.jpg" alt="">--}}
{{--                            </div>--}}
{{--                            <div class="col-lg-3">--}}
{{--                                <img src="img/protofile/3.jpg" alt="">--}}
{{--                            </div>--}}
{{--                            <div class="col-lg-3">--}}
{{--                                <img src="img/protofile/4.jpg" alt="">--}}
{{--                            </div>--}}
{{--                            <div class="col-lg-3">--}}
{{--                                <img src="img/protofile/1.jpg" alt="">--}}


{{--                            </div>--}}
{{--                            <div class="col-lg-3">--}}
{{--                                <img src="img/protofile/2.jpg" alt="">--}}
{{--                            </div>--}}
{{--                            <div class="col-lg-3">--}}
{{--                                <img src="img/protofile/3.jpg" alt="">--}}
{{--                            </div>--}}
{{--                            <div class="col-lg-3">--}}
{{--                                <img src="img/protofile/4.jpg" alt="">--}}
{{--                            </div>--}}
{{--                            <div class="col-lg-3">--}}
{{--                                <img src="img/protofile/1.jpg" alt="">--}}


{{--                            </div>--}}
{{--                            <div class="col-lg-3">--}}
{{--                                <img src="img/protofile/2.jpg" alt="">--}}
{{--                            </div>--}}
{{--                            <div class="col-lg-3">--}}
{{--                                <img src="img/protofile/3.jpg" alt="">--}}
{{--                            </div>--}}
{{--                            <div class="col-lg-3">--}}
{{--                                <img src="img/protofile/4.jpg" alt="">--}}
{{--                            </div>--}}
{{--                            <div class="col-lg-3">--}}
{{--                                <img src="img/protofile/1.jpg" alt="">--}}


{{--                            </div>--}}
{{--                            <div class="col-lg-3">--}}
{{--                                <img src="img/protofile/2.jpg" alt="">--}}
{{--                            </div>--}}
{{--                            <div class="col-lg-3">--}}
{{--                                <img src="img/protofile/3.jpg" alt="">--}}
{{--                            </div>--}}
{{--                            <div class="col-lg-3">--}}
{{--                                <img src="img/protofile/4.jpg" alt="">--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--              </div>--}}
{{--          </div>--}}
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
@endsection
