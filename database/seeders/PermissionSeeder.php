<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission; // Use the correct model

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = array(
            array(
                "id" => 3,
                "name" => "Order index",
                "guard_name" => "admin",
                "group" => "Order",
                "created_at" => "2019-10-05 23:58:06",
                "updated_at" => "2019-10-05 23:58:06",
            ),
            array(
                "id" => 4,
                "name" => "job category create",
                "guard_name" => "admin",
                "group" => "Job Category",
                "created_at" => "2019-10-05 23:58:06",
                "updated_at" => "2019-10-05 23:58:06",
            ),
            array(
                "id" => 5,
                "name" => "job category update",
                "guard_name" => "admin",
                "group" => "Job Category",
                "created_at" => "2019-10-05 23:58:06",
                "updated_at" => "2019-10-05 23:58:06",
            ),
            array(
                "id" => 6,
                "name" => "job category delete",
                "guard_name" => "admin",
                "group" => "Job Category",
                "created_at" => "2019-10-05 23:58:06",
                "updated_at" => "2019-10-05 23:58:06",
            ),
            array(
                "id" => 7,
                "name" => "job create",
                "guard_name" => "admin",
                "group" => "Job",
                "created_at" => "2019-10-05 23:58:06",
                "updated_at" => "2019-10-05 23:58:06",
            ),
            array(
                "id" => 8,
                "name" => "job update",
                "guard_name" => "admin",
                "group" => "Job",
                "created_at" => "2019-10-05 23:58:06",
                "updated_at" => "2019-10-05 23:58:06",
            ),
            array(
                "id" => 9,
                "name" => "job delete",
                "guard_name" => "admin",
                "group" => "Job",
                "created_at" => "2019-10-05 23:58:06",
                "updated_at" => "2019-10-05 23:58:06",
            ),
            array(
                "id" => 10,
                "name" => "job role",
                "guard_name" => "admin",
                "group" => "Job Role",
                "created_at" => "2019-10-05 23:58:06",
                "updated_at" => "2019-10-05 23:58:06",
            ),
            array(
                "id" => 11,
                "name" => "job attribute",
                "guard_name" => "admin",
                "group" => "Job Attribute",
                "created_at" => "2019-10-05 23:58:06",
                "updated_at" => "2019-10-05 23:58:06",
            ),
            array(
                "id" => 12,
                "name" => "job locations",
                "guard_name" => "admin",
                "group" => "Job Locations",
                "created_at" => "2019-10-05 23:58:06",
                "updated_at" => "2019-10-05 23:58:06",
            ),
            array(
                "id" => 13,
                "name" => "sections",
                "guard_name" => "admin",
                "group" => "Site Sections",
                "created_at" => "2019-10-05 23:58:06",
                "updated_at" => "2019-10-05 23:58:06",
            ),
            array(
                "id" => 14,
                "name" => "site pages",
                "guard_name" => "admin",
                "group" => "Site Pages",
                "created_at" => "2019-10-05 23:58:06",
                "updated_at" => "2019-10-05 23:58:06",
            ),
            array(
                "id" => 15,
                "name" => "site footer",
                "guard_name" => "admin",
                "group" => "Site Footer",
                "created_at" => "2019-10-05 23:58:06",
                "updated_at" => "2019-10-05 23:58:06",
            ),
            array(
                "id" => 16,
                "name" => "blogs",
                "guard_name" => "admin",
                "group" => "Blogs",
                "created_at" => "2019-10-05 23:58:06",
                "updated_at" => "2019-10-05 23:58:06",
            ),
            array(
                "id" => 17,
                "name" => "price plan",
                "guard_name" => "admin",
                "group" => "Price Plan",
                "created_at" => "2019-10-05 23:58:06",
                "updated_at" => "2019-10-05 23:58:06",
            ),
            array(
                "id" => 18,
                "name" => "news letter",
                "guard_name" => "admin",
                "group" => "News Letter",
                "created_at" => "2019-10-05 23:58:06",
                "updated_at" => "2019-10-05 23:58:06",
            ),
            array(
                "id" => 19,
                "name" => "menu builder",
                "guard_name" => "admin",
                "group" => "Menu Builder",
                "created_at" => "2019-10-05 23:58:06",
                "updated_at" => "2019-10-05 23:58:06",
            ),
            array(
                "id" => 20,
                "name" => "access management",
                "guard_name" => "admin",
                "group" => "Access Management",
                "created_at" => "2019-10-05 23:58:06",
                "updated_at" => "2019-10-05 23:58:06",
            ),
            array(
                "id" => 21,
                "name" => "payment settings",
                "guard_name" => "admin",
                "group" => "Payment Settings",
                "created_at" => "2019-10-05 23:58:06",
                "updated_at" => "2019-10-05 23:58:06",
            ),
            array(
                "id" => 22,
                "name" => "site settings",
                "guard_name" => "admin",
                "group" => "Site Settings",
                "created_at" => "2019-10-05 23:58:06",
                "updated_at" => "2019-10-05 23:58:06",
            ),
            array(
                "id" => 23, // Changed to avoid duplicate
                "name" => "database clear",
                "guard_name" => "admin",
                "group" => "Database Clear",
                "created_at" => "2019-10-05 23:58:06",
                "updated_at" => "2019-10-05 23:58:06",
            ),
        );

        Permission::insert($permissions);
    }
}
