@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                    <a href="http://localhost:8080/laravel_domaci/laravel/public/articles/create" class="btn btn-primary">Create Article</a>
                    @if(count($articles)>0)
                    <h3>Your Blog Articles</h3>
                    <table class="table table-striped">
                            <tr>
                                <th>Title</th>
                                <th>City</th>
                                <th></th>
                                <th></th>
                            </tr>
                            @foreach($articles as $article)
                                <tr>
                                    <th>{{$article->title}}</th>
                                    <th>
                                        <?php
                                            $city=new App\Models\City;
                                            $city=App\Models\City::find($article->city_id);
                                            echo $city->name;
                                        ?>
                                    </th>
                                    <th><a href="http://localhost:8080/laravel_domaci/laravel/public/articles/{{$article->id}}/edit" class="btn btn-success">Edit</a></th>
                                    <th>
                                        {!!Form::open(['action'=>['App\Http\Controllers\ArticleWebController@destroy', $article->id],'method'=>'POST','class'=>'pull-right']) !!}
                                        {{Form::hidden('_method','DELETE')}}
                                        {{Form::submit('Delete',['class'=>'btn btn-danger'])}}
                                        {!!Form::close()!!}
                                    </th>
                                </tr>
                            @endforeach
                    </table>
                    @else <p>You have no articles.</p>
                    
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
