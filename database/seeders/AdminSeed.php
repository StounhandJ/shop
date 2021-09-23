<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AdminSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admins = [
            [
                "login" => "admin",
                "password" => "admin"
            ]
        ];
        foreach ($admins as $admin) {
            if (!User::getByLogin($admin["login"])->exists) {
                User::makeAdmin($admin["login"], $admin["password"])->save();
            }
        }
    }
}
