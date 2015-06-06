<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class AuthorsTableSeeder extends Seeder {

	public function run()
	{
		//kosongkan database
		DB::table('authors')->delete();
		
		//buat array untuk di input
		$authors= [
			['id'=>1,'name'=>'muhammad', 'created_at'=>'2014-05-01 11:15:22','updated_at'=>'2015-05-01 11:15:22'],
			['id'=>2,'name'=>'Salim', 'created_at'=>'2014-05-01 11:15:22','updated_at'=>'2015-05-01 11:15:22'],
			['id'=>3,'name'=>'amiruddin', 'created_at'=>'2014-05-01 11:15:22','updated_at'=>'2015-05-01 11:15:22']
		];
		
		//insert ke database
		DB::table('authors')->insert($authors);
	}

}