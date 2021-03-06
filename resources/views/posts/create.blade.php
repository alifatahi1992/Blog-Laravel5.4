@extends('layouts.master')

@section('content')
    <div class="col-sm-8 App-main">
        <h1>Create New Post</h1>

        <hr>

        <form method="post" action="/posts">

              @include('layouts.errors')

            {{csrf_field()}}

            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" class="form-control" id="title" name="title" >
            </div>

            <div class="form-group">
                <label for="body">Body:</label>
                <textarea name="body" id="body" class="form-control" ></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Publish</button>



        </form>
    </div>
@endsection