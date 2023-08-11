@extends('layouts.main')
@section('content')

    <form action="{{route('post.update', $post->id)}}" method="POST">
        <div class="mb-3">
            @csrf
            @method('patch')
            <label for="title" class="form-label">Название</label>
            <input type="text" class="form-control" id="title" name="title" value="{{$post->title}}">
            <label for="content" class="form-label">Описание</label>
            <textarea class="form-control" id="content" name="content">{{$post->content}}</textarea>
            <label for="img" class="form-label">Image</label>
            <input type="text" class="form-control" id="img" name="img" value="{{$post->img}}">
            <label for="category" class="form-label">Категория:</label>
            <select class="form-select" id="category" name="category_id">
                @foreach($categories as $category)
                    <option
                        {{$category->id === $post->category->id ? 'selected' : ''}}
                        value="{{$category->id}}">
                        {{$category->title}}
                    </option>
                @endforeach
            </select>
            <label for="tags" class="form-label">Выберите теги</label>
            <select class="form-select" id="tags" multiple name="tags[]">
                @foreach($tags as $tag)
                    <option
                        @foreach($post->tags as $postTag)
                            {{$tag->id === $postTag->id ? 'selected' : ''}}
                        @endforeach
                        value="{{$tag->id}}">
                        {{$tag->title}}
                    </option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Обновить данные</button>
    </form>

@endsection
