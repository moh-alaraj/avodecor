@extends('website.layout.app')

@section('main-content')
        <section class="jopapp">
            <div class="container">
                <a class="Titel">مجموعة أفوكود</a>
                <div class="card-titel-jopp row">

                    <div class="col-lg-6 p-jop">
                        <h1>شركة أفوكود</h1>
                        <p>
                            تسعى شركة أفوكود للتصميم الداخلي جاهدة لتحقيق النمو،ونبحث في الشركة دائماً وبشكل حثيث عن المواهب المبدعة من شتى أنحاء العالم حيث أننا نبذل جهودنا بأن نبقى على تواصل مع أولئك اللذين يثقون بأنفسهم لتحقيق أفضل الإنجازات الحقيقية.إذا كنت تؤمن بمقدرتك الإبداعية الخلاقة وخبراتك الكافية ومتحمساً لأن تعمل في أفضل شركات التصميم الداخلي المرموقة في دبي وتكون جزءاً منها وسوف نتصل بك.


                        </p>
                        <span>حظاً سعيداً في تحقيق التفوق في حياتك المهنية.</span>
                    </div>
                    <div class="col-lg-6">
                        <img src="{{asset('website/img/header/algedra_career.jpg')}}" alt="">
                    </div>
                </div>
            </div>
        </section>
            <section class="group-company">
                <div class="container">

                     <div class="row">
                         @foreach($groups as $group)
                         <div class="col-lg-6 col-md-6">
                            <div class="card-comapny row">
                                <div class="col-lg-3 col-md-3">
                                 <img src="{{$group->image_link}}" alt="">
                                </div>
                                <div class="col-lg-9 col-md-9">
                                    <h1>{{$group->title}}</h1>
                                    <p>{{$group->text}}</p>
                                    <a href="User-Registar.html" type="button" class="btn btn-outline-success">عرض موقع</a>
                                </div>
                            </div>
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
