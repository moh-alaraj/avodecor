@extends('website.layout.app')

@section('main-content')
        <section class="servises-full">
          <div class="container">
            <a class="Titel" >{{$services->title}}</a>

            <div class="row">
                  <div class="col-lg-6 col-md-6 serv-p">

                      <h1>{{$services->title}}</h1>
                    <p>
                        {{$services->text}}
                    </p>
                  </div>
                  <div class="col-lg-6 col-md-6">
                      <img src="{{asset('website/img/header/BG@2x.png')}}" alt="">
                  </div>
              </div>
          </div>
        </section>
        <section class="other-serv">

            <div class="container">
                <a class="Titel">اكتشف خدماتنا</a>

                <div class="row">
                    @foreach($services->subserve as $service)
                    <div class="col-lg-3">
                        <a class="card-servs-all" href="">
                            <div class="serv-img">
                                <img src="{{$service->image_link}}" alt="">
                            </div>
                            <div class="parg-sev">
                              <h1>{{$service->title}}</h1>
                             <p>{{$service->text}}</p>

                            </div>
                           </a>
                       </div>
                    @endforeach
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

@endsection
