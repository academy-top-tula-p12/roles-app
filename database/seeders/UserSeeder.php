<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\User;
use App\Models\Role;
use App\Models\Permission;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $developer = Role::where("slug", "web-developer")->first();
        $manager = Role::where("slug", "project-manager")->first();

        $manageUsers = Permission::where("slug", "manage-users")->first();
        $createTasks = Permission::where("slug", "create-tasks")->first();

        // $bobby = new User();
        // $bobby->name = "Bobby Smith";
        // $bobby->email = "bobby@gmail.com";
        // $bobby->password = bcrypt('qwerty');
        // $bobby->save();
        $bobby = User::find(1);
        $bobby->roles()->attach($manager);
        $bobby->permissions()->attach($manageUsers);

        // $sammy = new User();
        // $sammy->name = "Sammy Whatson";
        // $sammy->email = "whatson@yahoo.com";
        // $sammy->password = bcrypt('12345');
        // $sammy->save();
        $sammy = User::find(2);
        $sammy->roles()->attach($developer);
        $sammy->permissions()->attach($createTasks);
    }
}

