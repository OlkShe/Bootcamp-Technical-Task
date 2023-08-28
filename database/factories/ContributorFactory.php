<?php

namespace Database\Factories;

use App\Models\Collection;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Contributor>
 */
class ContributorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Get all collections id
        $collectionIds = Collection::pluck('id')->all();

        return [
            'collection_id' => Arr::random($collectionIds),
            'user_name' => $this->faker->name,
            'amount' => $this->faker->numberBetween(10000, 1000000),
        ];
    }
}
