<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class UsersTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('users')->truncate();
		DB::table('posts')->truncate();

		factory(App\User::class, 10)->create()->each(function ($u) {
			for ($i = 1; $i <= 5; $i++) {
				$u->posts()->save(factory(App\Post::class)->make());
			}
		});

		$user = App\User::find(1);
		$user->name = "Jordan Cachero";
		$user->email = "cacherojordan@gmail.com";
		$user->save();
	}
}
