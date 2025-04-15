<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $manageUsers = new Permission();
        $manageUsers->name = "Manage Users";
        $manageUsers->slug = "manage-users";
        $manageUsers->save();

        $createTasks = new Permission();
        $createTasks->name = "Create Tasks";
        $createTasks->slug = "create-tasks";
        $createTasks->save();
    }
}
