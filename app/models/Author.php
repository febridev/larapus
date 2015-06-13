<?php

class Author extends BaseModel {

	// Add your validation rules here
	public static $rules = [
		'name' => 'required|unique:authors,name,:id',
		// 'title' => 'required'
	];

	// Don't forget to fill this array
	protected $fillable = ['name'];
	
	public function books()
	{
		return $this->hasMany('Book');
	}
	

}