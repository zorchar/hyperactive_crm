<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Status;
// use App\Models\Student;
use App\Models\User;
use App\Models\Role;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(10)->create();

        Status::factory(10)->create();

        $descriptions = ['student', 'teacher', 'admin'];
        for ($i = 1; $i < 4; $i++) {
            Role::insert([
                'role' => $i,
                'description' => $descriptions[$i - 1]
            ]);
        }

        // Student::create(
        //     [
        //         'email' => 'tzur@gmail.com',
        //         'first_name' => 'Tzur',
        //         'last_name' => 'Kanfer'
        //     ]
        // );

        // Student::create(
        //     [
        //         'email' => 'shlomo@gmail.com',
        //         'first_name' => 'Shlomo',
        //         'last_name' => 'Kanfer'
        //     ]
        // );



        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
