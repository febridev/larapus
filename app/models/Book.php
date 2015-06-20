<?php

class Book extends BaseModel {

	// Add your validation rules here
	public static $rules = [
		'title' => 'required | unique:books,title,:id',
		'author_id' => 'required|exists:authors,id',
		'amount' => 'numeric',
		'cover' => 'image|max:2048'
		// 'title' => 'required'
	];

	// Don't forget to fill this array
	protected $fillable = [
		'title','author_id','amount'
	];

	public function author()
	{
		return $this->belongsTo('Author');
	}

	public function users()
	{
		return $this->belongsToMany('User')->withPivot('returned')->withTimeStamps();
	}

	public function borrow()
	{
		//ambil user yang sedang Login
		$user = Sentry::getUser();


		//attach user ke buku
		return $this->users()->attach($user);
	}

}
