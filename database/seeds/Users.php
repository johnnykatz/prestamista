<?php

use Illuminate\Database\Seeder;

class Users extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = \App\User::firstOrCreate([
            'name' => 'Administrador',
            'email' => 'admin@admin.com',
            'username' => 'admin',
            'password' => Hash::make('123456'),
        ]);

        $role_id = DB::table("roles")->insert([
            'name' => 'admin',
            'display_name' => 'Administrador'
        ]);

        $permission_id = DB::table("permissions")->insert([
            'name' => 'admin',
            'display_name' => 'Administrador'
        ]);

        DB::table("permission_role")->insert([
            'permission_id' => $permission_id,
            'role_id' => $role_id
        ]);

        DB::table("role_user")->insert([
            'user_id' => $user->id,
            'role_id' => $role_id
        ]);
    }
}
