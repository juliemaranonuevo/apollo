<?php

namespace App\Http\Controllers\API;

use App\Models\Random;
use App\Models\Breakdown;
use App\Http\Controllers\Controller;
use App\Http\Resources\Random as RandomResource;
use App\Http\Resources\Breakdown as BreakdownResource;

use Illuminate\Http\Request;
use Faker\Generator;

class RandomController extends Controller
{
    public function index(Generator $faker) 
    {
        $randoms = Random::all();

        if ($randoms) {

            foreach ($randoms as $random) {
                $random->flag = true;
                $random->save();
            }

        }

        for ($x = 5; $x <= 10; $x++) {
            $random = new Random();
            $random->values = $faker->name();
            $random->save();

            for ($y = 5; $y <= 10; $y++) {
                $breakdown = new Breakdown();
                $breakdown->values = $faker->regexify('[A-Z0-9]{5}');
                $breakdown->random_id = $random->id;
                $breakdown->save();
            }
        }

        $randomArray = [];
        $breakdownArray = [];
        $randoms = Random::where('flag', 0)
            ->get();
        foreach ($randoms as $random) {
            $randomArray[] = $random;

            $breakdowns = Breakdown::where('random_id', $random->id)
                ->get();
            foreach ($breakdowns as $breakdown) {
                $breakdownArray[] = $breakdown;
            }
        }

        return response()->json([
            'random' => RandomResource::collection($randomArray),
            'breakdown' => BreakdownResource::collection($breakdownArray),
        ]);
    }
}
