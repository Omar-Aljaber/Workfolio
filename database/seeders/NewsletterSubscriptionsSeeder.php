<?php

namespace Database\Seeders;

use App\Models\NewsletterSubscription;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class NewsletterSubscriptionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $faker = Faker::create();
        
        for ($i = 0; $i < 1000; $i++) {
            NewsletterSubscription::create([
                'email' => $faker->unique()->safeEmail,
                'is_active' => true,
            ]);
        }
    }
}
