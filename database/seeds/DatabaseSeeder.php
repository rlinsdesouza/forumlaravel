<?php

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
        // $this->call(UsersTableSeeder::class);
        factory(forum\User::class, 10)->create()->each(function($user){ 
            $user->temas()->save(factory(forum\Models\Tema::class)->make());
         });

         factory(forum\Models\Tema::class, 10)->create();

         factory(forum\Models\Postagem::class, 50)->create();

         factory(forum\Models\Resposta::class, 50)->create();

    }
}
