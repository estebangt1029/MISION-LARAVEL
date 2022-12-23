<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use \App\Models\User;
use \App\Models\Film;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            PermissionSeeder::class,
          
        ]);

        Film::factory(10)->create();

        User::factory(2)->create();
       
        $admin = User::find(1);
        $admin->assignRole('admin');

        $admin = User::find(2);
        $admin->assignRole('cliente');
        

     

       


        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
