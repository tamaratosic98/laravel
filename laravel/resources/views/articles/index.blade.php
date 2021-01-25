@extends('layouts.app')
@section('content')
    <h1>Articles</h1>
    @if(count($articles)>0)
        @foreach ($articles as $article)
            <div class="well">
                <div class="jumbotron">
                    <h3><a href="http://localhost:8080/laravel_domaci/laravel/public/articles/{{$article->id}}">{{$article->title}}</a></h3>
                    <div>
                        <?php
                         $city=new App\Models\City;
                         $city=App\Models\City::find($article->city_id);
                         echo 'City to visit: '.$city->name;
                        ?>
                    </div>
                    <small>Written on {{$article->created_at}}</small>
                </div>               
            </div>
        @endforeach
        {{$articles->links()}}
       
    @else <p>No articles found.</p>

    @endif
@endsection