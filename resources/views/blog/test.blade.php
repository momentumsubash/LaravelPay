@extends('layouts.master')
@section('content')

    {{--<p>{{2==3?'hello':'does not equal'}}</p>--}}
    <div class="row">
        <div class="col-md-12">
            {{--<h1>Our control structures</h1>--}}
            {{--<p>hello</p>--}}
            {{--@if(false)--}}
            {{--<p>This displays when true</p>--}}
            {{--@else--}}
            {{--<p>this displays if it sis false</p>--}}
            {{--@endif--}}
            {{--<hr>--}}
            {{--@for($i=0;$i<5;$i++)--}}
            {{--<p>{{$i+1}}.Itetration</p>--}}
            {{--@endfor--}}
            {{--<hr>--}}
            {{--<h2>xss</h2>--}}
            {{--{{"<script>alert('hello');</script>"}}--}}
            {{--{!! "<script>alert('hello');</script>" !!}--}}
            {{--above for learning--}}

            <p class="quote">Laravel is beutyful</p>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h1 class="post-title">Lets Learn</h1>
                <p>This is our learning blog</p>
                <p><a href="{{route('blog.post',['id' => 1])}}">Read more..</a></p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h1 class="post-title">Our Next Step</h1>
                <p>Lets first go with the basics</p>
                <p><a href="{{route('blog.post',['id' => 2])}}">Read more..</a></p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h1 class="post-title">Start with Our Homestead Laravel</h1>
                <p>Laravel is packed with surprises and lots of commands</p>
                <p><a href="{{route('blog.post',['id' => 3])}}">Read more..</a></p>
            </div>
        </div>
    </div>

@endsection