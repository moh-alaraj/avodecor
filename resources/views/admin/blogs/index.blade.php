@extends('layouts.dashboard')

@section('title', 'Blogs')


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
        <a href="{{ route('admin.blogs.create') }}" class="btn btn-info">Create</a>
    </div>

    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Description</th>
            <th>Photo</th>
            <th>Created at</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($blogs as $blog)
            <tr>
                <td>{{$blog->id}}</td>
                <td><a href="{{ route('admin.blogs.edit',$blog->id )}}">{{$blog->title}}</a></td>
                <td>{{$blog->short}}</td>

                <td>
                    <img width="100" src="{{$blog->image_link}}" alt="">
                </td>
                <td>{{$blog->created_at}}</td>

                <td>
                    <form action="{{ route('admin.blogs.destroy', $blog->id) }}" method="post">
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

