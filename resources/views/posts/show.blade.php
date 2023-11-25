@extends('app')

@section('title', $posts->title)

@section('content')
<div class="container">
    <h1 class="mt-5">{{$posts->title}}</h1>
    <p><small class="text-body-secondary">{{$posts->updated_at->format('d F Y H:i')}}</small></p>
    <p class="lead">{{$posts->content}}</p>
</div>
@endsection