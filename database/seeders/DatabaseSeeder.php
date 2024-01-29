<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
       $this->call([
         UserSeeder::class,
         TaskSeeder::class   ///mona raktahoba call korarr somoi foreingid thakla taka pora call korta hoi na hola anno table ar poran id pawa jai na// kana sedder ka call korta hoi
        

       ]);
    }
}
