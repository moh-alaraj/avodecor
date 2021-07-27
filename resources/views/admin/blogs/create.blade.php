@extends('layouts.dashboard')

@section('title', 'Blogs')




@section('content')

    <form action="{{ route('admin.blogs.store') }}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="form-group mb-3">
            <label for="">Title:</label>
            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror">
            @error('title')
            <p class="invalid-feedback">
                {{$message}}
            </p>
            @enderror
        </div>
        <div class="form-group mb-3">
            <label for="">Description:</label>
            <input type="text" name="short" class="form-control @error('short') is-invalid @enderror">
            @error('short')
            <p class="invalid-feedback">
                {{$message}}
            </p>
            @enderror
        </div>
        <div class="form-group mb-3">
            <label for="">Text:</label>
            <input type="text" name="text" class="form-control @error('text') is-invalid @enderror">
            @error('text')
            <p class="invalid-feedback">
                {{$message}}
            </p>
            @enderror
        </div>
        <div class="form-group mb-3">
            <label for="">Category:</label>
            <select name="category_id" class="form-control">

                <option value="">Select category</option>
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
            <label for="">User:</label>
            <select name="user_id" class="form-control">

            <option value="">Select User</option>
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
            <label for="">Photo:</label>
            <input type="file" name="photo" class="form-control @error('photo') is-invalid @enderror">
            @error('photo')
            <p class="invalid-feedback">
                {{$message}}
            </p>
            @enderror
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary"> Create </button>
        </div>

    </form>

@endsection
