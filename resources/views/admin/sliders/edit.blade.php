@extends('layouts.dashboard')

@section('title', 'Sliders')


@section('content')

    <form action="{{ route('admin.sliders.update', $sliders->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')

        <div class="form-group mb-3">
            <label for="">Title:</label>
            <input type="text" name="title" value="{{old('title',$sliders->title)}}" class="form-control @error('title') is-invalid @enderror">
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
            <select multiple name="tag_id[]" class="form-control">
                @foreach ($tags as $tag)
                    <option value="{{ $tag->id }}"
                                @if($tag->id == old('tag_id',$sliders->tag_id)) selected @endif>
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
            <button type="submit" class="btn btn-primary"> Update </button>
        </div>

    </form>

@endsection
