
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
                </div>               
            </div>
@endsection