<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\PostTag;
use App\Models\Tag;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        //Получение всех постов
        $posts = Post::All();

        //$category = Category::find(1);
        //Получение постов по id категории, вместо этого можно создать функцию в модели категорий
        //$posts = Post::where('category_id', $category->id)->get();
        //dump($posts);
        //or
        //dump($category->posts);

        //Получить категорию из поста
        //$post = Post::find(1);
        //dump($post->category);

        //Получить все тэги по id поста
        //$post = Post::find(1);
        //dump($post->tags);
        //Получить все посты по id тэга
        //$tag = Tag::find(1);
        //dump($tag->posts);

        return view('post.index', compact('posts'));
    }

    public function create()
    {
        $categories = Category::All();
        $tags = Tag::All();
        return view('post.create', compact('categories', 'tags'));
    }

    public function store()
    {
        $data = request()->validate([
            'title' => 'required|string',
            'content' => 'string',
            'img' => 'string',
            'category_id' => '',
            'tags' => ''
        ]);
        $tags = $data['tags'];
        unset($data['tags']);

        $post = Post::create($data);
        // Обходим циклом все теги в посту и добавляем в связанную таблицу
        /*foreach ($tags as $tag){
            PostTag::firstOrCreate([
                'post_id'=>$post->id,
                'tag_id'=>$tag,
            ]);
        }
        */
        $post->tags()->attach($tags);


        return redirect()->route('post.index');
    }

    public function show(Post $post)
    {
        return view('post.show', compact('post'));
    }

    public function edit(Post $post)
    {
        $categories = Category::All();
        $tags = Tag::All();
        return view('post.edit', compact('post', 'categories', 'tags'));
    }

    public function update(Post $post)
    {
        $data = request()->validate([
            'title' => 'string',
            'content' => 'string',
            'img' => 'string',
            'category_id' => '',
            'tags' => '',
        ]);
        $tags = $data['tags'];
        unset($data['tags']);

        $post->update($data);
        $post->tags()->sync($tags);
        return redirect()->route('post.show', $post->id);
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('post.index');
    }

    public function delete()
    {
//        $post = Post::find(2);
//        $post->delete();
//        dd('delete');
        $post = Post::withTrashed()->find(2);
        $post->restore();
        dd('restore');
    }

    public function firstOrCreate()
    {
        $post = Post::firstOrCreate([
            'title' => '2another post',
        ],
            [
                'content' => '2another content',
                'img' => '2anotherImage.png',
                'likes' => 50,
                'is_published' => 1,
            ]);
        dump($post);
        dd('firstOrCreate');
    }

    public function updateOrCreate()
    {
        $post = Post::updateOrCreate([
            'title' => '3another post',
        ],
            [
                'content' => '3 updated another content',
                'img' => '3anotherImage.png',
                'likes' => 50,
                'is_published' => 1,
            ]);
        dump($post);
        dd('firstOrUpdate');
    }
}
