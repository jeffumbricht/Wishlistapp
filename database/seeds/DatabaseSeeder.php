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
        // Clear everything out
        Schema::disableForeignKeyConstraints();
        DB::table('users')->delete();
        DB::table('role_user')->delete();
        DB::table('roles')->delete();
        DB::table('wishlist_items')->delete();
        // seeds
        $this->call(RoleTableSeeder::class);
        $this->call(UserTableSeeder::class);
    }
}
