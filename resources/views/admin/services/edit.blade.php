@extends('layouts.dashboard')

@section('title', 'Services')


@section('content')

    <form action="{{ route('admin.services.update', $services->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')

        <div class="form-group mb-3">
            <label for="">Title:</label>
            <input type="text" name="title" value="{{old('title',$services->title)}}" class="form-control @error('title') is-invalid @enderror">
            @error('title')
            <p class="invalid-feedback">
                {{$message}}
            </p>
            @enderror
        </div>
        <div class="form-group mb-3">
            <label for="">Text:</label>
            <input type="text" name="text" value="{{old('text',$services->text)}}" class="form-control @error('text') is-invalid @enderror">
            @error('text')
            <p class="invalid-feedback">
                {{$message}}
            </p>
            @enderror
        </div>
        <div class="form-group mb-3">
            <label for="">Icon:</label>
            <input type="file" name="icon" value="{{old('icon',$services->icon)}}" class="form-control @error('icon') is-invalid @enderror">
            @error('icon')
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
