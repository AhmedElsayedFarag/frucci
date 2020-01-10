<?php

use Illuminate\Database\Seeder;

class adminSeederAndRole extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new \App\User([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('123456789'),
        ]);
        $user->save();
        $role = \Spatie\Permission\Models\Role::create(['name' => 'admin']);
        $user->assignRole($role);

    }
}
