@extends('layouts.dashboard')

@section('title', 'Categories')




@section('content')

    <form action="{{ route('admin.categories.store') }}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="form-group mb-3">
            <label for="">Name:</label>
            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror">
            @error('title')
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
