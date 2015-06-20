<?php

class AuthorsController extends \BaseController {

	/**
	 * Display a listing of authors
	 *
	 * @return Response
	 */
	public function index()
	{
		if (Datatable::shouldHandle())
		{
			return Datatable::collection(Author::all(array('id','name')))
				->showColumns('id','name')
				->addColumn('', function ($model)
					{
						$html = '<a href="'.route('admin.authors.edit',['authors'=>$model->id]).'" class="uk-button uk-button-small uk-button-link"> Edit</a>';
						$html .= Form::open(array('url' => route ('admin.authors.destroy', ['authors'=>$model->id]),'method'=>'delete','class'=>'uk-display-inline'));
						$html .= Form::submit('delete', array('class'=>'uk-button uk-button-small'));
						$html .= Form::close();
						return $html;
					})
				->searchColumns('name')
				->orderColumns('name')
				->make();
		}
		return View::make('authors.index')->withTitle('Penulis');
	}

	/**
	 * Show the form for creating a new author
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('authors.create')->withTitle('Tambah Penulis');
	}

	/**
	 * Store a newly created author in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Author::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$author=Author::create($data);

		return Redirect::route('admin.authors.index')->withMessage("successMessage","Berhasil Menyimpan $author->name");
	}

	/**
	 * Display the specified author.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$author = Author::findOrFail($id);

		return View::make('authors.show', compact('author'));
	}

	/**
	 * Show the form for editing the specified author.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$author = Author::find($id);

		return View::make('authors.edit', ['author'=>$author])->withTitle("Ubah $author->name");
	}

	/**
	 * Update the specified author in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$author = Author::findOrFail($id);

		$validator = Validator::make($data = Input::all(), $author->updateRules());

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$author->update($data);

		return Redirect::route('admin.authors.index')->with("successMessage", "Berhasil Menyimpan $author->name");
	}

	/**
	 * Remove the specified author from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		if (!Author::destroy($id))
		{
			return Redirect::back();
		}
		return Redirect::route('admin.authors.index')->with('successMessage','Penulis Berhasil Di hapus');
	}

}
