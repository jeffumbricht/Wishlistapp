<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {

    Schema::disableForeignKeyConstraints();
    DB::table('users')->delete();
    DB::table('wishlist_items')->delete();

    DB::table('users')->insert([
      'name' => str_random(10),
      'email' => 'email@gmail.com',
      'password' => bcrypt('secret'),
    ]);

    factory(App\User::class, 5)->create()->each(function ($u) {
      factory(App\WishlistItem::class, 5)->create(['user_id' => $u->id]);
    });
  }
}
