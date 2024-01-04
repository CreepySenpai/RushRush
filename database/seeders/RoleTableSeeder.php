<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'role_name' => 'Admin',
                'role_desc' => 'Có quyền tao thác với hệ thống'
            ],
            [
                'role_name' => 'Customer',
                'role_desc' => 'Không có quyền truy cập hệ thống'
            ],
            [
                'role_name' => 'Staff',
                'role_desc' => 'Có quyền sử dụng các chức năng cơ bản'
            ]
        ];

        DB::table('Roles')->insert($data);
    }
}
