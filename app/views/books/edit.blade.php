@extends('layouts.master')

@section('title')
  {{$title}}
@endsection

@section('asset')
  @include('layouts.partials.select2')
@endsection

@section('breadcrumb')
  <li><a href="/">Dashboard</a></li>
  <li><a href="{{route('admin.books.index')}}"></a>Buku</li>
  <li class="uk-active">{{$title}}</li>
@endsection

@section('content')
  {{Form::model($book, array('url' => route('admin.books.update',['books'=>$book->id]), 'method'=>'put',
                            'class'=>'uk-form uk-form-horizontal','files'=>'true'))}}
  @include('books._form')
  {{ Form::close()}}
@endsection
