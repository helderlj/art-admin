<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleRequest;
use App\Http\Resources\ArticleResource;
use App\Models\Article;

class ArticleController extends Controller
{
    public function index()
    {
        return ArticleResource::collection(Article::all());
    }

    public function store(ArticleRequest $request)
    {
        return new ArticleResource(Article::create($request->validated()));
    }

    public function show(Article $article)
    {
        return new ArticleResource($article);
    }

    public function update(ArticleRequest $request, Article $article)
    {
        $article->update($request->validated());

        return new ArticleResource($article);
    }

    public function destroy(Article $article)
    {
        $article->delete();

        return response()->json();
    }
}
