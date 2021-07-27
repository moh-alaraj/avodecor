@extends('layouts.dashboard')

@section('title', 'Sliders')




@section('content')

    <form action="{{ route('admin.sliders.store') }}" method="post" enctype="multipart/form-data">
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
            <label for="">Photo:</label>
            <input type="file" name="photo" class="form-control @error('photo') is-invalid @enderror">
            @error('photo')
            <p class="invalid-feedback">
                {{$message}}
            </p>
            @enderror
        </div>
        <div class="form-group mb-3">
            <label for="">Tags:</label>
            <select  multiple   name="tag_id[]" class="form-control">
                @foreach ($tags as $tag)
                    <option value="{{ $tag->id }}">
                           {{$tag->title}}
                    </option>
                @endforeach
            </select>
            @error('tag_id')
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
