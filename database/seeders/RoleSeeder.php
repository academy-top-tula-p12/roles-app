<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $manager = new Role();
        $manager->name = "Project Manager";
        $manager->slug = "project-manager";
        $manager->save();

        $developer = new Role();
        $developer->name = "Web Developer";
        $developer->slug = "web-developer";
        $developer->save();
    }
}
