@extends('layouts.master');
@section('content')
    <div class="col-md-12">
        <div class="quote">
            <p> {{$pst['title']}}</p>
        </div>

    </div>
    <div class="row">
        <div class="col-md-12">
            <h1 class="post-title">Lets Learn</h1>
            {{--<p>All the post related description </p>--}}
            <p>{{$pst['content']}} </p>
            <a href="{{url('/')}}">Go Back</a>
        </div>

    </div>
@endsection