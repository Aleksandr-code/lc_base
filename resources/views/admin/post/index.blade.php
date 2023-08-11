@extends('layouts.admin')

@section('content')
    <div>
        <p>Ссылки на посты не верны</p>
        <a href="{{route('post.create')}}" class="btn btn-primary mt-3 mb-3">Добавить</a>
        <div>
            @foreach($posts as $post)
                <div>
                    <a href="{{route('post.show', $post->id)}}"> {{$post->id}}. {{$post->title}}</a>
                </div>
            @endforeach
        </div>
        <div class="mt-5">
            {{$posts->withQueryString()->links()}}
        </div>
    </div>

@endsection
