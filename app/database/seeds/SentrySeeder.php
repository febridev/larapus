<?php
	class SentrySeeder extends Seeder
	{
		/**
		*jalankan database seeder
		*
		*@return void
		*/
		public function run()
		{
			//hapus isi dari table users, groups, users_groups, dan throttle
			DB::table('users_groups')->delete();
			DB::table('groups')->delete();
			DB::table('users')->delete();
			DB::table('throttle')->delete();
			
			try
			{
				//membuat group admin
				$group = Sentry::createGroup(array(
					'name'			=> 'admin',
					'permissions'	=> array(
						'admin'		=> 1,
					),
				));
				//membuat group regular
				$group = Sentry::createGroup(array(
					'name'			=> 'regular',
					'permissions'	=> array(
						'regular'	=> 1,
					),
				));
			}
			
			catch(Cartalyst\Sentry\Groups\NameRequiredException $e)
			{
				echo 'name file is required';
			}
			catch(Cartalyst\Sentry\Groups\GroupExistsException $e)
			{
				echo'group already exist';
			}
		}
	}
	?>