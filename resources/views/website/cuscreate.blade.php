

@extends('website.layout.app')

@section('main-content')
    <style>

        .ma{
            margin-top: 20px;
            background-color:white;
            text-align: right;

        }
        .bt{
            margin-bottom: 20px;
        }
        .di{
           margin-right: 20px;
        }
    </style>

    <div class="mb-4 ma di">
        <h3 class="text-primary di ma"> {{"إضافة مدونة"}} </h3>
    </div>
<main class="ma">
        <div class="container">
            <form  action="{{ route('admin.blogs.store') }}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="form-group mb-3">
                    <label for="">العنوان :</label>
                    <input type="text" name="title" class="form-control @error('title') is-invalid @enderror in">
                    @error('title')
                    <p class="invalid-feedback">
                        {{$message}}
                    </p>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="">الوصف :</label>
                    <input type="text" name="short" class="form-control @error('short') is-invalid @enderror">
                    @error('short')
                    <p class="invalid-feedback">
                        {{$message}}
                    </p>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="">النص :</label>
                    <input type="text" name="text" class="form-control @error('text') is-invalid @enderror">
                    @error('text')
                    <p class="invalid-feedback">
                        {{$message}}
                    </p>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="">التصنيف : </label>
                    <select name="category_id" class="form-control">

                        <option value="">إختر تصنيف</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">
                                {{$category->title}}
                            </option>
                        @endforeach
                    </select>
                    @error('category_id')
                    <p class="invalid-feedback">
                        {{$message}}
                    </p>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="">المستخدم : </label>
                    <select name="user_id" class="form-control">

                    <option value="">إختر مستخدم </option>
                        @foreach ($users as $user)
                                <option value="{{ $user->id }}">
                                    {{$user->name}}
                                </option>
                        @endforeach
                    </select>
                    @error('user_id')
                    <p class="invalid-feedback">
                        {{$message}}
                    </p>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="">الصورة :</label>
                    <input type="file" placeholder="لم يتم إختيار صورة" name="photo" class="form-control @error('photo') is-invalid @enderror">
                    @error('photo')
                    <p class="invalid-feedback">
                        {{$message}}
                    </p>
                    @enderror
                </div>
                <div class="form-group">
                    <button type="submit" class=" btn btn-primary bt"> إنشاء </button>
                </div>

            </form>
            <script src="{{asset('pannelassets/js/bootstrap.bundle.js')}}"></script>
        </div>
</main>
@endsection

