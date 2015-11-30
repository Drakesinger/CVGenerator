<?php
use Illuminate\Database\Seeder;

class TemplatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //$faker = Faker\Factory::create();
        //factory(App\Template::class,5)->make();

        $users = \App\User::retrieveUsers();
        foreach($users as $user)
        {
            factory(App\Template::class)->create(['user_id' => $user->id]);
        }

    }
}