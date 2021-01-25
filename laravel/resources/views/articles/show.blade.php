
@extends('layouts.app')
@section('content')
    <a href="http://localhost:8080/laravel_domaci/laravel/public/articles" class="btn btn-default">Go Back</a>
    <h1>Article</h1>
            <div class="well">
                <div class="jumbotron">
                    <h3>{{$article->title}}</h3>
                    <div>
                        {!!$article->body!!}
                    </div>
                    <div>
                        <?php
                         $city=new App\Models\City;
                         $city=App\Models\City::find($article->city_id);
                         echo 'City to visit: '.$city->name;
                        ?>
                    </div>
                    <hr style="background-color:white">
                    <small>Written on {{$article->created_at}}</small>
                    <br>
                    <a href="http://localhost:8080/laravel_domaci/laravel/public/articles/{{$article->id}}/edit" class="btn btn-success">Edit</a>
                    {!!Form::open(['action'=>['App\Http\Controllers\ArticleWebController@destroy', $article->id],'method'=>'POST','class'=>'pull-right']) !!}
                    {{Form::hidden('_method','DELETE')}}
                    {{Form::submit('Delete',['class'=>'btn btn-danger'])}}
                    {!!Form::close()!!}
                </div>               
            </div>
@endsection