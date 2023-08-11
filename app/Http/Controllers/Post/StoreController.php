<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\StoreRequest;
use App\Http\Resources\Post\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;

class StoreController extends BaseController
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();

        $post = $this->service->store($data);

        //Пример работы ресурса / Создание массива для ответа на фронтенд в виде JSON
        //$arr = [
        //    'title' => $post->title,
        //    'content' => $post->content,
        //    'img' => $post->img
        //];
        //return $arr;

        return $post instanceof Post ? new PostResource($post) : $post;

        // return new PostResource($post);

        //return redirect()->route('post.index');
    }
}
