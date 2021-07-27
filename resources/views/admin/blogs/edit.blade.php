@extends('layouts.dashboard')

@section('title', 'Blogs')


@section('content')

    <form action="{{ route('admin.blogs.update', $blogs->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')

        <div class="form-group mb-3">
            <label for="">Title:</label>
            <input type="text" name="title" value="{{old('title',$blogs->title)}}" class="form-control @error('title') is-invalid @enderror">
            @error('title')
            <p class="invalid-feedback">
                {{$message}}
            </p>
            @enderror
        </div>
        <div class="form-group mb-3">
            <label for="">Description:</label>
            <input type="text" name="short" value="{{old('short',$blogs->short)}}" class="form-control @error('short') is-invalid @enderror">
            @error('short')
            <p class="invalid-feedback">
                {{$message}}
            </p>
            @enderror
        </div>
        <div class="form-group mb-3">
            <label for="">Text:</label>
            <input type="text" name="text" value="{{old('text',$blogs->text)}}" class="form-control @error('text') is-invalid @enderror">
            @error('text')
            <p class="invalid-feedback">
                {{$message}}
            </p>
            @enderror
        </div>
        <div class="form-group mb-3">
            <label for="">Category:</label>
            <select name="category_id" class="form-control">

                <option value="">Select Category</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}"
                            @if($category->id == old('category_id',$blogs->category_id)) selected @endif>
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
            <label for="">User:</label>
            <select name="user_id" class="form-control">

                <option value="">Select User</option>
                @foreach ($users as $user)
                    <option value="{{ $user->id }}"
                            @if($user->id == old('user_id',$blogs->user_id)) selected @endif>
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
            <label for="">Photo:</label>
            <input type="file" name="photo" class="form-control @error('photo') is-invalid @enderror">
            @error('photo')
            <p class="invalid-feedback">
                {{$message}}
            </p>
            @enderror
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary"> Update </button>
        </div>

    </form>

@endsection
