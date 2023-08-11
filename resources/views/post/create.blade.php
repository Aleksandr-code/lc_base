@extends('layouts.main')
@section('content')

    <form action="{{route('post.store')}}" method="POST">
        <div class="mb-3">
            @csrf
            <label for="title" class="form-label">Название</label>
            <input type="text" class="form-control" id="title" name="title" value="{{old('title')}}">
            @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <label for="content" class="form-label">Описание</label>
            <textarea class="form-control" id="content" name="content">{{old('content')}}</textarea>
            @error('content')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <label for="img" class="form-label">Image</label>
            <input type="text" class="form-control" id="img" name="img" value="{{old('img')}}">
            @error('img')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <label for="category" class="form-label">Выберите категорию</label>
            <select class="form-select" id="category" name="category_id">
                @foreach($categories as $category)
                    <option {{old('category_id') == $category->id ? 'selected' : '' }}
                        value="{{$category->id}}">{{$category->title}}</option>
                @endforeach
            </select>
            <label for="tags" class="form-label">Выберите теги</label>
            <select class="form-select" id="tags" multiple name="tags[]">
                @foreach($tags as $tag)
                    <option value="{{$tag->id}}">{{$tag->title}}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Отправить</button>
    </form>

@endsection
