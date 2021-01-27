<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use DB;

class ArticleWebController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth',['except'=>['index','show']]);//ovo sakriva bilo kakav vid post-a kada niko nije ulogovan
        //dozvolili smo da se prikazuje samo blog i pojedinacan article

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //ELOQUENT
        $articles = Article::select()->orderBy('created_at','desc')->paginate(10);
        return view('articles.index')->with('articles',$articles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $cities = DB::table('cities')->pluck('name', 'id','population');
        return view('articles.create',compact('cities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        
        $this->validate($request,[
            'title'=>'required',
            'body'=>'required',
            'cities'=>'required',
           
        ]);
        $article=new Article;
        $article->user_id=auth()->user()->id;//uzima current usera i cuva ga tako
        $article->title=$request->input('title');
        $article->body=$request->input('body');
        $article->city_id=$request->input('cities');
        $article->save();
        return redirect('/articles')->with('success','Article Created');

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
        $article= Article::find($id);
        return view('articles.show')->with('article',$article);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $cities = DB::table('cities')->pluck('name', 'id','population');
        $article= Article::find($id);
        if(auth()->user()->id !== $article->user_id){
            return redirect('/articles')->with('error',"Unauthorizes page.");
        }
        return view('articles.edit')->with('article',$article)->with('cities',$cities);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->validate($request,[
            'title'=>'required',
            'body'=>'required',
            'cities'=>'required',
           
        ]);
        $article=Article::find($id);
        //$article->user_id=auth()->user()->id;//uzima current usera i cuva ga tako
        $article->title=$request->input('title');
        $article->body=$request->input('body');
        $article->city_id=$request->input('cities');
        $article->save();
        return redirect('/articles')->with('success','Article Updated');
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
        $article=Article::find($id);
        $article->delete();
        return redirect('/articles')->with('success','Article Removed');
    }
}
