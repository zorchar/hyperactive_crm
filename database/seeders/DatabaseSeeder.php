<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Status;
use App\Models\Student;
use App\Models\User;
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

        Student::factory(10)->create();

        Status::factory(10)->create();

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
