<?php

class AuthorsController extends \BaseController {

	/**
	 * Display a listing of authors
	 *
	 * @return Response
	 */
	public function index()
	{
		$authors = Author::all();

		return View::make('authors.index', compact('authors'));
	}

	/**
	 * Show the form for creating a new author
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('authors.create');
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

		Author::create($data);

		return Redirect::route('authors.index');
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

		return View::make('authors.edit', compact('author'));
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

		$validator = Validator::make($data = Input::all(), Author::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$author->update($data);

		return Redirect::route('authors.index');
	}

	/**
	 * Remove the specified author from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Author::destroy($id);

		return Redirect::route('authors.index');
	}

}
