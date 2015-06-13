<?php
	class BooksTableSeeder extends Seeder
	{
		public function run()
		{
			//kosongkan table
			DB::table('books')->delete();
			
			//buat array untuk di input
			$books = 
			[
				['id'=>1,'title'=>'Kupinang Engkau Dengan Hamdalah', 'author_id'=>1, 'amount'=>3, 'created_at'=>'2014-05-16 11:15:22', 'updated_at'=>'2014-05-16 11:15:22'],
				['id'=>2,'title'=>'Jalan Cinta Para Pejuang', 'author_id'=>2, 'amount'=>2, 'created_at'=>'2014-05-16 11:15:22', 'updated_at'=>'2014-05-16 11:15:22'],
				['id'=>3,'title'=>'Membingkai Surga Dalam Rumah Tangga', 'author_id'=>3, 'amount'=>4, 'created_at'=>'2014-05-16 11:15:22', 'updated_at'=>'2014-05-16 11:15:22'],
				['id'=>4,'title'=>'Cinta & Seks Dalam Rumah Tangga Muslim', 'author_id'=>3, 'amount'=>3, 'created_at'=>'2014-05-16 11:15:22', 'updated_at'=>'2014-05-16 11:15:22']
				
			];
			
			//insert data ke database
			DB::table('books')->insert($books);
		}
	}