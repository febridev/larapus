<?php

class Author extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		'name' => 'required|unique:authors'
		// 'title' => 'required'
	];

	// Don't forget to fill this array
	protected $fillable = ['name'];

}