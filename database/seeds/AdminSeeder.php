<?php

use Faker\Factory;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Role;
use App\Permission;

class AdminSeeder extends DatabaseSeeder
{

    public function run()
    {

        $admin = User::firstOrCreate(array(
            'email' => 'admin@admin.com',
            'name' => 'Admin'
        ));
        $admin->password = bcrypt("password123");
        $admin->save();

        if($admin->profile == null){
            $profile = new \App\Profile();
            $profile->user_id = $admin->id;
            $profile->save();
        }

        $user = User::firstOrCreate(array(
            'email' => 'user@user.com',
            'name' => 'User'
        ));
        $user->password = bcrypt("password123");
        $user->save();

        if($user->profile == null){
            $profile = new \App\Profile();
            $profile->user_id = $user->id;
            $profile->save();
        }

        $admin_role = Role::firstOrcreate(['name' => 'admin']);
        $user_role = Role::firstOrcreate(['name' => 'user']);
        $permission = Permission::firstOrcreate(['name' => 'All Permission']);
        $admin->assignRole('admin');
        $admin_role->givePermissionTo($permission);
        $user->assignRole('user');

        $this->command->info('Admin User created with username admin@admin.com and password admin');
    }

}