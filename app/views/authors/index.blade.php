@extends('layouts.master')

@section('asset')
	@include('layouts.partials.datatable')
@stop

@section('title')
	{{ $title}}
@stop

@section('title-button')
	{{ HTML::buttonAdd() }}
@stop

@section('breadcrumb')
	<li>Dashboard</li>
	<li>{{ $title }}</li>
@stop

@section('content')
	{{
		Datatable::table()
			->addColumn('id','Nama','')
			->setOptions('aoColumnDefs',array(
				array(
					'bVisible' => false,
					'aTargets' => [0]),
				array(
					'sTitle' => 'Nama',
					'aTargets' => [1]),
				array(
					'bSortable' => false,
					'aTargets' => [2]),
				))
			->setOptions('bProcessing', true)
			->setUrl(route('admin.authors.index'))
			->render('datatable.uikit')
	}}
@stop

