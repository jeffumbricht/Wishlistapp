<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;
use App\WishlistItem;

class UserTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $role_admin  = Role::where('name', 'admin')->first();

    $admin = new User();
    $admin->name = 'Admin';
    $admin->email = 'admin@example.com';
    $admin->password = bcrypt('secret');
    $admin->save();
    $admin->roles()->attach($role_admin);


    factory(User::class, 5)->create()->each(function ($u) {
      $u->roles()->attach(Role::where('name', 'generic')->first());
      factory(WishlistItem::class, 5)->create(['user_id' => $u->id]);
    });
  }
}
