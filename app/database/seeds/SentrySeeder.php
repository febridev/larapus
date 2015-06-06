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
			
			try
			{
				//membuat admin baru
				$admin = Sentry::register(array(
					//isi sesuai dengan keinginan
					'email' => 'adminlarapus@gmail.com',
					'password' => '123456',
					'first_name' => 'Admin',
					'last_name' => 'Larapus'
				), true);//langsung di aktifasi
				
				//cari group admin
				$adminGroup = Sentry::findGroupByName('admin');
				
				//masukkan user ke group admin
				$admin->addGroup($adminGroup);
				
				//membuat user regular
				$user = Sentry::register(array(
					//silahkan ganti sesuai keinginan 
					'email' => 'userlarapus@gmail.com',
					'password' => '123456',
					'first_name' => 'User',
					'last_name' => 'Larapus'
				), true);
				
				//cari group admin
				$regularGroup = Sentry::findGroupByName('regular');
				
				//masukkan user ke group admin
				$user->addGroup($regularGroup);
				
			}
			
			catch (Cartalyst\Sentry\Users\LoginRequiredException $e)
			{
				echo 'Login Field is Required.';
			}
			catch (Cartalyst\Sentry\Users\PasswordRequiredException $e)
			{
				echo 'Password Field is Required.';
			}
			catch (Cartalyst\Sentry\Users\UsersExistsException $e)
			{
				echo 'User with this login already exists.';
			}
			catch (Cartalyst\Sentry\Groups\GroupNotFoundException $e)
			{
				echo 'Group was not found.';
			}
		}
	}
	?>