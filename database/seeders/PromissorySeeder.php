<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PromissoryNote;
use Faker\Factory as Faker;

class PromissorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create a Faker instance to generate random data
        $faker = Faker::create();

        // Seed 10 random PromissoryNote entries
        for ($i = 0; $i < 10; $i++) {
            PromissoryNote::create([
                'user_id' =>'STU0001',
                'name' => $faker->name,
                'year_section' => $faker->word,
                'contact_no' => $faker->phoneNumber,
                'amount_due_for' => $faker->randomElement(['prelim', 'midterm', 'semifinal', 'finals']), // Random enum value
                'partial_payment' => $faker->randomFloat(2, 0, 5000),
                'balance_due' => $faker->randomFloat(2, 0, 5000),
                'reason' => $faker->sentence,
                'payment_schedule' => $faker->dateTimeBetween('now', '+1 month')->format('Y-m-d'),
            ]);
        }
    }
}
