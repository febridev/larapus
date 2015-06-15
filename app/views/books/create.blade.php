@extends('layouts.master')

@section('asset')
	@include('layouts.partials.select2')
@stop

@section('breadcrumb')
	<li><a href="/">Dashboard</a></li>
	<li><a href="{{ route('admin.books.index')}}">Buku</a></li>
	<li class="uk-active">{{$title}}</li>
@stop

@section('content')
	{{ Form::open(array('url'=>route('admin.books.store'),'method'=>'post','class'=>'uk-form-horizontal'))}}
	@include('books._form')
	{{ Form::close()}}
@stop