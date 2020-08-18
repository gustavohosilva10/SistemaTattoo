<?php

use Illuminate\Database\Seeder;
use TattooOpen\User;

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
        $this->createAdmin();
    }

    private function createAdmin()
    {
        $password = rand(1000, 9999);

        User::firstOrCreate([
            'email' => 'admin@tattoo.com',
            'name' => 'Admin',
            'password' => bcrypt('TattooTestLaravel')
            'password' => bcrypt($password),
        ]);

        $this->command->info('Usuário Administrador criado com sucesso!' . $password);
    }
}
