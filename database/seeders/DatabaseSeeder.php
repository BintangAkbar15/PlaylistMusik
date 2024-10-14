<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        $faker = Faker::create();

        User::factory()->create([
            'name' => 'NaoBestWaifu',
            'email' => 'test@example.com',
            'telp' => '081234567890',
            'is_admin' => '1',
            'password'=>Hash::make('password')
        ]);
        $users = [
            [
                'name' => 'Andi Setiawan',
                'telp' => '081234567890',
                'email' => 'andi.setiawan@example.com',
                'is_admin' => 0,
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'Budi Santoso',
                'telp' => '081987654321',
                'email' => 'budi.santoso@example.com',
                'is_admin' => 0,
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'Citra Dewi',
                'telp' => '082112233445',
                'email' => 'citra.dewi@example.com',
                'is_admin' => 0,
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'Doni Prasetyo',
                'telp' => '082233344556',
                'email' => 'doni.prasetyo@example.com',
                'is_admin' => 0,
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'Erina Sari',
                'telp' => '082344455667',
                'email' => 'erina.sari@example.com',
                'is_admin' => 0,
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'Faisal Rahman',
                'telp' => '082455566778',
                'email' => 'faisal.rahman@example.com',
                'is_admin' => 0,
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'Gina Salsabila',
                'telp' => '082566677889',
                'email' => 'gina.salsabila@example.com',
                'is_admin' => 0,
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'Hendra Gunawan',
                'telp' => '082677788990',
                'email' => 'hendra.gunawan@example.com',
                'is_admin' => 0,
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'Ika Putri',
                'telp' => '082788899001',
                'email' => 'ika.putri@example.com',
                'is_admin' => 0,
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'Joko Widodo',
                'telp' => '082899900112',
                'email' => 'joko.widodo@example.com',
                'is_admin' => 0,
                'password' => Hash::make('password'),
            ],
        ];

        // Menyimpan pengguna ke database
        foreach ($users as $user) {
            User::create($user);
        }
    }
}
