<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Todo;
use App\TodoTask;

class TodoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::all()->each(function($user) {
            // Recebe como parametro um objeto gerado pela factory com a função make()
            // Diferente do create() que cadastra no banco
            $user->todos()->saveMany(
                factory(Todo::class, 10)->make()
            )->each(function($todo) {
                $todo->tasks()->saveMany(
                    factory(TodoTask::class, 10)->make()
                );
            });
        });
    }
}
