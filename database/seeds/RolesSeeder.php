<?php

use Illuminate\Database\Seeder;
use App\Role;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = new Role;
        $role->id = 1;
        $role->name = "admin";
        $role->save();

        $role = new Role;
        $role->id = 2;
        $role->name = "user";
        $role->save();
    }
}
