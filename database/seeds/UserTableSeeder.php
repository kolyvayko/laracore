<?php
declare(strict_types = 1);

use Illuminate\Database\Seeder,
    App\Models\User;

/**
 * Class UserTableSeeder
 */
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Admin',
            'email' => 'admin@mail.com',
            'password' => bcrypt('1234567'),
            'remember_token' => str_random(10)
        ]);

        $user->attachRole(1);
    }
}
