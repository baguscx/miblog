@extends('app')

@section('title', 'All Post')

@section('content')
<div class="container">
<h3>Edit Post</h3>
<form method="POST" action={{url("/post/$posts->id/edit")}} class="form-group">
    @csrf @method("PATCH")
            <label for="title">Title :</label>
            <input type="text" class="form-control mb-3" name="title" id="title" value="{{$posts->title}}">
            <label for="content">Content :</label>
            <textarea class="form-control mb-3" name="content" id="content" rows="10">{{$posts->content}}</textarea>
            <button value="Update" type="submit" class="btn btn-primary">Update</button>
</form>
</div>
@endsection