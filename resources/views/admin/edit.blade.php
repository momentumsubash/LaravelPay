@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <form action="" method="post">
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" name="title">

                </div>
                <div class="form-group">
                    <label for="content">content</label>
                    <input type="text" class="form-control" id="content" name="content">
                </div>
            </form>
        </div>
    </div>
    @endsection