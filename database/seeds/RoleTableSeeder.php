<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_admin = new Role();
        $role_admin->name = 'admin';
        $role_admin->description = 'An Admin User';
        $role_admin->save();

        $role_generic = new Role();
        $role_generic->name = 'generic';
        $role_generic->description = 'A Generic User';
        $role_generic->save();
    }
}
