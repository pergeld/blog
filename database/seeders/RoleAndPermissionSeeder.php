<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create(['name' => 'Hír létrehozás']);
        Permission::create(['name' => 'Hír szerkesztés']);
        Permission::create(['name' => 'Hír törlés']);

        Permission::create(['name' => 'Hír kategória létrehozás']);
        Permission::create(['name' => 'Hír kategória szerkesztés']);
        Permission::create(['name' => 'Hír kategória törlés']);

        Permission::create(['name' => 'Címke létrehozás']);
        Permission::create(['name' => 'Címke szerkesztés']);
        Permission::create(['name' => 'Címke törlés']);

        Permission::create(['name' => 'Tartalomkezelő létrehozás']);
        Permission::create(['name' => 'Tartalomkezelő szerkesztés']);
        Permission::create(['name' => 'Tartalomkezelő törlés']);

        Permission::create(['name' => 'Felhasználó létrehozás']);
        Permission::create(['name' => 'Felhasználó módosítás']);
        Permission::create(['name' => 'Felhasználó törlés']);

        Permission::create(['name' => 'Szerepkör létrehozás']);
        Permission::create(['name' => 'Szerepkör szerkesztés']);
        Permission::create(['name' => 'Szerepkör törlés']);

        $adminRole = Role::create(['name' => 'Admin']);
        $editorRole = Role::create(['name' => 'Editor']);

        $adminRole->givePermissionTo([
            'Hír létrehozás',
            'Hír szerkesztés',
            'Hír törlés',
            'Hír kategória létrehozás',
            'Hír kategória szerkesztés',
            'Hír kategória törlés',
            'Címke létrehozás',
            'Címke szerkesztés',
            'Címke törlés',
            'Tartalomkezelő létrehozás',
            'Tartalomkezelő szerkesztés',
            'Tartalomkezelő törlés',
            'Felhasználó létrehozás',
            'Felhasználó módosítás',
            'Felhasználó törlés',
            'Szerepkör létrehozás',
            'Szerepkör szerkesztés',
            'Szerepkör törlés',
        ]);

        $editorRole->givePermissionTo([
            'Hír létrehozás',
            'Hír szerkesztés',
            'Hír törlés',
        ]);
    }
}
