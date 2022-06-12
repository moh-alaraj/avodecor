<div class="responsive">
    <div class="container">
        <div class="logo">
            <a><img src="{{asset('website/img/header/Logo@2x.png')}}"   alt="logo"></a>
        </div>
        <div class="navbar">

            <div class="icon-bar" onclick="Show()">
                <i></i>
                <i></i>
                <i></i>
            </div>

            <ul id="nav-lists">
                <li class="close"><span onclick="Hide()">×</span></li>
                <li><a href="{{route('website.index')}}">الرئيسية</a></li>
{{--                <li><a href="{{route('website.about')}}"></a>خدماتنا</li>--}}
                <li><a href="{{route('website.works')}}"></a>الاعمال</li>
                <li><a href="{{route('website.about')}}"></a>من نحن</li>
                <li><a href="{{route('website.team')}}"></a>فريق العمل</li>
                <li><a href="{{route('website.job')}}"></a>التوظيف</li>
                <li><a href="{{route('website.blog')}}"></a>المدونة</li>
                <li><a href="{{route('website.privacy')}}">سياسة الخصوصية</a></li>
                <li><a href="{{route('website.tearms')}}">الشروط والاحكام</a></li>
                <li><a href="{{route('website.contact')}}"></a>اتصل بنا</li>
            </ul>

        </div>
    </div>
</div>

<style>
    .di{
        margin-right: 20px;
        color: white;
        list-style-type: none;
    }

    .li{
        text-align: right;
        margin-right: 80px;
    }
    a.q{
        color: white;
        margin-right: 20px;
    }

</style>

<header class="Navbar-Header">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a href="{{route('website.index')}}" class="navbar-brand">
            <img src="{{asset('website/img/header/Logo@2x.png')}}" alt="logo">
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item @if(request()->routeIs('website.index')) active @endif">
                    <a class=" nav-link " href="{{route('website.index')}}">الرئيسية <span class="sr-only">(current)</span></a>
                </li>

                <li class="nav-item @if(request()->routeIs('website.about')) active @endif">
                    <a class=" nav-link" href="{{route('website.about')}}">من نحن</a>
                </li>
                <li class="nav-item @if(request()->routeIs('website.group')) active @endif">
                    <a class=" nav-link" href="{{route('website.group')}}">مجموعة أفوكود</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        خدماتنا
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">

                        <a class="dropdown-item" href="{{route('website.services','تصميم-داخلي')}}">تصميم داخلي</a>
                        <a class="dropdown-item" href="{{route('website.services','تصميم-معماري')}}">تصميم معماري</a>
                        <a class="dropdown-item" href="{{route('website.services','تصميم-حدائق')}}">تصميم حدائق</a>
                    </div>
                </li>
                <li class="nav-item @if(request()->routeIs('website.works')) active @endif ">
                    <a class=" nav-link" href="{{route('website.works')}}">أعمالنا</a>
                </li>
                <li class="nav-item @if(request()->routeIs('website.job')) active @endif ">
                    <a class=" nav-link " href="{{route('website.job')}}">التوظيف</a>
                </li>
                <li class="nav-item @if(request()->routeIs('website.team')) active @endif ">
                    <a class=" nav-link" href="{{route('website.team')}}">فريق العمل</a>
                </li>


                <li class="nav-item  @if(request()->routeIs('website.blog')) active @endif">
                    <a class=" nav-link" href="{{route('website.blog')}}">المدونة</a>
                </li>
                <li class="nav-item @if(request()->routeIs('website.contact')) active @endif">
                    <a class=" nav-link" href="{{route('website.contact')}}">اتصل بنا</a>
                </li>
            </ul>
            <ul class="social-media">
                <a href=""><i class="fab fa-whatsapp" aria-hidden="true"></i></a>
                <a href=""><i class="fab fa-facebook-f" aria-hidden="true"></i></a>
                <a href=""><i class="fab fa-twitter" aria-hidden="true"></i></a>

            </ul>
            @if(\Illuminate\Support\Facades\Auth::check())
                <li class="nav-item dropdown di">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{\Illuminate\Support\Facades\Auth::user()->name}}
                    </a>
                    <div class="dropdown-menu li" aria-labelledby="navbarDropdown">
                        <a class="q" href="#" onclick="document.getElementById('logout').submit()"> تسجيل الخروج </a>
                        <form id="logout" class="d-none" action="{{route('logout')}}" method="post">
                            @csrf
                        </form>
                    </div>
                </li>
            @else
                <a href="{{route('login')}}" type="button" class="btn btn-outline-secondary"><i class="fas fa-user" aria-hidden="true"></i> تسجيل دخول</a>
                <a href="{{route('register')}}" type="button" class="btn btn-outline-success"><i class="fas fa-user" aria-hidden="true"></i> مستخدم جديد</a>
            @endif


{{--                    <div class="ms-auto di">--}}
{{--                        {{\Illuminate\Support\Facades\Auth::user()->name}}--}}
{{--                        <a class="di" href="#" onclick="document.getElementById('logout').submit()">Logout</a>--}}
{{--                        <form id="logout" class="d-none" action="{{route('logout')}}" method="post">--}}
{{--                            @csrf--}}
{{--                        </form>--}}
{{--                    </div>--}}
        </div>
    </nav>


</header>
