<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }}</title>
    <link rel="stylesheet" href="{{asset('pannelassets/css/bootstrap.min.css')}}">

</head>


<body>
<header class="py-2 bg-dark text-white mb-4">
    <div class="container">
        <div class="d-flex">
            <h1 class="h3">Avo-Code</h1>
            @auth
                <div class="ms-auto">
                    Hi , {{\Illuminate\Support\Facades\Auth::user()->name}}
                    <a href="#" onclick="document.getElementById('logout').submit()">Logout</a>
                    <form id="logout" class="d-none" action="{{route('logout')}}" method="post">
                        @csrf
                    </form>
                </div>
            @endauth
        </div>
    </div>
</header>
<div class="container">
    <div class="row">
        <aside class="col-md-3">
            <h4 style="color: dodgerblue">Navigation Menu</h4>
            <nav>
                <ul class="nav nav-pills flex-column " >

                    <li class="nav-item"><a href="" class="nav-link ">Dashboard</a></li>
                    <li class="nav-item"><a href="{{route('admin.tags.index')}}" class="nav-link @if(request()->routeIs('admin.tags.index')) active @endif">Tags</a></li>
                    <li class="nav-item"><a href="{{route('admin.team.index')}}" class="nav-link @if(request()->routeIs('admin.team.index')) active @endif">Work Team</a></li>
                    <li class="nav-item"><a href="{{route('admin.sliders.index')}}" class="nav-link @if(request()->routeIs('admin.sliders.index')) active @endif">Sliders</a></li>
                    <li class="nav-item"><a href="{{route('admin.services.index')}}" class="nav-link @if(request()->routeIs('admin.services.index')) active @endif">Services</a></li>
                    <li class="nav-item"><a href="{{route('admin.subservises.index')}}" class="nav-link @if(request()->routeIs('admin.subservises.index')) active @endif">Sub Services</a></li>
                    <li class="nav-item"><a href="{{route('admin.features.index')}}" class="nav-link @if(request()->routeIs('admin.features.index')) active @endif ">Features</a></li>
                    <li class="nav-item"><a href="{{route('admin.advertisings.index')}}" class="nav-link @if(request()->routeIs('admin.advertisings.index')) active @endif ">Advertisings</a></li>
                    <li class="nav-item"><a href="{{route('admin.categories.index')}}" class="nav-link @if(request()->routeIs('admin.categories.index')) active @endif ">Categories</a></li>
                    <li class="nav-item"><a href="{{route('admin.blogs.index')}}" class="nav-link @if(request()->routeIs('admin.blogs.index')) active @endif ">Blogs</a></li>
                    <li class="nav-item"><a href="{{route('admin.works.index')}}" class="nav-link @if(request()->routeIs('admin.works.index')) active @endif ">Our Works</a></li>
                    <li class="nav-item"><a href="{{route('admin.orders.index')}}" class="nav-link @if(request()->routeIs('admin.orders.index')) active @endif ">How to Order</a></li>
                    <li class="nav-item"><a href="{{route('admin.about-us.index')}}" class="nav-link @if(request()->routeIs('admin.about-us.index')) active @endif ">About US</a></li>
                    <li class="nav-item"><a href="{{route('admin.groups.index')}}" class="nav-link @if(request()->routeIs('admin.groups.index')) active @endif ">Our Group</a></li>


                </ul>
            </nav>
        </aside>
        <main class="col-md-9">
            <div class="mb-4">
                <h3 class="text-primary">@yield('title', 'Default Title')</h3>
            </div>
            @if (session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif
            @if (session()->has('danger'))
                <div class="alert alert-danger">
                    {{ session()->get('danger') }}
                </div>
            @endif

            @yield('content')

        </main>
    </div>
</div>

<script src="{{asset('pannelassets/js/bootstrap.bundle.js')}}"></script>

</body>

</html>

