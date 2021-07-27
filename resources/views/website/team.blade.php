
@extends('website.layout.app')

@section('main-content')
        <section class="team-decoration">
            <div class="container">
                <a class="Titel" href="http://">فريق عمل أفوكود </a>
                <div class="row">
                    @foreach($users as $user)
                 <div class="col-lg-3">
                     <div class="over-lay-team">
                         @if($user->position)
                         <h1>{{$user->position}}</h1>
                         @endif
                          <h2>{{$user->name}}</h2>
                         <h3>{{$user->job}}</h3>
                     </div>
                     <img src="{{$user->image_link}}" alt="">
                 </div>
                    @endforeach
                </div>
            </div>
        </section >
        <section class="ads" style="background-image: url({{$ad->image_link}});
            background-repeat: no-repeat;
            width: 100%;
            width: auto;
            background-size: 100% 100%;">
            <div class="container">
                <h1>{{$ad->title}}</h1>
                <p>{{$ad->text}}</p>
            </div>
        </section>

@endsection
