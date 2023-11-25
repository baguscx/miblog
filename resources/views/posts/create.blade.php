@extends('app')

@section('title', 'All Post')

@section('content')
<div class="container">
<h3>Create New Post</h3>
<form method="POST" action={{url('/post/new')}} class="form-group">
    @csrf
            <label for="title">Title :</label>
            <input type="text" class="form-control mb-3" name="title" id="title">
            <label for="content">Content :</label>
            <textarea class="form-control mb-3" name="content" id="content" rows="10"></textarea>
            <button value="Save" type="submit" class="btn btn-primary">Save</button>
</form>
</div>
@endsection