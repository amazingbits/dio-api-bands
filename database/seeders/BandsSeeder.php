<?php

namespace Database\Seeders;

use App\Models\BandsModel;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BandsSeeder extends Seeder
{
    private static array $bands = [
        [
            "name" => "Green Day",
            "gender" => "Pop Punk"
        ],
        [
            "name" => "Blink 182",
            "gender" => "Pop Punk"
        ],
        [
            "name" => "MXPX",
            "gender" => "Pop Punk"
        ],
        [
            "name" => "Red Hot Chilli Peppers",
            "gender" => "Alternative Rock"
        ],
        [
            "name" => "Foo Fighters",
            "gender" => "Alternative Rock"
        ],
        [
            "name" => "Iron Maiden",
            "gender" => "Heavy Metal"
        ],
        [
            "name" => "Alice in Chains",
            "gender" => "Grunge"
        ],
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (self::$bands as $band) {
            if (BandsModel::where("name", "=", $band["name"])->count() === 0) {
                DB::table("tb_bands")->insert([
                    "id" => Str::uuid()->toString(),
                    "name" => $band["name"],
                    "gender" => $band["gender"],
                    "created_at" => Carbon::now()
                ]);
            }
        }
    }
}
