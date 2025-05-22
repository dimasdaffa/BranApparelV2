<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //Jalankan role permission seeder yang bersambung dengan RolePermissionSeeder.php dengan migrate
        $this->call(RolePermissionSeeder::class);
    }

}


