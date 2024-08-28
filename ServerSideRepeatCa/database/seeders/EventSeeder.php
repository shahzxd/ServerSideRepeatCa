<?php

namespace Database\Seeders;

use App\Models\Event;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

        public function run()
    {
        Event::query()->create([
            'title' => 'Champions League Final',
            'description' => 'The grand final of the Champions League.',
            'match_date' => Carbon::now()->addDays(30),
            'location' => 'Wembley Stadium, London',
            'image' => 'champions-league-final.jpg',
            'capacity' => 90000,
            'latitude' => 51.556021,
            'longitude' => -0.279519,
            'is_approved' => true,
            'user_id' => 1,
        ]);

        Event::query()->create([
            'title' => 'Local Derby Match',
            'description' => 'A thrilling local derby match between two top teams.',
            'match_date' => Carbon::now()->addDays(15),
            'location' => 'Old Trafford, Manchester',
            'image' => 'local-derby-match.jpg',
            'latitude' => 53.4631,
            'longitude' => -2.2913,
            'capacity' => 75000,
            'is_approved' => true,
            'user_id' => 1,
        ]);
    }

}
