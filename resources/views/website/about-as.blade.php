@extends('website.layout.app')

@section('main-content')

        <section class="about-as-D">
          <div class="container">
            <a class="Titel" >من نحن</a>
            <div class="row">
                <div class="col-lg-6 about-right">
                    <h1>{{$ab1->title}}</h1>
                    <p>
                        {{$ab1->text}}
                    </p>
                </div>
                <div class="col-lg-6">
                    <img src="{{$ab1->image_link}}" alt="">
                </div>
            </div>
          </div>
        </section>

        <section class="about-as-D">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <img src="{{$ab2->image_link}}" alt="">
                    </div>
                    <div class="col-lg-6 about-right">
                        <h1>{{$ab2->title}}</h1>
                        <p>
                            {{$ab2->text}}
                        </p>
                    </div>
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
@endsection

