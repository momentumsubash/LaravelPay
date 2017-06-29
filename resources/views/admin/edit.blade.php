@extends('layouts.admin')
@section('content')
   @include('partials.errors')
    <div class="row">
        <div class="col-md-12">
            <form action="{{route('admin.update')}}" method="post">
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{$post['title']}}">

                </div>
                <div class="form-group">
                    <label for="content">content</label>
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <input type="text" class="form-control" id="content" name="content" value="{{$post['content']}}">
                </div>
                <button type="submit" class="btn btn-primary">submit</button>
            </form>
        </div>
    </div>
    @endsection