<?php

namespace App\Http\Controllers;
use App\Models\Article;
use App\Http\Resources\Article as ArticleResource;
use App\Http\Requests;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    //funkcije za api
    public function index()
    {
        //
        $articles = Article::paginate(15);
        //Return the collection of articles as a resource
        return ArticleResource::collection($articles);

    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //for creating and updating
        $article=$request->isMethod('put')? Article::findOrFail($request->article_id):new Article;
        $article->user_id=auth()->user()->id;
        $article->id=$request->input('article_id');
        $article->title=$request->input('title');
        $article->body=$request->input('body');
        if($article->save()){
         return new ArticleResource($article);

        }

    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $article = Article::findOrFail($id);
        return new ArticleResource($article);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $article = Article::findOrFail($id);
        //return the single article as a resource
        if($article->delete()){
            return new ArticleResource($article);
        }

    }
    

  
}
