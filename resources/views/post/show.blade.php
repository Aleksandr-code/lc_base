@extends('layouts.main')
@section('content')

    <div>This is post №{{$post->id}} page</div>
    <div>
            <div>
                {{$post->id}}. {{$post->title}}
            </div>
            <div>
                {{$post->content}}
            </div>
    </div>
    <div>
        <a href="{{route('post.edit', $post->id)}}" class="btn btn-primary mt-3">Редактировать</a>
    </div>
    <div>
        <form action="{{route('post.destroy', $post->id)}}" method="POST">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-primary mt-3">Удалить</button>
        </form>
    </div>
    <a href="{{route('post.index')}}" class="btn btn-primary mt-3">Назад</a>


@endsection
