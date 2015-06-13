@extends('layouts.master')

@section('title')
	{{$title}}
@stop

@section('breadcrumb')
	<li><a href="/">Dashboard</a></li>
	<li><a href="{{ route('admin.authors.index')}}">Penulis</a></li>
	<li class="active">{{$title}}</li>
@stop

@section('content')
	{{ Form::model($author, array('url'=>route('admin.authors.update', ['author'=>$author->id]), 'method'=>'put','class'=>'uk-form uk-form-horizontal'))}}
	@include('authors._form')
	{{ Form::close()}}
@stop