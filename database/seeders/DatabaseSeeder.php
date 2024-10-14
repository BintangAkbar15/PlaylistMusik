<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\genre;
use App\Models\penyanyi;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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

        $genres = [
            [
                'name' => 'Pop',
                'color' => '#FF5733',
                'slug' => 'pop',
            ],
            [
                'name' => 'Rock',
                'color' => '#33FF57',
                'slug' => 'rock',
            ],
            [
                'name' => 'Jazz',
                'color' => '#3357FF',
                'slug' => 'jazz',
            ],
            [
                'name' => 'Classical',
                'color' => '#FF33A1',
                'slug' => 'classical',
            ],
            [
                'name' => 'Hip Hop',
                'color' => '#33FFF5',
                'slug' => 'hip-hop',
            ],
            [
                'name' => 'Country',
                'color' => '#F5FF33',
                'slug' => 'country',
            ],
            [
                'name' => 'Reggae',
                'color' => '#FF33D4',
                'slug' => 'reggae',
            ],
            [
                'name' => 'Blues',
                'color' => '#FFC300',
                'slug' => 'blues',
            ],
            [
                'name' => 'Metal',
                'color' => '#C70039',
                'slug' => 'metal',
            ],
            [
                'name' => 'Electronic',
                'color' => '#581845',
                'slug' => 'electronic',
            ],
        ];
        
        
        $penyanyi = [
            [
                'name' => 'Ariana Grande',
                'debut' => '2013',
                'negara' => 'Amerika Serikat',
                'slug' => 'ariana-grande'
            ],
            [
                'name' => 'Ed Sheeran',
                'debut' => '2011',
                'negara' => 'Inggris',
                'slug' => 'ed-sheeran'
            ],
            [
                'name' => 'BTS',
                'debut' => '2013',
                'negara' => 'Korea Selatan',
                'slug' => 'bts'
            ],
            [
                'name' => 'Taylor Swift',
                'debut' => '2006',
                'negara' => 'Amerika Serikat',
                'slug' => 'taylor-swift'
            ],
            [
                'name' => 'Dua Lipa',
                'debut' => '2015',
                'negara' => 'Inggris',
                'slug' => 'dua-lipa'
            ],
            [
                'name' => 'Billie Eilish',
                'debut' => '2017',
                'negara' => 'Amerika Serikat',
                'slug' => 'billie-eilish'
            ],
            [
                'name' => 'Justin Bieber',
                'debut' => '2009',
                'negara' => 'Kanada',
                'slug' => 'justin-bieber'
            ],
            [
                'name' => 'Shawn Mendes',
                'debut' => '2015',
                'negara' => 'Kanada',
                'slug' => 'shawn-mendes'
            ],
            [
                'name' => 'Selena Gomez',
                'debut' => '2009',
                'negara' => 'Amerika Serikat',
                'slug' => 'selena-gomez'
            ],
            [
                'name' => 'The Weeknd',
                'debut' => '2011',
                'negara' => 'Kanada',
                'slug' => 'the-weeknd'
            ],
        ];
        

        // Menyimpan pengguna ke database
        foreach ($users as $user) {
            User::create($user);
        }
        foreach ($genres as $genre) {
            genre::create($genre);
        }
        foreach ($penyanyi as $penyanyis) {
            penyanyi::create($penyanyis);
        }
    }
}
