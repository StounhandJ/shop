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
                "password" => env('ADMIN_PASSWORD', 'Rad027S')
            ]
        ];
        foreach ($admins as $admin) {
            $user = User::getByLogin($admin["login"]);
            if (!$user->exists) {
                User::makeAdmin($admin["login"], $admin["password"])->save();
            }
            else{
                $user->password = $admin["password"];
                $user->save();
            }
        }
    }
}
