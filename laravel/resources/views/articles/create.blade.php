@extends('layouts.app')

@section('content')
    <h1>Create Article</h1>

    {!! Form::open(['method'=>'POST','action'=>'App\Http\Controllers\ArticleWebController@store', 'enctype'=>'multipart/form-data']) !!}
    <!-- moramo da imamo enctype da bi radilo dodavanje fajla -->
    <div class="form-group">
    {{Form::label('title','Title')}}
    {{Form::text('title','',['class'=>'form-control','placeholder'=>'title'])}}
    </div>
    <div class="form-group">
    {{Form::label('body','Body')}}
    {{Form::textarea('body','',['id'=>'article-ckeditor','class'=>'form-control','placeholder'=>'body text'])}}
    </div>
    <div class="form-group">
    {!! Form::select('cities', $cities, null, ['class' => 'form-control']) !!}
    </div>
    {{Form::submit('Submit'),['class'=>'btn btn-primary']}}
    {!! Form::close() !!}
@endsection