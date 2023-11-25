@extends('app')

@section('title', 'All Post')

@section('content')
    <div class="container">
        <h3>All Post </h3> <span>Total : {{$total_post}}</span>
        @foreach ($posts as $post)
        <div class="card mb-3">
        <div class="card-body">
        <h5 class="card-title">{{$post->title}}</h5>
        <p class="card-text">{{$post->content}}</p>
            <p class="card-text"><small class="text-body-secondary">{{$post->updated_at->format('d F Y H:i')}}</small></p>
            <a href="{{url("post/$post->id")}}" class="btn btn-success">Selengkapnya</a>
        </div>
    </div>
        @endforeach
        {{$posts->links('pagination::bootstrap-4')}}
</div>
@endsection