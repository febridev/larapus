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

	public static function boot()
	{
		parent::boot();

		self::deleting(function($author)
		{
			//mengecek apakah penulis masih punya Buku
			if ($author->books->count())
			{
				$html = 'Penulis tidak bisa di hapus karena masih memiliki buku : ';
				$html .= '<ul>';
				foreach ($author->books as $book)
				{
					$html .= "<li>$book->title</li>";
					# code...
				}
				$html .= "</ul>";
				Session::flash('errorMessage', $html);
				return false;
			}
		});
	}
}
