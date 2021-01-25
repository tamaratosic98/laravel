<?php 
use App\Http\Controllers\ArticleWebController;
?>
@extends('layouts/app')

@section('content')
<h1>Edit Article</h1>
{!! Form::open(['method'=>'POST','action'=>['App\Http\Controllers\ArticleWebController@update',$article->id], 'enctype'=>'multipart/form-data']) !!}
<div class="form-group">
    {{Form::label('title','Title')}}
    {{Form::text('title',$article->title,['class'=>'form-control','placeholder'=>'title'])}}
</div>
<div class="form-group">
    {{Form::label('body','Body')}}
    {{Form::textarea('body',$article->body,['id'=>'article-ckeditor','class'=>'form-control','placeholder'=>'body text'])}}
</div>
<div class="form-group">
    {!! Form::select('cities', $cities, $article->city_id, ['class' => 'form-control']) !!}
</div>
{{Form::hidden('_method','PUT')}} <!-- ovo se radi jer pise da je put/patch za update-->
{{Form::submit('Submit'),['class'=>'btn btn-primary']}}
{!! Form::close() !!}
@endsection