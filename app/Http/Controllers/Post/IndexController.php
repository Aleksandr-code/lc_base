<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Http\Filters\PostFilter;
use App\Http\Requests\Post\FilterRequest;
use App\Http\Resources\Post\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;

class IndexController extends BaseController
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(FilterRequest $request)
    {
        //Работа с классом Policy - запрет посещения страницы не авторизованным пользователям
        //$this->authorize('view', auth()->user());
        $data = $request->validated();

        $page = $data['page'] ?? 1;
        $perPage = $data['per_page'] ?? 10;

        //Фильтр на основе Dependency Injection
        $filter = app()->make(PostFilter::class, ['queryParams' => array_filter($data)]);
        $posts = Post::filter($filter)->paginate($perPage, ['*'], 'page', $page);
//        dd($posts);

        //Констриуирование запроса
        //$query = Post::query();
        //if (isset($data['category_id'])){
        //   $query->where('category_id', $data['category_id']);
        //}
        // if (isset($data['title'])){
        //    $query->where('title', 'like', "%{$data['title']}%");
        // }
        // $posts = $query->get();
        // dd($posts);

        //Пагинация
        //$posts = Post::paginate(10);

        return PostResource::collection($posts);

        //return view('post.index', compact('posts'));
    }
}
