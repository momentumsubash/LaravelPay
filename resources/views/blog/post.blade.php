@extends('layouts.master');
@section('content')
    <div class="col-md-12">
        <div class="quote">
            <p> {{$post['title']}}</p>
        </div>

    </div>
    <div class="row">
        <div class="col-md-12">
            <h1 class="post-title">Lets Learn</h1>
            {{--<p>All the post related description </p>--}}
            <p> {{$post['content']}}</p>
            {{--<p><a href="{{route('blog.post',['id' => 1])}}">Read more..</a></p>--}}
        </div>
    </div>
    @endsection