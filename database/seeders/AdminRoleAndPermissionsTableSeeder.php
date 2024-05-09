<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;
use App\Models\User;
use DB;

class AdminRoleAndPermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        //create permissions
        $permissions=['name' => 'view pulse'];

        foreach($permissions as $permission)
        {
            if(!$this->permissionExists($permission)){
                Permission::create(['name' => $permission]);
            }
        }

        
        if(!$this->roleExists('Administrator')) //Seed admin role and attach permissions
        {
            $role = Role::create(['name' => 'Administrator']);
            $role->syncPermissions(Permission::all());

            //Assign Role to default admin user
            $user=User::first();
            $user->assignRole($role->name);
            
        }else{ //Get the default Admin role and update permissions
            
            $role=Role::where('name','Administrator')->first();

            if(!empty($role)) {
                $role->syncPermissions(Permission::all());
            }
        }
    }

    /**
     * Methods: Extract these to a trait or separate class
     */
    
    // Checks if permission exists before seeding
    public function permissionExists($permission)
    {
        $permission_exists = DB::table('permissions')->where('name', '=', $permission)->first();

        if (!empty($permission_exists)) {
            return true;
        } else {
            return false;
        }
    }

    //Checks if role exists
    public function roleExists($role_name)
    {
        $role_exists = DB::table('roles')->where('name', '=', $role_name)->first();

        if (!empty($role_exists)) {
            return true;
        } else {
            return false;
        }
    }
}
