<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AdministratorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $administrator = new \App\Models\User;
        $administrator->name = "mabrur123";
        $administrator->email = "mabrursatori@gmail.com";
        $administrator->password = \Hash::make("12345678");
        $administrator->save();
        $this->command->info("User Admin berhasil diinsert");
    }
}
