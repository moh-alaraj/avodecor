@extends('layouts.dashboard')

@section('title', 'Categories')


@section('content')

    <form action="{{ route('admin.categories.update', $categories->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')

        <div class="form-group mb-3">
            <label for="">Name:</label>
            <input type="text" name="title" value="{{old('title',$categories->title)}}" class="form-control @error('title') is-invalid @enderror">
            @error('title')
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
