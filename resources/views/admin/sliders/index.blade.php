@extends('layouts.dashboard')

@section('title', 'Sliders')


@section('content')

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('pannelassets/css/bootstrap.min.css')}}">

</head>
<body>
<div class="container">

    <div class="table-toolbar mb-3">
        <a href="{{ route('admin.sliders.create') }}" class="btn btn-info">Create</a>
    </div>

    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Tags</th>
            <th>Photo</th>
            <th>Created at</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($sliders as $slider)
            <tr>
                <td>{{$slider->id}}</td>
                <td><a href="{{ route('admin.sliders.edit',$slider->id )}}">{{$slider->title}}</a></td>
                <td>
                    @foreach($slider->tags as $slid)
                        ,{{$slid->title}}
                    @endforeach
                </td>
                <td>
                    <img width="100" src="{{$slider->image_link}}" alt="">
                </td>
                <td>{{$slider->created_at}}</td>

                <td>
                    <form action="{{ route('admin.sliders.destroy', $slider->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach


        </tbody>
    </table>
</div>
</body>
</html>
@endsection

