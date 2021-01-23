@extends('layouts.app')
@section('content')
<div class="jumbotron text-center">
    <h1>{{$title}}</h1>
    <h1>Index strana</h1>
    <p>
        <a class="btn btn-primary btn-lg" href="http://localhost:8080/laravel_domaci/laravel/public/login" 
        role="button">Login</a>
        <a class="btn btn-success btn-lg" href="http://localhost:8080/laravel_domaci/laravel/public/register" 
        role="button">Register</a>
</p>
</div>

@endsection
