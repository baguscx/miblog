@extends('app')

@section('title')

    @if(request()->search)
    Search : {{request()->search}}
    @else
    All Post
    @endif
@endsection

@section('content')
    <div class="container">
        @if(!request()->search)
        <h3>All Post </h3>
            <span>Total :
            {{$total_post}}
        </span>
        @else
        <h5>Search : {{request()->search}}</h5>
        @endif


        @foreach ($posts as $post)
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">{{$post->title}}</h5>
                <p class="card-text">{{$post->content}}</p>
                <p class="card-text"><small class="text-body-secondary">{{$post->updated_at->format('d F Y H:i')}}</small></p>
                <a href="{{url("post/$post->id")}}" class="btn btn-primary rounded-pill px-3">Read more</a>
                <a href="{{url("post/$post->id/edit")}}" class="btn btn-success rounded-pill px-3">Edit</a>
                <form action="{{url("post/$post->id")}}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger rounded-pill px-3" type="submit">Delete</button>
                </form>
            </div>
        </div>
        @endforeach
        {{$posts->links('pagination::bootstrap-4')}}
    </div>
@endsection