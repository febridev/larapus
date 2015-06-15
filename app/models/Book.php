<?php

class Book extends BaseModel {

	// Add your validation rules here
	public static $rules = [
		'title' => 'required | unique:books,title,:id',
		'author_id' => 'required|exists:authors,id',
		'amount' => 'numeric'
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

}
