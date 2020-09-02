<?php

use Illuminate\Database\Seeder;
use App\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
        	'name' => 'TP 1 Kerala', 
        	'email' => 'tp_1_kerala@universityportal.com',
        	'password' => bcrypt('tp_1_kerala@universityportal.com')
        ]);

        $role = Role::create(['name' => 'TP']);

        /*
        $user = User::create([
            'name' => 'TP 1 Kerala', 
            'email' => 'tp_1_kerala@universityportal.com',
            'password' => bcrypt('tp_1_kerala@universityportal.com')
        ]);

        $role = Role::create(['name' => 'TP']);
        */

        $permissions = Permission::pluck('id','id')->all();

        $role->syncPermissions($permissions);

        $user->assignRole([$role->id]);
    }
}
