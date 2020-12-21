<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class)->create([
            'email' => 'gusttavo212@gmail.com',
            'password' => bcrypt('123123')
        ]);

        factory(User::class, 5)->create();
    }
}
