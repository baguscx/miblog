@extends('app')

@section("title", "Edit Post: $posts->title")

@section('content')
<div class="container">
<h3>Edit Post</h3>
<form method="POST" action={{url("/post/$posts->id/edit")}} class="form-group">
    @csrf @method("PATCH")
            <label for="title">Title :</label>
            <input type="text" class="form-control" name="title" id="title" value="{{$posts->title}}">
            @error('title')
            <div class="alert mb-3">{{ $message }}</div>
            @enderror
            <label for="content">Content :</label>
            <textarea class="form-control mb-3" name="content" id="content" rows="10">{{$posts->content}}</textarea>
            @error('content')
            <div class="alert-danger">{{ $message }}</div>
            @enderror
            <button value="Update" type="submit" class="btn btn-primary">Update</button>
</form>
</div>
@endsection