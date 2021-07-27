@extends('layouts.dashboard')

@section('title', 'Sub-Services')


@section('content')

    <form action="{{ route('admin.subservises.update', $servicesD->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')

        <div class="form-group mb-3">
            <label for="">Title:</label>
            <input type="text" name="title" value="{{old('title',$servicesD->title)}}" class="form-control">
            @error('title')
            <p class="invalid-feedback">
                {{$message}}
            </p>
            @enderror
        </div>
        <div class="form-group mb-3">
            <label for="">Text:</label>
            <input type="text" name="text" value="{{old('text',$servicesD->text)}}" class="form-control">
            @error('text')
            <p class="invalid-feedback">
                {{$message}}
            </p>
            @enderror
        </div>
        <div class="form-group mb-3">
            <label for="">Service:</label>
            <select name="service_id" class="form-control" >
                <option value="">Select Service</option>
                @foreach ($services as $service)
                    <option value="{{ $service->id }}" @if($service->id == old('service_id',$servicesD->service_id)) selected @endif>
                        {{$service->title}}
                    </option>
                @endforeach
            </select>
            @error('service_id')
            <p class="invalid-feedback">
                {{$message}}
            </p>
            @enderror
        </div>
        <div class="form-group mb-3">
            <label for="">Photo:</label>
            <input type="file" name="photo" value="{{old('photo',$servicesD->photo)}}" class="form-control">
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
