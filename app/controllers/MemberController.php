<?php

class MemberController extends BaseController {

	public function books()
	{
		if (Datatable::shouldHandle())
		{
			//eager load author untuk menghemat query
			return Datatable::collection(Book::with('author')->get())
				->showColumns('id','title','amount')
				//menggunakan clouser untuk menampilkan nama penulis dari relasi
				->addColumn('author',fucntion ($model)
				{
					return $model->author->name;
				})
				//menggunakan helper untuk membuat link
				->addColumn('',function ($model)
				{
					return link_to('books.borrow','Pinjam',['book'=>$model->id]);
				})
				->searchColumns('title','amount','author')
				->orderColumns('title','amount','author')
				->make();
		}
		return View::make('books.borrow')->withTitle('Pilih Buku');
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
