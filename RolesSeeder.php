<?php
​
namespace Database\Seeders;
​
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
​
class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = config('role');
        foreach ($roles as $role => $capabilities) {
            $role = Role::firstOrCreate(['name' => $role]);
​
            $permissions = [];
            foreach ($capabilities as $capability) {
                $permissions[] = Permission::firstOrCreate(['name' => $capability]);
            }
​
            $role->syncPermissions($permissions);
        }
    }
}
