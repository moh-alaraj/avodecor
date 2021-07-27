@extends('layouts.dashboard')

@section('title', 'About-us')




@section('content')

    <form action="{{ route('admin.about-us.store') }}" method="post" enctype="multipart/form-data">
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
            <label for="">Text:</label>
            <input type="text" name="text" class="form-control @error('text') is-invalid @enderror">
            @error('text')
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
