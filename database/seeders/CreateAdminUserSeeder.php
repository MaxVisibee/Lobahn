<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin;
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
        $admin = Admin::create([
        	'name' => 'Super Admin', 
        	'email' => 'admin@admin.com',
            'password' => bcrypt('@dmin123'),
            'role_id' => '1',
        ]);
    
        $role = Role::create(['name' => 'Super Admin','guard_name'=> 'admin']);
     
        $permissions = Permission::pluck('id','id')->all();
   
        $role->syncPermissions($permissions);
     
        $admin->assignRole([$role->id]);
    }
}
