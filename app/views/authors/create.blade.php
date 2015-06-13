@extends('layouts.master')

@section('title')
	{{$title}} 
@stop

@section('breadcrumb')
	<li><a href="/">dashboard</a></li>
	<li><a href="{{route('admin.authors.index')}}">penulis</a></li>
	<li class="uk-active">{{$title}}</li>
@stop

@section('content')
	{{ Form::open(array('url'=>route('admin.authors.index'),'method'=>'post', 'class'=>'uk-form uk-form-horizontal'))}}
		@include('authors._form')
	{{Form::close()}}
@stop