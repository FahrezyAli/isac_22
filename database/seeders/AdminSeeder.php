<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert([
            'namaTim' => 'admin',
            'emailTim' => 'admin@gmail.com',
            'asalSekolah' => 'Unair',
            'kotaSekolah' => 'Kota Surabaya',
            'provinsiSekolah' => '18',
            'admin' => true,
            'password' => Hash::make('25isacjaya2022'),
        ]);
    }
}
