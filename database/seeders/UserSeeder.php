<?php

namespace Database\Seeders;

use App\Models\User;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {


        $user = User::create([
            'id' => '2b0c9a47-5c27-4375-83de-61ffff8cc412',
            'email' => 'admin@root.com',
            'nama_lengkap' => 'admin',
            'nik' => '1234567890123416',
            'no_wa' => '081293912',
            'role' => 'admin',
            'alamat' => 'jalan jalan',
            'password' => bcrypt('admin123'),
            'email_verified_at' => now(),
        ]);

    }
}
