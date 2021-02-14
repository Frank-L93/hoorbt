<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {




        $role4 = Role::findByName('Toernooispeler');
        $role4->givePermissionTo('uitslag doorgeven');
        $role4->givePermissionTo('bekijk tegenstander');
        $role4->givePermissionTo('bekijk deelnemers');


    }
}
