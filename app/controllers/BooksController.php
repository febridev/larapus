<?php

class BooksController extends \BaseController {

	/**
	 * Display a listing of books
	 *
	 * @return Response
	 */
	public function index()
	{
		if(Datatable::shouldHandle())
		{
			//eager load author untuk menghemat query sql
			return Datatable::collection(Book::with('author')->get())
				->showColumns('id','title','amount')
				//menggunakan closure untuk menapilkan nama penulis dari relasi
				->addColumn('author', function($model)
					{
						return $model->author->name;
					})
				->addColumn('', function($model)
					{
						$html = '<a href="'.route('admin.books.edit',
						['books'=>$model->id]).'">Edit </a>';

						$html.= Form::open(array('url'=>route('admin.books.destroy', ['books'=>$model->id]), 'method'=>'delete','class'=>'uk-display-inline'));
						$html.= Form::submit('delete',array('class'=>'uk-button uk-button-small'));
						$html.= Form::close();
						return $html;
					})
				->searchColumns('title','amount','author')
				->orderColumns('title','amount','author')
				->make();
		}
		return View::make('books.index')->withTitle('Buku');
	}

	/**
	 * Show the form for creating a new book
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('books.create')->withTitle('Tambah Buku');
	}

	/**
	 * Store a newly created book in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Book::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$book = Book::create($data);


		return Redirect::route('admin.books.index')->with("successMessage",
													"Berhasil Menyimpan $book->title");
	}

	/**
	 * Display the specified book.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$book = Book::findOrFail($id);

		return View::make('books.show', compact('book'));
	}

	/**
	 * Show the form for editing the specified book.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$book = Book::find($id);

		return View::make('books.edit', ['book'=>$book])
											->withTitle("Ubah $book->name");
	}

	/**
	 * Update the specified book in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$book = Book::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Book::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$book->update($data);

		return Redirect::route('admin.books.index')
					->with("successMessage", "Berhasil Menyimpan $book->title");
	}

	/**
	 * Remove the specified book from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Book::destroy($id);

		return Redirect::route('admin.books.index')->with("successMessage","Buku Berhasil Di hapus");
	}

}
