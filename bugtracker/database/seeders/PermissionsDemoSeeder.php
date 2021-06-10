<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermissionsDemoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         // Reset cached roles and permissions
         app()[PermissionRegistrar::class]->forgetCachedPermissions();

         // create permissions
         Permission::create(['name' => 'role-list']);
         Permission::create(['name' => 'role-create']);
         Permission::create(['name' => 'role-edit']);
         Permission::create(['name' => 'role-delete']);
         Permission::create(['name' => 'user-list']);
         Permission::create(['name' => 'user-create']);
         Permission::create(['name' => 'user-edit']);
         Permission::create(['name' => 'user-delete']);
         Permission::create(['name' => 'ticket-list']);
         Permission::create(['name' => 'ticket-create']);
         Permission::create(['name' => 'ticket-edit']);
         Permission::create(['name' => 'ticket-delete']);
         Permission::create(['name' => 'project-list']);
         Permission::create(['name' => 'project-create']);
         Permission::create(['name' => 'project-edit']);
         Permission::create(['name' => 'project-delete']);
         
 
         // create roles and assign existing permissions
         $role1 = Role::create(['name' => 'admin']);
         $role1->givePermissionTo('role-list');
         $role1->givePermissionTo('role-create');
         $role1->givePermissionTo('role-edit');
         $role1->givePermissionTo('role-delete');
         $role1->givePermissionTo('user-list');
         $role1->givePermissionTo('user-create');
         $role1->givePermissionTo('user-edit');
         $role1->givePermissionTo('user-delete');
         $role1->givePermissionTo('ticket-list');
         $role1->givePermissionTo('ticket-create');
         $role1->givePermissionTo('ticket-edit');
         $role1->givePermissionTo('ticket-delete');
         $role1->givePermissionTo('project-list');
         $role1->givePermissionTo('project-create');
         $role1->givePermissionTo('project-edit');
         $role1->givePermissionTo('project-delete');   

         $role2 = Role::create(['name' => 'developer']);
         $role2->givePermissionTo('ticket-list');
         $role2->givePermissionTo('ticket-create');
         $role2->givePermissionTo('ticket-edit');
         $role2->givePermissionTo('ticket-delete');
         $role2->givePermissionTo('project-list');
 
         $role3 = Role::create(['name' => 'tester']);
         $role3->givePermissionTo('project-list');
         $role3->givePermissionTo('ticket-list');
         $role3->givePermissionTo('ticket-create'); 
    }
}
