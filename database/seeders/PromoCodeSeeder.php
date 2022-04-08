<?php

namespace Database\Seeders;

use App\Models\PromoCode;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PromoCodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $promoCodes = [
            [
                "name " => "Promoskidkod5",
                "percent" => 5
            ],
            [
                "name " => "Promoskidkod10",
                "percent" => 10
            ],
            [
                "name " => "Promoskidkod15",
                "percent" => 15
            ]
        ];
        foreach ($promoCodes as $promoCode) {
            $pc = PromoCode::getByName($promoCode["name"]);
            if (!$pc->exists) {
                PromoCode::make($promoCode["name"], $promoCode["percent"])->save();
            }
            else{
                $pc->percent = $promoCode["percent"];
                $pc->save();
            }
        }
    }
}
