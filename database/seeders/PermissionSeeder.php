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
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'toevoegen ladderpartij']);
        Permission::create(['name' => 'toevoegen toernooipartij']);
        Permission::create(['name' => 'inzien spelergegevens']);
        Permission::create(['name' => 'inzien unieke spelergegevens']);
        Permission::create(['name' => 'aanpassen toernooipartij']);
        Permission::create(['name' => 'aanpassen ladderpartij']);
        Permission::create(['name' => 'uitslag doorgeven']);
        Permission::create(['name' => 'bekijk tegenstander']);
        Permission::create(['name' => 'bekijk deelnemers']);

        $role1 = Role::create(['name' => 'Admin']);
        $role1->givePermissionTo('toevoegen toernooipartij');
        $role1->givePermissionTo('inzien spelergegevens');
        $role1->givePermissionTo('aanpassen toernooipartij');
        $role1->givePermissionTo('aanpassen ladderpartij');

        $role4 = Role::create(['name' => 'Toernooispeler']);
        $role4->givePermissionTo('uitslag doorgeven');
        $role4->givePermissionTo('bekijk tegenstander');
        $role4->givePermissionTo('bekijk deelnemers');

        $role2 = Role::create(['name' => 'Speler']);
        $role2->givePermissionTo('toevoegen ladderpartij');
        $role2->givePermissionTo('aanpassen toernooipartij');
        $role2->givePermissionTo('inzien unieke spelergegevens');

        $role3 = Role::create(['name' => 'super-admin']);
    }
}
