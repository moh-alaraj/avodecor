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
            margin-right: 600px;
            margin-top: 50px;
        }
        .di{
            text-align: right;
        }
    </style>

        <section class="jopapp">
            <div class="container">
                <a class="Titel">التوظيف</a>
                <div class="card-titel-jopp row">

                    <div class="col-lg-6 p-jop">
                        <h1>هل ترغب في العمل معنا؟</h1>
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

        <section class="join-jop">
        <div class="container">
            <form class="row" action="{{route('admin.job')}}" method="post" enctype="multipart/form-data">
                @csrf
              <div class="col-lg-6">
                      <h1>بيانات شخصية</h1>
                    <div class="name-input">
                        <label for="demo">الاسم كامل</label>
                    <div class="input-group mb-3">
                      <input type="text" class="form-control" placeholder="أدخل الاسم" id="demo" name="name">
                        @error('name')
                        <p class="invalid-feedback">
                            {{$message}}
                        </p>
                        @enderror
                      <div class="input-group-append">
                        <span class="input-group-text">
                            <img src="{{asset('website/img/join/Profile.svg')}}" alt=""></span>
                      </div>
                    </div>
                  </div>

                  <div class="name-input">
                        <label for="demo">ادخل البريد الالكتروني</label>
                    <div class="input-group mb-3">
                      <input type="text" class="form-control" placeholder="أدخل ادخل البريد الالكتروني" id="demo" name="email">
                      <div class="input-group-append">
                        <span class="input-group-text"><img src="{{asset('website/img/join/at.svg')}}" alt=""></span>
                      </div>
                    </div>
                  </div>
                  <div class="name-input">
                        <label for="demo">الجوال</label>
                    <div class="input-group mb-3">
                      <input type="text" class="form-control" placeholder="أدخل الجوال" id="demo" name="phone_number">
                      <div class="input-group-append">
                        <span class="input-group-text"><img src="{{asset('website/img/join/mobile-alt.svg')}}" alt=""></span>
                      </div>
                    </div>
                  </div>

                  <div class="name-input">
                    <label for="demo">تاريخ الميلاد</label>
                <div class="input-group mb-3">
                  <input type="date" class="form-control" placeholder="أدخل تاريخ الميلاد" id="demo" name="birth_date">
                  <div class="input-group-append">
                    <span class="input-group-text"><img src="{{asset('website/img/join/mobile-alt.svg')}}" alt=""></span>
                  </div>
            </div>
          </div>
          <div class="name-input">
                    <label for="demo">العنوان</label>
                    <div class="input-group mb-3">
                      <input type="text" class="form-control" placeholder="أدخل  العنوان" id="demo" name="address">
                      <div class="input-group-append">
                        <span class="input-group-text"><img src="{{asset('website/img/join/mobile-alt.svg')}}" alt=""></span>
                      </div>
                    </div>
                  </div>
                  <div class="form-group menu ">
                    <label for="exampleFormControlSelect1">اختر الجنس</label>

                    <select name="sex" class="form-control" id="exampleFormControlSelect1">
                      <option>الجنس</option>
                      <option>ذكر</option>
                      <option>أنثى</option>

                    </select>

                  </div>
                  <div class="form-group menu">
                    <label for="demo">الدرجة العلمية</label>

                    <input type="text" placeholder="مثال : بكالوريوس" class="form-control" id="demo" name="education">
                  </div>
              </div>
              <div class="col-lg-6">
                <h1>بيانات التوظيف</h1>

                <div class="form-group menu ">
                    <label for="exampleFormControlSelect1">اختر المهنة</label>

                    <select class="form-control" id="exampleFormControlSelect1" name="job">
                      <option>تدريب</option>
                      <option>عمل</option>

                    </select>

                  </div>
                  <div class="name-input">
                    <label for="demo">المسمى الوظيفي</label>
                <div class="input-group mb-3">
                  <input type="text" class="form-control" placeholder="أدخل المسمى الوظيفي" id="demo" name="job_title">
                  <div class="input-group-append">
                    <span class="input-group-text"><img src="{{asset('website/img/join/at.svg')}}" alt=""></span>
                  </div>
                </div>
              </div>
                  <div class="form-group menu ">
                    <label for="exampleFormControlSelect1">حدد الدوام</label>

                    <select class="form-control" id="exampleFormControlSelect1" name="work">
                      <option>كامل</option>
                      <option>جزئي</option>
                      <option>بالساعة</option>

                    </select>

                  </div>


              <div class="name-input">
                    <label for="demo">الراتب المتوقع بالدولار</label>
                <div class="input-group mb-3">
                  <input type="text" class="form-control" placeholder="أدخل الراتب المتوقع" id="demo" name="salary">
                  <div class="input-group-append">
                    <span class="input-group-text"><img src="{{asset('website/img/join/mobile-alt.svg')}}" alt=""></span>
                  </div>
                </div>
              </div>
              <div class="name-input">
                <label for="demo">سنوات الخبرة</label>
            <div class="input-group mb-3">
              <input type="text" class="form-control" placeholder="" id="demo" name="yexp">
              <div class="input-group-append">
                <span class="input-group-text"><img src="{{asset('website/img/join/mobile-alt.svg')}}" alt=""></span>
              </div>
            </div>
          </div>
              <div class="form-group">
                    <label for="exampleFormControlTextarea1">حدثنا عن مهاراتك</label>
                    <textarea name="dexp" class="form-control" placeholder="أدخل مهاراتك" id="exampleFormControlTextarea1" rows="3"></textarea>
                  </div>
                  <div class="name-input">
                    <label for="demo">السيرة الذاتية</label>

                  <div class="input-group mb-3">

                    <div class="custom-file">
                      <input type="file" name="cv" class="custom-file-input" id="inputGroupFile03" aria-describedby="inputGroupFileAddon03">
                      <label class="custom-file-label" for="inputGroupFile03"></label>
                    </div>
                  </div>
                  </div>
              </div>

                <button type="submit" class="btn bt btn-outline-success"> ارسال </button>
          </form>
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
