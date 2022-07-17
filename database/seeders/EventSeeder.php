<?php

namespace Database\Seeders;

use App\Models\Event;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create();
        for ($i = 1; $i <= 30; $i++) {
            $name = $faker->sentence;
            $startAt = Carbon::createFromFormat('Y-m-d H:i:s', now());
            $endAt = Carbon::createFromFormat('Y-m-d H:i:s', $startAt)->addDays(2);

            Event::create([
                'name' => $name,
                'start_at' => $startAt,
                'end_at' => $endAt,
            ]);
        }
    }
}
