
@extends('website.layout.app')

@section('main-content')
    @if (session()->has('success'))
        <div class="alert alert-success di">
            {{ session()->get('success') }}
        </div>
    @endif

    <style>

        .bt{
            background-color:    #BC264F;
            color: white;
            margin-left: 250px;
        }
        .di{
            text-align: right;

        }

    </style>
       <section class="contact">
           <div class="container">
            <a class="Titel" >أتصل بنا</a>

               <div class="row">
                   <div class="col-lg-6 ">

                     <form  id="form-contact" class="form-s" action="{{route('admin.contact')}}" method="post" >
                         @csrf
                        <div class="col-auto">
                                <label class="col-lg-12" for="inlineFormInputGroup">الأسم</label>
                                <div class="input-group mb-2">
                                  <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-user-alt" aria-hidden="true"></i></div>
                                  </div>
                                  <input type="text" name="name" class="form-control" id="inlineFormInputGroup" form="form-contact" placeholder="ادخل الاسم">
                                </div>
                                </div>
                                <!--=====================-->
                                <div class="col-auto">
                                        <label class="col-lg-12" for="inlineFormInputGroup">البريد الالكتروني</label>
                                        <div class="input-group mb-2">
                                          <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fas fa-at"></i></div>
                                          </div>
                                          <input type="text" name="email" class="form-control" id="inlineFormInputGroup" placeholder="ادخل البريد الالكتروني">
                                        </div>
                                        </div>
                                <!--=================================-->
                                <div class="col-auto">
                                        <label class="col-lg-12" for="inlineFormInputGroup">الجوال</label>
                                        <div class="input-group mb-2">
                                          <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fas fa-mobile-alt"></i></div>
                                          </div>
                                          <input type="text" name="phone" class="form-control" id="inlineFormInputGroup" placeholder="ادخل رقم الجوال">
                                        </div>
                                        </div>
                                        <div class="col-auto">
                                                <div class="form-group">
                                                        <label class="col-lg-12" for="exampleFormControlTextarea1">رسالتك</label>
                                                        <textarea class="form-control" name="message" id="exampleFormControlTextarea1" placeholder="ادخل رسالتك" rows="3"></textarea>
                                                      </div>
                                        </div>
{{--                                        <a href="User-Registar.html" type="button" class="btn btn-outline-success">ارسال</a>--}}
                                         <button type="submit" class="btn bt btn-outline-success "> ارسال </button>


                     </form>
                                     <!--=================================-->

                   </div>
                   <div class="col-lg-6 img-contact">
                       <img  src="{{asset('website/img/Contact/algedra_contact_us.jpg')}}" alt="">
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

@endsection
