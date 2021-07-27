@extends('layouts.dashboard')

@section('title', 'Team Work')




@section('content')

    <form action="{{ route('admin.team.store') }}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="form-group mb-3">
            <label for="">Name:</label>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror">
            @error('name')
            <p class="invalid-feedback">
                {{$message}}
            </p>
            @enderror
        </div>
        <div class="form-group mb-3">
            <label for="">Position:</label>
            <input type="text" name="position" class="form-control @error('position') is-invalid @enderror">
            @error('position')
            <p class="invalid-feedback">
                {{$message}}
            </p>
            @enderror
        </div>
        <div class="form-group mb-3">
            <label for="">Job:</label>
            <input type="text" name="job" class="form-control @error('job') is-invalid @enderror">
            @error('job')
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
