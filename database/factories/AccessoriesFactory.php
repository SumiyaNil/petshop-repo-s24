<?php

namespace Database\Factories;

use App\Models\Accessories;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Accessories>
 */
class AccessoriesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Accessories::class;
    
    public function definition(): array
    {
        return [
            'name'=>fake()->name(),
            'description'=>fake()->name(),
            'price'=>fake()->numberBetween(500,5000),
            'discount'=>fake()->numberBetween(10,60),
            'stock'=>fake()->numberBetween(50,100),
            'category_id'=>fake()->numberBetween(1,3),
        ];
    }
}
